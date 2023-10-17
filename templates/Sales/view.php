<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */

use App\Model\Entity\Product;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id], ['class' => 'side-nav-item']) ?>
            <!--?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class' => 'side-nav-item']) ?-->
        </div>
    </aside>
    <div class="column column-80">
        <div class="sales view content">
            <h3><?= h($sale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Member') ?></th>
                    <td><?= $sale->hasValue('member') ? $this->Html->link($sale->member->first_name, ['controller' => 'Members', 'action' => 'view', $sale->member->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff') ?></th>
                    <td><?= $sale->hasValue('staff') ? $this->Html->link($sale->staff->first_name, ['controller' => 'Staff', 'action' => 'view', $sale->staff->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Date') ?></th>
                    <td><?= h($sale->sale_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sale Lines') ?></h4>
                <?php if (!empty($sale->sale_lines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Line Number') ?></th>
                            <th><?= __('Product') ?></th>
                            <th><?= __('Unit Price') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Price') ?></th>
                        </tr>
                        <?php foreach ($sale->sale_lines as $saleLines) : 
                            if($saleLines->sale_id==$sale->id):?>
                        <tr>
                            <td><?= h($saleLines->line_number) ?></td>
                            <td><?= h($saleLines->product->name) ?></td>
                            <td>$ <?= h($saleLines->product->price) ?></td>
                            <td><?= h($saleLines->quantity) ?></td>
                            <td>$ <?= h($saleLines->get('line_price')) ?></td>
                        </tr>
                        <?php endif; endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?= __('Total')  ?></td>
                            <td>$ <?= h($sale->get('total_price')) ?></td>
                        </tr>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
