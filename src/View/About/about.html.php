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

            <li data-name="info" data-id="soldier"><?= $this->e(__("Soldier")) ?></li>
            <li data-name="soldier-info" class="rank-list-sub hidden"><?= $this->e(__("Get and perform commands.")) ?></li>

            <li data-name="info" data-id="instructor"><?= $this->e(__("Instructor")) ?></li>
            <li data-name="instructor-info" class="rank-list-sub hidden"><?= $this->e(__("Instructs recruits and special forces.")) ?></li>

            <li data-name="info" data-id="driver"><?= $this->e(__("Driver")) ?></li>
            <li data-name="driver-info" class="rank-list-sub hidden"><?= $this->e(__("Drives vehicles.")) ?></li>

            <li data-name="info" data-id="corporal"><?= $this->e(__("Corporal")) ?></li>
            <li data-name="corporal-info" class="rank-list-sub hidden"><?= $this->e(__("Get and perform commands from a squad leader.")) ?></li>

            <li data-name="info" data-id="sergeant"><?= $this->e(__("Sergeant")) ?></li>
            <li data-name="sergeant-info" class="rank-list-sub hidden"><?= $this->e(__("Squad leader for squads up to 10 man.")) ?></li>

            <li data-name="info" data-id="adjutant"><?= $this->e(__("Adjutant")) ?></li>
            <li data-name="adjutant-info" class="rank-list-sub hidden"><?= $this->e(__("Leading assistant.")) ?></li>

            <li data-name="info" data-id="lieutenant"><?= $this->e(__("Lieutenant")) ?></li>
            <li data-name="lieutenant-info" class="rank-list-sub hidden"><?= $this->e(__("Platoon commander for platoons up to 4 companies with 40 man.")) ?></li>

            <li data-name="info" data-id="captain"><?= $this->e(__("Captain")) ?></li>
            <li data-name="captain-info" class="rank-list-sub hidden"><?= $this->e(__("Leads companies, artillery or air defences with 4 platoons up to 160 man.")) ?></li>

            <li data-name="info" data-id="colonel"><?= $this->e(__("Colonel")) ?></li>
            <li data-name="colonel-info" class="rank-list-sub hidden"><?= $this->e(__("Leads battalions with 4 companies up to 640 man.")) ?></li>

            <li data-name="info" data-id="regiment-leader"><?= $this->e(__("Regiment leader")) ?></li>
            <li data-name="regiment-leader-info" class="rank-list-sub hidden"><?= $this->e(__("Leads regiment with 4 battalions up to 2560 man.")) ?></li>

            <li data-name="info" data-id="commandant"><?= $this->e(__("Commandant")) ?></li>
            <li data-name="commandant-info" class="rank-list-sub hidden"><?= $this->e(__("Leads all units in a specified territory up to a planet.")) ?></li>

            <li data-name="info" data-id="commander"><?= $this->e(__("Commander")) ?></li>
            <li data-name="commander-info" class="rank-list-sub hidden"><?= $this->e(__("Leads all units in a system.")) ?></li>
        </ul>
        <h3 data-name="toggle-air-support"><?= $this->e(__("Air support")) ?></h3>
        <ul class="rank-list hidden" data-name="air-support">
            <li data-id="gunner"><?= $this->e(__("Gunner")) ?></li>
            <li data-id="hunter"><?= $this->e(__("Hunter pilot")) ?></li>
            <li data-id="cruiser"><?= $this->e(__("Cruiser Pilot")) ?></li>
            <li data-id="star-destroyer"><?= $this->e(__("Star Destroyer Pilot")) ?></li>
            <li data-id="super-star-destroyer"><?= $this->e(__("Super Star Destroyer Pilot")) ?></li>
            <li data-id="death-star"><?= $this->e(__("Death Star Pilot")) ?></li>
            <li data-name="info" data-id="air-commander"><?= $this->e(__("Commander")) ?></li>
            <li data-name="air-commander-info" class="rank-list-sub hidden"><?= $this->e(__("Leads his own ship.")) ?></li>
            <li data-name="info" data-id="fleet-commander"><?= $this->e(__("Fleet Commander")) ?></li>
            <li data-name="air-commander-info" class="rank-list-sub hidden"><?= $this->e(__("Leads the whole fleet.")) ?></li>
        </ul>
        <h3 data-name="toggle-superordinate"><?= $this->e(__("Superordinate ")) ?></h3>
        <ul class="rank-list hidden" data-name="superordinate">
            <li data-name="info" data-id="strategist"><?= $this->e(__("Strategist")) ?></li>
            <li data-name="strategist-info" class="rank-list-sub hidden"><?= $this->e(__("Develops strategies for all units.")) ?></li>
            <li data-name="info" data-id="emperor"><?= $this->e(__("Emperor")) ?></li>
            <li data-name="emperor-info" class="rank-list-sub hidden"><?= $this->e(__("Direct leader of the army.")) ?></li>
        </ul>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-6 hidden" data-content="single" data-name="government-content">
        <h2><?= $this->e(__("Government")) ?></h2>
        <ul class="rank-list" data-name="government">
            <li data-name="info" data-id="delegates"><?= $this->e(__("Delegates")) ?></li>
            <li data-name="delegates-info" class="rank-list-sub hidden"><?= $this->e(__("Peace negotiations, etc.")) ?></li>
            <li><?= $this->e(__("Head of Industry")) ?></li>
            <li><?= $this->e(__("Head of health care")) ?></li>
            <li><?= $this->e(__("Head of propaganda")) ?></li>
            <li><?= $this->e(__("Head of research")) ?></li>
            <li><?= $this->e(__("Head of finance")) ?></li>
            <li><?= $this->e(__("Head of military intelligence")) ?></li>
            <li data-name="info" data-id="2-deputy"><?= $this->e(__("2. deputy")) ?></li>
            <li data-name="2-deputy-info" class="rank-list-sub hidden"><?= $this->e(__("On-messages the 1. deputy.")) ?></li>
            <li data-name="info" data-id="1-deputy"><?= $this->e(__("1. deputy")) ?></li>
            <li data-name="1-deputy-info" class="rank-list-sub hidden"><?= $this->e(__("On-messages the emperor.")) ?></li>
            <li data-name="info" data-id="right-hand"><?= $this->e(__("Emperor's right hand")) ?></li>
            <li data-name="right-hand-info" class="rank-list-sub hidden"><?= $this->e(__("Only the emperor has a higher force than the emperor's right hand.")) ?></li>
            <li><?= $this->e(__("Emperor")) ?></li>
        </ul>
    </div>
</div>
