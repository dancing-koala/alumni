<?php

class HomeController extends AppController
{
    public $uses = array('Student', 'Subject', 'Mark');
    public $helpers = array('Html', 'Form', 'Flash');

    public function display()
    {
        $students = $this->Student->find(
            'all',
            array(
                'limit' => 5,
                'order' => array(
                    'Student.modified' => 'desc'
                )
            )
        );

        $subjects = $this->Subject->find(
            'all',
            array(
                'limit' => 5,
                'order' => array(
                    'Subject.modified' => 'desc'
                )
            )
        );

        $marks = $this->Mark->find(
            'all',
            array(
                'limit' => 5,
                'order' => array(
                    'Mark.modified' => 'desc'
                )
            )
        );

        $this->set('marks', $marks);
        $this->set('students', $students);
        $this->set('subjects', $subjects);
    }

}