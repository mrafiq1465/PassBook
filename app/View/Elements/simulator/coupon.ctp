<div id="k-container">
    <div class="side back" id="back" data-bind="style: {
        background: pass.backgroundColor,
        color: pass.foregroundColor
    }">
        <div class="row">
            <div class="small-12 columns">
                <div class="backFields" data-template="bf-tpl" data-bind="source: pass.backFields">
                    <script id="bf-tpl" type="text/x-kendo-template">
                        <div class="bf">
                            <span data-bind="text:Label, style: {color: pass.labelColor}" class="key"></span> <br/>
                            <span data-bind="text:Value" class="value"></span>
                        </div>
                    </script>
                </div>
            </div>
        </div>

    </div>
    <div class="current side front" id="front" data-bind="style: {
        background: pass.backgroundColor,
        color: pass.foregroundColor
    }">
        <section class="section_header">
            <div class="row">
                <div class="small-3 columns">
                    <img style="max-width: 100%;" data-bind="attr: { src: logoImage}">
                </div>
                <div class="small-6 columns" data-bind="text: pass.logoText"></div>
                <div class="small-3 columns" data-bind="text: pass.headerText"></div>
            </div>
        </section>
        <section class="primary_fields" data-bind="style: {background: stripImage}">
            <div class="primary_field" data-template="pf-tpl" data-bind="source: pass.primaryFields">
                <script id="pf-tpl" type="text/x-kendo-template">
                    <div class="pf">
                        <span data-bind="text:Label, style: {color: pass.labelColor}" class="key"></span> <br/>
                        <span data-bind="text:Value" class="value"></span>
                    </div>
                </script>
            </div>
        </section>
        <section class="non_primary_fields">
            <div class="secondary_field_strip row collapse" data-template="sf-tpl" data-bind="source: nonPrimaryFields">
                <script id="sf-tpl" type="text/x-kendo-template">
                    <div class="f" data-bind="attr:{class:sfClass}">
                        <span data-bind="text:Label, style: {color: pass.labelColor}" class="key"></span> <br/>
                        <span data-bind="text:Value" class="value"></span>
                    </div>
                </script>
            </div>
        </section>
        <div class="section_barcode text-center">
            <img src="/img/PDF417_Barcode_Font.jpg" height="100px"/>
        </div>
    </div>
    <a class="toggle" href="javascript:void(0);">i</a>
</div>



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
        font-size: .8em;
        line-height: 1.5;
    }

    .section_header, .primary_fields, .non_primary_fields {
        padding: 17px;
    }

    .primary_fields > div {
        padding: 5px;
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

    .backFields {
        padding: 1em;
    }

    .backFields .bf {
        margin-bottom: 10px;
    }
    .section_header {
        height: 15%;
    }

    .primary_fields, .non_primary_fields {
        height: 30%;
    }
    .section_barcode {
        height: 25%;
    }
    .toggle {
        position: absolute;
        z-index: 10000;
        bottom: 19px;
        right: 10px;
        color: #222;
        background: #ccc;
        padding: 1px 6px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        font-size: .8em;
    }


</style>
