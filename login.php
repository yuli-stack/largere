<?php
session_start();
if (isset($_SESSION['user'])){
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = 'container'>
        <?php
        if (isset($_POST['login'])){
            $email= $_POST['email'];
            $password=$_POST['password'];
            require_once 'database.php';
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result. MYSQLI_ASSOC);
            if ($user){
                if (password_verify($password,$user['password'])){
                    session_start();
                    $_SESSION['user'] = 'yes';
                    header("Location: index.php");
                    die();
                }else{
                    echo"<div class = 'alert alert-danger'>Password does not match</div>";

                  }
            }
            ?>
        
        <form action='login.php' method = "post">
                <div class= 'form-group'>
                    <input type = 'email' placeholder = 'Enter email:' name = 'email'class ='form-control'>

                </div>
                <div class = 'form-group'>
                    <input type = 'password'placeholder = 'enter password:' name = 'password' class = 'form-control'>
                <div class = 'form-btn'>
                    <input type = 'submit' value = 'Login'name = 'login' class = 'btn btn-primary'>

                </div>
        </form> 
        <div><p>not registered yet<a href = 'registration.php'></p></div>

        
        
        </div>
</body>
</html>