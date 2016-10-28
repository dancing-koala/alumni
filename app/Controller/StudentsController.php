<?php

class StudentsController extends AppController
{
    const STUDENT_NOT_FOUND = "Élève non trouvé.";
    const STUDENT_CREATED = "L'élève a été créé avec succès.";
    const STUDENT_EDITED = "L'élève a été modifié avec succès.";

    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index()
    {
        $this->set('students', $this->Student->find('all'));
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
            }
        }

        if (!$this->request->data) {
            $this->request->data = $student;
        }
    }
}