<style type="text/css">
    #forgotPasswordForm, .k-window-titlebar.k-header {
        -moz-box-sizing: content-box;
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
    }

    div.k-window {
        font-size: 12px;
    }

    #forgotPasswordForm  form {
        font-size: 10px;
    }
</style>
<div id="forgotPasswordForm">
    <form action="/users/send_password" method="post">
        <div class="row">
            <div class="large-12 columns">
                <div class="alert"></div>
                <div class="row collapse">
                    <label for="email">Enter your email address</label>

                    <div class="small-10 columns">
                        <input type="email" id="email" name="email" placeholder="e.g. myname@example.net"
                               required data-email-msg="Email format is not valid"/>
                    </div>
                    <div class="small-2 columns">
                        <button class="button prefix">Submit</button>
                    </div>
                </div>
            </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        var forgotPasswordForm = $("#forgotPasswordForm"),
            $alertDiv = forgotPasswordForm.find('.alert'),
            $theForm = forgotPasswordForm.find('form');

        $(".forgot_password").on('click', function (e) {
            e.preventDefault();
            forgotPasswordForm.data("kendoWindow").open().center();
        });

        var onClose = function () {
            $("#email").val('');
            $(".k-invalid-msg", forgotPasswordForm).remove();
            $alertDiv.hide();
        };

        if (!forgotPasswordForm.data("kendoWindow")) {
            forgotPasswordForm.kendoWindow({
                width: "600px",
                title: "Forgot Password",
                close: onClose,
                open: onClose,
                visible: false,
                modal: true,
                draggable: false,
                resizable: false
            });
        }

        var validator = $theForm.kendoValidator().data("kendoValidator");

        $theForm.submit(function () {
            return validator.validate();
        });

        $theForm.ajaxForm({
            before: function () {
                $alertDiv.hide();
            },
            success: function (resp) {

                resp = $.parseJSON(resp);

                if (resp.error !== undefined) {
                    $alertDiv.removeClass('success alert-box').addClass('alert-box alert').show().html(resp.error);
                } else {
                    $alertDiv.removeClass('alert-box alert').addClass('success alert-box').show().html(resp.success);
                }

            }
        });
    });
</script>