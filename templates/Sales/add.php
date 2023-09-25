<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 * @var \Cake\Collection\CollectionInterface|string[] $members
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sales form content">
            <?= $this->Form->create($sale) ?>
            <fieldset>
                <legend><?= __('Add Sale') ?></legend>
                <?php
                echo $this->Form->control('member_id', ['options' => $members]);
                echo $this->Form->control('staff_id', ['options' => $staff]);
                echo $this->Form->control('sale_date');

                echo $this->Form->button('Add Line', ['type' => 'button']);
                
                echo $this->Form->control('sale_lines.0.product_id',['options'=>$products]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>