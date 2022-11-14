<?php 
	session_start();
	include  'config.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
	$query = mysqli_query($conn, "SELECT * FROM tb_admin")
	// $query = mysqli_query($conn, "SELECT * FROM nutezkel WHERE WHERE admin_id = '".$_SESSION['id']."' ");
	// $d = mysqli_fetch_object($query);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Beauty COSMETICS</title>
	<link rel="stylesheet" href="css/stylesheet.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
        <div class="container">
			<h1><a href="index.php">Beauty COSMETICS</a></h1>
		</div>
	</header>
	<div class="section">
		<div class="container">
			<h3>Profile</h3>
			<div class="box">
			
				<form action="" method="POST">
				<?php
					require 'config.php';
					$i = 1;
					// $id = $_GET['admin_id'];
					// $query_mysqli = mysqli_query("$conn,$query")
					while ($row = mysqli_fetch_array($query)){

					?>
					<input type="hidden" name="id" value="<?=$row['admin_id']?>">
					<input type="text" name="nama" placeholder="Name" class="input-control" value="<?=$row['admin_name'] ?>" required>
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?=$row['username'] ?>" required>
					<input type="text" name="hp" placeholder="No Handphone" class="input-control" value="<?=$row['admin_telp']?>" required>
					<input type="email" name="email" placeholder="Email" class="input-control" value="<?=$row['admin_email'] ?>" required>
					<input type="text" name="alamat" placeholder="Address" class="input-control" value="<?=$row['admin_address'] ?>" required>
					<input type="submit" name="submit" value="Update Profile" class="btn">
				</form>
					<?php
					$i++;
					}
					?>

				
				<?php 
					require 'config.php';
					if(isset($_POST['submit'])){
						// $id = $_GET['id'];
					    // $query_mysqli = mysqli_query("$conn,$query");

						$nama 	= ucwords($_POST['nama']);
						$user 	= $_POST['user'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$alamat = ucwords($_POST['alamat']);

						$update = mysqli_query($conn, "UPDATE tb_admin SET 
										admin_name = '".$nama."',
										username = '".$user."',
										admin_telp = '".$hp."',
										admin_email = '".$email."',
										admin_address = '".$alamat."'
										WHERE admin_id = '".$_POST['id']."' ");
						if($update){
							echo '<script>alert("Update data Successfully!")</script>';
							echo '<script>window.location="profile.php"</script>';
						}else{
							echo 'Failed! '.mysqli_error($conn);
						}

					}
				?>
			</div>

			<h3>Update Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="New Password" class="input-control" required>
					<input type="password" name="pass2" placeholder="Confirm New Password" class="input-control" required>
					<input type="submit" name="ubah_password" value="Update Password" class="btn">
				</form>
				<?php 
					if(isset($_POST['ubah_password'])){

						$pass1 	= $_POST['pass1'];
						$pass2 	= $_POST['pass2'];

						if($pass2 != $pass1){
							echo '<script>alert("Confirm New Password does not match!")</script>';
						}else{

							$u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
										password = '".MD5($pass1)."'
										WHERE admin_id = '".$_POST['id']."' ");
							if($u_pass){
								echo '<script>alert("Update data Successfully!")</script>';
								echo '<script>window.location="profile.php"</script>';
							}else{
								echo 'Failed! '.mysqli_error($conn);
							}
						}

					}
				?>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<small>Copyright &copy; 2022 - Beauty Cosmetics</small>
		</div>
	</footer>
</body>
</html>