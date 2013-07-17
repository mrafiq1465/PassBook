<? /**
 * @var $this View
 */
?>

<div class="row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large12 columns">
                <h2>Create a profile</h2>
                <p>Congratulations, your pass is ready to use! To start using your pass we'll need you to create a Fly Pass profile.
                    This will allow you to save and edit your pass plus view stats on how many have been downloaded by your customers.
                </p>
                <?php echo $this->Html->link('Save Pass & Create Profile', '#', array('class' => 'pull-left register pb-btn', 'id' => 'register_btn_block')); ?>
            </div>
        </div>

        <h2>Login</h2>
        <p>Or if you already have a Fly Pass account, login now to save this coupon and add it to your profile.</p>
        <p class="error"></p>
        <?=$this->Form->create('User', array('url' => '/users/login', 'id' => 'UserLoginForm'))?>
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
            <div class="large-4 columns">
                <?php echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'pb-btn medium')); ?>
            </div>
            <div class="large-8 columns text-left">
                <?php echo $this->Html->link('Forgot password', '#', array('class' => 'pull-right forgot_password')); ?>
                <?= $this->element('users/forgot_password'); ?>
            </div>

        </div>
        <?=$this->Form->end(); ?>
    </div>
</div>

<script>
    $(function(){
        var validator = $("#UserLoginForm").kendoValidator().data("kendoValidator");
        $("#UserLoginForm").submit(function(){
            return validator.validate();
        });
    })
</script>