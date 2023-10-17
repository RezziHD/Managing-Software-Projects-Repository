<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sale> $sales
 */
?>
<div class="sales index content">
    <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('member_id') ?></th>
                    <th><?= $this->Paginator->sort('staff_id') ?></th>
                    <th><?= $this->Paginator->sort('sale_date') ?></th>
                    <!--<th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>-->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($sales)==0): ?>
                    <tr><td colspan="12">No Sales in the database</td></tr>
                <?php else:
                     foreach ($sales as $sale): ?>
                <tr>
                    <td><?= $this->Number->format($sale->id) ?></td>
                    <td><?= $sale->hasValue('member') ? $this->Html->link($sale->member->first_name, ['controller' => 'Members', 'action' => 'view', $sale->member->id]) : '' ?></td>
                    <td><?= $sale->hasValue('staff') ? $this->Html->link($sale->staff->first_name, ['controller' => 'Staff', 'action' => 'view', $sale->staff->id]) : '' ?></td>
                    <td><?= h($sale->sale_date) ?></td>
                    <!--<td><?= h($sale->created) ?></td>
                    <td><?= h($sale->modified) ?></td>-->
                    <td class="actions">
    				<?= $this->Html->link('<span class="material-symbols-outlined">'.__('visibility').'</span>', ['action' => 'view', $sale->id], ['escape' => false]) ?>
   				    <?= $this->Html->link('<span class="material-symbols-outlined">'. __('Edit'). '</span>', ['action' => 'edit', $sale->id], ['escape' => false]) ?>
    		        <!--?= $this->Form->postLink('<span class="material-symbols-outlined">'.__('Delete').'</span>', ['action' => 'delete', $sale->id],['escape' => false], ['confirm' => __('Are you sure you want to delete # {0} {1}?', $sale->id, $sale->name)]) ?-->
				</td>
                </tr>
                <?php endforeach; 
                endif;?>
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
