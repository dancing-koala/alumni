<div class="panel panel-default">
    <div class="panel-body">
        <h2 class="center-block text-center"><?= $subject['Subject']['name'] ?></h2>

        <div class="center-block text-right">
            <?= $this->Html->link(
                '',
                array('action' => 'edit', $subject['Subject']['id']),
                array('class' => 'glyphicon glyphicon glyphicon-pencil')
            ); ?>
        </div>

        <ul class="infos">
            <li>
                Actuellement enseignée :
                <?= $subject['Subject']['is_available'] ? 'Oui' : 'Non'; ?>
            </li>
            <li>
                Créé(e) le
                <?= $this->Time->format($subject['Subject']['created'], '%d/%m/%Y à %H:%M:%S'); ?>
            </li>
            <li>
                Dernièrement modifié le
                <?= $this->Time->format($subject['Subject']['modified'], '%d/%m/%Y à %H:%M:%S'); ?>
            </li>
        </ul>
    </div>
</div>