<?php $this->layout('view::Layout/layout.html.php') ?>

<?php $this->start('assets');
echo asset([
    'view::Index/index.css'
]);
$this->stop(); ?>

<div>
    <h1><?= __('Welcome to Ragtonia!') ?></h1>
</div>
