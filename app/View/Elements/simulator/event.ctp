<div>
    <div class="current side front">
        <div class="section_header">
            <div class="logo_image" style=" margin: 10px; float: left;">
                <img src="/img/passes/event/logo.png"/>
            </div>
            <div class="logo_text" style="  margin: 10px; float: left;">
                logo text
            </div>
            <div class="header_text" style="  margin: 10px; float: right;">
                header text
            </div>
        </div>
        <div class="section_thumbnail" style="clear: both; display:block;">
            <div class="left" style="  margin: 10px; float: left;">
                <div class="primary_field" style="  margin: 15px 0;">
                    Rydges Melbourne
                </div>
                <div class="secondary_field">
                    <span class="key">Reservation</span> <br/> <span class="value">123456789L</span>
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
        <div class="secondary_field_strip" style="display:none;clear: both;">
            <div class="logo_text" style="  margin: 10px; float: left;">
                <span class="key">Arrive:</span> <br/> <span class="value">1 Nov 2012, 2 pm</span>
            </div>
            <div class="logo_text" style="  margin: 10px; float: left;">
                <span class="key">Depart:</span> <br/> <span class="value">3 Nov 2012, 2 pm</span>
            </div>

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
            <a class="toggle" href="javascript:void(0);">Flip</a>
        </div>
    </div>
    <div class="side back">
        <a class="toggle" href="javascript:void(0);">Flip</a>
        Back content
    </div>
</div>

<script>
    $(".toggle").click(function () {
        var currentSide = $(".current"),
                otherSide = $(".side:not(.current)");

        currentSide.removeClass("current");
        otherSide.addClass("current");

        kendo.fx("#k-container").flipHorizontal(currentSide, otherSide).play();
    });
</script>

<style>
    .side {
        position: absolute;
        width: 100%;
        height: 100%;
    }
    .front {
        background-image: url('/img/passes/event/background.png');
        padding: 0px 0 0 0px;
        width: 360px;
        height: 450px;
        margin: 0;
        color: #fff;
    }
    .key {
        font-weight: bold;
    }
    .back {
        display: none;
    }

</style>
