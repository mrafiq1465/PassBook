<div id="k-container">
    <div class="side back" id="back">
        <h1>Just whiz stuff</h1>

        <h3>Another brick in the wall</h3>
    </div>
    <div class="current side front" id="front" data-bind="style: {
        background: pass.backgroundColor,
        color: pass.foregroundColor
    }">
        <div class="section_header">
            <div class="logo_image" style=" margin: 10px; float: left;">
                <img style="max-width: 105px;" data-bind="attr: { src: logoImage}" src="/img/passes/event/logo.png"/>
            </div>
            <div class="logo_text" data-bind="text: pass.logoText" style="  margin: 10px; float: left;">
                logo text
            </div>
            <div class="header_text" data-bind="text: pass.headerText" style="  margin: 10px; float: right;">
                header text
            </div>
        </div>
        <div class="section_thumbnail" style="clear: both; display:block;">
            <div class="left" style="  margin: 10px; float: left;">
                <div class="primary_field" style="  margin: 15px 0;"
                     data-template="pf-tpl" data-bind="source: pass.primaryFields">
                    <script id="pf-tpl" type="text/x-kendo-template">
                        <div class="f">
                            <span data-bind="text:Label" class="key">Reservation</span> <br/>
                            <span data-bind="text:Value" class="value">123456789L</span>
                        </div>
                    </script>
                </div>
            </div>
            <div class="right" style="  margin: 10px; float: right;">
                <img src="/img/passes/event/thumbnail.png" height="100px"/>
            </div>
        </div>
        <div class="section_strip" style="display:none;background-image: url('/img/passes/event/strip.png');clear: both; height: 100px;">
            <div class="primary_field" style="  padding: 10px;">
                Rydges Melbourne
            </div>
        </div>
        <div class="secondary_field_strip" style="clear: both;"
             data-template="sf-tpl" data-bind="source: nonPrimaryFields">
            <script id="sf-tpl" type="text/x-kendo-template">
                <div class="f">
                    <span data-bind="text:Label" class="key"></span> <br/>
                    <span data-bind="text:Value" class="value"></span>
                </div>
            </script>
        </div>
        <div class="section_auxiliary" style="clear: both;">
            <div class="logo_text" style="  margin: 10px; float: left;">
                <span class="key">Arrive:</span> <br/> <span class="value">1 Nov 2012, 2 pm</span>
            </div>
            <div class="logo_text" style="  margin: 10px; float: left;">
                <span class="key">Depart:</span> <br/> <span class="value">3 Nov 2012, 2 pm</span>
            </div>

        </div>
        <div class="section_barcode" style="clear: both;  text-align: center; margin-top: 120px">
            <img src="/img/PDF417_Barcode_Font.jpg" height="100px"/>
        </div>
        <div class="section_flip" style="clear: both; float: right; margin-right: 20px;">
            <a href="#">i</a>
        </div>
    </div>

</div>
<a class="toggle" href="javascript:void(0);">Flip</a>



<script>
    var effect = kendo.fx("#container").flipHorizontal($("#front"), $("#back")).duration(1000),
        reverse = false;

    $(".toggle").click(function () {
        effect.stop();
        reverse ? effect.reverse() : effect.play();
        reverse = !reverse;
    });
</script>

<style>
    #k-container {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .side {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .front {
        background-image: url('/img/passes/event/background.png');
        padding: 0;
        width: 360px;
        height: 450px;
        margin: 0;
        color: #fff;
    }

    .key {
        font-weight: bold;
    }

    .back {

    }

</style>
