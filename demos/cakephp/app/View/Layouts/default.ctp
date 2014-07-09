
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $title_for_layout; ?>
    </title>

    <!-- Core CSS - Include with every page -->
    <?php echo $this->Html->css("bootstrap.min"); ?>
    <link rel="stylesheet" href="<?php echo Router::url("/"); ?>font-awesome/css/font-awesome.css" type="text/css"/>

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <?php echo $this->Html->css("sb-admin"); ?>
    <?php echo $this->Html->css("shCore"); ?>
    <?php echo $this->Html->css("shCoreDefault"); ?>
    <?php echo $this->Html->css("shThemeRDark"); ?>

</head>

<body>

<div id="wrapper">

<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo Router::url("/"); ?>">
        Sample CakePHP Application
        <small style="font-size: 12px;">
            developed by Roosevelt Purification.
        </small>
    </a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
<li class="dropdown">
    <?php if (!isset($loggedIn) || !(bool)$loggedIn): ?>
        <?php echo $this->Html->link("Log-in", array("controller" => "Users", "action" => "login", "admin" => true)); ?>
    <?php else: ?>
        Logged in as: <?php echo $loggedInUser['fullName']; ?> <?php echo $this->Html->link("Log-out", array("controller" => "Users", "action" => "logout", "admin" => true)); ?>
    <?php endif; ?>
    <!-- /.dropdown-messages -->
</li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<?php echo Router::url("/"); ?>"><i class="fa fa-dashboard fa-fw"></i> Homepage</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Administration<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo Router::url(array("controller" => "Users", "action" => "index", "admin" => true)); ?>">Manage Users</a>
                    </li>
                    <li>
                        <a href="<?php echo Router::url(array("controller" => "Posts", "action" => "index", "admin" => true)); ?>">Manage Posts</a>
                    </li>
                    <li>
                        <a href="<?php echo Router::url(array("controller" => "CodeSamples", "action" => "resetSchema", "admin" => false)); ?>">Reset Database</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Code Samples<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php echo $this->Html->link("Models", array("controller" => "CodeSamples", "action" => "models", "admin" => false)); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link("Views", array("controller" => "CodeSamples", "action" => "views", "admin" => false)); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link("Controllers", array("controller" => "CodeSamples", "action" => "controllers", "admin" => false)); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link("Schema", array("controller" => "CodeSamples", "action" => "schemas", "admin" => false)); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link("Test Cases", array("controller" => "CodeSamples", "action" => "tests", "admin" => false)); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $title; ?>
            </h1>

            <?php echo $this->Session->flash("flash", array("element" => "flashGood")); ?>
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('sql_dump'); ?>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Core Scripts - Include with every page -->
<?php echo $this->Html->script("jquery-1.10.2"); ?>
<?php echo $this->Html->script("bootstrap.min"); ?>
<?php echo $this->Html->script("plugins/metisMenu/jquery.metisMenu"); ?>

<!-- Page-Level Plugin Scripts - Blank -->

<!-- SB Admin Scripts - Include with every page -->
<?php echo $this->Html->script("sb-admin"); ?>

<!-- Page-Level Demo Scripts - Blank - Use for reference -->
<?php echo $this->Html->script("shCore"); ?>
<?php echo $this->Html->script("shBrushPhp"); ?>
<?php echo $this->Html->script("custom"); ?>

</body>

</html>