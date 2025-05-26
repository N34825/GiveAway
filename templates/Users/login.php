
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?: 'Login' ?></title>

    <!-- Meta tags -->
    <?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1') ?>
    <?= $this->Html->meta('description', 'This is a CakePHP 5 app') ?>

    <!-- CSS -->
    <?= $this->Html->css(['normalize', 'style']) ?>
    <?= $this->fetch('css') ?>

    <!-- JavaScript (optional) -->
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('style') ?>
</head>
<body>
    <?= $this->fetch('content') ?>
    <div class="login-container">
        <h2>Login</h2>
        <?= $this->Form->create(null, ['url' =>
            [
            'controller' => 'Users',
            'action' => 'login'
            ]
        ]) ?>
        <?=  $this->Form->control('username', [
            'label' => 'Username',
            'required' => true,
            'id' => 'username',
            'type' => 'text',
            'class' => 'input-group'
        ]) ?>
        <?=  $this->Form->control('password', [
            'label' => 'Password',
            'required' => true,
            'id' => 'password',
            'type' => 'password',
            'class' => 'input-group'
        ]) ?>
        <?= $this->Form->button('Login', [
            'type' => 'submit',
            'class' => 'btn btn-success'
        ]) ?>

        <div class="social-login">
            <p>Or login with</p>
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

        <p class="signup">Don't have an account?
            <?= $this->Html->link('SIGNUP', [
                'controller' => 'Users',
                'action' => 'signup'
                ], 
                [
                    'class' => 'btn btn-success'
                ]) ?>
        </p>
    </div>
    <?= $this->Form->end() ?>  
</body>
</html>