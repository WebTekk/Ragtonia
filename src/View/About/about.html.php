<?php $this->layout('view::Layout/layout.html.php') ?>

<?php $this->start('assets');
echo asset('view::About/about.css');
$this->stop(); ?>

<h1><?= __('About the Empire') ?></h1>