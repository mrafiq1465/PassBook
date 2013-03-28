<section class="list">
    <?=$this->element('menu', array(
    "heading" => "Create New User"
));?>

<? echo $this->Form->create('User'); ?>
    <section id="form-container">
    <h3>User Details</h3>
        <? echo $this->Form->input('name', array('label' => FALSE, 'placeholder' => 'Name')); ?>
        <? echo $this->Form->input('email', array('label' => FALSE, 'placeholder' => 'Email')); ?>
        <? echo $this->Form->input('password', array('label' => FALSE, 'placeholder' => 'Password')); ?>
        <? echo $this->Form->input('password2', array('type' => 'password', 'label' => FALSE, 'placeholder' => 'Confirm Password')); ?>
    </section>
    <? echo $this->Form->end(array('class' => 'btn btn-primary', 'label' => 'Create',)); ?>

</section>