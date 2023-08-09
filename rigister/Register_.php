<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Register.php" method="POST">
        <?php session_start();?>
        <?php
         if(isset($_SESSION['errors'])):
                foreach ($_SESSION['errors'] as $error ):?>

                <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?php echo $error; ?>
                </div>
        <?php  
            endforeach;
            unset($_SESSION['$errors']);  
            endif;
           
         ?>
    <div class="container">
       
        <form action="Register.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required><br>
            </div>
            <div class="form-group">
                <input type="radio" id="Male" name="gender" value="Male"><br>
                <label for="gender">Male</label><br>
                <input type="radio" id="Female" name="gender" value="Female"><br>
                <label for="gender">Female</label><br>
            </div>
            <div class="form-group">
                <label for="photo">Upload photo</label><br>
                <input type="file" name="profilepicture">
            </div>

            <div class="form-group">
                <input type="submit" value="Register">
            </div>

    </form>
</body>
</html>