<!DOCTYPE html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        Alumni
    </title>
    <?php
    echo $this->Html->meta('icon');

    //    echo $this->Html->css('cake.generic');
    echo $this->Html->css('bootstrap/css/bootstrap.min');
    echo $this->Html->css('main');


    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div id="alumni-app" v-bind:class="{'hide-overflow' : showOptions}">

    <div id="container">
        <div id="header">
            <nav class="navbar navbar-default text-center">
                <a class="navbar-brand" href="/">
                    <span id="brand-name" class="windsong">Alumni</span>
                    <span class="glyphicon glyphicon-education"></span>
                </a>

                <span id="options-btn" class="glyphicon glyphicon-option-horizontal navbar-brand"
                      v-on:click="toggleOptions"></span>
            </nav>
        </div>

        <div id="content" class="container">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>

        <div id="footer">
        </div>
    </div>

    <?= $this->element('Menus/options'); ?>

</div>

<?= $this->element('sql_dump'); ?>
<?= $this->Html->script('vuejs/vue.min'); ?>
<?= $this->Html->script('app'); ?>
</body>
</html>
