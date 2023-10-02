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
            <?= $this->Form->create($staff) ?>
            <fieldset>
                <legend><?= __('Edit Staff') ?></legend>
                <table>
                    <tbody>
                        <tr>
                            <td><?= $this->Form->control('first_name') ?></td>
                            <td><?= $this->Form->control('middle_name') ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('last_name') ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('date_of_birth') ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('street') ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('city') ?></td>
                            <td><?= $this->Form->control('state') ?></td>
                            <td><label for="state">State</label><?= $this->Form->select('state',['NSW', 'VIC', 'QLD', 'WA', 'SA', 'TAS', 'ACT', 'NT'],['value'=> $staff->state] ) ?></td>
                            <td><?= $this->Form->control('zip') ?></td>
                        </tr>
                        <tr>
                            <td><?= $this->Form->control('email') ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
