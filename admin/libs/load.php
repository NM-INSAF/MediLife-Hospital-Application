<?php

session_start();
include 'include/Database.class.php';
include 'include/Doctor.class.php';


global $__site_config;
$__site_config_path = $_SERVER['DOCUMENT_ROOT'].'/db_conf.json';
$__site_config = file_get_contents($__site_config_path);

function get_config($key, $default=null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}


//this funtion used to load templates//
function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/admin/__templates/$name.php";
}
 


