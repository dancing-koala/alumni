<?php

class SubjectsController extends AppController
{
    // Success messages
    const SUBJECT_CREATED = "La matière a été créée.";
    const SUBJECT_EDITED = "La matière a été modifiée.";
    const SUBJECT_DELETED = "La matière a été supprimée.";
    // Error messages
    const SUBJECT_NOT_EDITED = "La matière n'a pas pu être modifiée.";
    const SUBJECT_NOT_FOUND = "Matière non trouvée.";
    const SUBJECT_NOT_DELETED = "La matière n'a pas pu être supprimée.";

    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Paginator');

    public $paginate = array(
        'limit' => 10,
        'order' => array('Subject.name' => 'asc')
    );

    public function index()
    {
        $this->Paginator->settings = $this->paginate;

        $data = $this->Paginator->paginate('Subject');

        $this->set('subjects', $data);
    }

    public function view($id = null)
    {
        if (!$id) throw new NotFoundException(self::SUBJECT_NOT_FOUND);

        $subject = $this->Subject->find(
            'first',
            array(
                'conditions' => array('Subject.id' => $id),
                'recursive' => 2
            )
        );

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

        $subject = $this->Subject->findById($id);

        if (!$subject) throw new NotFoundException(self::SUBJECT_NOT_FOUND);

        if ($this->request->is(array('post', 'put'))) {
            $this->Subject->id = $id;

            if ($this->Subject->save($this->request->data)) {
                $this->Flash->Success(self::SUBJECT_EDITED);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(self::SUBJECT_NOT_EDITED);
            }
        }

        if (!$this->request->data) {
            $this->request->data = $subject;
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

    public function populateSubjects()
    {
        $this->Subject->deleteAll(array('1=1', true));

        $subjects = array(
            array('name' => "Économie"),
            array('name' => "Anglais"),
            array('name' => "Français"),
            array('name' => "Informatique"),
            array('name' => "Histoire")
        );

        foreach ($subjects as $subject) {
            $this->Subject->create();
            $this->Subject->save($subject);
        }

        return $this->redirect(array('controller' => 'home', 'action' => 'display'));
    }
}