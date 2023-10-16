<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 * @var string[]|\Cake\Collection\CollectionInterface $members
 * @var string[]|\Cake\Collection\CollectionInterface $staff
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class' => 'side-nav-item']
            ) ?>
            
        </div>
    </aside>
    <div class="column column-80">
        <div class="sales form content">
            <?= $this->Form->create($sale,  ['novalidate' => true]) ?>
            <fieldset>
                <legend><?= __('Edit Sale') ?></legend>
                <div class="container">
                    <div class="row">
                        <div class="column">
                            <?= $this->Form->control('member_id', ['error' => [
                                'not empty' => __('Member cannot be empty')
                            ]]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <?= $this->Form->control('staff_id', ['options' => $staff, 'error' => [
                                'not empty' => __('Staff cannot be empty')
                            ]]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <?= $this->Form->control('sale_date', ['error' => [
                                'not empty' => __('Sale date cannot be empty')
                            ]]) ?>
                        </div>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
