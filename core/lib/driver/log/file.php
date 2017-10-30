<?php
namespace core\lib\driver\log;


use core\lib\deploy;

class  file{
    public  $options;
    public  function  __construct(){
        $this->options=deploy::get('options','log');
    }

    public  function  log($mes,$file='log'){
        if(!is_dir($this->options['path'])){
            mkdir($this->options['path'],"0777",true);
        }
        $d=date("Ymd");
        if(!is_dir($this->options['path'].$d)){
            mkdir($this->options['path'].$d,"0777",true);
        }
        return file_put_contents($this->options['path'].$d."/".$file.'.php',date('Y-m-d H:i:s').json_encode($mes)."\n",FILE_APPEND);
    }
}