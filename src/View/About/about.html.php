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
        </ul>
    </div>

    <div class="col-md-6 col-lg-6 col-sm-6" data-content="single" data-name="government-form-content">
        <p><?= $this->e(__("Ragtonia is an empire with an emperor in perpetuity.")) ?></p>
    </div>

    <div class="col-md-6 col-lg-6 col-sm-6 hidden" data-content="single" data-name="military-content">
        <h2><?= $this->e(__("Military ranks")) ?></h2>

        <h3 data-name="toggle-ground-team"><?= $this->e(__("Ground team")) ?></h3>
        <ul class="rank-list hidden" data-name="ground-team">
            <li><?= $this->e(__("Recruit")) ?></li>
            <li><?= $this->e(__("Soldier")) ?></li>
            <li><?= $this->e(__("Instructor")) ?></li>
            <li><?= $this->e(__("Driver")) ?></li>
            <li><?= $this->e(__("Corporal")) ?></li>
            <li><?= $this->e(__("Sergeant")) ?></li>
            <li><?= $this->e(__("Adjutant")) ?></li>
            <li><?= $this->e(__("Lieutenant")) ?></li>
            <li><?= $this->e(__("Captain")) ?></li>
            <li><?= $this->e(__("Colonel")) ?></li>
            <li><?= $this->e(__("Regiment leader")) ?></li>
            <li><?= $this->e(__("Commandant")) ?></li>
            <li><?= $this->e(__("Commander")) ?></li>
        </ul>
        <h3 data-name="toggle-air-support"><?= $this->e(__("Air support")) ?></h3>
        <ul class="rank-list hidden" data-name="air-support">
            <li><?= $this->e(__("Gunner")) ?></li>
            <li><?= $this->e(__("Hunter pilot")) ?></li>
            <li><?= $this->e(__("Cruiser Pilot")) ?></li>
            <li><?= $this->e(__("Star Destroyer Pilot")) ?></li>
            <li><?= $this->e(__("Super Star Destroyer Pilot")) ?></li>
            <li><?= $this->e(__("Death Star Pilot")) ?></li>
            <li><?= $this->e(__("Commander")) ?></li>
            <li><?= $this->e(__("Fleet Commander")) ?></li>
            <li><?= $this->e(__("Fleet Commander")) ?></li>
        </ul>
        <h3 data-name="toggle-superordinate"><?= $this->e(__("Superordinate ")) ?></h3>
        <ul class="rank-list hidden" data-name="superordinate">
            <li><?= $this->e(__("Strategist")) ?></li>
            <li><?= $this->e(__("Emperor")) ?></li>
        </ul>
    </div>
</div>
