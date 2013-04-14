<div class="row">
    <div class="large-12 columns">
        <h1 class="">Payment</h1>
        <?=$this->Form->create('User', array('url' => '/users/payment', 'id' => 'UserPaymentForm'))?>
        <input type="hidden" name="data[Payment][pass_id]" id="PaymentPassId" value=""/>

        <div class="row">
            <div class="large12 columns">
                <label>Amount: $9.95</label>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('card_name', array('placeholder' => 'card holder name', 'label' => false, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter card holder name")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('card_number', array('placeholder' => 'card number', 'label' => FALSE, 'class' => 'input', 'required' => 'number required', 'validationMessage' => "Please enter credit card number")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large4 columns">
                <?
                    $months = array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April','5' => 'May', '6' => 'June',
                                   '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December');
                    echo $this->Form->input('card_expiration_month', array('options' => $months, 'default' => 'January','class'=>'small')); ?>

            </div>
            <div class="large4 columns">
                <?
                    echo $this->Form->input('card_expiration_year', array(
                        'type' => 'date',
                        'maxYear' => date('Y', strtotime('+ 7 years')),
                        'minYear' => date('Y'),
                        'dateFormat' => 'Y',
                        'default' => date('Y'))); ?>
            </div>
            <div class="large4 columns">
                <? echo $this->Form->input('card_ccv', array('placeholder' => 'ccv', 'label' => FALSE, 'class' => 'input','required' => 'required', 'validationMessage' => "Please enter ccv")); ?>
            </div
        </div>
        <div class="row">
            <div class="large-12 columns text-right">
                <?php echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'pb-btn')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>
    </div>
</div>


<script>
    $(function(){
        var validator = $("#UserPaymentForm").kendoValidator().data("kendoValidator");
        $("#UserPaymentForm").submit(function(){
            return validator.validate();
        });
    })
</script>