<div class="row">
    <div class="large-12 columns">
        <h1 class="">Payment</h1>
        <div class="row">
            <div class="large12 columns">
                <label>Amount: $9.95</label>
            </div>
        </div>
        <?
        echo "<pre>";
         //var_dump($this->data);
        echo "</pre>";
         ?>
        <?=$this->Form->create('User', array('url' => '/users/paymentToken', 'id' => 'UserPaymentToken'))?>
        <input type="hidden" name="data[Payment][pass_id]" id="PaymentPassId" value="<?= $this->data['Pass']['id'];?>"/>
        <div id="payment_token" class="row" style=" display: block">
            <div class="large12 columns">
                <p>
                    We have detected your credit card information in our system. Please click below if you want to
                    use the same card.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns text-right">
                <?php echo $this->Form->button('Payment', array('type' => 'submit', 'class' => 'pb-btn medium')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>

        <?=$this->Form->create('User', array('url' => '/users/payment', 'id' => 'UserPaymentForm'))?>
        <input type="hidden" name="data[Payment][pass_id]" id="PaymentPassId" value="<?= $this->data['Pass']['id'];?>" />

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


<script>
    $(function(){
        var validator = $("#UserPaymentForm").kendoValidator().data("kendoValidator");
        $("#UserPaymentForm").submit(function(){
            return validator.validate();
        });

        $('#UserPaymentForm').ajaxForm({
            before: function () {
                $('#AccountBlock p.error').hide();
            },
            success: function(resp){
                resp = $.parseJSON(resp);
               // alert(resp.request);
               // alert(resp.response);
                if (resp.error !== undefined) {
                    $('#AccountBlock p.error').text(resp.error).show();
                } else {
                    $('#AccountBlock').html('<p class="message">Payment has been made for this pass. Please go to next step.</p>');
                    $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
                }
            }
        });

        $('#UserPaymentToken').ajaxForm({
            before: function () {
                $('#AccountBlock p.error').hide();
            },
            success: function(resp){
                resp = $.parseJSON(resp);
                if (resp.error !== undefined) {
                    $('#AccountBlock p.error').text(resp.error).show();
                } else {
                    $('#AccountBlock').html('<p class="message">Payment has been made for this pass. Please go to next step.</p>');
                    $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
                }
            }
        });
    })
</script>