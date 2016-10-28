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
}