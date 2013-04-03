<div class="row">
    <div class="large-12 column">
        <? echo $this->Form->create('Payment', array('id' => 'PaymentForm')); ?>

        <h3>Payment Details</h3>
        <input type="hidden" name="data[Payment][pass_id]" id="PaymentPassId" value="<?=$this->data['Pass']['id']?>"/>
        <? echo $this->Form->end(array('class' => 'btn btn-primary', 'label' => 'Create',)); ?>
    </div>
</div>
