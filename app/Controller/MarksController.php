<?php

App::uses('CakeTime', 'Utility');

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
        // We set the pagination as limiting 10 items and ordering by modification time
        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate('Mark');

        $this->set('marks', $data);
    }

    public function add()
    {
        // If the request is a post, we attempt to save it as a new Mark
        if ($this->request->is('post')) {
            $this->Mark->create();
            if ($this->Mark->save($this->request->data)) {
                $this->Flash->success(self::MARK_CREATED);
                return $this->redirect(array('action' => 'index'));
            }
        }

        // We only retrieve currently registered students ordered by lastname
        $students = $this->Mark->Student->findRegisteredForList();

        // We only retrieve currently available subjects ordered by name
        $subjects = $this->Mark->Subject->findAvailableForList();

        // We generate a list of mark from 0 to 20
        $marks = $this->Mark->generateMarkList();

        // We pass the data to the view
        $this->set('subjects', $subjects);
        $this->set('students', $students);
        $this->set('marks', $marks);
    }

}