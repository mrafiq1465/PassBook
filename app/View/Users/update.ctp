
<section class="list">
    <?=$this->element('menu', array(
    "heading" => "Update User"
));?>
<? echo $this->Form->create('User'); ?>
    <section id="form-container">

        <? echo $this->Form->input('name', array('label' => FALSE, 'placeholder' => 'Name')); ?>
        <? echo $this->Form->input('name', array('label' => FALSE, 'placeholder' => 'Old Password')); ?>
        <? echo $this->Form->input('name', array('label' => FALSE, 'placeholder' => 'New Password')); ?>
        <? echo $this->Form->input('name', array('label' => FALSE, 'placeholder' => 'Confirm New Password')); ?>
        <? echo $this->Form->input('role_id'); ?>
        <? echo $this->Form->input('company_id'); ?>
    </section>
    <? echo $this->Form->end(array('class' => 'btn btn-primary', 'label' => 'Edit',)); ?>
</section>