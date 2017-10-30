<?php

/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('KOLTER',realpath('./'));
define('CORE',KOLTER.'/core');
define('APP',KOLTER.'/app');
define('App','app');
define('DEBUG',true);
if(DEBUG){
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}
include CORE.'/common/function.php';
include CORE.'/kolter.php';
spl_autoload_register('\core\kolter::load');
\core\kolter::run();