<?php 
SESSION_START();
include('inc/header.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include ('Push.php');
	$push = new Push();
	$user = $push->loginUsers($_POST['username'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['username'] = $user[0]['username'];
		header("Location:index1.php");
	} else {
		$loginError = "Invalid username or password!";
	}
}

include('inc/header.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include ('Push1.php');
	$push = new Pushh();
	$user = $push->loginUsers($_POST['username'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['username'] = $user[0]['username'];
		header("Location:index2.php");
	} else {
		$loginError = "Invalid username or password!";
	}
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="no.css">

</head>
<body style="background-image: url(ll.jpg);";
    background-size:cover;
	background-attachment:fixed;>

<div class="login-box">
<h2>Login</h2>
<form method="post">
			<div >
			<?php if ($loginError ) { ?>
				<div class="alert alert-warning"><?php echo $loginError; ?></div>
			<?php } ?>
			</div>
<div class="user-box">
  <input type="text" name="username" required>
  <label>Username</label>
</div>
<div class="user-box">
  <input type="password" name="pwd" required>
  <label>Password</label>
</div>

<a>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  
  <button type="submit" name="login" class="mybutton">Login</button>
			</a>
  
</form>
</div>

</body>



</div>






