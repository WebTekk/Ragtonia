<?php $this->layout('view::Layout/layout.html.php') ?>

<?php $this->start('assets');
echo asset('view::About/about.css');
echo asset('view::About/about.js');
$this->stop(); ?>

<h1><?= __('About the Empire') ?></h1>

</div>
</div>
<div id="content-box">
    <div class="about-left-navigation col-md-3 col-lg-3 col-sm-3">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="#" data-toggle="dropdown" data-name="government-form" role="button"
                   aria-haspopup="true"
                   aria-expanded="false"><?= $this->e(__("Form of government")) ?></a></li>
            <li><a href="#" data-toggle="dropdown" data-name="military" role="button"
                   aria-haspopup="true"
                   aria-expanded="false"><?= $this->e(__("Military")) ?></a>
            </li>
            <li><a href="#" data-toggle="dropdown" data-name="government" role="button"
                   aria-haspopup="true"
                   aria-expanded="false"><?= $this->e(__("Government")) ?></a>
            </li>
            <li><a href="#" data-toggle="dropdown" data-name="history" role="button"
                   aria-haspopup="true"
                   aria-expanded="false"><?= $this->e(__("History")) ?></a>
            </li>
        </ul>
    </div>

    <?php require_once "formOfGovernment.html.php" ?>

    <?php require_once "militaryRanks.html.php" ?>

    <?php require_once "government.html.php" ?>

    <?php require_once "history.html.php" ?>
</div>
