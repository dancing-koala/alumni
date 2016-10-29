<h1>Gestion des élèves</h1>

<?= $this->Html->link(
    'Ajouter un élève',
    array('action' => 'add'),
    array('class' => 'btn btn-primary')
); ?>

<?= $this->element('Tables/student', array('students' => $students)); ?>

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

