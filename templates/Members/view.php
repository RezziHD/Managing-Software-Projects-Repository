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
            <?= $this->Html->link(__('Edit Member'), ['action' => 'edit', $member->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Member'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id), 'class' => 'side-nav-item']) ?>
            
            
        </div>
    </aside>
    <div class="column column-80">
        <div class="members view content">
            <h3><?= h($member->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($member->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Middle Name') ?></th>
                    <td><?= h($member->middle_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($member->last_name) ?></td>
                </tr>
			
                <tr>
                   <th><?= __('Street') ?></th>
                    <td><?= h($member->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                  <td><?= h($member->city) ?></td>
               </tr>
               <tr>
                    <th><?= __('State') ?></th>
                  <td><?= h($member->state) ?></td>
               </tr>
                <tr>
                    <th><?= __('Zip') ?></th>
                    <td><?= h($member->zip) ?></td>
             </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($member->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($member->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Of Birth') ?></th>
                    <td><?= h($member->date_of_birth) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
