<?php 
	session_start();
	include 'config.php';
	$images = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($images);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUY</title>
    <link rel="stylesheet" href="css/stylesheet.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
</head>
<body>
    <header>
		<div class="container">
			<h1><a href="index.php">JHA COSMETICS</a></h1>
	</header>
    <div class="body">
    <h3>Buy Product</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="Product" required>
						<option value="">--Select--</option>
						<?php 
							$product = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC");
							while($r = mysqli_fetch_array($product)){
						?>
						<option value="<?php echo $r['product_id'] ?>"><?php echo $r['product_name'] ?></option>
						<?php } ?>
					</select>
					<input type="text" name="nama" class="input-control" placeholder="Product Name" required>
					<input type="text" name="harga" class="input-control" placeholder="Product Price" required>
					
					<img src="images/<?php echo $p->product_image ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
					<input type="file" name="gambar" class="input-control">
					<textarea class="input-control" name="deskripsi" placeholder="Description"></textarea><br>
					<select class="input-control" name="status">
						<option value="">--Select--</option>
						<option value="1">Ready</option>
						<option value="0">Out of Stock</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php
					if(isset($_POST['submit'])){
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];
						$foto 	 	= $_POST['foto'];

						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

				
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'images'.time().'.'.$type2;

							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							if(!in_array($type2, $tipe_diizinkan)){
								echo '<script>alert("File format not allowed!")</scrtip>';

							}else{
								unlink('./images/'.$foto);
								move_uploaded_file($tmp_name, './images/'.$newname);
								$namagambar = $newname;
							}

						}else{
							$namagambar = $foto;
							
						}
						$update = mysqli_query($conn, "UPDATE tb_product SET 
												category_id = '".$kategori."',
												product_name = '".$nama."',
												product_price = '".$harga."',
												product_description = '".$deskripsi."',
												product_image = '".$namagambar."',
												product_status = '".$status."'
												WHERE product_id = '".$p->product_id."'	");
						if($update){
							echo '<script>alert("Update Data Succesfully!")</script>';
							echo '<script>window.location="data-product.php"</script>';
						}else{
							echo 'Failed '.mysqli_error($conn);
						}
						
					}
				?>
			</div>
            <footer>
		<div class="container">
			<small>Copyright &copy; 2022 - JHA Cosmetics</small>
		</div>
	</footer>
	<script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>