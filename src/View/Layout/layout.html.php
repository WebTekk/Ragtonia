<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Tekk">
    <meta name="description" content="Ragtonia">
    <meta name="keywords" content="Ragtonia">
    <meta name=“robots” content=“nofollow”>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <base href="<?php echo baseurl("/", true) ?> ">
    <!--canonical-->
    <link rel="canonical" href="#">

    <link rel="icon" href="favicon.ico">

    <title>Ragtonia</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <?= $this->section('assets') ?>

</head>
<body>

<!--
    ##################################################
    ##                                              ##
    ##   ########    ########    ##  ##    ##  ##   ##
    ##      ##       ##          ## ##     ## ##    ##
    ##      ##       ##          ####      ####     ##
    ##      ##       ######      ###       ###      ##
    ##      ##       ##          ####      ####     ##
    ##      ##       ##          ## ##     ## ##    ##
    ##      ##       ########    ##  ##    ##  ##   ##
    ##                                              ##
    ##################################################
-->
<nav class="navbar navbar-inverse custom-nav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo baseurl('/') ?>"><?= $this->e(__("Home")) ?> <span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo baseurl('/games') ?>"><?= $this->e(__("Games")) ?> <span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo baseurl('/about') ?>"><?= $this->e(__("About the Empire")) ?> <span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="float-right">
                <ul class="hover nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?= $this->e(__("Language")) ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo baseurl('/language') . '?lang=de_DE' ?>"><?= $this->e(__('German')) ?></a></li>
                            <li><a href="<?php echo baseurl('/language') . '?lang=en_US' ?>"><?= $this->e(__('English')) ?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="main-content content">

        <?= $this->section('content') ?>

    </div>
</div>

</body>
</html>
