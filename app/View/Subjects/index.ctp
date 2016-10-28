<h1>Gestion des matières</h1>

<?= $this->Html->link(
    'Ajouter une matière',
    array('action' => 'add'),
    array('class' => 'btn btn-primary')
); ?>

<table class="table table-bordered table-condensed table-hover">
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nom de la matière</th>
        <th class="text-center">Est enseignée</th>
        <th class="text-center">Actions</th>
    </tr>
    <?php foreach ($subjects as $subject): ?>

        <tr>
            <td><?= $subject['Subject']['id'] ?></td>
            <td><?= $subject['Subject']['name'] ?></td>
            <td class="text-center">

               <span class="glyphicon glyphicon-<?= $subject['Subject']['is_available'] ? 'ok' : 'remove' ?>-circle">
                </span>
            </td>
            <td class="text-center">
                <?= $this->Html->link(
                    '',
                    array('action' => 'view', $subject['Subject']['id']),
                    array('class' => 'glyphicon glyphicon-eye-open')
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('action' => 'edit', $subject['Subject']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-pencil')
                ); ?>
                <?= $this->Form->postLink(
                    '',
                    array('action' => 'delete', $subject['Subject']['id']),
                    array(
                        'confirm' => 'Souhaitez-vous vraiment supprimer cet élève ?',
                        'class' => 'glyphicon glyphicon-trash'
                    )
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('controller' => 'marks', 'action' => 'add', $subject['Subject']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-plus')
                ); ?>
            </td>
        </tr>

    <?php endforeach; ?>

    <?php unset($subject); ?>
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




