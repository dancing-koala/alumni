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

    public $validate = array(
        'firstname' => array(
            'rule' => 'notBlank',
            'message' => 'Vous devez attribuer un prénom à l\'élève !'
        ),
        'lastname' => array(
            'rule' => 'notBlank',
            'message' => 'Vous devez attribuer un nom à l\'élève'
        ),
        'birthdate' => array(
            'validDate' => array(
                'rule' => 'date',
                'message' => 'Vous devez entrer une date valide !'
            ),
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Vous devez entrer une date valide !'
            ),
        ),
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