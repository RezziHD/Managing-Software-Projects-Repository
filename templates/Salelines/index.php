<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Saleline> $salelines
 */
?>
<div class="salelines index content">
    <?= $this->Html->link(__('New Saleline'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Salelines') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('sale_id') ?></th>
                    <th><?= $this->Paginator->sort('line_number') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salelines as $saleline): ?>
                <tr>
                    <td><?= $saleline->hasValue('sale') ? $this->Html->link($saleline->sale->id, ['controller' => 'Sales', 'action' => 'view', $saleline->sale->id]) : '' ?></td>
                    <td><?= $this->Number->format($saleline->line_number) ?></td>
                    <td><?= $saleline->hasValue('product') ? $this->Html->link($saleline->product->name, ['controller' => 'Products', 'action' => 'view', $saleline->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($saleline->quantity) ?></td>
                    <td><?= h($saleline->created) ?></td>
                    <td><?= h($saleline->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $saleline->sale_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saleline->sale_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saleline->sale_id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleline->sale_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
