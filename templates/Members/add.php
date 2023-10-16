<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Members'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="members form content">
            <?= $this->Form->create($member) ?>
            <fieldset>
                <legend><?= __('Add Member') ?></legend>
                <div class="container">
                    <div class="row">
                        <div class="column"><?= $this->Form->control('first_name', ['error' => [
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
                        <div class="column"><?= $this->Form->control('city', ['error' => [
                                                'not long enough' => __('City cannot be less than 3 characters'),
                                                'too long' => __('City cannot be more than 50 characters'),
                                                'not empty' => __('City cannot be Empty')
                                            ]]) ?></div>
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
                                ['empty' => 'Select State']
                            ) ?></div>
                        <div class="column"><?= $this->Form->control('zip',['error' => [
							'validZip'=> 'Zip Code must be 4 digits'
						]]) ?></div>
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