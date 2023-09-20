<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="staff form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('Email') ?>
        <?= $this->Form->control('Password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
