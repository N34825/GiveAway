<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->css('style') ?>
    <?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <main>
        <?= $this->fetch('content') ?>
    </main>
</body>
</html>
