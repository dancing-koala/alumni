<table class="table table-bordered table-condensed table-hover">
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Élève</th>
        <th class="text-center">Matière</th>
        <th class="text-center">Note</th>
        <th class="text-center">Est valide</th>
        <th class="text-center">Actions</th>
    </tr>
    <?php foreach ($marks as $mark): ?>
        <tr>
            <td><?= $mark['Mark']['id'] ?></td>
            <td><?= $mark['Student']['firstname'] . " " . $mark['Student']['lastname'] ?></td>
            <td><?= $mark['Subject']['name'] ?></td>
            <td class="text-center"><?= sprintf("%02d / 20", $mark['Mark']['mark']); ?></td>
            <td class="text-center">
                <span class="glyphicon glyphicon-<?= $mark['Mark']['is_valid'] ? 'ok' : 'remove' ?>">
                </span>
            </td>
            <td class="text-center">
                <?= $this->Html->link(
                    '',
                    array('controller' => 'marks', 'action' => 'view', $mark['Mark']['id']),
                    array('class' => 'glyphicon glyphicon-eye-open')
                ); ?>
                <?= $this->Html->link(
                    '',
                    array('controller' => 'marks', 'action' => 'edit', $mark['Mark']['id']),
                    array('class' => 'glyphicon glyphicon glyphicon-pencil')
                ); ?>
            </td>
        </tr>

    <?php endforeach; ?>

    <?php unset($mark); ?>
</table>