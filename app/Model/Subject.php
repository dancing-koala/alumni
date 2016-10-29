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

    public function findAvailableForList()
    {
        $subjects = $this->Mark->Subject->find(
            'list',
            array(
                'conditions' => array('Subject.is_available' => '1'),
                'order' => array('Subject.name' => 'asc')
            )
        );

        return $subjects;
    }
}