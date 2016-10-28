<h1>Élèves</h1>
<table>
    <tr>
        <th>ID</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>birth date</th>
        <th>is_registered</th>
        <th>created</th>
        <th>modified</th>
    </tr>
    <?php foreach ($students as $student): ?>

        <tr>
            <td><?= $student['Student']['id'] ?></td>
        </tr>

    <?php endforeach; ?>
    <?php unset($student); ?>
</table>