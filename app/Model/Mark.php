<?php

App::uses('AppModel', 'Model');

class Mark extends AppModel
{
    const MAX_MARK_VALUE = 20;
    const MIN_MARK_VALUE = 0;

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

    public $validate = array(
        'student_id' => array(
            'rule' => 'notBlank',
            'message' => 'Vous devez lier un élève à la note !'
        ),
        'subject_id' => array(
            'rule' => 'notBlank',
            'message' => 'Vous devez lier une matière à la note !'
        ),
        'mark' => array(
            'between' => array(
                'rule' => array('valueBetween', self::MIN_MARK_VALUE, self::MAX_MARK_VALUE),
                'message' => 'La note doit être comprise entre 0 et 20 !'
            ),
            'notBlank ' => array(
                'rule' => 'notBlank',
                'message' => 'Vous devez attribuer une note !'
            ),
        ),
    );

    public function generateMarkList()
    {
        $marks = array();

        for ($i = self::MIN_MARK_VALUE; $i < self::MAX_MARK_VALUE + 1; $i++) {
            array_push($marks, $i);
        }

        return $marks;
    }

    public function valueBetween($check, $min, $max)
    {
        return $check['mark'] >= $min && $check['mark'] <= $max;
    }
}