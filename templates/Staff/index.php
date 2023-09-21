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
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('middle_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <!--<th><?= $this->Paginator->sort('street') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('zip') ?></th>-->
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($staff)==0): ?>
                    <tr><td colspan="12">No Staff in the database</td></tr>
                <?php else: 
                    foreach ($staff as $staff): ?>
                <tr>
                    <td><?= $this->Number->format($staff->id) ?></td>
                    <td><?= h($staff->first_name) ?></td>
                    <td><?= h($staff->middle_name) ?></td>
                    <td><?= h($staff->last_name) ?></td>
                    <td><?= h($staff->date_of_birth) ?></td>
                    <td><?= h($staff->email) ?></td>
                    <!--<td><?= h($staff->street) ?></td>
                    <td><?= h($staff->city) ?></td>
                    <td><?= h($staff->state) ?></td>
                    <td><?= h($staff->zip) ?></td>-->
                    <td><?= h($staff->created) ?></td>
                    <td><?= h($staff->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<span class="material-symbols-outlined">'.__('visibility').'</span>', ['action' => 'view', $staff->id], ['escape' => false]) ?>
                        <?= $this->Html->link('<span class="material-symbols-outlined">'. __('Edit'). '</span>', ['action' => 'edit', $staff->id], ['escape' => false]) ?>
                        <?= $this->Form->postLink('<span class="material-symbols-outlined">'.__('Delete').'</span>', ['action' => 'delete', $staff->id],['escape' => false], ['confirm' => __('Are you sure you want to delete # {0} {1}?', $staff->first_name, $staff->last_name)]) ?>
                    </td>
                </tr>
                <?php endforeach; 
                endif;?>

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
