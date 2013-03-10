
<div id="wrapper">
<section id="pass_config">

    <h3>Create a pass in under 5 mins</h3>

    <div id="tabstrip">
        <ul>
            <li class="k-state-active" id="tab1">
                Details
            </li>
            <li id="tab2">
                Base items
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
                <!--<p>
                    2 text fields. Description & Organization.
                </p>-->
                <?=$this->Form->create(null, array('id' => 'step1Form')); ?>
                <?=$this->Form->input('organizationName');?>
                <?=$this->Form->input('description');?>
                <?=$this->Form->end('Next'); ?>
            </div>
        </div>
        <div>
            <div class="">
                <h2>Select from below</h2>

                <p>
                    These are the items user will select from this tab: <br/>
                    1. Icon image:<br/>
                    use this to upload image: <br/>
                    <b>http://demos.kendoui.com/web/upload/events.html</b> <br><br>
                    2. Background image:<br/>
                    use this to upload image: <br/>
                    <b>http://demos.kendoui.com/web/upload/events.html</b> <br><br>

                    3. Background color (have to use a color picker) <br>
                    4. foreground color <br>
                    5. labelColor <br><br><br>

                    Next Button
                </p>
            </div>
        </div>
        <div>
            <div class="">
                <h2>Select from below</h2>

                <p>
                    1. Logo image:<br/>
                    2. Thumbnail image:<br/>
                    3. logo text <br>
                    4. header text <br>
                    5. Primary fields <br>
                    6. Secondary fields (there can be multiple key value pairs) <br>
                    7. Auxilliary fields (there can be multiple key value pairs) <br>
                    8. Barcodes (there are 3 types of barcode)<br><br>

                    Previous & Next Button
                </p>
            </div>
        </div>
        <div>
            <div class="">
                <h2>Select from below</h2>

                <p>
                    1. Secondary fields (there can be multiple key value pairs) <br><br>
                    Previous & Next Button
                </p>
            </div>
        </div>
        <div>
            <div class="">

                <p>
                    Pass can be relevent by location. You can choose 10 locations.
                    When your pass is close to the location it will appear on the lock screen.
                </p>
            </div>
        </div>
        <div>
            <div class="">
                <h2>Select from below</h2>

                <p>
                    <select id="barcode_format">
                        <option>PDF417</option>
                        <option>Aztec</option>
                        <option>QR codes</option>
                    </select>

                    There are 3 different type of barcodes. User can select one. <br>
                    'format' => 'PKBarcodeFormatPDF417', <br>
                    'message' => '123456789',<br>
                    'messageEncoding' => 'iso-8859-1'<br><br>


                    Previous Button

                </p>
            </div>
        </div>
    </div>


</section>
<section id="simulator">
    <?php echo $this->element('simulator/event'); ?>
</section>

</div>
<div id="users">
    <p>recent users of fly plass</p>
    <a href="#"><img src="/img/qt-logo.png"></a>
    <a href="#"><img src="/img/redbaron-logo.png"></a>
    <a href="#"><img src="/img/event-logo.png"></a>

</div> <!-- end users -->

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