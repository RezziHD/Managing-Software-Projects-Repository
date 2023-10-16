<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<style>
.error-message {
	color: red;
	padding-bottom: .5em;
}
</style>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']
            ) ?>
            
        </div>
    </aside>
   <div class="column column-80">
        <div class="products form content">
            <?= $this->Form->create($product, ['novalidate' => true]) ?>
            <fieldset>
                <legend><?= __('Edit Product') ?></legend>
                <div class="container">
                    <div class="row">
                        <div class="column"><?= $this->Form->control(
                            'name',
                            ['error' => [
                                'not long enough' => __('Name cannot be less than 3 characters'),
                                'too long' => __('Name cannot be more than 50 characters'),
                                'not empty' => __('Name cannot be empty')
                            ]]
                        ) ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control(
                            'supplier',
                            ['error' => [
                                'not long enough' => __('Supplier cannot be less than 3 characters'),
                                'too long' => __('Supplier cannot be more than 50 characters'),
                                'not empty' => __('Supplier cannot be empty')
                            ]]
                        ) ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control(
                            'price',
                            ['error' => [
                                'not valid' => __('Price must be a valid number'),
                                'not empty' => __('Price cannot be empty')
                            ]]
                        ) ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control(
                            'description',
                            ['error' => [
                                'not long enough' => __('Description cannot be less than 10 characters'),
                                'too long' => __('Description cannot be more than 255 characters'),
                                'not empty' => __('Description cannot be empty')
                            ]]
                        ) ?></div>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
