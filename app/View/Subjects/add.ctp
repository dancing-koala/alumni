<?php
$this->Html->addCrumb('Matières', array('controller' => 'subjects', 'action' => 'index'));
$this->Html->addCrumb('Ajouter une matière');
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Ajouter une matière</h4>
    </div>
    <div class="panel-body">
        <?= $this->Form->create('Subject'); ?>
        <div class="form-group">
            <?= $this->Form->input('name', array('label' => 'Nom de la matière', 'class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input(
                'is_available',
                array(
                    'label' => 'La matière est enseignée.',
                    'type' => 'checkbox',
                    'class' => 'checkbox',
                    'checked' => '1'
                )
            ); ?>
        </div>

        <?= $this->Form->end(array('label' => 'Sauvegarder', 'class' => 'btn btn-primary')); ?>
    </div>
</div>
