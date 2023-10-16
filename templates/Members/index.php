<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Member> $members
 */
?>
<style>
td.actions {
    vertical-align: middle;
}
</style>
<div class="members index content">
    <?= $this->Html->link(__('New Member'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Members') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('middle_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('date_of_birth') ?></th>
					<!--<th><?= $this->Paginator->sort('street') ?></th>
					 <th><?= $this->Paginator->sort('city') ?></th>
					 <th><?= $this->Paginator->sort('state') ?></th>
					 <th><?= $this->Paginator->sort('zip') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>-->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($members)==0): ?>
                    <tr><td colspan="12">No Members in the database</td></tr>
                <?php else:
                     foreach ($members as $member): ?>
                <tr>
                    <td><?= $this->Number->format($member->id) ?></td>
                    <td><?= h($member->first_name) ?></td>
                    <td><?= h($member->middle_name) ?></td>
                    <td><?= h($member->last_name) ?></td>
                    <td><?= h($member->date_of_birth) ?></td>
                    <!--<td><?= h($member->street) ?></td>
                    <td><?= h($member->city) ?></td>
                    <td><?= h($member->state) ?></td>
                     <td><?= h($member->zip) ?></td>
                    <td><?= h($member->email) ?></td>
                    <td><?= h($member->created) ?></td>
                    <td><?= h($member->modified) ?></td>-->
    				<td class="actions">
   					 <?= $this->Html->link('<span class="material-symbols-outlined">'.__('visibility').'</span>', ['action' => 'view', $member->id], ['escape' => false]) ?>
   					 <?= $this->Html->link('<span class="material-symbols-outlined">'. __('Edit'). '</span>', ['action' => 'edit', $member->id], ['escape' => false]) ?>
   					 <?= $this->Form->postLink('<span class="material-symbols-outlined">'.__('Delete').'</span>', ['action' => 'delete', $member->id],['escape' => false], ['confirm' => __('Are you sure you want to delete # {0} {1}?', $member->first_name, $member->last_name)]) ?>
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
