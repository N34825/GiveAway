
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?: 'CONFIRMATION' ?></title>

    <!-- Meta tags -->
    <?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1') ?>
    <?= $this->Html->meta('description', 'This is a CakePHP 5 app') ?>

    <!-- CSS -->
    <?= $this->Html->css(['normalize', 'style']) ?>
    <?= $this->fetch('css') ?>

    <!-- JavaScript (optional) -->
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('main') ?>
</head>
<body>
    <?= $this->fetch('content') ?>
    <div class="sign-container">
        <h2>Register Confirmation</h2>
        <?= $this->Form->create(null, ['url' =>
            [
            'controller' => 'Users',
            'action' => 'register'
            ]
        ]);
        $fullname = $data->firstname . ' '. $data->lastname;
        ?>
        <ul>
            <li>UserName:<?= h($fullname)?></li>
            <li>Email: <?= h($data->emailaddress) ?></li>
            <li>Birthday: <?= h($data->birthday) ?></li>
            <li>Gender: <?= h($data->gender) ?></li>
        </ul>

        <?= $this->Form->button('Register', [
            'type' => 'submit',
            'class' => 'btn btn-success'
        ]) ?>
        <?= $this->Form->button('Edit', [
            'controller' => 'Users',
            'action' => 'signup',
        ])
        ?>
    </div>
    <?= $this->Form->end() ?>  
</body>
</html>