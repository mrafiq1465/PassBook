<div class="container" id="main-container">
    <div class="row phone-container">
        <div id="phone">
            <div class="phone-inner">
                <div class="initial-message text-center">
                    your pass will update here <br>
                    as you make changes
                </div>
            </div>
        </div>
    </div>

    <section id="home-hero-unit" class="hero-unit">
        <div class="row">
            <div class="large-7 columns">
                <section id="pass-creation">
                    <div id="tabstrip">
                        <?php echo $this->element('pass_create_menu'); ?>
                        <div class="tab-pane">
                            <h2>step 1 : design</h2>

                            <?=$this->Form->create(null, array('id' => 'step1Form')); ?>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label for="organizationName">your organization name:</label>
                                    <?= $this->Form->input('organizationName', array('div' => false, 'placeholder' => 'organization name', 'label' => false)); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label for="description">description:</label>
                                    <?= $this->Form->input('description', array('div' => false, 'placeholder' => 'description', 'label' => false)); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label for="backgroundColor">background color:</label>
                                    <?= $this->Form->input('backgroundColor', array('id' => 'backgroundColor', 'div' => false, 'placeholder' => 'background color', 'label' => false)); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label for="foregroundColor">foreground color:</label>
                                    <?= $this->Form->input('foregroundColor', array('id' => 'foregroundColor', 'div' => false, 'placeholder' => 'foreground color', 'label' => false)); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label for="labelColor">label color:</label>
                                    <?= $this->Form->input('labelColor', array('id' => 'labelColor', 'div' => false, 'placeholder' => 'label color', 'label' => false)); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns text-right">
                                    <?php echo $this->Form->button('next step', array('type' => 'submit', 'class' => 'pb-btn')); ?>
                                </div>
                            </div>
                            <?=$this->Form->end(); ?>
                        </div>
                    </div>


                </section>
            </div>
        </div>
    </section>
    <section class="app-body">
    </section>
</div>
<?
echo $this->Html->script('colorpicker.js');
echo $this->Html->css('colorpicker/colorpicker.css');
?>

<script>
    $(document).ready(function () {
        window.create_mode = true;
        $('#tabstrip').data('kendoTabStrip').disable($('[id^=tab]')).enable($('#tab1'));
    });
</script>