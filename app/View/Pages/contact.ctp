<style type="text/css">
textarea {
    height: auto;
}
</style>
<div class="row user-profile">
    <div class="large-12 columns">
        <h4>Contact us</h4>
        <p class="error"></p>
        <p>
            To get in touch with the team at Fly Pass for any enquiry, pricing, support or feedback, please use the form below:
        </p>
        <?=$this->Form->create('Contact', array('url' => '/pages/thanks', 'id' => 'ContactForm'))?>
        <div class="row">
            <div class="large-8 columns">
                <? echo $this->Form->input('name', array('placeholder' => 'Name', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter your anme")); ?>
            </div>

        </div>
        <div class="row">
            <div class="large-8 columns">
                <? echo $this->Form->input('email', array('placeholder' => 'Email', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter email")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large-8 columns">
                <? echo $this->Form->input('comment', array('placeholder' => 'Comments/Questions', 'label' => FALSE, 'class' => 'input', 'escape' => false, 'cols' => 3, 'type' => 'textarea', 'required' => 'required', 'validationMessage' => "Please enter comments")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large-8 columns">
                <?php echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'pb-btn medium')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>

    </div>
    <div class="large-4 columns">
        &nbsp;
    </div>
</div>

<script>
    $(function(){
        var validator = $("#ContactForm").kendoValidator({
        }).data("kendoValidator");

        $("#ContactForm").submit(function(){
            return validator.validate();
        });
    });
</script>