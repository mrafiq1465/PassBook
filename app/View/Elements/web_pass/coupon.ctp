<div id="k-container">
    <div class="current side front">
        <div class="section_header">
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
        <div class="section_thumbnail" style="clear: both; display:block;">
            <div class="left" style="  margin: 10px; float: left;">
                <div class="primary_field" style="  margin: 15px 0;">
                    Rydges Melbourne
                </div>
                <div class="secondary_field">
                    <? foreach ($this->data['Pass']['primaryFields'] as $field) {?>
                    <span class="key"><?=$field["Label"]?></span> <br/> <span class="value"><?=$field["Label"]?></span>
                    <? } ?>
                </div>
            </div>
            <div class="right" style="  margin: 10px; float: right;">
                <img src="/<?=$this->data['Pass']['thumbnailImage'];?>" height="100px"/>
            </div>
        </div>
        <div class="section_strip" style="display:none;background-image: url('/<?=$this->data['Pass']['stripImage'];?>');clear: both; height: 100px;">
            <div class="primary_field" style="  padding: 10px;">
                Rydges Melbourne
            </div>
        </div>
        <div class="secondary_field_strip" style="display:none;clear: both;">
            <? foreach ($this->data['Pass']['primaryFields'] as $field) {?>
            <div class="logo_text" style="  margin: 10px; float: left;">
                <span class="key"><?=$field['Label']?></span> <br/> <span class="value"><?=$field['Value']?></span>
            </div>
            <? } ?>
        </div>
        <div class="section_auxiliary" style="clear: both;">
            <? foreach ($this->data['Pass']['primaryFields'] as $field) {?>
            <div class="logo_text" style="  margin: 10px; float: left;">
                <span class="key"><?=$field['Label']?></span> <br/> <span class="value"><?=$field['Value']?></span>
            </div>
            <? } ?>
        </div>
        <div class="section_barcode" style="clear: both;  text-align: center; margin-top: 120px">
            <img src="/img/PDF417_Barcode_Font.jpg" height="100px"/>
        </div>
        <div class="section_flip" style="clear: both; float: right; margin-right: 20px;">
            <a href="#">i</a>
        </div>
    </div>
    <div class="side back">

    </div>
</div>

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
        padding: 0px 0 0 0px;
        width: 360px;
        height: 450px;
        color: #fff;
    }

    .key {
        font-weight: bold;
    }

    .back {

    }

</style>
