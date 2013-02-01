<?php
$options = array(
    'type'          => 'file',
    'inputDefaults' => array(
        'label' => false,
        'div' => false
    )
);
?>

<section class="list">
    <!--Menu-->
    <?=$this->element('menu', array("heading" => "Edit Event"));?>

    <? echo $this->Form->create('Event', $options); ?>
    <fieldset class="controlGroup">
        <h4>Event Details</h4>
        <div class="control-group row">
            <div class="span4">
                <? echo $this->Form->input('name', array('label' => false, 'div' => false,'placeholder' => 'Event Name', 'class' => 'span4')); ?>
            </div>
            <div class="span7">
                <? if (!empty($this->data['Event']['img_thumb'])) { ?>
                <img src="<?=$this->data['Event']['img_thumb']?>" data-name="img_thumb" style="max-height: 100px;">
                <a href="javascript:void(0);" data-name="img_thumb" class="delete_image"></a><br>
                <? } ?>
                <? echo $this->Form->file('img_thumb', array('class' => 'span5')); ?>
                <a data-content="- Image Dimentions: <br>- Image Type: JPG, GIF."
                   data-placement="bottom" rel="popover" class="pop" href="#"
                   data-original-title="Image Requirements">
                    <i class="icon-question-sign"></i>
                </a>
            </div>
        </div>
        <div class="control-group">
            <? echo $this->Form->input('gpslat', array('div' => false,'placeholder' => 'Latitude', 'class' => 'span2')); ?>
            <? echo $this->Form->input('gpslong', array('div' => false,'placeholder' => 'Longitude', 'class' => 'span2')); ?>
        </div>
        <div class="control-group row">
            <div class="span4">
                <div class="control-group">
                    <input name="data[Event][date_start]" value="<?=$this->data['Event']['date_start']?>" type="date" placeholder="Start Date" class="span4" />
                </div>
                <div class="control-group">
                    <input name="data[Event][date_end]" value="<?=$this->data['Event']['date_end']?>" type="date" placeholder="End Date" class="span4" />
                </div>
            </div>
            <div class="span7">
                <?= $this->Form->textarea('shortdescription', array('placeholder' => 'Description (60 character Limit)', 'class' => 'span7','row' => 2 ));?>
            </div>


        </div>
        <div class="control- row">
            <div class="span4">
                <div class="control-group">
                    <?=$this->Form->input('eventtype', array('options' => array('generic' => 'Generic', 'location-based' => 'Location-based'), 'default' => 'generic'));
                    ?>
                </div>
                <div class="control-group">
                    <? echo $this->Form->input('company_id'); ?>
                </div>
            </div>
            <div class="span7">
                <? if (!empty($this->data['Event']['public_logo'])) { ?>
                <img src="<?=$this->data['Event']['public_logo']?>" data-name="public_logo" style="max-height: 100px;">
                <a href="javascript:void(0);" data-name="public_logo" class="delete_image"></a><br>
                <? } ?>
                <? echo $this->Form->file('public_logo', array('class' => 'span5')); ?>
                <a data-content="- Image Dimentions: <br>- Image Type: JPG, GIF."
                   data-placement="bottom" rel="popover" class="pop" href="#"
                   data-original-title="Image Requirements">
                    <i class="icon-question-sign"></i>
                </a>
                <br />
                <?= $this->Form->textarea('public_description', array('placeholder' => 'Public Description', 'class' => 'span7','row' => 2 ));?>

            </div>
        </div>

    </fieldset>
    <fieldset class="controlGroup">
        <h4>Overlay Images <span>(maximum 5)</span></h4>
        <a data-content="- Image Dimentions: <br>- Image Type: JPG, GIF."
           data-placement="bottom" rel="popover" class="pop" href="#"
           data-original-title="Image Requirements">
            <i class="icon-question-sign"></i>
        </a>
        <? for ($i = 1; $i <= 5; $i++) { ?>
        <? if (!empty($this->data['Event']["img_overlay_$i"])) { ?>
            <img src="<?=$this->data['Event']["img_overlay_$i"]?>" data-name="<?="img_overlay_$i"?>"
                 style="max-height: 100px;">
            <a href="javascript:void(0);" data-name="<?="img_overlay_$i"?>" class="delete_image"></a><br>
            <? } ?>
        <? if($i <=2) { ?>
            <? echo $this->Form->file("img_overlay_$i"); ?><br>
            <? } ?>
        <? } ?>
        <a href="javascript:void(0);" id="add_more_image" class="pull-right"></a>
    </fieldset>
    <fieldset class="controlGroup">
        <h4>Auto Moderate</h4>

        <div class="switch pull-right">
            <input type="radio" checked="checked" id="auto_moderate_on" value="1" name="data[Event][auto_moderate]" class="switch-input">
            <label class="switch-label switch-label-off" for="auto_moderate_on">On</label>
            <input type="radio" id="auto_moderate_off" value="0" name="data[Event][auto_moderate]" class="switch-input">
            <label class="switch-label switch-label-on" for="auto_moderate_off">Off</label>
            <span class="switch-selection"></span>
        </div>

    </fieldset>
    <fieldset class="controlGroup controls-row">
        <h4>Social Media</h4>
        <?= $this->Form->input('facebook_msg', array('placeholder' => 'Facebook Message: maxlength 420 chars','label' => false, 'div' => false, 'class' => 'span6')); ?>
        <?= $this->Form->input('facebook_url', array('placeholder' => 'Facebook Link','label' => false, 'div' => false, 'class' => 'span5')); ?>
        <?= $this->Form->input('twitter_msg', array('placeholder' => 'Twitter Message: maxlength 120 chars','label' => false, 'div' => false, 'class' => 'span6')); ?>
    </fieldset>
    <fieldset class="controlGroup">
        <h4>HTML Before Upload</h4>
        <?= $this->Form->textarea('html_before', array('placeholder' => 'HTML Before', 'class' => 'span6','row' => 2 ));?>
        <div class="switch pull-right">
            <input type="radio" checked="checked" id="html_before_on" value="1" name="data[Event][html_before_on]" class="switch-input">
            <label class="switch-label switch-label-off" for="html_before_on">On</label>
            <input type="radio" id="html_before_off" value="0" name="data[Event][html_before_on]" class="switch-input">
            <label class="switch-label switch-label-on" for="html_before_off">Off</label>
            <span class="switch-selection"></span>
        </div>
    </fieldset>
    <fieldset class="controlGroup">
        <h4>HTML After Upload</h4>
        <?= $this->Form->textarea('html_after', array('placeholder' => 'HTML After', 'class' => 'span6', 'row' => 2 ));?>
        <div class="switch pull-right">
            <input type="radio" checked="checked" id="html_after_on" value="1" name="data[Event][html_after_on]" class="switch-input">
            <label class="switch-label switch-label-off" for="html_after_on">On</label>
            <input type="radio" id="html_after_off" value="0" name="data[Event][html_after_on]" class="switch-input">
            <label class="switch-label switch-label-on" for="html_after_off">Off</label>
            <span class="switch-selection"></span>
        </div>
    </fieldset>
    <fieldset class="controlGroup">
        <h4>Terms & Conditions</h4>
        <?= $this->Form->textarea('t_c', array('placeholder' => 'Terms and Conditions', 'class' => 'span6', 'row' => 2 ));?>
    </fieldset>
    <fieldset class="controlGroup">
        <h4>Event Status</h4>
        <? echo $this->Form->select('stage', array('' => '---Select Status---', 'Scheduled' => 'Scheduled', 'Draft' => 'Draft')); ?>
    </fieldset>
    <? echo $this->Form->end(array('class' => 'btn btn-primary', 'label' => 'Update',)); ?>

</section>
