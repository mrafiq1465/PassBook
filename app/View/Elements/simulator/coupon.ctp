<div id="k-container">
    <div class="side back" id="back">
        <div class="back-inner">
            <div class="row">
                <div class="small-12 columns">
                    <div class="backFields" data-template="bf-tpl" data-bind="source: pass.backFields">
                        <script id="bf-tpl" type="text/x-kendo-template">
                            <div class="bf">
                                <span data-bind="text:Label" class="key"></span> <br/>
                                <span data-bind="text:Value" class="value"></span>
                            </div>
                        </script>
                    </div>
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

    .back, .back-inner {
        background: #f8f8f8;
        padding: 15px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        border-radius: 10px;
    }

    .back-inner {
        background: #fff;
        border: 1px solid #e2e2e2;
        padding: 15px 20px;
    }

    .backFields .bf {
        color: #999;
        margin-bottom: 10px;
        border-top: 1px solid #eee;
        padding-top: 10px;
    }

    .backFields .key {
        font-size: 1.2em;
        font-weight: bold;
    }
    .backFields .value {
        font-size: 1.7em;
        padding-left: 10px;
    }

    .backFields .bf:first-child {
        border: none;
        padding-top: 0;
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
        right: 19px;
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
