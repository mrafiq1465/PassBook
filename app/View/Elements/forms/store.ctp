<div>
    <div class="">
        <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step1Form')); ?>
        <?=$this->Form->input('organizationName');?>
        <?=$this->Form->input('description');?>
        <?=$this->Form->end('Next'); ?>
    </div>
</div>
<div>
    <div class="">
        <div style="width:45%">
            <img src="/<?=$this->request->data['Pass']['iconImage']?>" id="iconImg"/>
            <?=$this->Form->input('iconImage', array('type' => 'file', 'rel' => '#iconImg', 'class' => 'imageUpload'));?>
            <img src="/<?=$this->request->data['Pass']['iconImageRetina']?>" id="iconImgRetina"/>
            <?=$this->Form->input('iconImageRetina', array('type' => 'file', 'rel' => '#iconImgRetina', 'class' => 'imageUpload'));?>

            <img src="/<?=$this->request->data['Pass']['thumbnailImage']?>" id="thumbnailImg"/>
            <?=$this->Form->input('thumbnailImage', array('type' => 'file', 'rel' => '#thumbnailImg', 'class' => 'imageUpload'));?>
            <img src="/<?=$this->request->data['Pass']['thumbnailImageRetina']?>" id="thumbnailImgRetina"/>
            <?=$this->Form->input('thumbnailImageRetina', array('type' => 'file', 'rel' => '#thumbnailImgRetina', 'class' => 'imageUpload'));?>

            <img src="/<?=$this->request->data['Pass']['stripImage']?>" id="stripImg"/>
            <?=$this->Form->input('stripImage', array('type' => 'file', 'rel' => '#stripImg', 'class' => 'imageUpload'));?>
            <img src="/<?=$this->request->data['Pass']['stripImageRetina']?>" id="stripImgRetina"/>
            <?=$this->Form->input('stripImageRetina', array('type' => 'file', 'rel' => '#stripImgRetina', 'class' => 'imageUpload'));?>




            <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step2Form')); ?>
            <?=$this->Form->input('backgroundColor', array('id' => 'backgroundColor'));?>
            <?=$this->Form->input('foregroundColor', array('id' => 'foregroundColor'));?>
            <?=$this->Form->input('labelColor', array('id' => 'labelColor'));?>
            <?=$this->Form->end('Next'); ?>
        </div>
    </div>
</div>
<div>
    <div class="">
        <div style="width:45%">
            <img src="/<?=$this->request->data['Pass']['logoImage']?>" id="logoImg"/>
            <?=$this->Form->input('logoImage', array('type' => 'file', 'rel' => '#logoImg', 'class' => 'imageUpload'));?>
            <img src="/<?=$this->request->data['Pass']['logoImageRetina']?>" id="logoImgRetina"/>
            <?=$this->Form->input('logoImageRetina', array('type' => 'file', 'rel' => '#logoImgRetina', 'class' => 'imageUpload'));?>

            <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step3Form')); ?>
            <?=$this->Form->input('logoText');?>
            <?=$this->Form->input('headerText');?>
            <div>
                <div class="dynamicFieldsContainer">
                    <label>Primary Fields: </label>
                    <button type="button" class="k-button dynamicFields" data-target="#primaryFieldsContainer">Add
                    </button>
                    <div class="<?=empty($this->data['Pass']['primaryFields']) ? 'hide' : ''?>"
                         id="primaryFieldsContainer">
                        <? for ($i = 0; $i < 2; $i++) { ?>
                        <div class="<?=empty($this->data['Pass']['primaryFields'][$i]) ? 'hide' : ''?> inner">
                            <a href="javascript:void(0)" class="close">X</a>
                            <label>Label:</label>
                            <?=$this->Form->input("Pass.primaryFields.$i.Label", array('label' => false));?>
                            <label>Value:</label>
                            <?=$this->Form->input("Pass.primaryFields.$i.Value", array('label' => false));?>
                        </div>
                        <? } ?>
                    </div>
                </div>
            </div>
            <div>
                <div class="dynamicFieldsContainer">
                    <label>Secondary Fields: </label>
                    <button type="button" class="k-button dynamicFields" data-target="#secondaryFieldsContainer">Add
                    </button>
                    <div class="<?=empty($this->data['Pass']['secondaryFields']) ? 'hide' : ''?>"
                         id="secondaryFieldsContainer">
                        <? for ($i = 0; $i < 4; $i++) { ?>
                        <div class="<?=empty($this->data['Pass']['secondaryFields'][$i]) ? 'hide' : ''?> inner">
                            <a href="javascript:void(0)" class="close">X</a>
                            <label>Label:</label>
                            <?=$this->Form->input("Pass.secondaryFields.$i.Label", array('label' => false));?>
                            <label>Value:</label>
                            <?=$this->Form->input("Pass.secondaryFields.$i.Value", array('label' => false));?>
                        </div>
                        <? } ?>
                    </div>
                </div>
            </div>
            <div>
                <div class="dynamicFieldsContainer">
                    <label>Auxiliary Fields: </label>
                    <button type="button" class="k-button dynamicFields" data-target="#auxiliaryFieldsContainer">Add
                    </button>
                    <div class="<?=empty($this->data['Pass']['auxiliaryFields']) ? 'hide' : ''?>"
                         id="auxiliaryFieldsContainer">
                        <? for ($i = 0; $i < 5; $i++) { ?>
                        <div class="<?=empty($this->data['Pass']['auxiliaryFields'][$i]) ? 'hide' : ''?> inner">
                            <a href="javascript:void(0)" class="close">X</a>
                            <label>Label:</label>
                            <?=$this->Form->input("Pass.auxiliaryFields.$i.Label", array('label' => false));?>
                            <label>Value:</label>
                            <?=$this->Form->input("Pass.auxiliaryFields.$i.Value", array('label' => false));?>
                        </div>
                        <? } ?>
                    </div>
                </div>
            </div>
            <?=$this->Form->input('barcode_format_id');?>
            <p class="error"></p>
            <?=$this->Form->end('Next'); ?>
        </div>
    </div>
</div>
<div>
    <div class="">
        <div style="width:45%">
            <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step4Form')); ?>
            <div class="dynamicFieldsContainer">
                <label>Back Fields: </label>
                <button type="button" class="k-button dynamicFields" data-target="#backFieldsContainer">Add
                </button>
                <div class="<?=empty($this->data['Pass']['backFields']) ? 'hide' : ''?>" id="backFieldsContainer">
                    <? for ($i = 0; $i < 5; $i++) { ?>
                    <div class="<?=empty($this->data['Pass']['backFields'][$i]) ? 'hide' : ''?> inner">
                        <a href="javascript:void(0)" class="close">X</a>
                        <label>Label:</label>
                        <?=$this->Form->input("Pass.backFields.$i.Label", array('label' => false));?>
                        <label>Value:</label>
                        <?=$this->Form->input("Pass.backFields.$i.Value", array('label' => false));?>
                    </div>
                    <? } ?>
                </div>
            </div>
            <p class="error"></p>
            <?=$this->Form->end('Next'); ?>
        </div>
    </div>
</div>
<div>
    <div class="">
        <div style="width:45%">
            <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step5Form')); ?>
            <label>Locations: </label>
            <button type="button" class="k-button dynamicFields" data-target="#locationsContainer">Add
            </button>
            <div class="<?=empty($this->data['Pass']['locations']) ? 'hide' : ''?>" id="locationsContainer">
                <? for($i=0;$i<10;$i++) { ?>
                <div class="<?=empty($this->data['Pass']['locations'][$i]) ? 'hide' : ''?> inner">
                    <?=$this->Form->input("Pass.locations.$i.Value", array('label' => false, 'placeholder' => 'latitude, longitude'));?>
                </div>
                <? } ?>
            </div>
            <p class="error"></p>
            <?=$this->Form->end('Finish'); ?>
        </div>
    </div>
</div>
<div>
    <div class="">
        <?=$this->element('blocks/generate');?>
    </div>
</div>
<script>
    var PassType = '<?=$this->data['PassType']['name']; ?>';
</script>