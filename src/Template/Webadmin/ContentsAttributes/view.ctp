<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContentsAttribute $contentsAttribute
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contents Attribute'), ['action' => 'edit', $contentsAttribute->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contents Attribute'), ['action' => 'delete', $contentsAttribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contentsAttribute->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contents Attributes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contents Attribute'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contents Categories'), ['controller' => 'ContentsCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contents Category'), ['controller' => 'ContentsCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contents Data Attributes'), ['controller' => 'ContentsDataAttributes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contents Data Attribute'), ['controller' => 'ContentsDataAttributes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contentsAttributes view large-9 medium-8 columns content">
    <h3><?= h($contentsAttribute->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Contents Category') ?></th>
            <td><?= $contentsAttribute->has('contents_category') ? $this->Html->link($contentsAttribute->contents_category->title, ['controller' => 'ContentsCategories', 'action' => 'view', $contentsAttribute->contents_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($contentsAttribute->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($contentsAttribute->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validations') ?></th>
            <td><?= h($contentsAttribute->validations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contentsAttribute->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($contentsAttribute->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($contentsAttribute->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contentsAttribute->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contentsAttribute->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contents Data Attributes') ?></h4>
        <?php if (!empty($contentsAttribute->contents_data_attributes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Content Id') ?></th>
                <th scope="col"><?= __('Contents Attribute Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contentsAttribute->contents_data_attributes as $contentsDataAttributes): ?>
            <tr>
                <td><?= h($contentsDataAttributes->id) ?></td>
                <td><?= h($contentsDataAttributes->content_id) ?></td>
                <td><?= h($contentsDataAttributes->contents_attribute_id) ?></td>
                <td><?= h($contentsDataAttributes->data) ?></td>
                <td><?= h($contentsDataAttributes->created) ?></td>
                <td><?= h($contentsDataAttributes->created_by) ?></td>
                <td><?= h($contentsDataAttributes->modified) ?></td>
                <td><?= h($contentsDataAttributes->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ContentsDataAttributes', 'action' => 'view', $contentsDataAttributes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ContentsDataAttributes', 'action' => 'edit', $contentsDataAttributes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContentsDataAttributes', 'action' => 'delete', $contentsDataAttributes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contentsDataAttributes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
