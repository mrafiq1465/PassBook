<div class="row">
    <div class="large-12 columns">
        <h1 class="">Payment</h1>
        <? echo $this->Form->create('Payment', array('id' => 'PaymentForm')); ?>
        <input type="hidden" name="data[Payment][pass_id]" id="PaymentPassId" value="<?=$this->data['Pass']['id']?>"/>

        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('card_name', array('placeholder' => 'name', 'label' => FALSE, 'class' => 'input')); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('card_number', array('placeholder' => 'number', 'label' => FALSE, 'class' => 'input')); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('card_ccv', array('placeholder' => 'ccv', 'label' => FALSE, 'class' => 'input')); ?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns text-right">
                <?php echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'pb-btn')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>
    </div>
</div>
