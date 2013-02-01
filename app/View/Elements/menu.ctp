<?php
$action     = $this->params['action'];
$controller = $this->params['controller'];

$items = array(
    array(
        'action'     => 'add',
        'controller' => 'users',
        'title'      => 'New User'
    ),
    array(
        'action'     => 'index',
        'controller' => 'users',
        'title'      => 'Manage Users'
    ),
    array(
        'action'     => 'add',
        'controller' => 'companies',
        'title'      => 'New Client'
    ),
    array(
        'action'     => 'index',
        'controller' => 'companies',
        'title'      => 'Manage Clients'
    ), array(
        'action'     => 'add',
        'controller' => 'events',
        'title'      => 'New Event'
    ), array(
        'action'     => 'index',
        'controller' => 'events',
        'title'      => 'Manage Events'
    )
)
?>
<section id="topheader" class="clearfix">
    <ul id="main-nav" class="nav pull-right nav-tabs">
        <?php
        foreach ($items as $item) {
            $c = $item['controller'];
            $a = $item['action'];
            $t = $item['title'];
            
            $astr = ($a === "index") ? '' : $a . "/";
            
            $url = "/". $c . "/" . $astr;
            
            $active = ($c === $controller) && ($a === $action) ? 'active' : '';
            echo "<li class='$active'><a href='$url'>$t</a></li>";
        }
        ?>
             
    </ul>
    <h3><?= $heading; ?></h3>
</section>
