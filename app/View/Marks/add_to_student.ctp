<?php
$this->Html->addCrumb('Notes', array('controller' => 'marks', 'action' => 'index'));
$this->Html->addCrumb('Ajouter une note à un élève');
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Ajouter une note à un élève</h4>
    </div>
    <div class="panel-body">
        <?= $this->Form->create('Mark'); ?>
        <div class="form-group">
            <div class="input select">
                <label class="control-label">Élève : </label>
                <span class="form-control-static">
                    <?= $student['Student']['firstname'] . " " . $student['Student']['lastname'] ?>
                </span>
            </div>
            <?= $this->Form->input('student_id', array('type' => 'hidden')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('subject_id', array('label' => 'Matière', 'class' => 'form-control', 'type' => 'select')); ?>
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
                    'class' => 'checkbox',
                    'checked' => '1'
                )
            ); ?>
        </div>

        <?= $this->Form->end(array('label' => 'Sauvegarder', 'class' => 'btn btn-primary')); ?>
    </div>
</div>
