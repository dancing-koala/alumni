<h1>Gestion des notes</h1>

<?= $this->Html->link(
    'Ajouter une note',
    array('action' => 'add'),
    array('class' => 'btn btn-primary')
); ?>

<table class="table table-bordered table-condensed table-hover">
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Élève ID</th>
        <th class="text-center">Matière ID</th>
        <th class="text-center">Note</th>
        <th class="text-center">Est valide</th>
        <th class="text-center">Actions</th>
    </tr>
    <?php foreach ($marks as $mark): ?>
        <tr>
            <td><?= $mark['Mark']['id'] ?></td>
            <td><?= $mark['Mark']['student_id'] ?></td>
            <td><?= $mark['Mark']['subject_id'] ?></td>
            <td><?= $mark['Mark']['mark'] ?></td>
            <td class="text-center">
                <span class="glyphicon glyphicon-<?= $mark['Mark']['is_valid'] ? 'ok' : 'remove' ?>-circle">
                </span>
            </td>
            <td class="text-center">
                <?= $this->Html->link(
                    '',
                    array('action' => 'view', $mark['Mark']['id']),
                    array('class' => 'glyphicon glyphicon-eye-open')
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('action' => 'edit', $mark['Mark']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-pencil')
                ); ?>
                <?= $this->Form->postLink(
                    '',
                    array('action' => 'delete', $mark['Mark']['id']),
                    array(
                        'confirm' => 'Souhaitez-vous vraiment supprimer cette note ?',
                        'class' => 'glyphicon glyphicon-trash'
                    )
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('controller' => 'marks', 'action' => 'add', $mark['Mark']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-plus')
                ); ?>
            </td>
        </tr>

    <?php endforeach; ?>

    <?php unset($mark); ?>
</table>

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

