<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="login.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>
<body>
       



  <div class="container">
    <h1>Login</h1>
    <form action="login.php" method="POST">
      <label for="email">email</label>
      <input type="email" id="email" name="email">
      <label for="password">Password</label>
      <input type="password" id="password" name="password">
      <input type="submit" value="Login">
    </form>
  </div>

  <?php session_start();?>
        <?php
         if(isset($_SESSION['error'])):
                
                foreach ($_SESSION['error'] as $error ):?>
                <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php echo $error; ?>
                </div>
        <?php  
            endforeach;  
            endif;
           
         ?>
</body>
</html>