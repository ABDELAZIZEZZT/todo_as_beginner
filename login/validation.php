<?php
function checkRequestMethod($method)
{
    if($_SERVER['REQUEST_METHOD']== $method)
    {return true;}

    return false;

}

function checkPostInput($input){
    if(isset($_POST[$input])){return true;}
    return false;
}

function sanitizeInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}

function emailVal($email)
{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    return true;
}


function readFromJsonFile($path)
    {
        return json_decode(file_get_contents($path), true);
    }

function searchInJsonUseingEmail($email)
{
    $users = readFromJsonFile("../rigister/users.json");
    foreach ($users as $user) {
        echo $user["email"];
        if($user["email"]== $email){
            return true;
        }
    }
    return false;
}

function searchInson($email,$pass)
{
    $users = readFromJsonFile("../rigister/users.json");
    foreach ($users as $user) {
        if($user["email"]== $email && password_verify($pass, $user["password"]))
         return true;
    }
    
    return false;

    

}




 
