<?php
include (dirname(dirname(__FILE__)).'/components/facebook_component.php');
$fb = new FacebookComponent();
$fb->logout();
$user = $fb->getUser();
$profile = $fb->profile();
var_dump($profile);
var_dump($_SESSION);
die('');

// save current user
setcookie('user_id', $user, null, '/');
setcookie('username', null, null, '/');
setcookie('login_method', 'facebook', null, '/');

?>
<html>
    <head>
        <title>

        </title>
    </head>

    <body>
        <?php if ($user): ?>
            <h1>You save logged in as <?php echo $profile['firstname'] . ' ' .$profile['lastname']?></h1>
        <?php else: ?>
            <h1>Login unsuccessful</h1>
        <?php endif; ?>

        <script type="text/javascript">
            window.close();
        </script>
    </body>

</html>