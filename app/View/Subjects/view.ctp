<?php
$this->Html->addCrumb('Matières', array('controller' => 'subjects', 'action' => 'index'));
$this->Html->addCrumb('Détails de la matière');
?>

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

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Notes dans cette matière</h4>

    </div>
    <div class="panel-body">
        <p>
            <?= $this->Html->link(
                'Ajouter une note',
                array('controller' => 'marks', 'action' => 'addToSubject', $subject['Subject']['id']),
                array('class' => 'btn btn-primary')
            ); ?>
        </p>
        <?php if ($subject['Mark'] && count($subject['Mark']) > 0) : ?>
            <?= $this->element('Tables/subject-marks', array('marks' => $subject['Mark'])) ?>
        <?php else: ?>
            <h3 class="text-center">Aucune note dans cette matière.</h3>
        <?php endif ?>

    </div>
</div>