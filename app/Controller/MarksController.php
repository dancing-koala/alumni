<?php

class MarksController extends AppController
{
    const SUBJECT_NOT_FOUND = "Matière non trouvée.";
    const SUBJECT_CREATED = "La matière a été créée.";
    const SUBJECT_EDITED = "La matière a été modifiée.";
    const SUBJECT_NOT_EDITED = "La matière n'a pas pu être modifiée.";
    const SUBJECT_DELETED = "La matière a été supprimée.";
    const SUBJECT_NOT_DELETED = "La matière n'a pas pu être supprimée.";

    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Paginator');

    public $paginate = array(
        'limit' => 10,
        'order' => array('Mark.modified' => 'desc')
    );

    public function index()
    {
        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate('Mark');

        $this->set('marks', $data);
    }

}