<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        'normalize.min',
        'milligram.min',
        'fonts',
        'cake',
        'style',
        'owl.carousel.min',
		'bootstrap',
		'style',
		'responsive',
		'font-awesome.min']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <?= $this->Html->link('GIVEAWAY', [
                'controller' => 'Pages',
                'action' => 'home'
            ]) ?>
            
        </div>
        <!-- <div class="top-nav-links">
            <?= $this->Html->link('LOGIN', [
                'controller' => 'Users',
                'action' => 'login'
            ], [
                'class' => 'user-register',
                'escape' => false
            ]) ?>
            <?= $this->Html->link('Membership Registration', [
                'controller' => 'Users',
                'action' => 'signup'
            ], [
                'class' => 'user-register',
                'escape' => false
            ]) ?>

        </div> -->
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer class="footer-main">
        <div class="main-section-footer">
            <?= $this->Html->link('Terms & Conditions', ['controller' => 'Pages', 'action' => 'terms']) ?> |
            <?= $this->Html->link('Privacy Policy', ['controller' => 'Pages', 'action' => 'privacy']) ?> |
            <?= $this->Html->link('GuideLine', ['controller' => 'Pages', 'action' => 'guideline']) ?>|
            <?= $this->Html->link('FAQ', ['controller' => 'Pages', 'action' => 'faq']) ?>|
            <?= $this->Html->link('Customer Support', ['controller' => 'Pages', 'action' => 'customer_support']) ?>|
            <?= $this->Html->link('Inquiry', ['controller' => 'Pages', 'action' => 'inquiry']) ?>|
            <?= $this->Html->link('Latest News', ['controller' => 'Pages', 'action' => 'latest_news']) ?>
        </div>
        <div class="container text-center">
            <p>Follow us:</p>
            <a href="https://facebook.com/YourPage" target="_blank" rel="noopener">
                <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a href="https://instagram.com/YourProfile" target="_blank" rel="noopener">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
            <a href="https://wa.me/YourNumber" target="_blank" rel="noopener">
                <i class="fab fa-whatsapp fa-2x"></i>
            </a>
            <a href="https://line.me/R/ti/p/~YourID" target="_blank" rel="noopener">
                <img src="/img/line.png" alt="LINE" style="height:32px;">
            </a>
        </div>
        <span>&copy; <?= date('Y') ?> K&K GIVEAWAY. All rights reserved.</p></span>
    </footer>

</body>
</html>
