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
            <?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $staff->staffID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Staff'), ['action' => 'delete', $staff->staffID], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->staffID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Staff'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Staff'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staff view content">
            <h3><?= h($staff->staffID) ?></h3>
            <table>
                <tr>
                    <th><?= __('FirstName') ?></th>
                    <td><?= h($staff->FirstName) ?></td>
                </tr>
                <tr>
                    <th><?= __('MiddleName') ?></th>
                    <td><?= h($staff->MiddleName) ?></td>
                </tr>
                <tr>
                    <th><?= __('LastName') ?></th>
                    <td><?= h($staff->LastName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($staff->Password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($staff->Email) ?></td>
                </tr>
                <tr>
                    <th><?= __('StaffID') ?></th>
                    <td><?= $this->Number->format($staff->StaffID) ?></td>
                </tr>
                <tr>
                    <th><?= __('AddressID') ?></th>
                    <td><?= $this->Number->format($staff->AddressID) ?></td>
                </tr>
                <tr>
                    <th><?= __('StaffAcID') ?></th>
                    <td><?= $this->Number->format($staff->StaffAcID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DateofBirth') ?></th>
                    <td><?= h($staff->DateofBirth) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
