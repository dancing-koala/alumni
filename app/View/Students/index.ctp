<h1>Élèves</h1>

<?= $this->Html->link('Ajouter un élève', array('action' => 'add')) ?>
<table>
    <tr>
        <th>ID</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Date de naissance</th>
        <th>Est inscrit</th>
        <th>Création</th>
        <th>Modification</th>
    </tr>
    <?php foreach ($students as $student): ?>

        <tr>
            <td><?= $student['Student']['id'] ?></td>
            <td><?= $student['Student']['firstname'] ?></td>
            <td><?= $student['Student']['lastname'] ?></td>
            <td><?= $student['Student']['birthdate'] ?></td>
            <td><?= $student['Student']['is_registered'] ?></td>
            <td><?= $student['Student']['created'] ?></td>
            <td><?= $student['Student']['modified'] ?></td>
        </tr>

    <?php endforeach; ?>

    <?php unset($student); ?>
</table>