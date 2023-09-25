<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saleline $saleline
 * @var string[]|\Cake\Collection\CollectionInterface $sales
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $saleline->sale_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $saleline->sale_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Salelines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="salelines form content">
            <?= $this->Form->create($saleline) ?>
            <fieldset>
                <legend><?= __('Edit Saleline') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
