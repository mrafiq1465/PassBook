<? /**
 * @var $this View
 */
?>
<div class="row">
    <div class="large-12 column">
        <h1 class="">Login</h1>
        <p class="error"></p>
        <?=$this->Form->create('User', array('url' => '/users/login', 'id' => 'UserLoginForm'))?>
        <? echo $this->Form->input('email', array('placeholder' => 'Email', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter email" )); ?>
        <? echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter password")); ?>
        <?php echo $this->Form->end(array('id' => 'submit', 'label' => 'Sign In'));?>

        <?php echo $this->Html->link('Register', '/users/add', array('class' => 'pull-left register', 'id' => 'register_btn_block')); ?>
        <?php echo $this->Html->link('Forgot password', '#', array('class' => 'pull-right forgot_password')); ?>
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