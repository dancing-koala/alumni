<?php $this->Html->addCrumb('Notes'); ?>

<h1>Gestion des notes</h1>

<?= $this->Html->link(
    'Ajouter une note',
    array('action' => 'add'),
    array('class' => 'btn btn-primary')
); ?>

<?= $this->element('Tables/mark', array('marks' => $marks)); ?>

<ul class="pagination center-block text-center">
    <?= $this->Paginator->numbers(
        array(
            'tag' => 'li',
            'separator' => null,
            'currentTag' => 'span',
            'class' => '',
            'currentClass' => 'active'
        )
    ); ?>
</ul>

