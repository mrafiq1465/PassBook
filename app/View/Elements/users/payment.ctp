<div class="row">
    <div class="large-12 columns">
        <h1 class="">Payment</h1>
        <div class="row">
            <div class="large12 columns">
                <label>Amount: $9.95</label>
            </div>
        </div>
        <?=$this->Form->create('User', array('url' => '/users/paymentToken', 'id' => 'UserPaymentToken'))?>
        <input type="hidden" name="data[Payment][pass_id]" id="PaymentPassId" value=""/>
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

        <?=$this->Form->create('User', array('url' => $FormActionURL, 'id' => 'UserPaymentForm'))?>
        <!-- input type="hidden" name="data[Payment][pass_id]" id="PaymentPassId" value=""/ -->
        <input type='hidden' name='EWAY_ACCESSCODE' value="<?php echo $AccessCode ?>" />

        <div class="row">
            <div class="large12 columns">
                <? //echo $this->Form->input('card_name', array('placeholder' => 'card holder name', 'label' => false, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter card holder name")); ?>
                <input type='text' name='EWAY_CARDNAME' id='EWAY_CARDNAME' value="<?php echo "TestUser" ?>" />
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? //echo $this->Form->input('card_number', array('placeholder' => 'card number', 'label' => FALSE, 'class' => 'input', 'required' => 'number required', 'validationMessage' => "Please enter credit card number")); ?>
                <input type='text' name='EWAY_CARDNUMBER' id='EWAY_CARDNUMBER' value="<?php echo "4444333322221111" ?>" />
            </div>
        </div>
        <div class="row">
            <div class="large4 columns">
                <?
                    $months = array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April','5' => 'May', '6' => 'June',
                                   '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December');
                    //echo $this->Form->input('card_expiration_month', array('options' => $months, 'default' => 'January','class'=>'small')); ?>

                <select ID="EWAY_CARDEXPIRYMONTH" name="EWAY_CARDEXPIRYMONTH">
                    <?php
                    $expiry_month = date('m');
                    for($i = 1; $i <= 12; $i++) {
                        $s = sprintf('%02d', $i);
                        echo "<option value='$s'";
                        if ( $expiry_month == $i ) {
                            echo " selected='selected'";
                        }
                        echo ">$s</option>\n";
                    }
                    ?>
                </select>

            </div>
            <div class="large4 columns">
                <select ID="EWAY_CARDEXPIRYYEAR" name="EWAY_CARDEXPIRYYEAR">
                    <?php
                    $i = date("y");
                    $j = $i+11;
                    for ($i; $i <= $j; $i++) {
                        echo "<option value='$i'";
                        echo ">$i</option>\n";
                    }
                    ?>
                </select>
                <?
//                    echo $this->Form->input('card_expiration_year', array(
//                        'type' => 'date',
//                        'maxYear' => date('Y', strtotime('+ 7 years')),
//                        'minYear' => date('Y'),
//                        'dateFormat' => 'Y',
//                        'default' => date('Y'))); ?>
            </div>
            <div class="large4 columns">
                <? //echo $this->Form->input('card_ccv', array('placeholder' => 'ccv', 'label' => FALSE, 'class' => 'input','required' => 'required', 'validationMessage' => "Please enter ccv")); ?>
            </div>
        </div>

        <select ID="EWAY_CARDSTARTMONTH" name="EWAY_CARDSTARTMONTH">
            <?php
            echo  "<option></option>";

            for($i = 1; $i <= 12; $i++) {
                $s = sprintf('%02d', $i);
                echo "<option value='$s'";
                echo ">$s</option>\n";
            }
            ?>
        </select>

        <select ID="EWAY_CARDSTARTYEAR" name="EWAY_CARDSTARTYEAR">
            <?php
            $i = date("y");
            $j = $i-11;
            echo  "<option></option>";
            for ($i; $i >= $j; $i--) {
                $year = sprintf('%02d', $i);
                echo "<option value='$year'";
                echo ">$year</option>\n";
            }
            ?>
        </select>

        <div class="fields">
            <label for="EWAY_CARDISSUENUMBER">
                Issue Number</label>
            <input type='text' name='EWAY_CARDISSUENUMBER' id='EWAY_CARDISSUENUMBER' value="<?php echo (isset($Response->Customer->CardIssueNumber) && !empty($Response->Customer->CardIssueNumber) ? $Response->Customer->CardIssueNumber:"22") ?>" maxlength="2" style="width:40px;"/> <!-- This field is optional but highly recommended -->
        </div>
        <div class="fields">
            <label for="EWAY_CARDCVN">
                CVN</label>
            <input type='text' name='EWAY_CARDCVN' id='EWAY_CARDCVN' value="123" maxlength="4" style="width:40px;"/> <!-- This field is optional but highly recommended -->
        </div>

        <div class="row">
            <div class="large-12 columns text-right">
                <?php echo $this->Form->button('Submit', array('type' => 'submit', 'id'=>'submit', 'class' => 'pb-btn')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>
    </div>
</div>


<script>
    $(function(){
//        var validator = $("#UserPaymentForm").kendoValidator().data("kendoValidator");
//        $("#UserPaymentForm").submit(function(){
//            return validator.validate();
//        });

//        $('#UserPaymentForm').ajaxForm({
//            before: function () {
//                $('#AccountBlock p.error').hide();
//            },
//            success: function(resp){
//                resp = $.parseJSON(resp);
//                if (resp.error !== undefined) {
//                    $('#AccountBlock p.error').text(resp.error).show();
//                } else {
//                    $('#AccountBlock').html('<p class="message">Your payment is good now, you can now go to next step.</p>');
//                    $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
//                }
//            }
//        });

//        $('#UserPaymentToken').ajaxForm({
//            before: function () {
//                $('#AccountBlock p.error').hide();
//            },
//            success: function(resp){
//                resp = $.parseJSON(resp);
//                if (resp.error !== undefined) {
//                    $('#AccountBlock p.error').text(resp.error).show();
//                } else {
//                    $('#AccountBlock').html('<p class="message">Your payment is good now, you can now go to next step.</p>');
//                    $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
//                }
//            }
//        });
    })
</script>