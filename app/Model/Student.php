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
}