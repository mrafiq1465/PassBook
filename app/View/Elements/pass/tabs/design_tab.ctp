<div class="tab-pane">
    <h2>step 1 : design</h2>

    <?=$this->Form->create(null, array('id' => 'step1Form')); ?>
    <div class="row">
        <div class="large-12 columns">
            <label for="organizationName">your company name:</label>
            <? echo $this->Form->input('organizationName', array('placeholder' => 'organization name', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter organization name")); ?>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label for="description">name your coupon (for your own reference only):</label>
            <? echo $this->Form->input('description', array('placeholder' => 'description', 'label' => FALSE, 'class' => 'input', 'required' => 'required', 'validationMessage' => "Please enter description")); ?>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label for="backgroundColor">background color:</label>
            <?= $this->Form->input('backgroundColor', array('id' => 'backgroundColor', 'required' => 'required', 'type' => 'color', 'div' => false, 'placeholder' => 'background color', 'label' => false)); ?>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label for="foregroundColor">text color:</label>
            <?= $this->Form->input('foregroundColor', array('id' => 'foregroundColor', 'required' => 'required', 'type' => 'color', 'div' => false, 'placeholder' => 'foreground color', 'label' => false)); ?>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label for="labelColor">label color:</label>
            <?= $this->Form->input('labelColor', array('id' => 'labelColor', 'required' => 'required', 'type' => 'color', 'div' => false, 'placeholder' => 'label color', 'label' => false)); ?>

        </div>
    </div>
    <div class="row">
        <div class="large-12 columns text-right">
            <?php echo $this->Form->button('next step', array('type' => 'submit', 'class' => 'pb-btn')); ?>
        </div>
    </div>
    <?=$this->Form->end(); ?>
</div>