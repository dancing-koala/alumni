<?php

App::uses('AppModel', 'Model');

class Subject extends AppModel
{
    public $name = 'Subject';
    public $useTable = 'subjects';

    public $hasMany = array(
        'Mark' => array(
            'className' => 'Mark',
            'foreignKey' => 'subject_id',
            'dependent' => true
        )
    );
}