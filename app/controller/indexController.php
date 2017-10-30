<?php
namespace app\controller;
class indexController extends \core\kolter{
    public function index(){
        $temp=\core\lib\deploy::get('controller','route');
        $temp=\core\lib\deploy::get('controller','route');
        print_r($temp);
        $this->assign('data','Hello world!!');
        $this->display('index/index.html');
    }
}