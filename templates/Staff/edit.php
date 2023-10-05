<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<style>
    .error-message{
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
                ['action' => 'delete', $staff->id],
                ['confirm' => __('Are you sure you want to delete # {0} {1}?', $staff->first_name, $staff->last_name), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Staff'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="staff form content">
            <?= $this->Form->create($staff,['novalidate' => true]) ?>
            <fieldset>
                <legend><?= __('Edit Staff') ?></legend>
                <div class="container">
                    <div class="row">
                        <div class="column"><?= $this->Form->control('first_name',
                        ['error' => ['not long enough' => __('First name cannot be less than 3 characters'),
                            'too long' => __('First name cannot be more than 50 characters'),
                            'not empty' => __('First name cannot be Empty')
                        ]]) ?></div>
                        <div class="column"><?= $this->Form->control('middle_name') ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control('last_name') ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><label for="date_of_birth">Date of Birth</label>
                            <?= $this->Form->date('date_of_birth', [
                                'min' => date('Y') - 70,
                                'max' => date('Y') - 18,
                            ]); ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control('street') ?></div>
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