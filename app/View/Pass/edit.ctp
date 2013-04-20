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
                                    <a target="_blank" href="/pass/web_pass/<?=$this->data['Pass']['id']?>" class="pb-btn">Get code</a>
                                </div>
                            </div>

                            <h3>Set download limit</h3>
                            <p class="done_error"></p>
                            <?=$this->Form->create('User', array('url' => '/pass/update_download_limit', 'id' => 'UpdateDownloadLimit'))?>
                            <div class="row">
                                <div class="large12 columns">
                                    <input type="hidden" name="data[pass_id]" value="<?=$this->data['Pass']['id']?>"/>
                                    <input type="text" id="UserLimit" class="input" placeholder="Download limit" name="data[limit]">
                                </div>
                            </div>

                            <div class="row">
                                <div class="large-12 columns">
                                    <?php echo $this->Form->button('Update', array('type' => 'submit', 'class' => 'pb-btn medium')); ?>
                                </div>
                            </div>
                            <?=$this->Form->end(); ?>

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
                    var rel = $this.attr('rel');
                    var $target_img = $(rel);
                    if (!$target_img.length) {
                        $target_img = $("<img/>", {
                            id: rel.replace('#', '')
                        }).insertBefore($this.parents('.file'));
                    }
                    if (e.response.success === true) $target_img.attr('src', '');
                    else {
                        var src = e.response.success + '?' + Math.random();
                        if (rel === '#logoImg') {
                            PassBook.CouponViewModel.set('logoImage', src);
                        } else if (rel === '#stripImg') {
                            PassBook.CouponViewModel.set('pass.stripImage', src);
                        }
                        $target_img.attr('src', src);
                    }
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
                        update_pass_user(resp.user_id,PassId);
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
                                    });
                                }
                            }
                        })
                    }
                }
            });

            $('#UpdateDownloadLimit').ajaxForm({
                before: function () {
                    $('p.done_error').hide();
                },
                success: function (resp) {
                    resp = $.parseJSON(resp);

                    if (resp.error !== undefined) {
                        $('p.done_error').text(resp.error).show();
                    }
                    else {
                        $('p.done_error').html('<p class="message">Download limit has been set.</p>')
                    }
                }
            });

            function  update_pass_user(user_id,pass_id){
                $.ajax({
                    type: "POST",
                    url: "/pass/update_pass_user",
                    data: {'user_id': user_id, 'pass_id': pass_id},
                    success: function (resp) {
                        resp = $.parseJSON(resp);
                    }
                });
            }

        });
    });
</script>