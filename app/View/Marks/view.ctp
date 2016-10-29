<?php
$this->Html->addCrumb('Notes', array('controller' => 'marks', 'action' => 'index'));
$this->Html->addCrumb('Détails de la note');
?>

<div class="panel panel-default">
    <div class="panel-body">
        <h2 class="center-block text-center">Note</h2>

        <div class="center-block text-right">
            <?= $this->Html->link(
                '',
                array('action' => 'edit', $mark['Mark']['id']),
                array('class' => 'glyphicon glyphicon glyphicon-pencil')
            ); ?>
        </div>

        <div class="center-block text-center">
            <h3>
                <?= sprintf(
                    "%s %s - %s - %02d / 20",
                    $mark['Student']['firstname'],
                    $mark['Student']['lastname'],
                    $mark['Subject']['name'],
                    $mark['Mark']['mark']
                ); ?>
            </h3>
        </div>

        <ul class="infos">
            <li>
                Valide : <?= $mark['Mark']['is_valid'] ? 'Oui' : 'Non'; ?>
            </li>
            <li>
                Créé(e) le
                <?= $this->Time->format($mark['Mark']['created'], '%d/%m/%Y à %H:%M:%S'); ?>
            </li>
            <li>
                Dernièrement modifié le
                <?= $this->Time->format($mark['Mark']['modified'], '%d/%m/%Y à %H:%M:%S'); ?>
            </li>
        </ul>
    </div>
</div>