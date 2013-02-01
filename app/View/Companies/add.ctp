<section class="list">
    <?=$this->element('menu', array(
    "heading" => "Create New Client"
));?>

    <? echo $this->Form->create('Company'); ?>
    <section id="form-container">
        <h3>Client Details</h3>
    <? echo $this->Form->input('name', array('label' => FALSE, 'placeholder' => 'Name')); ?>
    <? echo $this->Form->input('client_name', array('label' => FALSE, 'placeholder' => 'Client Name')); ?>
    <? echo $this->Form->input('client_contact', array('label' => FALSE, 'placeholder' => 'Client Contact')); ?>
    <? echo $this->Form->input('email', array('label' => FALSE, 'placeholder' => 'Email')); ?>
    <div class="control-group">
        <? echo $this->Form->input('address1', array('label' => FALSE, 'div' => FALSE, 'placeholder' => 'Address 1')); ?>
        <? echo $this->Form->input('postcode', array('label' => FALSE, 'div' => FALSE, 'class' => 'span2', 'placeholder' => 'Postcode')); ?>
    </div>
    
    <? echo $this->Form->input('address2', array('label' => FALSE, 'placeholder' => 'Address 2')); ?>
    <? echo $this->Form->input('phone', array('label' => FALSE, 'placeholder' => 'Phone')); ?>
    <?php $states = array('nsw' => 'NSW', 'vic' => 'VIC', 'qld' => 'QLD', 'wa' => 'WA', 'nt' => 'NT', 'tas' => 'TAS', 'act' => 'ACT');
    echo $this->Form->input('state', array('options' => $states, 'default' => 'nsw'));
    ?>
    </section>
    <? echo $this->Form->end(array('class' => 'btn btn-primary', 'label' => 'Create',)); ?>      


</section>