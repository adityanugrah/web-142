<!DOCTYPE html>
<html>
	<head>
		<title> Kelapa Muda </title>
		<link rel="stylesheet" href="http://localhost/dpweb/uas1/css/style.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="http://localhost/dpweb/uas1/css/table.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="http://localhost/dpweb/uas1/css/style_a.css" media="screen" type="text/css" />
	</head>
	
	<body>
	
		<div id="header">
			<h1>Kelapa Muda Online</h1>
				<ul class="navigation">
					<li><a href="http://localhost/dpweb/uas1/Halaman/Home.php" title="Home">Home</a></li>
					<li><a href="http://localhost/dpweb/uas1/Halaman/MasterBrg1.php" title="Barang">Barang</a></li>
					<li><a href="http://localhost/dpweb/uas1/Halaman/Pegawai1.php" title="Pegawai">Pegawai</a></li>
					<li><a href="http://localhost/dpweb/uas1/Halaman/Supplier1.php" title="Supplier">Supplier</a></li>
					<li><a href="" title="Transaksi">Transaksi</a>
					  <ul>
						<li><a href="http://localhost/dpweb/uas1/Halaman/Pembelian.php" title="Pembelian">Transaksi Pembelian</a></li>
						<li><a href="http://localhost/dpweb/uas1/halaman/Penjualan.php" title="Penjualan">Transaksi Penjualan</a></li>
					  </ul>
					</li>
					<li><a href="" title="Laporan">Laporan</a>
					  <ul>
						<li><a href="http://localhost/dpweb/uas1/Halaman/LaporanPembelian.php" title="LPembelian">Laporan Pembelian</a></li>
						<li><a href="http://localhost/dpweb/uas1/Halaman/LaporanPenjualan.php" title="LPenjualan">Laporan Penjualan</a></li>
						<li><a href="http://localhost/dpweb/uas1/Halaman/LaporanStok.php" title="LStok">Laporan Stock</a></li>
					  </ul>
					</li>
					<li><a href="http://localhost/dpweb/uas1/logout.php" title="Logout">Logout</a></li>
					<div class="clear"></div>
			  </ul>  
		</div>

	<div id="nav">

	</div>

	<div id="section">
		<h1>Laporan Pembelian </h1>
		<?php
		include("koneksi.php");

		if(isset($_POST["hapus"]))
		{
		$a=$_POST["id_transaksi1"];
		$sqlnya="delete from tbltransaksi where idtransaksi = '$a'";
		$hasil=mysqli_query($koneksinya,$sqlnya);
		}
		echo "
		<form action='' method='post'>  
		<center> <table></center>
		<tr> <td>Tanggal Tansaksi : </td><td> <input type='date' required name='tanggal_transaksi1'>  </td></tr>  
		<tr><td><input type='submit' value='Cari' required name='simpan'> </td> </tr> 
		</table>
		</form>";
		 if(isset($_POST["detail"]))
		{
		$a=$_POST["id_transaksi1"];
		$sqlnya="select * from tbltransaksidetail where idtransaksi='$a'";
		$hasil=mysqli_query($koneksinya,$sqlnya);

		echo "<center><table border= '3' ></center>";
		echo "<tr><td>No</td><td>ID Transaksi</td><td>Nama Supplier</td><td>Kode Barang </td> <td>Jumlah Barang</td><td>Harga</td></tr>";
		if(mysqli_num_rows($hasil)>0)
		{
			while($baris=mysqli_fetch_assoc($hasil))
			{
				$a=$baris["idtransaksi"];
				$b=$baris["KodeBrg"];
				$c=$baris["Stock"];
				$d=$baris["HargaJual"];
				$e=$baris["iddetail"];
				$f=$baris["supplier"];
				echo "<form action='' method='post'>";
				echo "<tr><td><input type='text' value = '$e' name='id_detail1'></td>";	
				echo "<td><input type='text' value = '$a' name='id_transaksi1'></td>";	
				echo "<td><input type='text' value = '$f' name='supplier'></td>";	
				echo "<td><input type='text' value = '$b' name='kodebrg1'></td>";
				echo "<td><input type='text' value = '$c' name='qty1'></td>";
				echo "<td><input type='text' value = '$d' name='hrgjual1'></td></tr>";
				echo "</form>";
			}
		}
		}else{
		 
		if(isset($_POST["simpan"]))
		{
		$a=$_POST["tanggal_transaksi1"];
		$sqlnya="select * from tbltransaksi where tanggal='$a'";
		$hasil=mysqli_query($koneksinya,$sqlnya);

		echo "<table>";
		echo "<tr><td>Kode Pembelian</td><td>Grand Total </td> <td>Tanggal</td></tr>";
		if(mysqli_num_rows($hasil)>0)
		{
			while($baris=mysqli_fetch_assoc($hasil))
			{
				$a=$baris["idtransaksi"];
				$b=$baris["tanggal"];
				$c=$baris["grandtotal"];
				echo "<form action='' method='post'>";
				echo "<tr><td><input type='text' value = '$a' name='id_transaksi1'></td>";
				echo "<td><input type='text' value = '$b' name='tanggal_transaksi1'></td>";
				echo "<td><input type='text' value = '$c' name='total_harga'></td>";
				echo "<td><input type='submit' value='delete' name='hapus'></td>";
				echo "<td><input type='submit' value='Detail Transaksi' name='detail'></td></tr>";
				echo "</form>";
			}
		}
		}
		else{
		$sqlnya="select * from tbltransaksi";
		$hasil=mysqli_query($koneksinya,$sqlnya);

		echo "<table>";
		echo "<tr><td>Kode Pembelian</td><td>Grand Total </td> <td>Tanggal</td></tr>";
		if(mysqli_num_rows($hasil)>0)
		{
			while($baris=mysqli_fetch_assoc($hasil))
			{
				$a=$baris["idtransaksi"];
				$b=$baris["tanggal"];
				// $c=$baris["waktu_transaksi"];
				$d=$baris["grandtotal"];
				echo "<form action='' method='post'>";
				echo "<tr><td><input type='text' value = '$a' name='id_transaksi1'></td>";
				echo "<td><input type='text' value = '$d' name='total_harga1'></td>";
				echo "<td><input type='text' value = '$b' name='tanggal_transaksi1'></td>";
				// echo "<td><input type='text' value = '$c' name='waktu_transaksi1'></td>";
				// echo "<td><input type='submit' value='Delete' name='hapus'></td>";
				echo "<td><input type='submit' value='Detail' name='detail'></td></tr>";
				echo "</form>";
			}
		}
		}
		echo "</table>";
		}
		 ?>
	</div>
	
</body>
</html>