<h1>Matières</h1>

<?= $this->Html->link('Ajouter une matière', array('action' => 'add')) ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nom de la matière</th>
        <th>Est enseignée</th>
        <th>Créée</th>
        <th>Modifiée</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($subjects as $subject): ?>

        <tr>
            <td><?= $subject['Subject']['id'] ?></td>
            <td><?= $subject['Subject']['name'] ?></td>
            <td><?= $subject['Subject']['is_available'] ? 'Oui' : 'Non' ?></td>
            <td><?= $subject['Subject']['created'] ?></td>
            <td><?= $subject['Subject']['modified'] ?></td>
            <td>
                <?= $this->Html->link('Voir', array('action' => 'view', $subject['Subject']['id'])); ?>
                <?= $this->Html->link('Éditer', array('action' => 'edit', $subject['Subject']['id'])); ?>
                <?= $this->Form->postLink(
                    'Supprimer',
                    array('action' => 'delete', $subject['Subject']['id']),
                    array('confirm' => 'Souhaitez-vous vraiment supprimer cette matière ?')
                ); ?>
            </td>
        </tr>

    <?php endforeach; ?>

    <?php unset($subject); ?>
</table>