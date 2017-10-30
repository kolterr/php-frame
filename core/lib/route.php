<?php
namespace core\lib;
use \core\lib\deploy;
class route{
    public $ctrl;
    public $action;
    public function __construct(){
       /**
        * 1.隐藏index.php
        * 2.获取url 获取参数部分
        * 3.返回对应控制器和方法
        */
        if(isset($_SERVER['REQUEST_URI'])&&$_SERVER['REQUEST_URI']!='/'){
            $path=$_SERVER['REQUEST_URI'];
            $pathArray=explode('/',trim($path,'/'));
            if(isset($pathArray[0])){
                $this->ctrl=$pathArray[0];
            }
            unset($pathArray[0]);
            if(isset($pathArray[1])){
                $this->action=$pathArray[1];
                unset($pathArray[1]);
            }else{
                $this->action='index';
            }
            $count=count($pathArray)+2;
            $i=2;
            while($i<$count){
                if(isset($pathArray[$i+1])){
                    $_GET[$pathArray[$i]]=$pathArray[$i+1];
                }
                $i=$i+2;
            }
        }else{
            $this->ctrl=deploy::get('controller','route');
            $this->action=deploy::get('action','route');
        }
   }
}