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

               <span class="glyphicon glyphicon-<?= $subject['Subject']['is_available'] ? 'ok' : 'remove' ?>">
                </span>
            </td>
            <td class="text-center">
                <?= $this->Html->link(
                    '',
                    array('controller' => 'subjects','action' => 'view', $subject['Subject']['id']),
                    array('class' => 'glyphicon glyphicon-eye-open')
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('controller' => 'subjects','action' => 'edit', $subject['Subject']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-pencil')
                ); ?>
                <?= $this->Form->postLink(
                    '',
                    array('controller' => 'subjects','action' => 'delete', $subject['Subject']['id']),
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