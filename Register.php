<?php
include 'config.php';
session_start();
error_reporting(0);
if(isset($_POST['submit'])){
    $Name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO users (Name, username, phone, email, password)
                VALUES ('$Name','$username','$phone', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Wow! User Registration Completed.')</script>";
            $Name="";
            $username = "";
            $phone="";
            $email = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
        } 
        else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Email Already Exists.')</script>";
    }    
} else {
    echo "<script>alert('Password Not Matched.')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="styles.css">
	<script src="script.js"></script>
</head>
<body>

<div class="wrapper">
  <h2>Register</h2>
  <div id="error_message"></div>
  <form id="myform" action="" method="POST" onsubmit="return validate();">
    <div class="input_field">
        <input type="text" placeholder="Name" id="name" name="name" value="<?php echo $Name; ?>">
    </div>
    <div class="input_field">
        <input type="text" placeholder="User Name" id="userName" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Phone" id="phone" name="phone" value="<?php echo $phone; ?>">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Email" id="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input_field">
        <input type="password" placeholder="Password" id="Password1" name="password" value="<?php echo $_POST['password']; ?>">
    </div>
    <div class="input_field">
        <input type="password" placeholder="Confirm Password" id="Password2" name="cpassword" value="<?php echo $_POST['cpassword']; ?>">
    </div>
    <div class="btn">
        <input name="submit" type="submit">
    </div>
    <p class="login-register-text">Already have an account? <a href="index.php">Login Now</a></p>
  </form>
</div>

</body>
</html>
