<?php

$nameError="";
$emailError="";
$success="";

if(isset($_POST['submit'])){

$name = trim($_POST['name']);
$email = trim($_POST['email']);

if(empty($name)){
    $nameError = "Name is required.";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
    $nameError = "Only letters allowed.";
}

if(empty($email)){
    $emailError = "Email is required.";
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $emailError = "Invalid email format.";
}

if(empty($nameError) && empty($emailError)){
    $success = "Form submitted successfully!";
}

}

?>

<h2>Input Validation Form</h2>

<form method="POST">

Name:<br>
<input type="text" name="name">
<span style="color:red"><?php echo $nameError;?></span>
<br><br>

Email:<br>
<input type="text" name="email">
<span style="color:red"><?php echo $emailError;?></span>
<br><br>

<button name="submit">Submit</button>

</form>

<p style="color:green"><?php echo $success;?></p>
