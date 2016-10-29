<?php
$studentName = $this->request->data['Student']['firstname'] . " " . $this->request->data['Student']['lastname'];
$subject = $this->request->data['Subject']['name'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Modifier une note</h4>
    </div>
    <div class="panel-body">
        <?= $this->Form->create('Mark'); ?>
        <div class="form-group">
            <div class="input select">
                <label class="control-label">Élève : </label>
                <span class="form-control-static"><?= $studentName ?></span>
            </div>
            <?= $this->Form->input('student_id', array('type' => 'hidden')); ?>
        </div>
        <div class="form-group">
            <div class="input select">
                <label class="control-label">Matière : </label>
                <span class="form-control-static"><?= $subject ?></span>
            </div>
            <?= $this->Form->input('subject_id', array('type' => 'hidden')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->input('mark', array('label' => 'Note', 'class' => 'form-control', 'type' => 'select')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->input(
                'is_valid',
                array(
                    'label' => 'La note est valide.',
                    'type' => 'checkbox',
                    'class' => 'checkbox')
            ); ?>
        </div>

        <?= $this->Form->end(array('label' => 'Sauvegarder', 'class' => 'btn btn-primary')); ?>
    </div>
</div>
