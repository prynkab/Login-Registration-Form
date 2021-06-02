<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login form</title>
	<link rel="stylesheet" href="styles.css">
	<script src="scripts.js"></script>
</head>
<body>

<div class="wrapper">
  <h2>Login</h2>
  <div id="error_message"></div>
  <form id="myform" action="" method="POST" onsubmit="return validate();">
    <div class="input_field">
        <input type="text" placeholder="Email" id="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input_field">
        <input type="password" placeholder="Password" id="Password" name="password" value="<?php echo $_POST['password']; ?>">
    </div>
    <div class="btn">
        <input type="submit" name="submit">
    </div>
    <p class="login-register-text">Don't have an account? <a href="Register.php">Register Now</a></p>
  </form>
</div>

</body>
</html>