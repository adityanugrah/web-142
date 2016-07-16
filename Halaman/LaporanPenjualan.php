<!doctype html>
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
		<h1>Laporan Penjualan </h1>
		<?php
		include("koneksi.php");


		if(isset($_POST["hapus"]))
		{
		$a=$_POST["id_transaksi1"];
		$sqlnya="delete from tblpenjualan where idtransaksi = '$a'";
		$hasil=mysqli_query($koneksinya,$sqlnya);
		}

		 if(isset($_POST["detail"]))
		{
		$a=$_POST["id_transaksi1"];
		$sqlnya="select * from tblpenjualandetail where idtransaksi='$a'";
		$hasil=mysqli_query($koneksinya,$sqlnya);

		echo "<center><table></center>";
		echo "<tr><td>No</td><td>ID Transaksi</td><td>Kode Barang </td> <td>Jumlah Barang</td><td>Harga</td></tr>";
		if(mysqli_num_rows($hasil)>0)
		{
			while($baris=mysqli_fetch_assoc($hasil))
			{
				$a=$baris["idtransaksi"];
				$b=$baris["KodeBrg"];
				$c=$baris["Stock"];
				$d=$baris["HargaJual"];
				$e=$baris["iddetail"];
				echo "<form action='' method='post'>";
				echo "<tr><td><input type='text' value = '$e' name='id_detail1'></td>";	
				echo "<td><input type='text' value = '$a' name='id_transaksi1'></td>";	
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
		$sqlnya="select * from tblpenjualan where tanggal_transaksi='$a'";
		$hasil=mysqli_query($koneksinya,$sqlnya);

		echo "<table>";
		echo "<tr><td>Kode Pembelian</td><td>Grand Total </td> <td>Tanggal</td><td>Waktu</td></tr>";
		if(mysqli_num_rows($hasil)>0)
		{
			while($baris=mysqli_fetch_assoc($hasil))
			{
				$a=$baris["id_transaksi"];
				$b=$baris["tanggal_transaksi"];
				$c=$baris["waktu_transaksi"];
				$d=$baris["total_harga"];
				echo "<form action='' method='post'>";
				echo "<tr><td><input type='text' value = '$a' name='id_transaksi1'></td>";
				echo "<td><input type='text' value = '$d' name='total_harga1'></td>";
				echo "<td><input type='text' value = '$b' name='tanggal_transaksi1'></td>";
				echo "<td><input type='text' value = '$c' name='waktu_transaksi1'></td>";
				echo "<td><input type='submit' value='delete' name='hapus'></td>";
				echo "<td><input type='submit' value='Detail Transaksi' name='detail'></td></tr>";
				echo "</form>";
			}
		}
		}
		else{
		$sqlnya="select * from tblpenjualan";
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