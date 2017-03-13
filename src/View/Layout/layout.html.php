<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Marc Wilhelm">
    <meta name="description" content="Tekk's ContactForm">
    <meta name="keywords" content="Tekk, TekkCraft">
    <meta name=“robots” content=“nofollow”>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <base href="<?php echo baseurl("/", true) ?> ">
    <!--canonical-->
    <link rel="canonical" href="tekk.ch">

    <link rel="icon" href="favicon.ico">

    <title>Contactform</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">

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
                <li><a class="active" href="<?php echo baseurl('/') ?>"><?= $this->e(__("Home")) ?> <span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a class="active" href="<?php echo baseurl('/contact') ?>"><?= $this->e(__("Kontakt")) ?> <span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a class="active" href="<?php echo baseurl('/about_me') ?>"><?= $this->e(__("Über mich")) ?> <span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="float-right">
                <?php if (empty(session()->get('email')))  : ?>
                    <ul class="hover nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span
                                        class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form" method="post" action="<?= $this->e(baseurl('/login')) ?>"
                                                  id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="login_email">Email Adresse</label>
                                                    <input type="email" name="login_email" class="form-control"
                                                           placeholder="Email Adresse" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="login_password">Passwort</label>
                                                    <input type="password" name="login_password" class="form-control"
                                                           placeholder="Passwort" required>
                                                </div>
                                                <?php foreach ($this->next('flash') as $type => $messages) : ?>
                                                    <?php foreach ($messages as $message) : ?>
                                                        <?php if ($type == 'empty') ?>
                                                            <div class="form-group">
                                                            <div class="alert alert-danger" role="alert">
                                                            <span class="help-block"><?php echo $this->e($message); ?></span>
                                                        </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                                <div class="form-group">

                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Sign in
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- #### Register Button #### -->
                                        <!--<div class="bottom text-center">-->
                                        <!--    New here ? <a href="#"><b>Join Us</b></a>-->
                                        <!--</div>-->
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php else : ?>
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="<?php echo baseurl('/logout') ?>"><?= $this->e(__("Ausloggen")) ?>
                                <span
                                        class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                <?php endif; ?>
                <ul class="hover nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?= $this->e(__("Sprache")) ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo baseurl('/language') . '?lang=de_DE' ?>">de_DE</a></li>
                            <li><a href="<?php echo baseurl('/language') . '?lang=en_US' ?>">en_US</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <div class="jumbotron main-content">

        <?= $this->section('content') ?>

    </div>
</div>


</body>
</html>
