<div class="panel panel-default">
    <div class="panel-body">
        <?= $this->Form->create('Student'); ?>
        <div class="form-group">
            <?= $this->Form->input('firstname', array('label' => 'Prénom', 'class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('lastname', array('label' => 'Nom', 'class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('birthdate', array(
                'label' => 'Date de naissance',
                'class' => 'form-control',
                'dateFormat' => 'D-M-Y',
                'minYear' => date('Y') - 35,
                'maxYear' => date('Y'),
            )); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input(
                'is_registered',
                array(
                    'label' => 'L\'élève est inscrit.',
                    'type' => 'checkbox',
                    'class' => 'checkbox')
            ); ?>
        </div>

        <?= $this->Form->end(array('label' => 'Sauvegarder', 'class' => 'btn btn-primary')); ?>
    </div>
</div>
