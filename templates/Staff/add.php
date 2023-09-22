<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Staff'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staff form content">
            <?= $this->Form->create($staff) ?>
            <fieldset>
                <legend><?= __('Add Staff') ?></legend>
                <table>
                    <tbody>
                        <tr>
                            <td><?= $this->Form->control('first_name'); ?></td>
                            <td><?= $this->Form->control('middle_name'); ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('last_name'); ?></td>
                        </tr>
                        <tr>
                            <td><label for="date_of_birth">Date of Birth</label>
                                <?= $this->Form->date('date_of_birth', [
                                    'min' => date('Y') - 70,
                                    'max' => date('Y') - 18,
                                ]); ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('street'); ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('city'); ?></td>
                            <td><label for="state">State</label>
                                <?= $this->Form->select(
                                    'state',
                                    ['NSW', 'VIC', 'QLD', 'WA', 'SA', 'TAS', 'ACT', 'NT'],
                                    ['empty' => '(Select State)'],
                                    ['label' => 'State']
                                ); ?></td>
                            <td><?= $this->Form->control('zip') ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('email', ['type' => 'email']) ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('password') ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>