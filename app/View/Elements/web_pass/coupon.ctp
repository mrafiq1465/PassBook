

<div id="pass_body" style="color:<?=$this->data['Pass']['foregroundColor'];?>;">
    <div class="current side front" style="background-color:<?=$this->data['Pass']['backgroundColor'];?>; ">
        <div class="row">
            <div class="logo_image" style=" margin: 10px; float: left;">
                <img src="/<?=$this->data['Pass']['logoImage'];?>"/>
            </div>
            <div class="logo_text" style="  margin: 10px; float: left;">
                <?=$this->data['Pass']['logoText'];?>
            </div>
            <div class="header_text" style="  margin: 10px; float: right;">
                <?=$this->data['Pass']['headerText'];?>
            </div>
        </div>
        <div class="row" style="background-image: url('/<?=$this->data['Pass']['stripImage'];?>');clear: both; height: 100px;">
            <div class="primary_field" style="  padding: 10px;">
                <? foreach ($this->data['Pass']['primaryFields'] as $field) {?>
                <span class="key"><?=$field["Label"]?></span> <br/> <span class="value"><?=$field["Value"]?></span>
                <? } ?>
            </div>
        </div>

        <div class="row section_auxiliary" style="">
            <? foreach ($this->data['Pass']['secondaryFields'] as $field) {?>
            <div class="logo_text" style="  margin: 10px; float: left;">
                <span class="key"><?=$field['Label']?></span> <br/> <span class="value"><?=$field['Value']?></span>
            </div>
            <? } ?>
            <? foreach ($this->data['Pass']['auxiliaryFields'] as $field) {?>
            <div class="logo_text" style="  margin: 10px; float: left;">
                <span class="key"><?=$field['Label']?></span> <br/> <span class="value"><?=$field['Value']?></span>
            </div>
            <? } ?>
        </div>
        <div class="row section_barcode" style=" text-align: center; margin-top: 120px">
            <img src="/img/PDF417_Barcode_Font.jpg" height="100px"/>
        </div>
        <div class="section_flip" style=" float: right; margin-right: 20px;">
            <a href="#">i</a>
        </div>
    </div>
    <div class="row side back" style="display: none;">
        <? foreach ($this->data['Pass']['backFields'] as $field) {?>
        <div class="logo_text" style="  margin: 10px; float: left;">
            <span class="key"><?=$field['Label']?></span> <br/> <span class="value"><?=$field['Value']?></span>
        </div>
        <? } ?>
    </div>
</div>


<style>
    #pass_body {
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
        padding: 0px 0 0 0px;
        width: 360px;
        height: 450px;
    }

    .key {
        font-weight: bold;
    }

    .back {

    }

</style>
