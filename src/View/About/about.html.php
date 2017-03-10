<?php $this->layout('view::Layout/layout.html.php') ?>

<?php $this->start('assets');
echo asset('view::About/about.css');
$this->stop(); ?>

<h1><?= __('Über mich') ?></h1>
<p><?= __('Hallo, mein Name ist Marc und ich bin ein junger Programmierer aus der Schweiz.') ?></p>
<p><?= __('Meine Hobbys sind Programmieren und Gamen.') ?></p>
