<?php

class SubjectsController extends AppController
{
    const SUBJECT_NOT_FOUND = "Matière non trouvée.";
    const SUBJECT_CREATED = "La matière a été créée.";
    const SUBJECT_EDITED = "La matière a été modifiée.";
    const SUBJECT_NOT_EDITED = "La matière n'a pas pu être modifiée.";
    const SUBJECT_DELETED = "La matière a été supprimée.";
    const SUBJECT_NOT_DELETED = "La matière n'a pas pu être supprimée.";

    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index()
    {
        $this->set('subjects', $this->Subject->find('all'));
    }

    public function view($id = null)
    {
        if (!$id) throw new NotFoundException(self::SUBJECT_NOT_FOUND);

        $subject = $this->Subject->find($id);

        if (!$subject) throw new NotFoundException(self::SUBJECT_NOT_FOUND);

        $this->set('subject', $subject);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Subject->create();

            if ($this->Subject->save($this->request->data)) {
                $this->Flash->success(self::SUBJECT_CREATED);
                return $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null)
    {
        if (!$id) throw new NotFoundException(self::SUBJECT_NOT_FOUND);

        $subject = $this->Subject->find($id);

        if (!$subject) throw new NotFoundException(self::SUBJECT_NOT_FOUND);

        if ($this->request->is('post', 'put')) {
            $this->Subject->id = $id;

            if ($this->Subject->save($this->request->data)) {
                $this->Flash->Success(self::SUBJECT_EDITED);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(self::SUBJECT_NOT_EDITED);
            }
        }
    }

    public function delete($id = null)
    {
        if ($this->request->is('get')) throw new MethodNotAllowedException();

        if ($this->Subject->delete($id)) {
            $this->Flash->success(self::SUBJECT_DELETED);
        } else {
            $this->Flash->error(self::SUBJECT_NOT_DELETED);
        }

        return $this->redirect(array('action' => 'index'));
    }
}