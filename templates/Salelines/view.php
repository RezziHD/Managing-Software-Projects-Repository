<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saleline $saleline
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Saleline'), ['action' => 'edit', $saleline->sale_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Saleline'), ['action' => 'delete', $saleline->sale_id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleline->sale_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Salelines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Saleline'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="salelines view content">
            <h3><?= h($saleline->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $saleline->hasValue('sale') ? $this->Html->link($saleline->sale->id, ['controller' => 'Sales', 'action' => 'view', $saleline->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $saleline->hasValue('product') ? $this->Html->link($saleline->product->name, ['controller' => 'Products', 'action' => 'view', $saleline->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Line Number') ?></th>
                    <td><?= $this->Number->format($saleline->line_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($saleline->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($saleline->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($saleline->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
