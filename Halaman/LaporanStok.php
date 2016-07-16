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
			<h1>Stok Barang </h1>
			<?php
			include("koneksi.php");

			if(isset($_POST["simpan"]))
			{
			$a=$_POST["kodebrg1"];
			$sqlnya="select * from barang where KodeBrg='$a'";
			$hasil=mysqli_query($koneksinya,$sqlnya);

			echo "<center><table></center>";
			echo "<tr><td>Kode Barang</td><td>Nama Barang</td><td>Stok Awal </td> <td>Stok Jual</td><td>Stok Beli</td><td>Stok Sekarang</td></tr>";
			if(mysqli_num_rows($hasil)>0)
			{
				while($baris=mysqli_fetch_assoc($hasil))
				{
					$a=$baris["KodeBrg"];
					$b=$baris["NamaBrg"];
					// $c=$baris["HargaBeli"];
					// $d=$baris["HargaJual"];
					$e=$baris["Stock"];
					$f=$baris["StokJual"];
					$g=$baris["StokBeli"];
					$h=$e+$g-$f;
					echo "<form action='' method='post'>";
					echo "<tr><td><input type='text' value = '$a' name='kodebrg1'></td>";	
					echo "<td><input type='text' value = '$b' name='namabrg1'></td>";	
					// echo "<td><input type='text' value = '$c' name='hrgbeli1'></td>";
					// echo "<td><input type='text' value = '$d' name='hrgjual1'></td>";
					echo "<td><input type='text' value = '$e' name='stok1'></td>";
					echo "<td><input type='text' value = '$f' name='stok2'></td>";
					echo "<td><input type='text' value = '$g' name='stok3'></td>";
					echo "<td><input type='text' value = '$h' name='stok3'></td>";
					echo "</form>";
				}
			}
			}
			else{
			$sqlnya="select * from barang order by KodeBrg asc";
			$hasil=mysqli_query($koneksinya,$sqlnya);

			echo "<center><table></center>";
			echo "<tr><td>Kode Barang</td><td>Nama Barang</td><td>Stok Awal </td> <td>Stok Jual</td><td>Stok Beli</td><td>Stok Sekarang</td></tr>";
			if(mysqli_num_rows($hasil)>0)
			{
				while($baris=mysqli_fetch_assoc($hasil))
				{
					$a=$baris["KodeBrg"];
					$b=$baris["NamaBrg"];
					// $c=$baris["HargaBeli"];
					// $d=$baris["HargaJual"];
					$e=$baris["Stock"];
					$f=$baris["StokJual"];
					$g=$baris["StokBeli"];
					$h=$e+$g-$f;
					echo "<form action='' method='post'>";
					echo "<tr><td><input type='text' value = '$a' name='kodebrg1'></td>";	
					echo "<td><input type='text' value = '$b' name='namabrg1'></td>";	
					// echo "<td><input type='text' value = '$c' name='hrgbeli1'></td>";
					// echo "<td><input type='text' value = '$d' name='hrgjual1'></td>";
					echo "<td><input type='text' value = '$e' name='stok1'></td>";
					echo "<td><input type='text' value = '$f' name='stok2'></td>";
					echo "<td><input type='text' value = '$g' name='stok3'></td>";
					echo "<td><input type='text' value = '$h' name='stok3'></td>";
					echo "</form>";
				}
			}
			}
			echo "</table>";
			 ?> 
		</div>	
			
		<div id="footer">
			Copyright © Adit Juniior - 23:19 WIB
		</div>
	</body>
</html>