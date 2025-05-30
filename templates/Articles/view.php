<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Article'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="articles view content">
            <h3><?= h($article->article_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Article Id') ?></th>
                    <td><?= h($article->article_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Article Name') ?></th>
                    <td><?= h($article->article_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Article Description') ?></th>
                    <td><?= h($article->article_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Article Img') ?></th>
                    <td><?= h($article->article_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($article->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($article->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($article->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>