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

        $student = $this->Student->findById($id);

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
}