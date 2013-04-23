<?php

$nonPrimaryFields = array_merge(
    $this->data['Pass']['secondaryFields'],
    $this->data['Pass']['auxiliaryFields']
);
$class = '';
if ($c = count($nonPrimaryFields)) {
    $class = "small-" . 12 / $c . " columns";
}

?>
<div class="row phone-container">
    <div id="phone">
        <div class="phone-inner">
            <div id="k-container" style="color:<?= $this->data['Pass']['foregroundColor']; ?>;">
                <div class="side back" id="back" style="background:<?= $this->data['Pass']['foregroundColor']; ?>;">
                    <div class="inner1">
                        <div class="back-inner">
                            <div class="row">
                                <div class="small-12 columns">
                                    <div class="backFields">
                                        <? foreach ($this->data['Pass']['backFields'] as $field) { ?>
                                            <div class="bf">
                                                <span class="key"><?=$field['Label']?></span> <br/>
                                                <span class="value"><?=$field['Value']?></span>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="current side front" id="front"
                     style="background-color:<?= $this->data['Pass']['backgroundColor']; ?>;">
                    <section class="section_header">
                        <div class="row">
                            <div class="small-3 columns">
                                <img style="max-width: 100%;" src="/<?= $this->data['Pass']['logoImage']; ?>"/>
                            </div>
                            <div class="small-6 columns">
                                <?=$this->data['Pass']['logoText'];?>
                            </div>
                            <div class="small-3 columns">
                                <?=$this->data['Pass']['headerText'];?>
                            </div>
                        </div>
                    </section>
                    <section class="primary_fields" style="background-image: url('/<?= $this->data['Pass']['stripImage']; ?>');">
                        <div class="primary_field">
                            <? foreach ($this->data['Pass']['primaryFields'] as $field) { ?>
                                <div class="pf">
                                    <span class="key"><?=$field["Label"]?></span>
                                    <br/>
                                    <span class="value"><?=$field["Value"]?></span>
                                </div>
                            <? } ?>
                        </div>
                    </section>
                    <section class="non_primary_fields">
                        <div class="secondary_field_strip row collapse">
                            <? foreach ($nonPrimaryFields as $field) { ?>
                                <div class="f <?= $class ?>" >
                                    <span class="key"><?=$field['Label']?></span>
                                    <br/>
                                    <span class="value"><?=$field['Value']?></span>
                                </div>
                            <? } ?>
                        </div>
                    </section>
                    <div class="section_barcode text-center">
                        <img src="/img/PDF417_Barcode_Font.jpg" height="100px"/>
                    </div>
                </div>
                <a class="toggle" href="javascript:void(0);">i</a>
            </div>
        </div>
    </div>
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
    #phone {
        position: static;
        margin: -100px auto 0;
    }

    #phone .phone-inner, #phone {
        background: none;
    }
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
        padding: 0;
        width: 360px;
        margin: 0;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        border-radius: 10px;
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

    .back {
        padding: 15px 5px 5px;
    }

    .back .inner1 {
        width: 100%;
        height: 100%;
        background: #f8f8f8;
        padding: 10px;
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