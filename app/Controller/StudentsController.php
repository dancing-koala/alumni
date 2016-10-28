<?php

class StudentsController extends AppController
{
    const STUDENT_NOT_FOUND = "Élève non trouvé.";

    public $helpers = array('Html', 'Form');

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
}