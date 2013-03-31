
<div class="row">
    <div class="large-12 column">
        <h1 class="">Login</h1>
        <? echo $this->Form->input('email', array('placeholder' => 'Email', 'label' => FALSE, 'class' => 'input')); ?>
        <? echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => FALSE, 'class' => 'input')); ?>
        <?php echo $this->Form->end(array('id' => 'submit', 'label' => 'Sign In'));?>

            <?php //echo $this->Html->link('Register', '#', array('class' => 'pull-left register')); ?>
            <?php echo $this->Html->link('Forgot password', '#', array('class' => 'pull-right forgot_password')); ?>

    </div>
</div>


<!--Modal-->
<div class="modal hide fade" id="loginModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Reset Password</h3>
    </div>
    <div class="modal-body">
        <? echo $this->Form->input('email', array('placeholder' => 'Email', 'label' => FALSE, 'class' => 'input', 'required'=>"required", 'type' => 'email')); ?>
        <p class="error" style="display: none"></p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" id="resetPassword" class="btn btn-primary">Reset</a>
    </div>
</div>


<script type="text/javascript">
    (function ($) {
        var $loginModal = $("#loginModal");

        $loginModal.modal({
            show : false
        });

        $('a.forgot_password').on('click', function (e) {
            e.preventDefault();
            $loginModal.modal('show');
        });

        //put flashmessage in correct div
        $("#flashMessage")
                .insertAfter('h1')
                .addClass('alert alert-info')
                .show();
        
        $("#resetPassword", $loginModal).on('click', function (e) {
            e.preventDefault();

            // initialize validator for a bunch of input fields
              /*var inputs = $loginModal.find('input').validator({
                  position: 'bottom center',
                  messageClass : 'login'
              });*/

              // perform validation programmatically
              //inputs.data("validator").checkValidity();
        })
        
    }(jQuery))
</script>