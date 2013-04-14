<div class="container" id="main-container">
    <div class="row phone-container">
        <div id="phone">
            <div class="phone-inner">
                <?php echo $this->element('simulator/coupon'); ?>
            </div>
        </div>
    </div>

    <section id="home-hero-unit" class="hero-unit">
        <div class="row">
            <div class="large-7 columns">
                <section id="pass-creation">
                    <div id="tabstrip">

                        <?php echo $this->element('pass_create_menu'); ?>

                        <?=$this->element('forms/' . $this->data['PassType']['name']);?>

                        <div id="k-window">
                            <p class="message"></p>

                            <div class="row" style="margin-bottom:10px;">
                                <div class="large12 columns">
                                    <button style="margin-right: 20px" type="button" class="pb-btn">Get code</button>
                                    <button type="button" class="pb-btn">Finalize</button>
                                </div>
                            </div>

                            <h6 class="">Do you want to set a download limit for this pass?</h6>
                            <? echo $this->Form->input('download_limit', array('placeholder' => 'Download limit', 'label' => FALSE, 'class' => 'input')); ?>
                            <div class="row">
                                <div class="large-12 columns text-right">
                                    <?php echo $this->Form->button('submit', array('type' => 'submit', 'class' => 'pb-btn')); ?>
                                </div>
                            </div>
                            <?=$this->Form->end(); ?>
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

            $('#UserPaymentForm').ajaxForm({
                before: function () {
                    $('#AccountBlock p.error').hide();
                },
                success: function(resp){
                     resp = $.parseJSON(resp);
                        if (resp.error !== undefined) {
                                $('#AccountBlock p.error').text(resp.error).show();
                        } else {
                                $('#AccountBlock').html('<p class="message">Payment has been made successfully.</p>');
                                $('#tabstrip').data('kendoTabStrip').enable($('#tab6'));
                        }
                }
            });

            $('#register_btn_block').click(function(e){
                $('#AccountBlock p.error').hide();
                $('#AccountBlock').load('/users/add', function(){
                });
                e.preventDefault();
            });

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
                                        //paymentFormProcess();
                                    });
                                }
                            }
                        })
                    }
                }
            });

            $('#UserRegistrationForm').ajaxForm({
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
                        $('#AccountBlock').load('/users/payment', function(){
                            $('#PaymentPassId').val(PassId);
                           // paymentFormProcess();
                        });

                    }
                }
            });

        });


    });
</script>