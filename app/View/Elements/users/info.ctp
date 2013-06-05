

<?php
//var_dump($user_data);
?>

<div class="row">
    <div class="large-12 columns">
        <h2>Login information</h2>
        <p>
            You are logged in as <b><?php echo $user_data['first_name'] .' ' . $user_data['last_name']?></b>. <br>
            Please go to the next step.
        </p>

        <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step5Form')); ?>

        <div class="row">
            <div class="large-12 columns text-right">
                <?php echo $this->Form->button('next step', array('type' => 'submit', 'class' => 'pb-btn')); ?>
            </div>
        </div>
        <?=$this->Form->end(); ?>

    </div>
</div>