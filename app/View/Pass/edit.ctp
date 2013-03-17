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
            <?=$this->element('forms/' . $this->data['PassType']['name']);?>
            <div id="k-window">
                <p class="message"></p>
                <button type="button" class="k-button">OK</button>
                <button type="button" class="k-button">Cancel</button>
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