
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?: 'SIGN UP' ?></title>

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
    <div class="login-container">
        <h2>Member Registration</h2>
        <?= $this->Form->create(null, ['url' =>
            [
            'controller' => 'Users',
            'action' => 'signup'
            ]
        ]) ?>

        <div class="social-login">
            <?= $this->Form->button('Login with Facebook', [
                'type' => 'submit',
                'class' => 'social-btn facebook'
            ]) ?>
            <?= $this->Form->button('Login with Google', [
                'type' => 'submit',
                'class' => 'social-btn google'
            ]) ?>
            <?= $this->Form->button('Login with WhatsApp', [
                'type' => 'submit',
                'class' => 'social-btn whatsapp'
            ]) ?>
        </div>
        <p class="signup">Already have account?
            <?= $this->Html->link('LOGIN', [
                'controller' => 'Users',
                'action' => 'login'
                ], 
                [
                    'class' => 'btn btn-success'
                ]) ?>
        </p>
    </div>
    <?= $this->Form->end() ?>  
</body>
</html>