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
                ['action' => 'delete', $staff->staffID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $staff->staffID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Staff'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staff form content">
            <?= $this->Form->create($staff) ?>
            <fieldset>
                <legend><?= __('Edit Staff') ?></legend>
                <?php
                    echo $this->Form->control('StaffID');
                    echo $this->Form->control('FirstName');
                    echo $this->Form->control('MiddleName');
                    echo $this->Form->control('LastName');
                    echo $this->Form->control('DateofBirth');
                    echo $this->Form->control('AddressID');
                    echo $this->Form->control('StaffAcID');
                    echo $this->Form->control('Password');
                    echo $this->Form->control('Email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
