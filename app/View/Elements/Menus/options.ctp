<div id="options" v-bind:class="{'left-shift' : showOptions}">

    <nav class="navbar btn-default" v-on:click="toggleOptions">
        <span class="glyphicon glyphicon-menu-left navbar-brand"></span>
        <span class="glyphicon glyphicon-menu-left navbar-brand pull-right"></span>
    </nav>

    <ul class="nav nav-pills nav-stacked">
        <li>

            <?= $this->Html->link(
                '<span class="glyphicon glyphicon-home"></span> &nbsp; Accueil',
                array('controller' => 'home', 'action' => 'display'),
                array('class' => '', 'escapeTitle' => false ))
            ?>
        </li>
        <li>

            <?= $this->Html->link(
                '<span class="glyphicon glyphicon-user"></span> &nbsp; Gérer les élèves',
                array('controller' => 'students', 'action' => 'index'),
                array('class' => '', 'escapeTitle' => false ))
            ?>
        </li>
        <li>

            <?= $this->Html->link(
                '<span class="glyphicon glyphicon-list-alt"></span> &nbsp; Gérer les matières',
                array('controller' => 'subjects', 'action' => 'index'),
                array('class' => '', 'escapeTitle' => false ))
            ?>
        </li>
        <li>

            <?= $this->Html->link(
                '<span class="glyphicon glyphicon-scale"></span> &nbsp; Gérer les notes',
                array('controller' => 'marks', 'action' => 'index'),
                array('class' => '', 'escapeTitle' => false ))
            ?>
        </li>
    </ul>
</div>