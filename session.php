<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$base_url = "http://localhost/clinic/";
require_once 'db.php';
$isSession = false;
$loginUserId = "";
$userRole = 1;
if (isset($_SESSION["USER_ID"])) {
    $isSession = true;
    $loginUserId = $_SESSION["USER_ID"];
    $userRole = $_SESSION["User_Role"];
}

function isAuthorize(){
    if (!$GLOBALS["isSession"]) {
        header("Location: " . $GLOBALS["base_url"] . "index.php");
        exit;
    }
}

function isAdminUser(){
    if ($GLOBALS["isSession"] && $GLOBALS['userRole'] == 2) {
        // do nothing 
    }else{
        header("Location: " . $GLOBALS["base_url"] . "index.php");
        exit;
    }
}

?>