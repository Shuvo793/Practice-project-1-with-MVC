<?php
function backendView($file='index',$data=[]){
    extract($data);
    require_once __DIR__.'/../view/BackEnd/'.$file.'.php';
}
function frontendView($file='index',$data=[]){
    extract($data);
    require_once __DIR__.'/../view/FrontEnd/'.$file.'.php';
}
function dd($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
