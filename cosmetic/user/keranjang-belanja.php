<?php
if (isset($_GET['kode_product']) && isset($_GET['jumlah'])) {

    $kode_product=$_GET['kode_product'];
    $jumlah=$_GET['jumlah'];

    include 'jhacosmetics.php';

    $sql= "select * from produk where kode_product='$kode_product'";

    $query = mysqli_query($kon,$sql);
    $data = mysqli_fetch_array($query);
    $kode_product=$data['kode_product'];
    $nama_produk=$data['nama'];
    $harga=$data['harga'];
    $stok=$data['stok'];

}else {
    $kode_product="";
    $jumlah=0;
}

if (isset($_GET['aksi'])) {
    $aksi=$_GET['aksi'];
}else {
    $aksi="";
}


switch($aksi){	
    //Fungsi untuk menambah penyewaan kedalam cart
    case "tambah_produk":
    $itemArray = array($kode_product=>array('kode_product'=>$kode_product,'nama_produk'=>$nama_produk,'jumlah'=>$jumlah,'harga'=>$harga,'stok'=>$stok));
    if(!empty($_SESSION["keranjang_belanja"])) {
        if(in_array($data['kode_product'],array_keys($_SESSION["keranjang_belanja"]))) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($data['kode_product'] == $k) {
                    $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
                }
            }
        } else {
            $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
        }
    } else {
        $_SESSION["keranjang_belanja"] = $itemArray;
    }
    break;
    //Fungsi untuk menghapus item dalam cart
    case "hapus":

        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                    if($_GET["kode_product"] == $k)
                        unset($_SESSION["keranjang_belanja"][$k]);
                    if(empty($_SESSION["keranjang_belanja"]))
                        unset($_SESSION["keranjang_belanja"]);
            }
        }
    break;

    case "update":
        $itemArray = array($kode_product=>array('kode_product'=>$kode_product,'nama_produk'=>$nama_produk,'jumlah'=>$jumlah,'harga'=>$harga));
        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($_GET["kode_product"] == $k)
                $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
            }
        }
    break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart shop</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<div class="row">
    <h2  style="margin-bottom:30px;">Keranjang Belanja</h2>
    <table border="1" cellspacing="1" class="table table-bordered">
        <thead>
        <tr>
            <th width="60px">No</th>
            <th>Kode</th>
            <th width="40%">Nama</th>
            <th>Harga</th>
            <th width="10%">QTY</th>
            <th>Sub Total</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no=0;
            $sub_total=0;
            $total=0;
            $total_berat=0;
            if(!empty($_SESSION["keranjang_belanja"])):
            foreach ($_SESSION["keranjang_belanja"] as $item):
                $no++;
                $sub_total = $item["jumlah"]*$item['harga'];
                $total+=$sub_total;
        ?>
            <input type="hidden" name="kode_product[]" class="kode_product" value="<?php echo $item["kode_product"]; ?>"/>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $item["kode_product"]; ?></td>
                <td><?php echo $item["nama_produk"]; ?></td>
                <td>Rp. <?php echo number_format($item["harga"],0,',','.');?> </td>
                <td>
                <input type="number" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]" >
                <script>
                    $("#jumlah<?php echo $no; ?>").bind('change', function () {
                        var jumlah<?php echo $no; ?>=$("#jumlah<?php echo $no; ?>").val();
                        $("#jumlaha<?php echo $no; ?>").val(jumlah<?php echo $no; ?>);
                    });
                    $("#jumlah<?php echo $no; ?>").keydown(function(event) { 
                        return false;
                    });
                    
                </script>

                </td>
                <td>Rp. <?php echo number_format($sub_total,0,',','.');?> </td>

                <td>
                    <form method="GET">
                        <input type="hidden" name="kode_product"  value="<?php echo $item['kode_product']; ?>" class="form-control">
                        <input type="hidden" name="aksi"  value="update" class="form-control">
                        <input type="hidden" name="halaman"  value="keranjang-belanja" class="form-control">
                        <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlaha<?php echo $no; ?>" value="" class="form-control">
                        <input type="submit" class="btn btn-warning btn-xs" value="Update">
                    </form>
                    <a href="index.php?halaman=keranjang-belanja&kode_product=<?php echo $item['kode_product']; ?>&aksi=hapus" class="btn btn-danger btn-xs" role="button">Delete</a>
                </td>
            </tr>
        <?php 
            endforeach;
            endif;
        ?>
        </tbody>
    </table>
    <h3>Total Pembayaran Rp. <?php echo number_format($total,0,',','.');?> </h3>
</div>
</body>
</html>
