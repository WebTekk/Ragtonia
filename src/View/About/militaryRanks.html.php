
<div class="col-md-6 col-lg-6 col-sm-6 hidden" data-content="single" data-name="military-content">
    <h2><?= $this->e(__("Military ranks")) ?></h2>

    <h3 data-name="toggle-ground-team"><?= $this->e(__("Ground team")) ?></h3>
    <ul class="about-content hidden" data-name="ground-team">
        <li><?= $this->e(__("Recruit")) ?></li>

        <li data-name="info" data-id="soldier"><?= $this->e(__("Soldier")) ?></li>
        <li data-name="soldier-info" class="about-content-sub hidden"><?= $this->e(__("Get and perform commands.")) ?></li>

        <li data-name="info" data-id="instructor"><?= $this->e(__("Instructor")) ?></li>
        <li data-name="instructor-info" class="about-content-sub hidden"><?= $this->e(__("Instructs recruits and special forces.")) ?></li>

        <li data-name="info" data-id="driver"><?= $this->e(__("Driver")) ?></li>
        <li data-name="driver-info" class="about-content-sub hidden"><?= $this->e(__("Drives vehicles.")) ?></li>

        <li data-name="info" data-id="corporal"><?= $this->e(__("Corporal")) ?></li>
        <li data-name="corporal-info" class="about-content-sub hidden"><?= $this->e(__("Get and perform commands from a squad leader.")) ?></li>

        <li data-name="info" data-id="sergeant"><?= $this->e(__("Sergeant")) ?></li>
        <li data-name="sergeant-info" class="about-content-sub hidden"><?= $this->e(__("Squad leader for squads up to 10 man.")) ?></li>

        <li data-name="info" data-id="adjutant"><?= $this->e(__("Adjutant")) ?></li>
        <li data-name="adjutant-info" class="about-content-sub hidden"><?= $this->e(__("Leading assistant.")) ?></li>

        <li data-name="info" data-id="lieutenant"><?= $this->e(__("Lieutenant")) ?></li>
        <li data-name="lieutenant-info" class="about-content-sub hidden"><?= $this->e(__("Platoon commander for platoons up to 4 companies with 40 man.")) ?></li>

        <li data-name="info" data-id="captain"><?= $this->e(__("Captain")) ?></li>
        <li data-name="captain-info" class="about-content-sub hidden"><?= $this->e(__("Leads companies, artillery or air defences with 4 platoons up to 160 man.")) ?></li>

        <li data-name="info" data-id="colonel"><?= $this->e(__("Colonel")) ?></li>
        <li data-name="colonel-info" class="about-content-sub hidden"><?= $this->e(__("Leads battalions with 4 companies up to 640 man.")) ?></li>

        <li data-name="info" data-id="regiment-leader"><?= $this->e(__("Regiment leader")) ?></li>
        <li data-name="regiment-leader-info" class="about-content-sub hidden"><?= $this->e(__("Leads regiment with 4 battalions up to 2560 man.")) ?></li>

        <li data-name="info" data-id="commandant"><?= $this->e(__("Commandant")) ?></li>
        <li data-name="commandant-info" class="about-content-sub hidden"><?= $this->e(__("Leads all units in a specified territory up to a planet.")) ?></li>

        <li data-name="info" data-id="commander"><?= $this->e(__("Commander")) ?></li>
        <li data-name="commander-info" class="about-content-sub hidden"><?= $this->e(__("Leads all units in a system.")) ?></li>
    </ul>
    <h3 data-name="toggle-air-support"><?= $this->e(__("Air support")) ?></h3>
    <ul class="about-content hidden" data-name="air-support">
        <li data-id="gunner"><?= $this->e(__("Gunner")) ?></li>
        <li data-id="hunter"><?= $this->e(__("Hunter pilot")) ?></li>
        <li data-id="cruiser"><?= $this->e(__("Cruiser Pilot")) ?></li>
        <li data-id="star-destroyer"><?= $this->e(__("Star Destroyer Pilot")) ?></li>
        <li data-id="super-star-destroyer"><?= $this->e(__("Super Star Destroyer Pilot")) ?></li>
        <li data-id="death-star"><?= $this->e(__("Death Star Pilot")) ?></li>
        <li data-name="info" data-id="air-commander"><?= $this->e(__("Commander")) ?></li>
        <li data-name="air-commander-info" class="about-content-sub hidden"><?= $this->e(__("Leads his own ship.")) ?></li>
        <li data-name="info" data-id="fleet-commander"><?= $this->e(__("Fleet Commander")) ?></li>
        <li data-name="air-commander-info" class="about-content-sub hidden"><?= $this->e(__("Leads the whole fleet.")) ?></li>
    </ul>
    <h3 data-name="toggle-superordinate"><?= $this->e(__("Superordinate ")) ?></h3>
    <ul class="about-content hidden" data-name="superordinate">
        <li data-name="info" data-id="strategist"><?= $this->e(__("Strategist")) ?></li>
        <li data-name="strategist-info" class="about-content-sub hidden"><?= $this->e(__("Develops strategies for all units.")) ?></li>
        <li data-name="info" data-id="emperor"><?= $this->e(__("Emperor")) ?></li>
        <li data-name="emperor-info" class="about-content-sub hidden"><?= $this->e(__("Direct leader of the army.")) ?></li>
    </ul>
</div>