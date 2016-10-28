<?php

App::uses('AppModel', 'Model');

class Student extends AppModel
{
    public $name = 'Student';
    public $useTable = 'students';
}