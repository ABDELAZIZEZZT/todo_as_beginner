<?php
session_start();

include 'function.php';
include 'validation.php';

$errors=[];


if(checkRequestMethod("POST")&& checkPostInput("username")){

    foreach($_POST as $key => $valu)
    {
        $$key=sanitizeInput($valu);
    }


    if(!requiredVal($username)){
        $errors[]= "name is required ";
    }else if(!minVal($username,4)){
        $errors[]= "name mast be greater than 4 chars";
    }else if(!maxVal($username,25)){
        $errors[]= "name mast be smaller than 12 chars";
    }

    if(!validUserName($username)){
        $errors[]= "this user name not valid ";
    }



    if(!requiredVal($email)){
        $errors[]= "email is required ";
    }else if(!emailVal($email)){
        $errors[]= "plase typa valid email";
    }
    if(!validUserEmail($email)){
        $errors[]= "this email not valid becase it used";
    }



    if(!requiredVal($password)){
        $errors[]= "password is required ";
    }else if(!minVal($password,6)){
        $errors[]= "password mast be greater than 6 chars";
    }else if(!maxVal($password,25)){
        $errors[]= "password mast be smaller than 12 chars";
    }
    if(!checkPassword($password)){
        $errors[]= "password mast has spichal charchter or upercase ";
    }




    if(!requiredVal($confirm_password)){
        $errors[]= "confirm password is required ";
    }
    if(!checkComfirm_Password($confirm_password,$password)){
        $errors[]= "confirm password mast be si,milar to password";
    }


    if(!requiredVal($gender)){
        $errors[]= "gender is required ";
    }


    if(!requiredVal($profilepicture)){
        $errors[]= "profile picture is required ";
    }

    if(!checkProfilePicture($profilepicture)){
        $errors[]= "the file shold be png or jpeg or gif";
    }

  




   if(!empty($errors)){
   
    $_SESSION['errors'] = $errors;

    header("location:Register_.php");
    die;

   }
   else{
   
    $users = readFromJsonFile("users.json");
    if ($users == NULL) {
        $data = [ "id"=>1, "name" => $username, "email" => $email, "password" => password_hash($password, PASSWORD_BCRYPT), "gender" => $gender];
        $users[] = $data;
        file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT));
        $_SESSION['auth'] = $data;
       
        die;
    } else {
        $end = end($users);
        $data = ["id"=>++$end["id"], "name" => $username, "email" => $email, "password" => password_hash($password, PASSWORD_BCRYPT),"gender" => $gender];
       
        $users[] = $data;
        file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT));
        $_SESSION['auth'] = $data;
    
    }
    header("location:../login/login.php");
    die;
   
   }
   
    

   
}
else{
    echo "not supported method<br>";
}