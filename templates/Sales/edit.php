<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 * @var \Cake\Collection\CollectionInterface|string[] $members
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
$prodJSON = json_encode($products);
$slinesJSON = json_encode($sale->sale_lines);
?>
<style>
    .error-message {
        color: red;
        padding-bottom: .5em;
    }
</style>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <!--?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id), 'class' => 'side-nav-item']
            ) ?-->

        </div>
    </aside>
    <div class="column column-80">
        <div class="sales form content">
            <?= $this->Form->create($sale,  ['novalidate' => true]) ?>
            <fieldset>
                <legend><?= __('Edit Sale') ?></legend>
                <div class="container">
                    <div class="row">
                        <div class="column">
                            <?= $this->Form->control('member_id', ['error' => [
                                'not empty' => __('Member cannot be empty')
                            ]]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <?= $this->Form->control('staff_id', ['options' => $staff, 'error' => [
                                'not empty' => __('Staff cannot be empty')
                            ]]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <?= $this->Form->control('sale_date', ['error' => [
                                'not empty' => __('Sale date cannot be empty')
                            ]]) ?>
                        </div>
                    </div>
                    <table id="dynamic_field">
                    </table>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        console.log("ready");
        var i = 0;
        var prods = <?php echo $prodJSON ?>;
        var salelines = <?php echo $slinesJSON ?>;
        console.log(salelines);
        console.log(prods);
        var options = "";

        for (var key in salelines) {
            for (var key1 in prods) {
                options = options + "<option value='" + key1;
                if(salelines[key].product_id==key1)
                    options+="' selected='true";
                options+= "'>" + prods[key1]+ "</option>";
            }
            i++;
            $('#dynamic_field').append(
                '<tr id="row' + i + '">' +
                '<td><div class="input text">' +
                '<label for="sale_lines.' + i + '.line_number">Line Number</label><input type="text" name="sale_lines[' + i + '][line_number]" id="sale_lines.' + i + '.line_number" value=' + i + ' readonly>' +
                '</div></td>' +
                '<td><div class="input select"><label for="sale_lines.' + i + '.product_id">Product</label>' +
                '<select name="sale_lines[' + i + '][product_id]" id="sale_lines.' + i + '.product_id">' +
                options +
                '</select>' +
                '</div></td>' +
                '<td><div class="input text">' +
                '<label for="sale_lines.' + i + '.quantity">Quantity</label><input type="text" value="'+salelines[key].quantity+'" name="sale_lines[' + i + '][quantity]" id="sale_lines.' + i + '.quantity">' +
                '</div></td>' +
                '</tr>'
            );
            options="";
        };

    });
</script>