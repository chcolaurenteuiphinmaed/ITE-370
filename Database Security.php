<?php

$conn = new mysqli("localhost","root","","security_demo");

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

if(isset($_POST['register'])){

$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users(username,password) VALUES (?,?)");
$stmt->bind_param("ss",$username,$password);

if($stmt->execute()){
    echo "User Registered Successfully";
}
else{
    echo "Error: ".$stmt->error;
}

$stmt->close();
$conn->close();

}

?>

<form method="POST">

<h2>Register</h2>

Username:<br>
<input type="text" name="username" required><br><br>

Password:<br>
<input type="password" name="password" required><br><br>

<button name="register">Register</button>

</form>
