<?php
session_start();
include 'validation.php';

$error_1=[];

if(checkRequestMethod("POST")&& checkPostInput("email")){

    foreach($_POST as $key => $valu)
    {
        $$key=sanitizeInput($valu);
    }

    if(!searchInJsonUseingEmail($email)){
        $error_1[]= "your email not required please register ";
    }

    if(!searchInson($email,$password)){
        $error_1[]= "wrong password ";
    }

}

if(!empty($error_1)){
    // var_dump($_SESSION['error']);
    $_SESSION['error'] = $error_1;
    header("location:login_.php");
    die;
    
}
else{
    header("location:../todo/todo_.php");
    die;
   
}