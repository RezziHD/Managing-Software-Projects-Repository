<?php
use Cake\I18n\DateTime;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 * @var \Cake\Collection\CollectionInterface|string[] $members
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
$prodJSON=json_encode($products)
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sales form content">
            <?= $this->Form->create($sale) ?>
            <fieldset>
                <legend><?= __('Add Sale') ?></legend>
                <div class="container">
                    <div class="row">
                        <div class="column"><?= $this->Form->control('member_id', ['options' => $members])?></div>
                        <div class="column"><?= $this->Form->control('staff_id', ['options' => $staff]); ?></div>
                    </div>
                    <div class="row">
                        <div class="column"><?= $this->Form->control('sale_date',['value'=> DateTime::now(),'readonly'=>'true']) ?></div>
                        <div class="column"></div><div class="column"></div>
                    </div>
                <button type="button" name="add" id="add">Add Product</button>
                <table id="dynamic_field">
                </table>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>  
 $(document).ready(function(){  
    console.log("ready");
      var i=0;
      var prods = <?php echo $prodJSON ?>;
      var options = "";
      for(var key in prods){
        options = options + "<option value='"+key+"'>"+prods[key]+"</option>";
    }
      $('#add').click(function(){ 
            i++;
            $('#dynamic_field').append(
                '<tr id="row'+i+'">'+
                    '<td><div class="input text">'+
                        '<label for="sale_lines.'+i+'.line_number">Line Number</label><input type="text" name="sale_lines['+i+'][line_number]" id="sale_lines.'+i+'.line_number" value='+i+' readonly>'+
                    '</div></td>'+
                    '<td><div class="input select"><label for="sale_lines.'+i+'.product_id">Product</label>'+
                        '<select name="sale_lines['+i+'][product_id]" id="sale_lines.'+i+'.product_id">'+
                            options+
                        '</select>'+
                    '</div></td>'+
                    '<td><div class="input text">'+
                        '<label for="sale_lines.'+i+'.quantity">Quantity</label><input type="text" name="sale_lines['+i+'][quantity]" id="sale_lines.'+i+'.quantity">'+
                    '</div></td>'+
                '</tr>'
            );  
      });  
      /*$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  */
 
 });  
</script>