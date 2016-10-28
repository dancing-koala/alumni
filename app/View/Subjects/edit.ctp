<div class="panel panel-default">
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
                    'class' => 'checkbox')
            ); ?>
        </div>

        <?= $this->Form->end(array('label' => 'Sauvegarder', 'class' => 'btn btn-primary')); ?>
    </div>
</div>
