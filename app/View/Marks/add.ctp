<div class="panel panel-default">
    <div class="panel-body">
        <?= $this->Form->create('Mark'); ?>
        <div class="form-group">
            <?= $this->Form->input('student_id', array('label' => 'Élève', 'class' => 'form-control', 'type' => 'select')); ?>
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
                    'class' => 'checkbox')
            ); ?>
        </div>

        <?= $this->Form->end(array('label' => 'Sauvegarder', 'class' => 'btn btn-primary')); ?>
    </div>
</div>
