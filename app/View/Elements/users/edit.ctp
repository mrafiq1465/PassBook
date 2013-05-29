
<? /**
 * @var $this View
 */
?>
<div class="row">
    <div class="large-12 columns">
        <h1>User Details</h1>
        <p class="error"></p>
        <?=$this->Form->create('User', array('url' => '/users/edit', 'id' => 'UserUpdateForm'))?>

        <div class="row">
            <div class="large12 columns">
                <? echo $this->Form->input('name', array('placeholder' => 'Name', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter name")); ?>
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
                <? echo $this->Form->input('password2', array('placeholder' => 'Confirm Password', 'label' => FALSE, 'class' => 'input','type'=> 'password', 'required' => 'required', 'validationMessage' => "Please enter password again")); ?>
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
                <? echo $this->Form->input('address', array('placeholder' => 'Address', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter address")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <?php $states = array('nsw' => 'NSW', 'vic' => 'VIC', 'qld' => 'QLD', 'wa' => 'WA', 'nt' => 'NT', 'tas' => 'TAS', 'act' => 'ACT');
                echo $this->Form->input('state', array('options' => $states, 'default' => 'nsw','class'=>'small'));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="large12 columns">
                <?php $country = array('Australia' => 'Australia', 'New Zealand' => 'New Zealand');
                echo $this->Form->input('country', array('options' => $country, 'default' => 'Australia','class'=>'small'));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'pb-btn medium')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>
    </div>
</div>

<script>
    $(function(){
        var validator = $("#UserUpdateForm").kendoValidator({
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

        $("#UserUpdateForm").submit(function(){
            return validator.validate();
        });

        $('#UserRegistrationForm').ajaxForm({
            before: function () {
               // $('#AccountBlock p.error').hide();
            },
            success: function (resp) {
                resp = $.parseJSON(resp);
                if (resp.error !== undefined) {

                } else {

                }
            }
        });

    });
</script>