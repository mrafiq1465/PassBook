
<section id="pass_config">

    <h3>Create a pass in under 5 mins</h3>
    <div id="tabstrip">
        <ul>
            <li class="k-state-active">
                Base config
            </li>
            <li>
               Front
            </li>
            <li>
                Back
            </li>
            <li>
                Barcode
            </li>
        </ul>
        <div>
            <div class="">
                <h2>Select from below</h2>
                <p>
                    These are the items user will select from this tab: <br />
                    1. Icon image:<br />
                    use this to upload image: <br />
                    <b>http://demos.kendoui.com/web/upload/events.html</b> <br><br>
                    2. Background image:<br />
                       use this to upload image: <br />
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
                    1. Logo image:<br />
                    2. Thumbnail image:<br />
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
                <h2>Select from below</h2>
                <p>
                    <select id="barcode_format">
                        <option>PDF417</option>
                        <option>Aztec</option>
                        <option>QR codes</option>
                    </select>

                    There are 3 different type of barcodes. User can select one. <br>
                    'format'            => 'PKBarcodeFormatPDF417', <br>
                    'message'           => '123456789',<br>
                    'messageEncoding'   => 'iso-8859-1'<br><br>


                    Previous  Button

                </p>
            </div>
        </div>
    </div>


</section>
<section id="simulator">
    <?php echo $this->element('simulator/event'); ?>
</section>

<script>
    $(document).ready(function() {
        $("#tabstrip").kendoTabStrip({
            animation:	{
                open: {
                    effects: "fadeIn"
                }
            }
        });

        $("#barcode_format").kendoDropDownList();
    });
</script>