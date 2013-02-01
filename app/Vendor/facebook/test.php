<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>php-sdk</title>
</head>
<body>

<?php
include (dirname(__FILE__).'/components/facebook_component.php');
$fb = new FacebookComponent();
$user = $fb->getUser();
if ($user) {
    // $me = $fb->profile();
}
else $me = null;

var_dump($user);

?>
<?php if ($me): ?>
    <?php echo "Welcome, ".$me['first_name']. ".<br />"; ?>
<a id="logout" href="<?php echo $fb->getLogoutUrl(); ?>">
    <img src="https://graph.facebook.com/<?php echo $user ?>/picture/">
</a>
    <?php else: ?>
<a id="login" href="<?php echo $fb->getLoginUrl(); ?>">
    <img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
</a>
    <?php endif ?>
</body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="http://cachedcommons.org/cache/jquery-cookie/0.0.0/javascripts/jquery-cookie-min.js"></script>
<script type="text/javascript">
(function($) {
    var win;

    $.window = function(url, options) {

        if (win) {
            alert('Another popup window already displayed');
            return;
        }

        options = $.extend(true, {}, {
            onClose : null,
            onOpen  : null,
            poll    : 1000,
            window  : {
                options: 'menubar=no,toolbar=no,resizable=yes,width=600,height=400',
                name: '_blank'
            }
        }, options);


        var win = window.open(url, options.window.name, options.window.options);

        var timer;
        function is_closed(){
            if (win && win.closed) {
                clearInterval(timer);
                if ($.isFunction(options.onClose)) {
                    options.onClose();
                }
                win = null;
            }

        }

        timer = setInterval(is_closed, options.poll);
    };
}) (jQuery);

    $(function(){
        $('#login').click(function(e) {
            $.window($(this).attr('href'), {
                onClose: function() {
                    if ($.cookie('fb_user_id')) {
                        $(document).trigger('social-login.facebook');
                    }
                }
            });

            e.preventDefault();
            return false;
        });

        $(document).bind('social-login.facebook', function() {
            // alert facebook login complete
            console.log($.cookie('fb_user_id'));
            console.log($.cookie('fb_name'));
        });

    });
</script>
</html>

