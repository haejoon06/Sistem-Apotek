<?php
// require_once 'core/Router.php';
// require_once 'core/App.php';
// require_once 'core/Controller.php';
// require_once 'core/Model.php';
// require_once 'config/config.php';

spl_autoload_register(function( $class ){
    require_once 'core/'. $class .'.php';
    require_once 'config/config.php';
});