<?php
namespace core\lib;


class deploy {
    static  public  $conf=array();
    static  public  function  get($name,$file){
        if(!isset(self::$conf[$file])){
            $filePath=KOLTER.'\core\config\\'.$file.'.php';
            if(is_file($filePath)){
                $conf=include  $filePath;
                if(isset($conf[$name])){
                    self::$conf[$file]=$conf;
                    return $conf[$name];
                }else{
                    throw  new \Exception('没有此配置项');
                }
            }else {
                throw  new \Exception('找不到配置文件');
            }
        }else{
           return self::$conf[$file][$name];
        }
    }
}