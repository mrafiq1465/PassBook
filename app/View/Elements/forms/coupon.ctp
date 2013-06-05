<? /**
 * @var $this View
 */
$options = array(
    'div' => 'large12 columns'
);

?>
<style type="text/css">
    #primaryFieldsContainer .close {
        display: none;
    }
    .input.file, .row-image {
        margin: 5px 0;
    }
    .row-image img {
        width: 30%;
    }
    .primary_fields {
        background-size: 100% auto !important;
    }
</style>
<script type="text/javascript">
    PassBook.data = <?= json_encode($this->data['Pass']) ?>;
</script>
<?php echo $this->element('pass/tabs/design_tab'); ?>


<div class="tab-pane">
    <input name="data[step]" value="2" type="hidden"/>
    <!--<div class="row-image">
        <?php /*if ($this->request->data['Pass']['iconImage']): */?>
            <img src="/<?/*= $this->request->data['Pass']['iconImage'] */?>" id="iconImg"/>
        <?php /*endif; */?>
        <?/*=$this->Form->input('iconImage', array('type' => 'file', 'rel' => '#iconImg', 'class' => 'imageUpload'));*/?>
    </div>

    <div class="row-image">
        <?php /*if ($this->request->data['Pass']['iconImageRetina']): */?>
            <img src="/<?/*= $this->request->data['Pass']['iconImageRetina'] */?>" id="iconImgRetina"/>
        <?php /*endif; */?>
        <?/*=$this->Form->input('iconImageRetina', array('type' => 'file', 'rel' => '#iconImgRetina', 'class' => 'imageUpload'));*/?>
    </div>

    <div class="row-image">
        <?php /*if ($this->request->data['Pass']['logoImage']): */?>
            <img src="/<?/*= $this->request->data['Pass']['logoImage'] */?>" id="logoImg"/>
        <?php /*endif; */?>

        <?/*=$this->Form->input('logoImage', array('type' => 'file', 'rel' => '#logoImg', 'class' => 'imageUpload'));*/?>
    </div>-->

    <div class="row-image">
        <h2>Header</h2>
        <?php if ($this->request->data['Pass']['logoImageRetina']): ?>
            <img src="/<?= $this->request->data['Pass']['logoImageRetina'] ?>" id="logoImgRetina"/>
        <?php endif; ?>

        <?=$this->Form->input('logoImageRetina', array('type' => 'file', 'rel' => '#logoImgRetina', 'class' => 'imageUpload',
            'label' => 'Upload your logo (PNG file, max 60 pixels high, any width)'));?>
        <?=$this->Form->input('headerText', array('data-bind' => "value: pass.headerText", 'data-value-update' => "keyup"));?>
    </div>

    <!--<div class="row-image">
        <?php /*if ($this->request->data['Pass']['stripImage']): */?>
            <img src="/<?/*= $this->request->data['Pass']['stripImage'] */?>" id="stripImg"/>
        <?php /*endif; */?>

        <?/*=$this->Form->input('stripImage', array('type' => 'file', 'rel' => '#stripImg', 'class' => 'imageUpload'));*/?>
    </div>-->

    <div class="row-image">
        <h2>Strip Image</h2>
        <?php if ($this->request->data['Pass']['stripImageRetina']): ?>
            <img src="/<?= $this->request->data['Pass']['stripImageRetina'] ?>" id="stripImgRetina"/>
        <?php endif; ?>

        <?=$this->Form->input('stripImageRetina', array('type' => 'file', 'rel' => '#stripImgRetina',
            'class' => 'imageUpload',
            'label' => 'Upload a strip image (PNG file, will be resized to 623 x 200)'
        ));?>
    </div>

    <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step2Form')); ?>
    <?//=$this->Form->input('logoText', array('data-bind' => "value: pass.logoText", 'data-value-update'=>"keyup"));?>

    <script id="field-tpl" type="text/x-kendo-template">
        <div class="pf"><a data-bind="click:removeField"
                           href="javascript:void(0)" class="close">X</a>
        <label>Heading</label>
        <input data-bind="value:Label, attr:{name:getLabel}" data-value-update="keyup" placeholder="My Offer Is:" type="text"/>
        <label>Message</label>
        <input data-bind="value:Value, attr:{name:getValue}" data-value-update="keyup" placeholder="Type your offer here!" type="text"/></div>
    </script>

    <script id="field-tpl-p" type="text/x-kendo-template">
        <div class="pf"><a data-bind="click:removeField"
                           href="javascript:void(0)" class="close">X</a>
        <label>Strip image copy line 1 (optional)</label>
        <input data-bind="value:Label, attr:{name:getLabel}" data-value-update="keyup" type="text"/>
        <label>Strip image copy line 2 (optional)</label>
        <input data-bind="value:Value, attr:{name:getValue}" data-value-update="keyup" type="text"/></div>
    </script>
    <div>
        <div class="dynamicFieldsContainer" data-source="pass.primaryFields">

            <div id="primaryFieldsContainer"
                 data-template="field-tpl-p" data-bind="source: pass.primaryFields">
                <? //for ($i = 0; $i < 2; $i++) { ?>
                    <!--<div class="<?/*= empty($this->data['Pass']['primaryFields'][$i]) ? 'hide' : '' */?> inner">
                        <a href="javascript:void(0)" class="close">X</a>
                        <label>Label:</label>
                        <?/*=$this->Form->input("Pass.primaryFields.$i.Label", array('label' => false));*/?>
                        <label>Value:</label>
                        <?/*=$this->Form->input("Pass.primaryFields.$i.Value", array('label' => false));*/?>
                    </div>-->
                <? //} ?>
            </div>
        </div>
    </div>
    <div>
        <div class="dynamicFieldsContainer" data-source="pass.secondaryFields">
           <h2>Main Coupon Body</h2>
            <label>Your coupon offer content</label>
            <button data-bind="click:addSecondaryField" type="button" class="k-button dynamicFields" data-target="#secondaryFieldsContainer">Add
            </button>
            <div id="secondaryFieldsContainer" data-template="field-tpl" data-bind="source: pass.secondaryFields">
                <? //for ($i = 0; $i < 4; $i++) { ?>
                    <!--<div class="<?/*= empty($this->data['Pass']['secondaryFields'][$i]) ? 'hide' : '' */?> inner">
                        <a href="javascript:void(0)" class="close">X</a>
                        <label>Label:</label>
                        <?/*=$this->Form->input("Pass.secondaryFields.$i.Label", array('label' => false));*/?>
                        <label>Value:</label>
                        <?/*=$this->Form->input("Pass.secondaryFields.$i.Value", array('label' => false));*/?>
                    </div>-->
                <? //} ?>
            </div>
        </div>
    </div>
    <div>
        <div class="dynamicFieldsContainer" data-source="pass.auxiliaryFields">
            <!--label>Right hand side content: </label>
            <button data-bind="click:addAuxiliaryField" type="button" class="k-button dynamicFields" data-target="#auxiliaryFieldsContainer">Add
            </button>
            <div data-template="field-tpl" data-bind="source: pass.auxiliaryFields"
                 id="auxiliaryFieldsContainer"-->
                <? //for ($i = 0; $i < 5; $i++) { ?>
                    <!--<div class="<?/*= empty($this->data['Pass']['auxiliaryFields'][$i]) ? 'hide' : '' */?> inner">
                        <a href="javascript:void(0)" class="close">X</a>
                        <label>Label:</label>
                        <?/*=$this->Form->input("Pass.auxiliaryFields.$i.Label", array('label' => false));*/?>
                        <label>Value:</label>
                        <?/*=$this->Form->input("Pass.auxiliaryFields.$i.Value", array('label' => false));*/?>
                    </div>-->
                <? //} ?>
            <!--/div-->
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns text-right">
            <?php echo $this->Form->button('next step', array('type' => 'submit', 'class' => 'pb-btn')); ?>
        </div>
    </div>
    <?=$this->Form->end(); ?>

</div>
<div class="tab-pane">
    <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step3Form')); ?>
    <input name="data[step]" value="3" type="hidden"/>

    <div class="dynamicFieldsContainer" data-source="pass.backFields">
        <label>Back Fields: </label>
        <button style="margin-bottom: 10px;" data-bind="click:addBackField" type="button" class="k-button dynamicFields" data-target="#backFieldsContainer">Add
        </button>
        <div data-template="field-tpl" data-bind="source: pass.backFields"
            id="backFieldsContainer">
            <? //for ($i = 0; $i < 5; $i++) { ?>
                <!--<div class="<?/*= empty($this->data['Pass']['backFields'][$i]) ? 'hide' : '' */?> inner">
                    <a href="javascript:void(0)" class="close">X</a>
                    <label>Label:</label>
                    <?/*=$this->Form->input("Pass.backFields.$i.Label", array('label' => false));*/?>
                    <label>Value:</label>
                    <?/*=$this->Form->input("Pass.backFields.$i.Value", array('label' => false));*/?>
                </div>-->
            <? //} ?>
        </div>
    </div>
    <p class="error"></p>

    <div class="row">
        <div class="large-12 columns text-right">
            <?php echo $this->Form->button('next step', array('type' => 'submit', 'class' => 'pb-btn')); ?>
        </div>
    </div>
    <?=$this->Form->end(); ?>
</div>
<div class="tab-pane">
    <?=$this->Form->create(null, array('url' => '/pass/edit/' . $this->data['Pass']['id'], 'id' => 'step4Form')); ?>
    <input name="data[step]" value="4" type="hidden"/>
    <label>Barcode number (optional): </label>
    <?=$this->Form->input('barcode_format_id');?>

    <div style="margin-top: 10px;"><?=$this->Form->input('barcodeMessage');?></div>
    <p class="error"></p>
    <p>For Apple Passbook users you can choose to prompt the user on their lock screen when they are within 100 meters or closer of the location below. To find a lat/long, please click here (linked to <a target="_blank" href="http://www.latlong.net/">http://www.latlong.net/</a>)"</p>
    <label>Locations: </label>
    <button data-bind="click:addLocationField" type="button" class="k-button dynamicFields" data-target="#locationsContainer">Add
    </button>
    <div data-template="lfield-tpl" data-bind="source: pass.locations"
        id="locationsContainer">
        <script id="lfield-tpl" type="text/x-kendo-template">
            <div class="lf">
                <input placeholder='latitude, longitude'
                    data-bind="value:Value, attr:{name:getValue}" data-value-update="keyup" type="text"/>
            </div>
        </script>
        <? //for ($i = 0; $i < 10; $i++) { ?>
            <!--<div class="<?/*= empty($this->data['Pass']['locations'][$i]) ? 'hide' : '' */?> inner">
                <?/*=$this->Form->input("Pass.locations.$i.Value", array('label' => false, 'placeholder' => 'latitude, longitude'));*/?>
            </div>-->
        <? //} ?>
    </div>
    <p class="error"></p>

    <div class="row">
        <div class="large-12 columns text-right">
            <?php echo $this->Form->button('next step', array('type' => 'submit', 'class' => 'pb-btn')); ?>
        </div>
    </div>
    <?=$this->Form->end(); ?>
</div>
<div class="tab-pane">
    <div class="" id="AccountBlock">
        <? if (empty($user_data)) {
            echo $this->element('users/login');
        } else {
          echo $this->element('users/info');
           // echo $this->element('users/payment');
        }
        ?>
        <?//= $this->element('blocks/generate');?>
    </div>
</div>
<script>
    var PassType = "<?=$this->data['PassType']['id']; ?>";
    var PassId = "<?=$this->data['Pass']['id'];?>";
    $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
</script>