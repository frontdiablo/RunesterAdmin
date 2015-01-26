<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('PHP版本必须在 5.3.0 一以上才能运行本站 !');

define('ROOT_PATH','./');
define('ROOT','/');
define('APP_PATH','./Apps/');
define('APP_NAME','Apps');
define('APP_DEBUG',true);
define('RUNTIME_PATH',ROOT_PATH.'public/Runtime/');
require './Framework/ThinkPHP.php';
?>
