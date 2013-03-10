
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
                Generate Pass
            </li>
        </ul>
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

                    <img src="/<?=$this->request->data['Pass']['backgroundImage']?>" id="backgroundImg"/>
                    <?=$this->Form->input('backgroundImage', array('type' => 'file', 'rel' => '#backgroundImg', 'class' => 'imageUpload'));?>
                    <img src="/<?=$this->request->data['Pass']['backgroundImageRetina']?>" id="backgroundImgRetina"/>
                    <?=$this->Form->input('backgroundImageRetina', array('type' => 'file', 'rel' => '#backgroundImgRetina', 'class' => 'imageUpload'));?>

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

                    <img src="/<?=$this->request->data['Pass']['thumbnailImage']?>" id="thumbnailImg"/>
                    <?=$this->Form->input('thumbnailImage', array('type' => 'file', 'rel' => '#thumbnailImg', 'class' => 'imageUpload'));?>
                    <img src="/<?=$this->request->data['Pass']['thumbnailImageRetina']?>" id="thumbnailImgRetina"/>
                    <?=$this->Form->input('thumbnailImageRetina', array('type' => 'file', 'rel' => '#thumbnailImgRetina', 'class' => 'imageUpload'));?>

                    <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step3Form')); ?>
                    <?=$this->Form->input('logoText');?>
                    <?=$this->Form->input('headerText');?>
                    <div>
                        <label>Primary Fields: </label>
                        <button type="button" class="k-button dynamicFields" data-target="#primaryFieldsContainer">Add
                        </button>
                        <div class="<?=empty($this->data['Pass']['primaryFields']) ? 'hide' : ''?>"
                             id="primaryFieldsContainer">
                            <div class="inner">
                                <label>Label:</label>
                                <?=$this->Form->input('Pass.primaryFields.Label', array('label' => false));?>
                                <label>Value:</label>
                                <?=$this->Form->input('Pass.primaryFields.Value', array('label' => false));?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Secondary Fields: </label>
                        <button type="button" class="k-button dynamicFields" data-target="#secondaryFieldsContainer">Add
                        </button>
                        <div class="<?=empty($this->data['Pass']['secondaryFields']) ? 'hide' : ''?>"
                             id="secondaryFieldsContainer">
                            <? for ($i=0; $i<5; $i++) { ?>
                            <div class="<?=empty($this->data['Pass']['secondaryFields'][$i]) ? 'hide' : ''?> inner">
                                <label>Label:</label>
                                <?=$this->Form->input("Pass.secondaryFields.$i.Label", array('label' => false));?>
                                <label>Value:</label>
                                <?=$this->Form->input("Pass.secondaryFields.$i.Value", array('label' => false));?>
                            </div>
                            <? } ?>
                        </div>
                    </div>
                    <div>
                        <label>Auxiliary Fields: </label>
                        <button type="button" class="k-button dynamicFields" data-target="#auxiliaryFieldsContainer">Add
                        </button>
                        <div class="<?=empty($this->data['Pass']['auxiliaryFields']) ? 'hide' : ''?>" id="auxiliaryFieldsContainer">
                            <? for ($i=0; $i < 6; $i++) { ?>
                            <div class="<?=empty($this->data['Pass']['auxiliaryFields'][$i]) ? 'hide' : ''?> inner">
                                <label>Label:</label>
                                <?=$this->Form->input("Pass.auxiliaryFields.$i.Label", array('label' => false));?>
                                <label>Value:</label>
                                <?=$this->Form->input("Pass.auxiliaryFields.$i.Value", array('label' => false));?>
                            </div>
                            <? } ?>
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
                    <label>Back Fields: </label>
                    <button type="button" class="k-button dynamicFields" data-target="#backFieldsContainer">Add
                    </button>
                    <div class="<?=empty($this->data['Pass']['backFields']) ? 'hide' : ''?>" id="backFieldsContainer">
                        <? for ($i=0; $i < 5; $i++) {?>
                        <div class="<?=empty($this->data['Pass']['backFields'][$i]) ? 'hide' : ''?> inner">
                            <label>Label:</label>
                            <?=$this->Form->input("Pass.backFields.$i.Label", array('label' => false));?>
                            <label>Value:</label>
                            <?=$this->Form->input("Pass.backFields.$i.Value", array('label' => false));?>
                        </div>
                        <? } ?>
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
                <a class="k-button" href="javascript:void(0);"
                   data-href="/pass/generate_pass/<?=$this->data['Pass']['id']?>"
                   id="generateBtn">Generate Pass</a>
                <div id="window">
                    <?=$this->Form->create(null, array('id'=>'PassGenerateForm', 'url' => '/Pass/generate_pass/' . $this->data['Pass']['id']));?>
                    <?=$this->Form->input('email', array('name' => 'data[email]','label' => false, 'placeholder' => 'Email to send')); ?>
                    <p class="error"></p>
                    <?=$this->Form->end(array('label'=>'Generate', 'class'=> 'k-button'));?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="simulator">
    <?php echo $this->element('simulator/event'); ?>
</section>
</div>

<?
echo $this->Html->script('colorpicker.js');
echo $this->Html->css('colorpicker/colorpicker.css');
?>

<script>
    $(document).ready(function () {
        var tabNumber = parseInt('<?=$step?>');
        var $tabToActivate = $('#tab' + tabNumber);
        $('#tabstrip').data('kendoTabStrip').activateTab($tabToActivate);

        $('.imageUpload').each(function () {
            var $this = $(this);
            $this.kendoUpload({
                async:{
                    saveUrl:"/pass/edit/<?=$this->data['Pass']['id']?>/",
                    removeUrl:"/pass/edit/<?=$this->data['Pass']['id']?>/?remove=" + encodeURIComponent($this.attr('name')),
                    autoUpload:true
                },
                multiple:false,
                success:function (e) {
                    var $target_img = $($this.attr('rel'));
                    if (e.response.success === true) $target_img.attr('src', '');
                    else $target_img.attr('src', e.response.success + '?' + Math.random());
                }
            });
        });

    });
</script>