
<?php echo $this->Html->docType('html5');?>

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

      echo $this->Html->meta(array("name"    => "viewport",
                                 "content" => "width=device-width,  initial-scale=1.0"));

        echo $this->Html->css('reset');
        echo $this->Html->css('kendo.common.min');
        echo $this->Html->css('kendo.default.min');
        echo $this->Html->css('style');
        echo $this->Html->meta('favicon.ico','/favicon.ico', array('type' => 'icon'));

        echo $this->Html->script(
            array(
                'jquery-1.8.2.min.js',
                'kendo.all.min.js',
                'main.js'
            ));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>

</head>
<body>
<?php echo $this->element('menu'); ?>
<div id="container" class="k-content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>

        <footer id="footer">
        </footer>
	</div>
</body>
</html>
