
$(document).ready(function() {


    $("#menu").kendoMenu();
    $("#pass_type").kendoMenu();

    $('#resetPassword').click(function(e){
        var email = $('#email').val();
        $.ajax({
            type:"POST",
            url:'/users/send_password',
            data:{'data[email]':email },
            dataType:"json",
            success:function (json) {
                if (json.success !== undefined) {
                    $('#loginModal .modal-body .error').text(json.success).show();
                } else {
                    $('#loginModal .modal-body .error').text(json.error).show();
                }
            }
        });

    });

    var $tabStrip = $('#tabstrip');
    if($tabStrip.length) {
        var onSelect = function(e) {
            // access the selected item via e.item (Element)
            var tabNumber = $(e.item).attr('id').substr(3,1);
            var url;
            if(window.location.pathname.substr(-5).search(/step/) < 0) url = window.location.pathname + '/step'+ tabNumber;
            else url = window.location.pathname.replace(window.location.pathname.substr(-5), '') + 'step' + tabNumber;
            window.history.pushState(null, null, url);
        };
        $tabStrip.kendoTabStrip({
            animation:{
                open:{
                    effects:"fadeIn"
                }
            },
            select: onSelect
        });
        $("#PassBarcodeFormatId").kendoDropDownList();
        $('form[id^=step]').each(function(){
            var $form = $(this);
            $(this).ajaxForm({
                beforeSend: function(){
                    $form.find('.error').hide();
                },
                success:function (resp) {
                    try {
                        resp = $.parseJSON(resp);
                    } catch (ex) {
                        $form.find('.error').html(resp).show();
                        return;
                    }

                    if (resp.error !== undefined) {
                        //todo: show error somewhere
                        $form.find('.error').text(resp.error).show();
                    } else {
                        if (window.create_mode !== undefined && window.create_mode === true) {
                            window.location.href = '/pass/edit/' + resp.success.id + '/step2';
                            return;
                        }
                        var tabNumber = parseInt($form.attr('id').substr(4,1));
                        if(tabNumber !== 6) {
                            tabNumber++;
                            var $tabToActivate = $('#tab' + tabNumber);
                            $tabStrip.data('kendoTabStrip').activateTab($tabToActivate);
                            window.history.pushState(null, null, '/pass/edit/' + resp.success + '/step' + tabNumber)
                        }
                    }
                }
            });
        });

    }

    $('.template-background-image-ctrl').hover(function(){
        $('.template-background-image').eq($('.template-background-image-ctrl').index($(this))).toggle();
    });

    $('#backgroundColor, #foregroundColor, #labelColor').ColorPicker({
        onSubmit:function (hsb, hex, rgb, el) {
            $(el).val('rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')');
            $(el).ColorPickerHide();
        },
        onBeforeShow:function () {
            $(this).ColorPickerSetColor(this.value);
        }
    });


    $('.dynamicFields').click(function () {
        var $container = $($(this).attr('data-target'));
        $container.show();
        var $secondaryAuxiliaryCombinedVisible = $('#auxiliaryFieldsContainer .inner:visible, #secondaryFieldsContainer .inner:visible');

        if (PassType == 1) { //event
            if ($container.attr('id') == 'primaryFieldsContainer' && $container.find('.inner:hidden').length == 1) {
                return;
            } else if ($container.attr('id') == 'auxiliaryFieldsContainer' && $container.find('.inner:hidden').length == 1) {
                return;
            } else if ($('.switch > div').index($('.switch > div.on')) == 0) {
                if ($container.attr('id') == 'secondaryFieldsContainer' && $container.find('.inner:hidden').length == 3) {
                    return;
                }
            }
        } else if (PassType == 2) { //coupon
            if ($container.attr('id') == 'auxiliaryFieldsContainer' || $container.attr('id') == 'secondaryFieldsContainer') {
                if ($secondaryAuxiliaryCombinedVisible.length == 4) {
                    return;
                }
            } else if ($container.attr('id') == 'primaryFieldsContainer' && $container.find('.inner:hidden').length == 1) {
                return;
            }
        } else if (PassType == 3) { //boarding or transport
            //no rules whatsoever as its designed to get max values for this type
        } else if (PassType == 4) { //generic
            if ($container.attr('id') == 'primaryFieldsContainer' && $container.find('.inner:hidden').length == 1) {
                return;
            } else if ($('#PassBarcodeFormatId').val() == '2') { //suppose its square typed barcode
                if ($secondaryAuxiliaryCombinedVisible.length == 3) {
                    return;
                }
            }
        } else if (PassType == 5) {
            if ($container.attr('id') == 'primaryFieldsContainer' && $container.find('.inner:hidden').length == 1) {
                return;
            } else if ($secondaryAuxiliaryCombinedVisible.length == 4) {
                return;
            }
        }
        $container.find('.inner:hidden').eq(0).show();
    });

    $('.dynamicFieldsContainer a.close').click(function(){
        $(this).parent().hide().find('input').val('');
    });

    var $window = $("#window"),
        undo = $("#generateBtn")
            .bind("click", function() {
                $window.data("kendoWindow").open().center();
                undo.hide();
            });
    var $PassGenerateForm = $('#PassGenerateForm');

    var onClose = function() {
        undo.show();
    };

    var onOpen = function() {
        $PassGenerateForm.find('.error').text('');
    };

    if (!$window.data("kendoWindow")) {
        $window.kendoWindow({
            width: "600px",
            title: "Pass Generate",
            close: onClose,
            open: onOpen,
            visible: false,
            modal: true
        });
    }

    var $kWindow = $('#k-window');
    if (!$kWindow.data("kendoWindow")) {
        $kWindow.kendoWindow({
            width: "600px",
            title: "Are you sure?",
            visible: false,
            modal: true
        });
    }

    $kWindow.find('button').eq(1).click(function(){
        $kWindow.data('kendoWindow').close();
    });

    $kWindow.find('button').eq(0).click(function(){
        var switchDivs = $('.switch > div');
        switchDivs.find('.imageUpload').each(function(){
            var $this = $(this);
            $.ajax({
                url: $this.data('kendoUpload').options.async.removeUrl,
                type: 'post',
                success: function(e) {
                    e = $.parseJSON(e);
                    e.response = e;
                    $this.data('kendoUpload').options.success(e);
                }
            });
        });
        switchDivs.hide().removeClass('on');
        switchDivs.eq(window.switchButtonIndex).show().addClass('on');
        $kWindow.data('kendoWindow').close();
    });



    $PassGenerateForm.ajaxForm({
        success: function(resp) {
            try {
                resp = $.parseJSON(resp);
            } catch (ex) {
                $PassGenerateForm.find('.error').html(resp).show();
                return;
            }
            if (resp.error !== undefined) {
                //todo: show error somewhere
                $PassGenerateForm.find('.error').text(resp.error).show();
            } else {
                $PassGenerateForm.find('.error').text('').hide();
                $window.data("kendoWindow").close();
            }
        }
    });








});