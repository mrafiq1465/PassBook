<?php
include (dirname(dirname(__FILE__)).'/components/facebook_component.php');

$fb = new FacebookComponent();
var_dump($_SESSION);
var_dump($_COOKIE);
var_dump($fb);
$user = $fb->getUser();
$profile = $fb->profile();

var_dump($fb->sdk->getAccessToken());
var_dump($user);
var_dump($profile);
// save current user
setcookie('fb_user_id', $user, null, '/');
setcookie('fb_name', $profile['name'], null, '/');
setcookie('fb_login', true, null, '/');

?>
<html>
    <head>
        <title>

        </title>
    </head>

    <body>
        <?php if ($user): ?>
            <h1>You save logged in as <?php echo $profile['first_name'] . ' ' .$profile['last_name']?></h1>
        <?php else: ?>
            <h1>Login unsuccessful</h1>
        <?php endif; ?>

        <script type="text/javascript">
            //window.close();
        </script>
    </body>

</html>
