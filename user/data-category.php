<?php 
	session_start();
	include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JHA COSMETICS</title>
	<link rel="stylesheet" href="css/stylesheet.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="index1.php">JHA COSMETICS</a></h1>
		</div>
	</header>
	<div class="section">
		<div class="container">
			<h3>Data Category</h3>
			<div class="box">
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Category</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							if(mysqli_num_rows($kategori) > 0){
							while($row = mysqli_fetch_array($kategori)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="3">No Data!</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<small>Copyright &copy; 2022 - JHA Cosmetics</small>
		</div>
	</footer>
</body>
</html>