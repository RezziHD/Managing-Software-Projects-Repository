<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Staff> $staff
 */
?>
<div class="staff index content">
    <?= $this->Html->link(__('New Staff'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Staff') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('StaffID') ?></th>
                    <th><?= $this->Paginator->sort('FirstName') ?></th>
                    <th><?= $this->Paginator->sort('MiddleName') ?></th>
                    <th><?= $this->Paginator->sort('LastName') ?></th>
                    <th><?= $this->Paginator->sort('DateofBirth') ?></th>
                    <th><?= $this->Paginator->sort('AddressID') ?></th>
                    <th><?= $this->Paginator->sort('StaffAcID') ?></th>
                    <th><?= $this->Paginator->sort('Password') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staff as $staff): ?>
                <tr>
                    <td><?= $this->Number->format($staff->StaffID) ?></td>
                    <td><?= h($staff->FirstName) ?></td>
                    <td><?= h($staff->MiddleName) ?></td>
                    <td><?= h($staff->LastName) ?></td>
                    <td><?= h($staff->DateofBirth) ?></td>
                    <td><?= $this->Number->format($staff->AddressID) ?></td>
                    <td><?= $this->Number->format($staff->StaffAcID) ?></td>
                    <td><?= h($staff->Password) ?></td>
                    <td><?= h($staff->Email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $staff->staffID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->staffID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staff->staffID], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->staffID)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
