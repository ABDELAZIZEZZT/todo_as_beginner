<?php
function requiredVal($input){
    if(empty($input)){
        return false;
    }
    return true;

}


function validUserName($username)
{
    $users = readFromJsonFile("users.json");
    foreach ($users as $user) {
        if($user["name"]== $username)
        return false;
    }
    return true;


}

function minVal($input,$length){
    if(strlen($input)<$length){
        return false;
    }
    return true;

}

function maxVal($input,$length){
    if(strlen($input)>$length){
        return false;
    }
    return true;

}

function validUserEmail($email)
{
    $users = readFromJsonFile("../users.json");
    foreach ($users as $user) {
        if($user["email"]== $email)
        return false;
    }
    return true;


}

function checkPassword (string $pass)
{
    $count=0;
    if(requiredVal($pass)&&minVal($pass,6)&&maxVal($pass,25))
    {
        for ($i=0;$i<strlen($pass) ;$i++) {
            if($i>'Z')$count++;
        }
        if($count==strlen($pass))return false;
        else return true;
    }
}
function checkComfirm_Password ($con_pass,$pass)
{
    if ($con_pass==$pass) {
        return true;
    }
    else {
       return false;
    }
}

function checkProfilePicture (string $picture)
{
  $extintion=explode('.',$picture);
  if($extintion[count($extintion)-1]=='jpeg'||$extintion[count($extintion)-1]=='png'
  ||$extintion[count($extintion)-1]=='gif'){
    return true;
  } 
  else return false;

}
