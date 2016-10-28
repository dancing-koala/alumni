<?php

class MarksController extends AppController
{
    const MARK_NOT_FOUND = "Note non trouvée.";
    const MARK_CREATED = "La note a été créée.";
    const MARK_EDITED = "La note a été modifiée.";
    const MARK_NOT_EDITED = "La note n'a pas pu être modifiée.";
    const MARK_DELETED = "La note a été supprimée.";
    const MARK_NOT_DELETED = "La note n'a pas pu être supprimée.";

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