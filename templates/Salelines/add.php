<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saleline $saleline
 * @var \Cake\Collection\CollectionInterface|string[] $sales
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Salelines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="salelines form content">
            <?= $this->Form->create($saleline) ?>
            <fieldset>
                <legend><?= __('Add Saleline') ?></legend>
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
