<!DOCTYPE html>
<html>
	<head>
		<title> Supplier Online </title>
		<link rel="stylesheet" href="http://localhost/dpweb/uas1/css/style.css" media="screen" type="text/css" />
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
			<?php
				include("koneksi.php");
				if(isset($_POST["simpanedit"]))
				{
				$a=$_POST["KodeSup1"];
				$b=$_POST["NamaSup1"];
				$c=$_POST["Alamat1"];
				$d=$_POST["Telp1"];
				$e=$_POST["Keterangan1"];
				$sqlnya="update supplier set NamaSup='$b',Alamat='$c',Telp='$d',Keterangan='$e' where KodeSup='$a' ";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				}


				if(isset($_POST["simpan"]))
				{
				$a=$_POST["KodeSup1"];
				$b=$_POST["NamaSup1"];
				$c=$_POST["Alamat1"];
				$d=$_POST["Telp1"];
				$e=$_POST["Keterangan1"];
				$sqlnya="insert into supplier values('$a','$b','$c','$d','$e')";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				 }
				if(isset($_POST["hapus"]))
				{
				$a=$_POST["KodeSup1"];
				$sqlnya="delete from supplier where KodeSup = '$a'";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				}
				if(isset($_POST["ubah"])) 
				{
				$a=$_POST["KodeSup1"];
				$b=$_POST["NamaSup1"];
				$c=$_POST["Alamat1"];
				$d=$_POST["Telp1"];
				$e=$_POST["Keterangan1"];

				echo " 
				 <form action='' method='post'>  
				 <table>
				 <tr> <td>Kode Supplier </td><td> <input type='text' name='KodeSup1' value='$a'>  </td></tr>  
				 <tr><td>Nama Supplier </td><td> <input type='text' name='NamaSup1' value='$b'>  
				 </td></tr>  
				 <tr><td>Alamat </td><td> <input type='text' name='Alamat1' value='$c'>  
				 </td></tr>
				 <tr><td>Telepon </td><td> <input type='text' name='Telp1' value='$d'> 
				 </td></tr>  
				 <tr><td>Keterangan </td><td> <input type='text' name='Keterangan1' value='$e'> </td> </tr>
				 <tr><td><input type='submit' value='Save' name='simpanedit'> </td> </tr> 
				 </table>
				 </form>  
				 ";
				}
				else { //input
				echo " 
				 <form action='' method='post'>  
				 <table>
				 <tr> <td>Kode Supplier </td><td> <input type='text' name='KodeSup1'>  </td></tr>  
				 <tr><td>Nama Supplier </td><td> <input type='text' name='NamaSup1'>  
				 </td></tr>  
				 <tr><td>Alamat </td><td> <input type='text' name='Alamat1'>  
				 </td></tr>
				 <tr><td>Telepon </td><td> <input type='text' name='Telp1'> 
				 </td></tr>  
				 <tr><td>Keterangan </td><td> <input type='text' name='Keterangan1'> </td> </tr>
				 <tr><td><input type='submit' value='Save' name='simpan'> </td> </tr> 
				 </table>
				 </form>  
				 ";
				}
				$sqlnya="select * from supplier";
				$hasil=mysqli_query($koneksinya,$sqlnya);

				echo "<table border= '2'>";
				echo "<tr><td>Kode Supplier </td><td>Nama Supplier </td> <td>Alamat</td><td>Telepon</td><td>Keterangan</td></tr>";
				if(mysqli_num_rows($hasil)>0)
				{
					while($baris=mysqli_fetch_assoc($hasil))
					{
						$a=$baris["KodeSup"];
						$b=$baris["NamaSup"];
						$c=$baris["Alamat"];
						$d=$baris["Telp"];
						$e=$baris["Keterangan"];
						echo "<form action='' method='post'>";
						echo "<tr><td><input type='text' value = '$a' name='KodeSup1'></td>";
						echo "<td><input type='text' value = '$b' name='NamaSup1'></td>";
						echo "<td><input type='text' value = '$c' name='Alamat1'></td>";
						echo "<td><input type='text' value = '$d' name='Telp1'></td>";
						echo "<td><input type='text' value = '$e' name='Keterangan1'></td>";
						echo "<td><input type='submit' value='edit' name='ubah'> <input type='submit' value='delete' name='hapus'></td></tr>";
						echo "</form>";
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
