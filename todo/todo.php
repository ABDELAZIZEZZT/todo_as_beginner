<?php
session_start();

include 'function.php';



if($_POST['name']=="add"){
    $tasks = readFromJsonFile("../tasks.json");
    $id=$_SESSION['auth']['id'];

        if(searchAboutId($id)){
            foreach($tasks as $tas)
            {
                if($id==$tas["id"]){
                    $data=["id" => $id ,"tasks" => $_POST["task"]];
                    $tasks[]=$data;    
                    file_put_contents("../tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));
                     header("location:todo_.php");
                     die;
                }
            }
        }else{$data=["id" => $id ,"tasks" => $_POST["task"]];
            $tasks[]=$data;    
            file_put_contents("../tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));
             header("location:todo_.php");
             die;
        }
}else{
    $name_ =explode("'",$_POST['name']);
    $list = readFromJsonFile("../tasks.json");
    echo"<pre>";
    var_dump($list);
    echo "<br>";
    $name=$name_[1];
   
    foreach ($list as  $i=> $task) {
         if ($task['tasks'] == $name){
             unset($list[$i]);
            echo "savjkrq3;og.<br>";
         }
    }
    echo"<pre>";
    var_dump($list);
    file_put_contents("../tasks.json", json_encode($list, JSON_PRETTY_PRINT));
     header("location:todo_.php");
      die;
}


 






