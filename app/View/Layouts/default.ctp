<? /**
 * @var $this View
 */
?>
<?php echo $this->Html->docType('html5'); ?>

<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>

    <title><?php echo $title_for_layout; ?></title>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <!--script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script-->
    <![endif]-->
    <!--  meta info -->

    <link rel="stylesheet" type="text/css" href="http://www.google.com/fonts#UsePlace:use/Collection:Montserrat+Alternates:400,700">
    <?php

    echo $this->Html->meta(array("name"    => "viewport",
                                 "content" => "width=device-width,  initial-scale=1.0"));

    // echo $this->Html->css('reset');
    echo $this->Html->css('kendo.common.min');
    echo $this->Html->css('kendo.default.min');
    echo $this->Html->css('style.css' . ((Configure::read('debug') == 2) ? '?' . uniqid() : ''));
    echo $this->Html->css('normalize');
    echo $this->Html->css('app');
    echo $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon'));

    echo $this->Html->script(
        array(
            'jquery.js',
            'jquery.form.js',
            'custom.modernizr.js',
            'foundation/foundation.js',
            'foundation/foundation.alerts.js',
            'foundation/foundation.clearing.js',
            'foundation/foundation.cookie.js',
            'foundation/foundation.section.js',
            'foundation/foundation.tooltips.js',
            'foundation/foundation.topbar.js',
            'kendo/kendo.all.min.js',
            'history.min.js',
            'main.js' . ((Configure::read('debug') == 2) ? '?' . uniqid() : ''),
        ));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<section id="mainbody">
    <?php echo $this->element('menu'); ?>
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>

</section>
<div id="main-footer">
    <div class="row collapse">
        <div class="large-6 columns">
            <ul class="social">
                <li>
                    <span>&copy; flydigital pty ltd 2013</span>
                </li>
                <li>
                    <a href="#"><img src="/img/bird.png"></a>
                </li>
                <li>
                    <a href="#"><img src="/img/facebook.png"></a>
                </li>
            </ul>
        </div>
        <div class="large-6 columns text-right">
            <ul class="right">
                <li>
                    <a href="#"><img id="lock" src="/img/lock.png"></a>
                </li>
                <li>
                    <a href="#"><img id="mastercard" src="/img/mastercard.png"></a>
                </li>
                <li>
                    <a href="#"><img id="visa" src="/img/visa.png"></a>
                </li>
                <li>
                    <a href="#"><img id="paypal" src="/img/paypal.png"></a>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
