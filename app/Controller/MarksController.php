<?php

App::uses('CakeTime', 'Utility');

class MarksController extends AppController
{
    // Success messages
    const MARK_CREATED = "La note a été créée.";
    const MARK_EDITED = "La note a été modifiée.";
    const MARK_DELETED = "La note a été supprimée.";
    // Error messages
    const MARK_NOT_EDITED = "La note n'a pas pu être modifiée.";
    const MARK_NOT_FOUND = "Note non trouvée.";
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

    public function view($id = null)
    {
        if (!$id) throw new NotFoundException(self::MARK_NOT_FOUND);

        $mark = $this->Mark->findById($id);

        if (!$mark) throw new NotFoundException(self::MARK_NOT_FOUND);

        $this->set('mark', $mark);
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

    public function addToStudent($studentId = null)
    {
        if (!$studentId) throw new NotFoundException(StudentsController::STUDENT_NOT_FOUND);

        // If the request is a post, we attempt to save it as a new Mark
        if ($this->request->is('post')) {
            $this->Mark->create();
            if ($this->Mark->save($this->request->data)) {
                $this->Flash->success(self::MARK_CREATED);
                return $this->redirect(array('action' => 'index'));
            }
        }

        $student = $this->Mark->Student->findById($studentId);

        if (!$student) throw new NotFoundException(StudentsController::STUDENT_NOT_FOUND);

        // We only retrieve currently available subjects ordered by name
        $subjects = $this->Mark->Subject->findAvailableForList();

        // We generate a list of mark from 0 to 20
        $marks = $this->Mark->generateMarkList();

        if (!$this->request->data) {
            $this->request->data = array(
                'Mark' => array(
                    'student_id' => $studentId
                )
            );
        }
        // We pass the data to the view
        $this->set('subjects', $subjects);
        $this->set('student', $student);
        $this->set('marks', $marks);
    }

    public function addToSubject($subjectId = null)
    {
        if (!$subjectId) throw new NotFoundException(SubjectsController::SUBJECT_NOT_FOUND);

        // If the request is a post, we attempt to save it as a new Mark
        if ($this->request->is('post')) {
            $this->Mark->create();
            if ($this->Mark->save($this->request->data)) {
                $this->Flash->success(self::MARK_CREATED);
                return $this->redirect(array('action' => 'index'));
            }
        }

        $subject = $this->Mark->Subject->findById($subjectId);

        if (!$subject) throw new NotFoundException(SubjectsController::SUBJECT_NOT_FOUND);

        // We only retrieve currently registered students ordered by lastname
        $students = $this->Mark->Student->findRegisteredForList();

        // We generate a list of mark from 0 to 20
        $marks = $this->Mark->generateMarkList();

        if (!$this->request->data) {
            $this->request->data = array(
                'Mark' => array(
                    'subject_id' => $subjectId
                )
            );
        }

        // We pass the data to the view
        $this->set('subject', $subject);
        $this->set('students', $students);
        $this->set('marks', $marks);
    }

    public function edit($id = null)
    {
        if (!$id) throw new NotFoundException(self::MARK_NOT_FOUND);

        $mark = $this->Mark->findById($id);

        if (!$mark) throw new NotFoundException(self::MARK_NOT_FOUND);

        // If the request is a put or a post, we attempt to save it as a new Mark
        if ($this->request->is(array('put', 'post'))) {
            $this->Mark->id = $mark['Mark']['id'];

            if ($this->Mark->save($this->request->data)) {
                $this->Flash->success(self::MARK_EDITED);
                return $this->redirect(array('action' => 'index'));
            }
        }

        // If there is no data in the request, we put the mark data in there
        // in order to fill the form's fields.
        if (!$this->request->data) {
            $this->request->data = $mark;
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

    public function populateMarks()
    {
        $this->Mark->deleteAll(array('1=1', true));

        $studentIds = $this->Mark->Student->find('all', array('fields' => array('Student.id')));
        $subjectIds = $this->Mark->Subject->find('all', array('fields' => array('Subject.id')));

        $studentCount = count($studentIds);
        $subjectCount = count($subjectIds);

        $marks = array();

        for ($i = 0; $i < $studentCount * 2; $i++) {
            $newMark = array(
                'student_id' => $studentIds[rand(0, $studentCount - 1)]['Student']['id'],
                'subject_id' => $subjectIds[rand(0, $subjectCount - 1)]['Subject']['id'],
                'mark' => rand(0, 20)
            );

            array_push($marks, $newMark);
        }

        foreach ($marks as $mark) {
            $this->Mark->create();
            $this->Mark->save($mark);
        }

        return $this->redirect(array('controller' => 'home', 'action' => 'display'));
    }

}