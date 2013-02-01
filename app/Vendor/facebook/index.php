<?php
include (dirname(__FILE__).'/components/facebook_component.php');

$fb = new FacebookComponent();
$fb->login();

