<?php
$this->Html->addCrumb('Élèves', array('controller' => 'students', 'action' => 'index'));
$this->Html->addCrumb('Détails de l\'élève');
?>

<div class="panel panel-default">
    <div class="panel-body">
        <h2 class="center-block text-center"><?= $student['Student']['firstname'] . " " . $student['Student']['lastname'] ?></h2>

        <div class="center-block text-right">
            <?= $this->Html->link(
                '',
                array('action' => 'edit', $student['Student']['id']),
                array('class' => 'glyphicon glyphicon glyphicon-pencil')
            ); ?>
        </div>

        <ul class="infos">
            <li>
                Né(e) le
                <?= $this->Time->format('d/m/Y', $student['Student']['birthdate']); ?>
            </li>
            <li>
                Actuellement inscrit :
                <?= $student['Student']['is_registered'] ? 'Oui' : 'Non'; ?>
            </li>
            <li>
                Créé(e) le
                <?= $this->Time->format($student['Student']['created'], '%d/%m/%Y à %H:%M:%S'); ?>
            </li>
            <li>
                Dernièrement modifié le
                <?= $this->Time->format($student['Student']['modified'], '%d/%m/%Y à %H:%M:%S'); ?>
            </li>
        </ul>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Notes de l'élève</h4>
    </div>
    <div class="panel-body">

        <?php if ($student['Mark'] && count($student['Mark']) > 0) : ?>
            <?= $this->element('Tables/student-marks', array('marks' => $student['Mark'])) ?>
        <?php else: ?>
            <h3 class="text-center">Aucune note pour cet élève.</h3>
        <?php endif ?>

    </div>
</div>

