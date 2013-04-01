<section class="app-body">
    <div class="row">
        <div class="large-7 columns">
            <h3>Create a pass in under 5 mins</h3>

            <div id="tabstrip">
                <ul>
                    <li class="k-state-active" id="tab1">
                        design
                    </li>
                    <li id="tab2">
                        front
                    </li>
                    <li id="tab3">
                        back
                    </li>
                    <li id="tab4">
                        configuration
                    </li>
                    <li id="tab5">
                        your account
                    </li>
                    <li id="tab6">
                        DONE!
                    </li>
                </ul>
                <?=$this->element('forms/' . $this->data['PassType']['name']);?>
                <div id="k-window">
                    <p class="message"></p>
                    <button type="button" class="k-button">Get code</button>
                    <button type="button" class="k-button">Finalize</button>
                </div>
            </div>
        </div>
        <div class="large-5 columns">
            <div class="simulator">
                <?php echo $this->element('simulator/event'); ?>
            </div>
        </div>
    </div>
</section>

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

        var $kWindow = $('#k-window');
        $('.switch-btn').click(function () {
            window.switchButtonIndex = $('.switch-btn').index($(this));
            var switchDivs = $(this).nextAll('div');
            var switchDivsOn = $(this).nextAll('div.on');
            if (window.switchButtonIndex == switchDivs.index(switchDivsOn)) {
                return;
            }
            $kWindow.data("kendoWindow").open().center();
            $kWindow.find('p').text(switchDivsOn.find('p.message').text());
        });

    });
</script>