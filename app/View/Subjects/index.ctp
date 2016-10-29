<?php
$this->Html->addCrumb('Matières');
?>

<h1>Gestion des matières</h1>

<?= $this->Html->link(
    'Ajouter une matière',
    array('action' => 'add'),
    array('class' => 'btn btn-primary')
); ?>

<?= $this->element('Tables/subject', array('subjects' => $subjects)) ?>

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




