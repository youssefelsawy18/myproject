<?php 
SESSION_START();
include('inc/header.php');
?>
<head>
<title style="color:white;">Smart Notification System</title>
<link rel="stylesheet" href="style1.css">
<style>
	body{
    background-image: url(ll.jpg);
    background-size: 100% 100vh;
    background-attachment: fixed;
}
</style>
</head>

<script src="notification.js"></script>
<?php include('inc/container.php');?>
<div class="container">	
	
	<h2 style="display: flex;" >Smart Notification System</h2>	
	<h3 style="display: flex;">User Account </h3>
	<?php if(isset($_SESSION['username']) && $_SESSION['username'] == $_SESSION['username']) { ?>
        <a href="manage_notification.php" style="font-weight: bold; font-size: 20px; display: flex;">Manage Notification</a> 
        <?php } ?>

	<?php if(isset($_SESSION['username']) && $_SESSION['username']) { ?>
		<a href="logout.php" style="display: flex; font-weight: bold;">Logout</a>


	<?php } else { ?>
		<a href="login.php" style="display: flex;">Login</a>
	<?php } ?>
	<hr> 
	<?php if (isset($_SESSION['username'])) { ?>
	<center>	<h4>Welcome back <strong><?php echo $_SESSION['username']; ?></strong></h4></center>	
		
	<?php } ?>		
	
</div>	
<?php include('inc/footer.php');?>