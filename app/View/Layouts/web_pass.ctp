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

    <?php

    echo $this->Html->meta(array("name" => "viewport",
        "content" => "width=device-width,  initial-scale=1.0"));

    // echo $this->Html->css('reset');
    //  echo $this->Html->css('kendo.common.min');
    // echo $this->Html->css('kendo.default.min');
    echo $this->Html->css('style.css' . ((Configure::read('debug') == 2) ? '?' . uniqid() : ''));
    echo $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon'));
    /*
            echo $this->Html->script(
                array(
                    'jquery-1.8.2.min.js',
                    'kendo.all.min.js',
                    'jquery.form.js',
                    'main.js' . ((Configure::read('debug') == 2) ? '?' . uniqid(): ''),
                ));
    */

    // echo $this->Html->css('style.css' . ((Configure::read('debug') == 2) ? '?' . uniqid(): ''));
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
            'kendo/kendo.all.min.js',
            'colorpicker.js',
            'main.js' . ((Configure::read('debug') == 2) ? '?' . uniqid() : ''),
        ));



    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    ?>
    <!--script src=" http://dev.kendoui/js/kendo.web.min.js"></script-->
</head>
<body>
<?php echo $this->fetch('content'); ?>
</body>
</html>