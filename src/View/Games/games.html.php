<?php $this->layout('view::Layout/layout.html.php') ?>

<?php $this->start('assets');
echo asset('view::Games/games.css');
$this->stop(); ?>

<h1><?= $this->e(__('Games')) ?></h1>