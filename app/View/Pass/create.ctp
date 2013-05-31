<div class="container" id="main-container">
    <div class="row phone-container">
        <div id="phone">
            <div class="phone-inner" data-bind="style: {background: pass.backgroundColor}">
                <div class="initial-message text-center"
                     data-bind="style: {color: pass.foregroundColor}">
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
                    <script type="text/javascript">
                        <?
                         $dataJ = new stdClass();
                         $dataJ->backgroundColor = '';
                         $dataJ->foregroundColor = '';
                         ?>
                        PassBook.data = <?= json_encode($dataJ) ?>;
                    </script>
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

<script>
    $(document).ready(function () {
        window.create_mode = true;
        $('#tabstrip').data('kendoTabStrip').disable($('[id^=tab]')).enable($('#tab1'));
    });
</script>