<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Members $member
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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $member->id],
                ['confirm' => __('Are you sure you want to delete # {0} {1}?', $member->first_name, $member->last_name), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Member'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="member form content">
            <?= $this->Form->create($member, ['novalidate' => true]) ?>
            <fieldset>
                <legend><?= __('Edit Member') ?></legend>
                <div class="container">
                    <div class="row">
                        <div class="column"><?= $this->Form->control(
                                                'first_name',
                                                ['error' => [
                                                    'not long enough' => __('First name cannot be less than 3 characters'),
                                                    'too long' => __('First name cannot be more than 50 characters'),
                                                    'not empty' => __('First name cannot be Empty')
                                                ]]) ?></div>
                        <div class="column"><?= $this->Form->control('middle_name', ['error' => [
                                                'too long' => __('Middle name cannot be more than 50 characters')
                                            ]]) ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control('last_name', ['error' => [
                                                'not long enough' => __('Last name cannot be less than 3 characters'),
                                                'too long' => __('Last name cannot be more than 50 characters'),
                                                'not empty' => __('Last name cannot be Empty')
                                            ]]) ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control('date_of_birth', ['error' => [
                                'too old' => __('Cannot register if you are older than 100 years'),
                                'too young' => __('Cannot register if you are younger than 18 years'),
                                'not empty' => __('Date of Birth cannot be Empty')
                            ]]) ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control('street', ['error' => [
                                                'not long enough' => __('Street cannot be less than 3 characters'),
                                                'too long' => __('Street cannot be more than 50 characters'),
                                                'not empty' => __('Street cannot be Empty')
                                            ]]) ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control('city') ?></div>
                        <div class="column"><label for="state">State</label>
                            <?= $this->Form->select(
                                'state',
                                [
                                    'NSW' => 'NSW',
                                    'VIC' => 'VIC',
                                    'QLD' => 'QLD',
                                    'WA' => 'WA',
                                    'SA' => 'SA',
                                    'TAS' => 'TAS',
                                    'ACT' => 'ACT',
                                    'NT' => 'NT'
                                ],
                            ) ?></div>
                        <div class="column"><?= $this->Form->control('zip') ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control('email', ['type' => 'email']) ?></div>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
