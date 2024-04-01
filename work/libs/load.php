<?php

session_start();

include 'include/actions.class.php';
include 'include/Database.class.php';
include 'include/Session.class.php';
include 'include/Doctor.class.php';
include 'include/user.class.php';

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
    include $_SERVER['DOCUMENT_ROOT']."/work/__templates/$name.php";
}
   
if (
    isset($_POST['Fullname']) and !empty($_POST['Fullname']) and
    isset($_POST['Phone']) and !empty($_POST['Phone']) and
    isset($_POST['Address']) and !empty($_POST['Address']) and
    isset($_POST['DocName']) and !empty($_POST['DocName']) and
    isset($_POST['AppId']) and !empty($_POST['AppId']) and
    isset($_POST['DocId']) and !empty($_POST['DocId']) and
    isset($_POST['Special']) and !empty($_POST['Special']) and
    isset($_POST['AppDate']) and !empty($_POST['AppDate']) and
    isset($_POST['AppTime']) and !empty($_POST['AppTime'])
) {
    echo '1';
    $fullName = $_POST['Fullname'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $docName = $_POST['DocName'];
    $appId = $_POST['AppId'];
    $docId = $_POST['DocId'];
    $special = $_POST['Special'];
    $appDate = $_POST['AppDate'];
    $appTime = $_POST['AppTime'];

    if(Doctors::checkAvailable($appId, $docId, $docName, $special, $appDate, $appTime))
    {
        if(Doctors::insertAppointment($docId,$fullName,$phone,$address,$appDate, $appTime, Doctors::getFee($docId) + 240)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}else{
    return false;
}

if (isset($_POST['loginstatus'])) {
    if((Session::authorization($_COOKIE['sessionToken']) == true) and (isset($_SESSION['user_id'])) ) {
       echo '1';
    }
}