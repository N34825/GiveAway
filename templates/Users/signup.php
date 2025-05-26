
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
    <div class="sign-container">
        <h2>Member Registration</h2>
        <?= $this->Form->create(null, ['url' =>
            [
            'controller' => 'Users',
            'action' => 'confirm'
            ]
        ]) ?>
        <?=  $this->Form->control('firstname', [
            'label' => 'First Name',
            'required' => true,
            'id' => 'firstname',
            'type' => 'text',
            'class' => 'input-group'
        ]) ?>
        <?=  $this->Form->control('lastname', [
            'label' => 'Last Name',
            'required' => true,
            'id' => 'lastname',
            'type' => 'text',
            'class' => 'input-group'
        ]) ?>
        <?=  $this->Form->control('emailaddress', [
            'label' => 'Email Address/Phone Number',
            'required' => true,
            'id' => 'emailaddress',
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
        <?=  $this->Form->control('birthday', [
            'label' => 'Date of Birth',
            'required' => true,
            'id' => 'birthday',
            'type' => 'date',
            'class' => 'input-group',
            'empty' => true, //to allow day/month/year placeholders
            'year' => ['min' => 1950, 'max' => date('Y')], //optional
        ]) ?>
        <?=  $this->Form->control('gender', [
            'label' => 'Gender',
            'required' => true,
            'id' => 'gender',
            'type' => 'select',
            'class' => 'input-group',
            'options' => [
                'female' => 'Female',
                'male' => 'Male',
                'others' => 'Others'
            ],
            'empty' => 'Select a Gender', // Optional Placeholder
        ]) ?>
        <div class="agree-container">
            <?= $this->Form->control('agree', [
                'type' => 'checkbox',
                'label' => false,
                'required' => true,
                'id' => 'agree',
                'class' => 'form-check-input',
            ]); ?>

            <?= $this->Html->tag('label', 'I agreee with all of the Statements in the ' . 
            $this->Html->link('Terms of Service', [
                'controller' => 'Pages',
                'action' => 'terms'
            ], [
                'target' => '_blank',
                'escape' => true,
            ]), [
                'for' => 'agree',
                'class' => 'form-check-label'
            ]); ?>
        </div>

        <?= $this->Form->button('confirm', [
            'type' => 'confirm',
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