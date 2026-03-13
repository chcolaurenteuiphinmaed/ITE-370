<?php
session_start();

$validUser = "admin";
$validPass = "123456";

$message = "";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($username) || empty($password)){
        $message = "All fields are required.";
    }
    else if($username === $validUser && $password === $validPass){

        session_regenerate_id(true);

        $_SESSION['user'] = $username;
        $_SESSION['login_time'] = time();

        header("Location: dashboard.php");
        exit();
    }
    else{
        $message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>

<body>

<h2>Authentication Login</h2>

<p style="color:red"><?php echo $message; ?></p>

<form method="POST">

<label>Username</label><br>
<input type="text" name="username"><br><br>

<label>Password</label><br>
<input type="password" name="password"><br><br>

<button name="login">Login</button>

</form>

</body>
</html>
