<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="todo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'function.php';
     session_start(); $id=$_SESSION['auth']['id'];
    $task = readFromJsonFile("../tasks.json");
    if(searchAboutId($id)):
        foreach($task as $tas): ?>
            <?php if($id==$tas["id"]): $_POST[]= $tas["tasks"]?> 
        <div >
            <form action="todo.php" method="POST">
            <input type="submit" name="name" value="task '<?php echo $tas["tasks"];?>' delet it  "> 
            </form>
        </div>
            
        <?php
        endif; 
        ?>
         <?php
        endforeach; 
        ?>
         <?php
        endif; 
        ?>
     <?php if(!searchAboutId($id)){
        echo "thare is no tasks<br>";
    }?> 

    ?>
    <div class="container">
        <form action="todo.php" method="POST">
            <div class="form-group">
                <label for="task">task:</label>
                <input type="text" name="task" value="" required>
            </div>
            <div class="form-group">
                <input type="submit" name="name" value="add">
            </div>
           
           
    </form>
</body>
</html>
<!-- Zezonassar113 -->