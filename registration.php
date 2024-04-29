<?php
session_start();
if (isset($_SESSION['user'])){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
<body>
    <div class = 'container'>
        <?php 
        if (isset($_POST['submit'])){
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordHash = password_hash($password,PASSWORD_DEFAULT);


            $error = array();
            if (empty($fullname)||empty($email)){
                array_push($error,'All required');
            }
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($error,'email is not valid');

            }
            if (strlen($password)<8){
                array_push($error,'password should be greated than 8 characters');
            
            }
                        
            require_once 'database.php';
            $sql = "SELECT * FROM users WHERE email = 'email'";

            $result = mysqli_query($conn, $sql);

            $rowCount = mysqli_query($conn,$sql);
            if ($rowCount >0){

            }
            if (count($error)>0){
                foreach ($error as $ $erro){
                    echo "<div class ='alert alert-danger'>$erro</div>";
                }
            }else{
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";

            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt){
                mysqli_stmt_bind_param($stmt,"sss",$fullName,$email,$passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class= 'alert alert-success'> you are registered  successfully.</div>";



            }else{
                die("Something went wrong");
            } 


        }
    }
        ?>
        <form action = 'registration.php' method = 'post'>
            <div class = 'form-group'>
                <input type = 'text'class = 'form-control' name = 'fullname'placeholder = 'Full Name'>

            </div>
            <div class = 'form-group'>
                <input type = 'email' class = 'form-control' name = 'email'placeholder = 'email'>

            </div>
            <div class = 'form-group'>
                <input type = 'password' class = 'form-control'name = 'password'placeholder = 'password'>


            </div> 
            <div class = "form-btn">
                <input type = "submit" class = "btn btn-primary" value = "Register" name = "submit">
            </div>

        </form>
        <div>
        <div><p>Already Registered <a href = 'login.php'>Login here</a></p></div>
        </div>
    </div>
</body>
</html>
