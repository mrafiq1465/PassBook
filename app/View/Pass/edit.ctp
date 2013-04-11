<div class="container" id="main-container">
    <div class="row phone-container">
        <div id="phone">
            <div class="phone-inner">
                <?php echo $this->element('simulator/event'); ?>
            </div>
        </div>
    </div>

    <section id="home-hero-unit" class="hero-unit">
        <div class="row">
            <div class="large-7 columns">
                <section id="pass-creation">
                    <div id="tabstrip">

                        <ul id="tab-nav">
                            <li id="tab1" class="k-state-active active"><a href="#">design</a></li>
                            <li id="tab2"><a href="#">content</a></li>
                            <li id="tab3"><a href="#">barcode</a></li>
                            <li id="tab4"><a href="#">your account</a></li>
                            <li id="tab5"><a href="#">DONE!</a></li>
                        </ul>

                        <?=$this->element('forms/' . $this->data['PassType']['name']);?>

                        <div id="k-window">
                            <p class="message"></p>
                            <button type="button" class="k-button">Get code</button>
                            <button type="button" class="k-button">Finalize</button>
                            <h6 class="">Do you want to set a download limit for this pass?</h6>
                            <? echo $this->Form->input('download_limit', array('placeholder' => 'Download limit', 'label' => FALSE, 'class' => 'input')); ?>
                            <?php echo $this->Form->end(array('id' => 'submit', 'label' => 'Submit'));?>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section class="app-body">
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
                async: {
                    saveUrl: "/pass/edit/<?=$this->data['Pass']['id']?>/",
                    removeUrl: "/pass/edit/<?=$this->data['Pass']['id']?>/?remove=" + encodeURIComponent($this.attr('name')),
                    autoUpload: true
                },
                multiple: false,
                success: function (e) {
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

        $('#tabstrip').data('kendoTabStrip').disable($('#tab6'));

        $(function () {

            function paymentFormProcess(){
                if ($('#PaymentForm').length) {
                    $('#PaymentForm').ajaxForm({
                        success: function(resp){
                            resp = $.parseJSON(resp);
                            if (resp.error !== undefined) {
                                $('#AccountBlock p.error').text(resp.error).show();
                            } else {
                                $('#AccountBlock').html('<p class="message">Your payment is good now, you can now go to next step.</p>');
                                $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
                            }
                        }
                    });
                }
            }
            paymentFormProcess();

            $('#UserLoginForm').ajaxForm({
                before: function () {
                    $('#AccountBlock p.error').hide();
                },
                success: function (resp) {
                    resp = $.parseJSON(resp);
                    if (resp.error !== undefined) {
                        $('#AccountBlock p.error').text(resp.error).show();
                    } else {
                        $('#AccountBlock p.error').hide();
                        //show next form
                        $.ajax({
                            url: '/pass/payment_status/' + PassId,
                            dataType: 'json',
                            success: function(resp) {
                                if (resp.result) {
                                    //paid then, what to do?
                                    $('#AccountBlock').html('<p class="message">Your payment is good now, you can now go to next step.</p>')
                                    $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
                                } else {
                                    $('#AccountBlock').load('/users/payment', function(){
                                        $('#PaymentPassId').val(PassId);
                                        paymentFormProcess();
                                    });
                                }
                            }
                        })
                    }
                }
            });
        });


    });
</script>