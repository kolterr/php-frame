<?php
namespace app\controller;
use core\lib\model;

class indexController extends \core\kolter{
    public function index(){
        $this->assign('data','Hello world!!');
        $this->display('index/index.html');
    }
}