<?php

App::uses('AppModel', 'Model');

class Student extends AppModel
{
    public $name = 'Student';
    public $useTable = 'students';

    public $hasMany = array(
        'Mark' => array(
            'className' => 'Mark',
            'foreignKey' => 'student_id',
            'dependent' => true
        )
    );

    public function findRegisteredForList()
    {
        $students = $this->find(
            'all',
            array(
                'conditions' => array('Student.is_registered' => '1'),
                'order' => array('Student.lastname' => 'asc')
            )
        );

        $processedStudents = array();

        foreach ($students as $student) {
            $processedStudents[$student['Student']['id']] = sprintf(
                "%s %s - %s",
                $student['Student']['lastname'],
                $student['Student']['firstname'],
                CakeTime::format($student['Student']['birthdate'], "%d/%m/%Y")
            );
        }

        return $processedStudents;
    }
}