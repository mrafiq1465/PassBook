
<section class="app-body">
    <div class="row">
        <div class="large-7 columns">
            <h3>Create a pass in under 5 mins</h3>
            <div id="tabstrip">
                <ul>
                    <li class="k-state-active" id="tab1">
                       Coupon
                    </li>
                    <li id="tab2">
                        Design
                    </li>
                    <li id="tab3">
                        Front
                    </li>
                    <li id="tab4">
                        Back
                    </li>
                    <li id="tab5">
                        Relevance
                    </li>
                    <li id="tab6">
                        Barcode
                    </li>
                </ul>
                <div>
                    <div class="">
                        <?=$this->Form->create(null, array('id' => 'step1Form')); ?>
                        <?=$this->Form->input('organizationName');?>
                        <?=$this->Form->input('description');?>
                        <?=$this->Form->end('Next'); ?>
                    </div>
                </div>
                <div>
                    <div class="">
                    </div>
                </div>
                <div>
                    <div class="">
                    </div>
                </div>
                <div>
                    <div class="">

                    </div>
                </div>
                <div>
                    <div class="">

                    </div>
                </div>
                <div>
                    <div class="">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="large-5 columns">

           <?//php echo $this->element('simulator/event'); ?>
        </div>
    </div>
</section>


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