<?php

class StudentsController extends AppController
{
    const STUDENT_NOT_FOUND = "Élève non trouvé.";
    const STUDENT_CREATED = "L'élève a été créé.";
    const STUDENT_EDITED = "L'élève a été modifié.";
    const STUDENT_NOT_EDITED = "L'élève n'a pas pu être modifié.";
    const STUDENT_DELETED = "L'élève a été supprimé.";
    const STUDENT_NOT_DELETED = "L'élève n'a pas pu être supprimé.";

    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Paginator');

    public $paginate = array(
        'limit' => 10,
        'order' => array('Student.lastname' => 'asc')
    );

    public function index()
    {
        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate('Student');

        $this->set('students', $data);
    }

    public function view($id = null)
    {
        if (!$id) throw new NotFoundException(self::STUDENT_NOT_FOUND);

        $student = $this->Student->find(
            'first',
            array(
                'conditions' => array('Student.id' => $id),
                'recursive' => 2
            )
        );

        if (!$student) throw new NotFoundException(self::STUDENT_NOT_FOUND);

        $this->set('student', $student);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->save($this->request->data)) {
                $this->Flash->success(self::STUDENT_CREATED);
                return $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null)
    {
        if (!$id) throw new NotFoundException(self::STUDENT_NOT_FOUND);

        $student = $this->Student->findById($id);

        if (!$student) throw new NotFoundException(self::STUDENT_NOT_FOUND);

        if ($this->request->is(array('post', 'put'))) {
            $this->Student->id = $id;

            if ($this->Student->save($this->request->data)) {
                $this->Flash->success(self::STUDENT_EDITED);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(self::STUDENT_NOT_EDITED);
            }
        }

        if (!$this->request->data) {
            $this->request->data = $student;
        }
    }

    public function delete($id)
    {
        if ($this->request->is('get')) throw new MethodNotAllowedException();

        if ($this->Student->delete($id)) {
            $this->Flash->success(self::STUDENT_DELETED);
        } else {
            $this->Flash->error(self::STUDENT_NOT_DELETED);
        }

        return $this->redirect(array('action' => 'index'));
    }

    public function populateStudents()
    {
        $this->Student->deleteAll(array('1=1', true));

        $students = array(
            array(
                'firstname' => "Linus",
                'lastname' => "Torvalds",
                'birthdate' => "1969-12-28"
            ),
            array(
                'firstname' => "Dennis",
                'lastname' => "MacAlistair Ritchie",
                'birthdate' => "1941-09-09"
            ),
            array(
                'firstname' => "Richard",
                'lastname' => "Stallman",
                'birthdate' => "1953-03-16"
            ),
            array(
                'firstname' => "Alan",
                'lastname' => "Turing",
                'birthdate' => "1912-06-23"
            ),
            array(
                'firstname' => "Stephen",
                'lastname' => "Wozniak",
                'birthdate' => "1950-08-11"
            )
        );

        foreach ($students as $student) {
            $this->Student->create();
            $this->Student->save($student);
        }

        return $this->redirect(array('controller' => 'home', 'action' => 'display'));
    }
}