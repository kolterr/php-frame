<?php
/**
 * Created by PhpStorm.
 * User: wangy
 * Date: 2017/10/30
 * Time: 16:26
 */
namespace core\lib;
use \core\lib\deploy;
class  log{
    static  $class;
    static  public  function  init(){
        $driver=deploy::get('driver','log');
        $class='\core\lib\driver\log\\'.$driver;
        self::$class=new $class();
    }

    static  public  function  log($name,$file='log'){
        self::$class->log($name,$file);
    }
}