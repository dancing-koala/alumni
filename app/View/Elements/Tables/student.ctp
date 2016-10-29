<table class="table table-bordered table-condensed table-hover">
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nom Prénom</th>
        <th class="text-center">Né(e) le</th>
        <th class="text-center">Est inscrit</th>
        <th class="text-center">Actions</th>
    </tr>
    <?php foreach ($students as $student): ?>

        <tr>
            <td><?= $student['Student']['id'] ?></td>
            <td><?= $student['Student']['lastname'] . " " . $student['Student']['firstname'] ?></td>
            <td class="text-center"><?= $this->Time->format('d/m/Y', $student['Student']['birthdate']) ?></td>
            <td class="text-center">
                <span class="glyphicon glyphicon-<?= $student['Student']['is_registered'] ? 'ok' : 'remove' ?>">
                </span>
            </td>
            <td class="text-center">
                <?= $this->Html->link(
                    '',
                    array('controller' => 'students','action' => 'view', $student['Student']['id']),
                    array('class' => 'glyphicon glyphicon-eye-open')
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('controller' => 'students','action' => 'edit', $student['Student']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-pencil')
                ); ?>
                <?= $this->Form->postLink(
                    '',
                    array('controller' => 'students','action' => 'delete', $student['Student']['id']),
                    array(
                        'confirm' => 'Souhaitez-vous vraiment supprimer cet élève ?',
                        'class' => 'glyphicon glyphicon-trash'
                    )
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('controller' => 'marks', 'action' => 'addToStudent', $student['Student']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-plus')
                ); ?>
            </td>
        </tr>

    <?php endforeach; ?>

    <?php unset($student); ?>
</table>