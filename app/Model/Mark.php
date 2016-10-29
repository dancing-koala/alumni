<?php

App::uses('AppModel', 'Model');

class Mark extends AppModel
{
    public $name = 'Mark';
    public $useTable = 'marks';

    public $belongsTo = array(
        'Student' => array(
            'className' => 'Student',
            'foreignKey' => 'student_id'
        ),
        'Subject' => array(
            'className' => 'Subject',
            'foreignKey' => 'subject_id'
        )
    );

    public function generateMarkList()
    {
        $marks = array();

        for ($i = 0; $i < 21; $i++) {
            array_push($marks, $i);
        }

        return $marks;
    }
}