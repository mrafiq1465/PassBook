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
                        <?php echo $this->element('pass/tabs/design_tab'); ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section class="app-body">
    </section>
</div>
<?
//echo $this->Html->script('colorpicker.js');
//echo $this->Html->css('colorpicker/colorpicker.css');
?>

<script>
    $(document).ready(function () {
        window.create_mode = true;
        $('#tabstrip').data('kendoTabStrip').disable($('[id^=tab]')).enable($('#tab1'));
    });
</script>