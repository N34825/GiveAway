<html lang="en">
    <head>
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->css('admin/style') ?>
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <div class="login-form-container">
            <h2 class="login-title">Login</h2>

            <?= $this->Flash->render() ?>

            <?= $this->Form->create(null) ?>

                <?= $this->Form->control('email', [
                    'label' => 'Email',
                    'required' => true,
                    'placeholder' => 'Enter your email',
                    'type' => 'email'
                ]) ?>

                <?= $this->Form->control('password', [
                    'label' => 'Password',
                    'required' => true,
                    'placeholder' => 'Enter your password'
                ]) ?>

                <?= $this->Form->button('Login', [
                    'style' => 'width:100%; margin-top: 1rem;',
                    'class' => 'btn btn-primary'
                ]) ?>

            <?= $this->Form->end() ?>
        </div>
    </body>
</html>