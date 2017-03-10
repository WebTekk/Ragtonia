<?php $this->layout('view::Layout/layout.html.php') ?>

<?php $this->start('assets');
echo asset([
    'view::Index/index.js',
    'view::Index/index.css'
]);
$this->stop(); ?>

<div>
    <h1><?= __('Willkommen auf meiner Website!') ?></h1>
</div>
</div>
</div>
<div>
    <div>
