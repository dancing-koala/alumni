<h1>Gestion des élèves</h1>

<?= $this->Html->link(
    'Ajouter un élève',
    array('action' => 'add'),
    array('class' => 'btn btn-primary')
); ?>

<table class="table table-bordered table-condensed table-hover">
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nom</th>
        <th class="text-center">Prénom</th>
        <th class="text-center">Né(e) le</th>
        <th class="text-center">Est inscrit</th>
        <th class="text-center">Actions</th>
    </tr>
    <?php foreach ($students as $student): ?>

        <tr>
            <td><?= $student['Student']['id'] ?></td>
            <td><?= $student['Student']['lastname'] ?></td>
            <td><?= $student['Student']['firstname'] ?></td>
            <td class="text-center"><?= $this->Time->format('d/m/Y', $student['Student']['birthdate']) ?></td>
            <td class="text-center">

                <span class="glyphicon glyphicon-<?= $student['Student']['is_registered'] ? 'ok' : 'remove' ?>-circle">
                </span>

            </td>
            <td class="text-center">
                <?= $this->Html->link(
                    '',
                    array('action' => 'view', $student['Student']['id']),
                    array('class' => 'glyphicon glyphicon-eye-open')
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('action' => 'edit', $student['Student']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-pencil')
                ); ?>
                <?= $this->Form->postLink(
                    '',
                    array('action' => 'delete', $student['Student']['id']),
                    array(
                        'confirm' => 'Souhaitez-vous vraiment supprimer cet élève ?',
                        'class' => 'glyphicon glyphicon-trash'
                    )
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('controller' => 'marks', 'action' => 'add', $student['Student']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-plus')
                ); ?>
            </td>
        </tr>

    <?php endforeach; ?>

    <?php unset($student); ?>
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

