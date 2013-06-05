<style type="text/css">
    textarea {
        height: auto;
    }
    input[type=radio].block {
        margin-right: 6px;
    }
</style>

<div class="row user-profile">
    <div class="large-8 column">
        <h3>Fly Pass BETA - Your Feedback</h3>

        <p>Thanks for trying out Fly Pass for us. We've only recently launched this new system and are running
            this BETA trial period to collect as much feedback as we can. Your feedback is important to us as
            it helps us to identify areas we need to improve as well as letting us know what other features
            you might like created. We read every piece of feedback that is submitted, your opinion really
            does count so please don't hold back, good or bad we want to hear from you.</p>

        <p>By way of saying thank you, we've opened this BETA version of Fly Pass to everyone for FREE!
            Create and send as many coupons as you like, you won't be charged a penny!
            All we ask is that you take a moment to complete the form below and tell us what you think.
            <br>
            Thank you!
        </p>

        <?=$this->Form->create('Feedback', array('url' => '/pages/feedback_submit', 'id' => 'FeedbackForm'))?>
        <div class="row">
            <div class="large-12 columns">
                <? echo $this->Form->input('name', array('placeholder' => 'YOUR NAME ', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter your anme")); ?>
            </div>

        </div>
        <div class="row">
            <div class="large-12 columns">
                <? echo $this->Form->input('email', array('placeholder' => 'YOUR EMAIL', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter email")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                RATE YOUR OVERALL FLY PASS EXPERIENCE OUT OF 5 {0 (terrible),1,2,3,4,5 (faultless)}
                <?=$this->Form->input('rating', array('type' => 'radio',
                    'separator' => '<br>',
                    'width' => '20px', 'options' => range(0, 5),'label' =>false,'div' => true, 'class'=> 'block'))
                ?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <? echo $this->Form->input('comment', array('placeholder' => 'YOUR FEEDBACK', 'label' => FALSE, 'class' => 'input', 'escape' => false, 'cols' => 3, 'type' => 'textarea', 'required' => 'required', 'validationMessage' => "Please enter Feedback")); ?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <?php echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'pb-btn medium')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>
    </div>
</div>

<script>
    $(function(){
        var validator = $("#FeedbackForm").kendoValidator({
        }).data("kendoValidator");

        $("#FeedbackForm").submit(function(){
            return validator.validate();
        });
    });
</script>



