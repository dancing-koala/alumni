<?php
$this->Html->addCrumb('Notes', array('controller' => 'marks', 'action' => 'index'));
$this->Html->addCrumb('Ajouter une note à une matière');
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Ajouter une note à une matière</h4>
    </div>
    <div class="panel-body">
        <?= $this->Form->create('Mark'); ?>
        <div class="form-group">
            <div class="input select">
                <label class="control-label">Matière : </label>
                <span class="form-control-static">
                    <?= $subject['Subject']['name'] ?>
                </span>
            </div>
            <?= $this->Form->input('subject_id', array('type' => 'hidden')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->input('student_id', array('label' => 'Élève', 'class' => 'form-control', 'type' => 'select')); ?>
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
