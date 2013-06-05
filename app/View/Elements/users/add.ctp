
<? /**
 * @var $this View
 */
?>
<div class="row">
    <div class="large-12 columns">
        <h1>User Details</h1>
        <p class="error"></p>
        <?=$this->Form->create('User', array('url' => '/users/add', 'id' => 'UserRegistrationForm'))?>

        <div class="row">
            <div class="large12 columns">
                <?php $title = array('Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.');
                echo $this->Form->input('title', array('options' => $title, 'default' => 'Mrs.','class'=>'small'));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('first_name', array('placeholder' => 'First Name', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter first name")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('last_name', array('placeholder' => 'Last Name', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter last name")); ?>
            </div>
        </div>

        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('email', array('placeholder' => 'Email', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter email")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter password")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('password2', array('placeholder' => 'Confirm Password', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'type'=> 'password', 'validationMessage' => "Please enter password again")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('company', array('placeholder' => 'Company', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter company")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('phone', array('placeholder' => 'Phone', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter phone")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('mobile', array('placeholder' => 'Mobile', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter mobile")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('address', array('placeholder' => 'Address', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter address")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('suburb', array('placeholder' => 'Suburb', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter suburb")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('postcode', array('placeholder' => 'PostCode', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter postcode")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('job_description', array('placeholder' => 'Job Description', 'label' => FALSE, 'class' => 'input')); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
        <?php $states = array('NSW' => 'NSW', 'VIC' => 'VIC', 'QLD' => 'QLD', 'WA' => 'WA', 'NT' => 'NT', 'TAS' => 'TAS', 'ACT' => 'ACT');
            echo $this->Form->input('state', array('options' => $states, 'default' => 'nsw','class'=>'small'));
        ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <?php $country = array('AU' => 'Australia', 'NZ' => 'New Zealand');
                      echo $this->Form->input('country', array('options' => $country, 'default' => 'Australia','class'=>'small'));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->button('Register', array('type' => 'submit', 'class' => 'pb-btn medium')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>
        </div>
</div>

<script>
    $(function(){
        var validator = $("#UserRegistrationForm").kendoValidator({
            rules : {
                custom : function (input) {
                    if (input.is("#UserPassword2")) {
                        return input.val() === $("#UserPassword").val()
                    } else {
                        return true;
                    }
                }
            }
        }).data("kendoValidator");
        $("#UserRegistrationForm").submit(function(){
            return validator.validate();
        });

        $('#UserRegistrationForm').ajaxForm({
            before: function () {
                $('#AccountBlock p.error').hide();
            },
            success: function (resp) {
                alert(resp);
                resp = $.parseJSON(resp);
                if (resp.error !== undefined) {
                    $('#AccountBlock p.error').text(resp.error).show();
                } else {
                    $('#AccountBlock p.error').hide();
                    update_pass_user(resp.user_id,PassId);
                    $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
                    $('#AccountBlock').html('<p style="padding-top: 20px;" class="message">You have been login successfully, please go to next step.</p>')

                    /*
                     $.ajax({
                         url: '/pass/payment_status/' + PassId,
                         dataType: 'json',
                         success: function(resp) {
                             if (resp.result) {
                                 //paid then, what to do?
                                 $('#AccountBlock').html('<p class="message">Your payment is good now, you can now go to next step.</p>')
                                 $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
                             } else {
                                 $('#AccountBlock').load('/users/payment', function(){
                                     $('#PaymentPassId').val(PassId);
                                 });
                             }
                         }
                     });
                     */
                }
            }
        });

        function  update_pass_user(user_id,pass_id){
            $.ajax({
                type: "POST",
                url: "/pass/update_pass_user",
                data: {'user_id': user_id, 'pass_id': pass_id},
                success: function (resp) {
                    resp = $.parseJSON(resp);
                }
            });
        }

    });
</script>


