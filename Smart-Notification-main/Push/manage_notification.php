<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $field1Value = $_POST["msg"]; // Value for Field 1
  $field2Value = $_POST["user"]; // Value for Field 2
  
  // ThingSpeak API settings
  $api_key = "U514VN2M4GW0FEQH";
  $channel_id = "2091406";

  // Create a URL to send data to ThingSpeak
  $url = "https://api.thingspeak.com/update?api_key=".$api_key."&field1=".$field1Value."&field2=".$field2Value;

  // Use cURL to make the HTTP request
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  
  if ($response === false) {
    echo "Error sending data to ThingSpeak";
  } else {
    echo "<script>alert('The Message Has Sent')</script>";
  }
}
?>




<?php 
SESSION_START(); 
include('inc/header.php');
include ('Push.php');  
$push = new Push();
?>
<title>Notifaction Smart System </title>
<?php include('inc/container.php');?>
<style>

.borderless tr td {
    border: none !important;
    padding: 2px !important;
}
</style>

<body style="background-image: url(ll.jpg);"
    background-size:cover;
	background-attachment:fixed;>
</body>
<div class="container">		
	<h2>Notifaction smart system </h2>	
	<a href="index.php">Home</a> 
	<hr>
	<div class="row">
		<div class="col-sm-6">
			<h3>Add New Notification:</h3>
			<form method="POST"  action="<?php echo $_SERVER['PHP_SELF']; ?>">										
				<table class="table borderless">
					<tr>
						<td>Title</td>
						<td><input type="text" name="title" class="form-control" required></td>
					</tr>	
					<tr>
						<td>Message</td>
						<td><textarea name="msg" cols="50" rows="4" class="form-control" required></textarea></td>
					</tr>			
					<tr>
						<td>Broadcast time</td>
						<td><select name="time" class="form-control"><option>Now</option></select> </td>
					</tr>
					<tr>
						<td>For</td>
						<td><select name="user" class="form-control">
							<option value="<?php echo $_SESSION['username']; ?>"><?php echo $_SESSION['username']; ?></option>
						</select></td>
					</tr>
					<tr>
						<td colspan=1></td>
						<td colspan=1></td>
					</tr>					
					<tr>
						<td colspan=1></td>
						<td><button name="submit" type="submit" class="btn btn-info">Add Message</button></td>
					</tr>
				</table>
				<a class="btn btn-info" style="margin-left:100px;" href="search.php">Search For User</a>
			</form>
		</div>
	</div>

	<?php 
	if (isset($_POST['submit'])) { 
		if(isset($_POST['msg']) and isset($_POST['time']) and isset($_POST['user'])) {
			$title = $_POST['title'];	
			$msg = $_POST['msg']; 
			$time = date('Y-m-d H:i:s'); 
			$user = $_POST['user']; 
			$isSaved = $push->saveNotification($title, $msg,$time,$user);
			if($isSaved) {
				echo '* save new notification success';
			} else {
				echo 'error save data';
			}
		} else {
			echo '* completed the parameter above';
		}
	} 
	?>

	<h3>Notifications List:</h3>
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Date</th>
				<th>Title</th>
				<th>Message</th>
				<th>User</th>
			</tr>
		</thead>
		<tbody>
			<?php $a =1; 
			$notifList = $push->listNotification(); 
			foreach ($notifList as $key) {
			?>
			<tr>
				<td><?php echo $a ?></td>
				<td><?php echo $key['notif_time'] ?></td>
				<td><?php echo $key['title'] ?></td>
				<td><?php echo $key['notif_msg'] ?></td>
				<td><?php echo $key['username'] ?> </td>
			</tr>
			<?php $a++; } ?>
		</tbody>
	</table>
</div>	
<?php include('inc/footer.php');?>