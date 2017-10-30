<?php
namespace core;

class kolter{
    static public $classMap=array();
    public  $assign=array();
    static public function run(){
        $route= new \core\lib\route();
        \core\lib\log::init();
        \core\lib\log::log($_SERVER);
        $ctrlClass=$route->ctrl;
        $action=$route->action;
        $fileName=APP.'/controller/'.$ctrlClass.'Controller.php';
        $class='\\'.App.'\controller\\'.$ctrlClass.'Controller';
        if (is_file($fileName)){
            include $fileName;
            $controller=new $class;
            $controller->$action();
        }else{
            throw new \Exception('没有找到控制器');
        }

    }
    static public function load($class){
        if (isset($classMap[$class])){
            return true;
        }else{
            $class=str_replace('\\','/',$class);
            $file=KOLTER.'/'.$class.'.php';
            if(is_file($file)){
                self::$classMap[$class]=$class;
                include $file;
            }else{
                return false;
            }
        }
    }

    public  function  assign($col,$val){
        $this->assign[$col]=$val;
    }

    public  function  display($file){
        $filePath=APP.'/views/'.$file;
        if(is_file($filePath)){
            extract($this->assign);
            include  $filePath;
        }
    }
}