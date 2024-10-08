<!DOCTYPE html>
<html>

	<head>
		<title>Welcome  To Biobook - Sign up, Log in, Post </title>
		<link rel="stylesheet" type="text/css" href="css/photos.css">
	</head>

	<style>
	body {
		background-image: url("wbb.png");
  background-color: #2C175C;
}


#header {
    background-color: #5e1896;
    width: 100%;
    margin-top: -8px;
}
#right-nav {
    float: left;
    width: 800px;
    background-color:#471173;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 8px solid #CCCCCC;
    margin-top: 10px;
}
#left-nav {
    width: 350px;
    float: right;
    border: 8px solid #dfe0e4;
    background-color: #471173;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    margin-top: 10px;
}

#left-nav1 {
    width: 345px;
    float: right;
    border: 8px solid #dfe0e4;
    background-color: #471173;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    margin-top: 10px;
}
.btn-share {
    color: black;
    font-size: 19px;
    float: right;
    width: 100px;
    line-height: 30px;
    background-color: whitesmoke;
    border: 2px solid #0bacff;
    border-radius: 100px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    -o-border-radius: 100px;
}

</style>


<body>
<?php include ('session.php');?>

	<div id="header">
		<div class="head-view">
			<ul>
				<li><a href="home.php" title="Biobook"><b>Chat World</b></a></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li><a href="timeline.php" title="<?php echo $username ?>"><label><?php echo $username ?></label></a></li>
				<li><a href="home.php" title="Home"><label>Home</label></a></li>
				<li><a href="profile.php" title="Profile"><label>Profile</label></a></li>
				<li><a href="photos.php" title="Settings"><label class="active">Photos</label></a></li>
				<li><a href="fun.php" title="Settings"><label class="active">Fun</label></a></li>
				<li><a href="logout.php" title="Log out"><button class="btn-sign-in" value="Log out">Log out</button></a></li>
			</ul>
		</div>
	</div>

	<div id="container">
	
		<div id="left-nav">
				
				<div class="clip1">
				<a href="updatephoto.php" title="Change Profile Picture"><img src="<?php echo $row['profile_picture'] ?>"></a>
				</div>
				
				<div class="user-details">
					<h3><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></h3>
					<h2><?php echo $username ?></h2>
				</div>
		
<?php
	include("includes/database.php");
			$query=mySQLi_query($con,"SELECT * from user where user_id='$id' order by user_id DESC");
			while($row=mySQLi_fetch_array($query)){
				$id = $row['user_id'];
?>

		<div id="left-nav1">

			<h2>Personal Info</h2>
			<table>
				<tr>
					<td><label>Username</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['username']; ?></b></td>
				</tr>
				<tr>
					<td><label>Birthday</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['birthday']; ?></b></td>
				</tr>
				<tr>
					<td><label>Gender</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['gender']; ?></b></td>
				</tr>
				<tr>
					<td><label>Contact</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['number']; ?></b></td>
				</tr>
				<tr>
					<td><label>Email</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['email']; ?></b></td>
				</tr>
				<tr>
					<td><label>Image</label></td>
					<td width="20"></td>
					<td><img src="<?php echo $row['profile_picture']; ?>"></td>
				</tr>
			</table>
<?php
}
?>
		</div>		
				
		</div>
		
		<div id="right-nav">
			<h1>Your Photos</h1>
	<div>
			<form method="post" action="add_photo.php" enctype="multipart/form-data">
				<input type="file" name="image">
				<button class="btn-submit-photo" name="Submit" value="Log out">Add Photos</button>
			</form>
	<hr />
	</div>
	

<?php
	include("includes/database.php");
			$query=mySQLi_query($con,"SELECT * from photos where user_id='$id' ");
			while($row=mySQLi_fetch_array($query)){
				$id = $row['photo_id'];
?>

		<div class="photo-select">
			<center>
				<img src="<?php echo $row['location']; ?>">
				<hr>
				<a href="delete_photos.php<?php echo '?id='.$id; ?>" class="btn-delete-photos">Delete</a>
			</center>
		</div>
		
<?php
}
?>
		</div>

		
	</div>

</body>

</html>