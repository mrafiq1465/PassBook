<div class="row">
    <div class="large-12 column">
        <? echo $this->Form->create('User'); ?>

            <h3>User Details</h3>
            <? echo $this->Form->input('name', array('label' => FALSE, 'placeholder' => 'Name')); ?>
            <? echo $this->Form->input('email', array('label' => FALSE, 'placeholder' => 'Email')); ?>
            <? echo $this->Form->input('password', array('label' => FALSE, 'placeholder' => 'Password')); ?>
            <? echo $this->Form->input('password2', array('type' => 'password', 'label' => FALSE, 'placeholder' => 'Confirm Password')); ?>
            <? echo $this->Form->input('company', array('label' => FALSE, 'placeholder' => 'Company')); ?>
            <? echo $this->Form->input('phone', array('label' => FALSE, 'placeholder' => 'Phone')); ?>
            <? echo $this->Form->input('address', array('label' => FALSE, 'placeholder' => 'Address')); ?>
            <?php $states = array('nsw' => 'NSW', 'vic' => 'VIC', 'qld' => 'QLD', 'wa' => 'WA', 'nt' => 'NT', 'tas' => 'TAS', 'act' => 'ACT');
            echo $this->Form->input('state', array('options' => $states, 'default' => 'nsw','class'=>'small'));
            ?>

            <? echo $this->Form->input('country', array('label' => FALSE, 'placeholder' => 'Country')); ?>

        <? echo $this->Form->end(array('class' => 'btn btn-primary', 'label' => 'Create',)); ?>
    </div>
</div>



