<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Les 5 dernières notes modifiées</h4>
    </div>
    <div class="panel-body">
        <?= $this->Html->link(
            'Gérer les notes',
            array('controller' => 'marks', 'action' => 'index'),
            array('class' => 'btn btn-primary')
        ); ?>

        <?= $this->element('Tables/mark', array('mark' => $marks)); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Les 5 dernières matières modifiées</h4>
    </div>
    <div class="panel-body">
        <?= $this->Html->link(
            'Gérer les matières',
            array('controller' => 'subjects', 'action' => 'index'),
            array('class' => 'btn btn-primary')
        ); ?>

        <?= $this->element('Tables/subject', array('subject' => $subjects)); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Les 5 derniers élèves modifiés</h4>
    </div>
    <div class="panel-body">
        <?= $this->Html->link(
            'Gérer les élèves',
            array('controller' => 'students', 'action' => 'index'),
            array('class' => 'btn btn-primary')
        ); ?>

        <?= $this->element('Tables/student', array('students' => $students)); ?>
    </div>
</div>