<? /**
 * @var $this View
 */
?>
<div class="row">
    <div class="large-12 columns">
        <h1>Login</h1>
        <p class="error"></p>
        <?=$this->Form->create('User', array('url' => '/users/login_account', 'id' => 'UserLoginForm'))?>
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
            <div class="large-12 columns">
                <?php echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'pb-btn medium')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>

        <?php echo $this->Html->link('Forgot password', '#', array('class' => 'pull-right forgot_password')); ?>
    </div>
</div>

<script>
    $(function(){
        var validator = $("#UserLoginForm").kendoValidator().data("kendoValidator");
        $("#UserLoginForm").submit(function(){
            return validator.validate();
        });

        $('#UserLoginForm').ajaxForm({
            before: function () {
                $('#AccountBlock p.error').hide();
            },
            success: function (resp) {

                resp = $.parseJSON(resp);

                if (resp.error !== undefined) {
                    $('p.error').text(resp.error).show();
                } else {
                    window.location.href = "/users";
                }
            }
        });

    })
</script>