<!DOCTYPE html>
<html>
	<head>
		<title> Pegawai Online </title>
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
				$a=$_POST["KodePeg1"];
				$b=$_POST["NamaPeg1"];
				$c=$_POST["JenisKel1"];
				$d=$_POST["TglLhr1"];
				$e=$_POST["Alamat1"];
				$f=$_POST["Telp1"];
				$g=$_POST["Keterangan1"];
				$h=$_POST["Email1"];
				$sqlnya="update pegawai set NamaPeg='$b',JenisKel='$c',TglLhr='$d',Alamat='$e',Telp='$f',Keterangan='$g',Email='$h' where KodePeg='$a' ";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				}


				if(isset($_POST["simpan"]))
				{
				$a=$_POST["KodePeg1"];
				$b=$_POST["NamaPeg1"];
				$c=$_POST["JenisKel1"];
				$d=$_POST["TglLhr1"];
				$e=$_POST["Alamat1"];
				$f=$_POST["Telp1"];
				$g=$_POST["Keterangan1"];
				$h=$_POST["Email1"];
				$sqlnya="insert into pegawai values('$a','$b','$c','$d','$e','$f','$g','$h')";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				 }
				if(isset($_POST["hapus"]))
				{
				$a=$_POST["KodePeg1"];
				$sqlnya="delete from pegawai where KodePeg = '$a'";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				}
				if(isset($_POST["ubah"])) 
				{
				$a=$_POST["KodePeg1"];
				$b=$_POST["NamaPeg1"];
				$c=$_POST["JenisKel1"];
				$d=$_POST["TglLhr1"];
				$e=$_POST["Alamat1"];
				$f=$_POST["Telp1"];
				$g=$_POST["Keterangan1"];
				$h=$_POST["Email1"];	

				echo " 
				 <form action='' method='post'>  
				 <table>
				 <tr> <td>Kode Pegawai </td><td> <input type='text' name='KodePeg1' value='$a'>  </td></tr>  
				 <tr><td>Nama Pegawai </td><td> <input type='text' name='NamaPeg1' value='$b'>  
				 </td></tr>  
				 <tr><td>Jenis Kelamin </td><td> <input type='text' name='JenisKel1' value='$c'>  
				 </td></tr>
				 <tr><td>Tgl Lahir </td><td> <input type='date' name='TglLhr1' value='$d'> 
				 </td></tr>  
				 <tr><td>Alamat</td><td> <input type='text' name='Alamat1' value='$e'> </td> </tr>
				 <tr><td>Telp</td><td> <input type='text' name='Telp1' value='$f'> </td> </tr>
				 <tr><td>Keterangan</td><td> <input type='text' name='Keterangan1' value='$g'> </td> </tr>
				 <tr><td>Email</td><td> <input type='text' name='Email1' value='$h'> </td> </tr>
				 <tr><td><input type='submit' value='Save' name='simpanedit'> </td> </tr> 
				 </table>
				 </form>  
				 ";
				}
				else {
				echo " 
				 <form action='' method='post'>  
				 <table>
				 <tr> <td>Kode Pegawai </td><td> <input type='text' name='KodePeg1'>  </td></tr>  
				 <tr><td>Nama Pegawai </td><td> <input type='text' name='NamaPeg1'>  
				 </td></tr>  
				 <tr><td>Jenis Kelamin </td><td> <input type='text' name='JenisKel1'>  
				 </td></tr>
				 <tr><td>Tgl Lahir </td><td> <input type='date' name='TglLhr1'> 
				 </td></tr>  
				 <tr><td>Alamat</td><td> <input type='text' name='Alamat1'> </td> </tr>
				 <tr><td>Telp</td><td> <input type='text' name='Telp1'> </td> </tr>
				 <tr><td>Keterangan</td><td> <input type='text' name='Keterangan1'> </td> </tr>
				 <tr><td>Email</td><td> <input type='text' name='Email1'> </td> </tr>
				 <tr><td><input type='submit' value='Save' name='simpan'> </td> </tr> 
				 </table>
				 </form>  
				 ";
				}
				$sqlnya="select * from pegawai";
				$hasil=mysqli_query($koneksinya,$sqlnya);

				echo "<table border= '2'>";
				echo "<tr><td>Kode Pegawai </td><td>Nama Pegawai </td> <td>Jenis Kelamin</td><td>Tgl Lahir</td><td>Alamat </td>
					  <td>Telepon </td><td>Keterangan </td> <td>Email</td></tr>";
				if(mysqli_num_rows($hasil)>0)
				{
					while($baris=mysqli_fetch_assoc($hasil))
					{
						$a=$baris["KodePeg"];
						$b=$baris["NamaPeg"];
						$c=$baris["JenisKel"];
						$d=$baris["TglLhr"];
						$e=$baris["Alamat"];
						$f=$baris["Telp"];
						$g=$baris["Keterangan"];
						$h=$baris["Email"];
						echo "<form action='' method='post'>";
						echo "<tr><td><input type='text' value = '$a' name='KodePeg1'></td>";
						echo "<td><input type='text' value = '$b' name='NamaPeg1'></td>";
						echo "<td><input type='text' value = '$c' name='JenisKel1'></td>";
						echo "<td><input type='text' value = '$d' name='TglLhr1'></td>";
						echo "<td><input type='text' value = '$e' name='Alamat1'></td>";
						echo "<td><input type='text' value = '$f' name='Telp1'></td>";
						echo "<td><input type='text' value = '$g' name='Keterangan1'></td>";
						echo "<td><input type='text' value = '$h' name='Email1'></td>";
						echo "<td><input type='submit' value='edit' name='ubah'></td><td><input type='submit' value='delete' name='hapus'></td></tr>";
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
