<?php $this->layout('view::Layout/layout.html.php') ?>

<?php $this->start('assets');
echo asset('view::About/about.css');
$this->stop(); ?>

<h1><?= __('About the Empire') ?></h1>

</div>
</div>
<div class="about-left-navigation col-md-3 col-lg-3 col-sm-3">
    <ul class="nav nav-pills nav-stacked">
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-haspopup="true"
               aria-expanded="false"><?= $this->e(__("Form of government")) ?></a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true"
                                aria-expanded="false"><?= $this->e(__("Ranks")) ?><span
                        class="caret"></span></a>
            <ul class="dropdown-menu">
                <li>>test</li>
            </ul>
        </li>
    </ul>
</div>