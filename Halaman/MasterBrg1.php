<!DOCTYPE html>
<html>
	<head>
		<title> Barang Online </title>
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
				$a=$_POST["KodeBrg1"];
				$b=$_POST["NamaBrg1"];
				$c=$_POST["HrgBeli1"];
				$d=$_POST["HrgJual1"];
				$e=$_POST["Stok1"];
				$f=$_POST["Stok21"];
				$g=$_POST["Stok22"];
				$sqlnya="update barang set NamaBrg='$b',HargaBeli='$c',HargaJual='$d',Stock='$e',StokJual='$f',StokBeli='$g' where KodeBrg='$a' ";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				}


				if(isset($_POST["simpan"]))
				{
				$a=$_POST["KodeBrg1"];
				$b=$_POST["NamaBrg1"];
				$c=$_POST["HrgBeli1"];
				$d=$_POST["HrgJual1"];
				$e=$_POST["Stok1"];
				$f=$_POST["Stok21"];
				$g=$_POST["Stok22"];
				$sqlnya="insert into barang values('$a','$b','$c','$d','$e','$f','$g')";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				 }
				if(isset($_POST["hapus"]))
				{
				$a=$_POST["KodeBrg1"];
				$sqlnya="delete from barang where KodeBrg = '$a'";
				$hasil=mysqli_query($koneksinya,$sqlnya);
				}
				if(isset($_POST["ubah"])) 
				{
				$a=$_POST["KodeBrg1"];
				$b=$_POST["NamaBrg1"];
				$c=$_POST["HrgBeli1"];
				$d=$_POST["HrgJual1"];
				$e=$_POST["Stok1"];	
				$f=$_POST["Stok21"];
				$g=$_POST["Stok22"];

				echo " 
				 <form action='' method='post'>  
				 <table>
				 <tr> <td>Kode Barang: </td><td> <input type='text' name='KodeBrg1' value='$a'>  </td></tr>  
				 <tr><td>Nama Barang: </td><td> <input type='text' name='NamaBrg1' value='$b'>  
				 </td></tr>  
				 <tr><td>Harga Beli: </td><td> <input type='text' name='HrgBeli1' value='$c'>  
				 </td></tr>
				 <tr><td>Harga Jual: </td><td> <input type='text' name='HrgJual1' value='$d'> 
				 </td></tr>  
				 <tr><td>Stock: </td><td> <input type='text' name='Stok1' value='$e'> </td> </tr>
				 <tr><td hidden>Stock1: </td><td hidden> <input type='text' name='Stok21' value='$f'> </td></tr>
				 <tr><td hidden>Stock2: </td><td hidden> <input type='text' name='Stok22' value='$g'> </td></tr>
				 <tr><td><input type='submit' value='Save' name='simpanedit'> </td> </tr> 
				 </table>
				 </form>  
				 ";
				}
				else {
				echo " 
				 <form action='' method='post'>  
				 <table>
				 <tr> <td>Kode Barang: </td><td> <input type='text' name='KodeBrg1'>  </td></tr>  
				 <tr><td>Nama Barang: </td><td> <input type='text' name='NamaBrg1'>  
				 </td></tr>  
				 <tr><td>Harga Beli: </td><td> <input type='text' name='HrgBeli1'>  
				 </td></tr>
				 <tr><td>Harga Jual: </td><td> <input type='text' name='HrgJual1'> 
				 </td></tr>  
				 <tr><td>Stock: </td><td> <input type='text' name='Stok1'> </td> </tr>
				 <tr><td hidden>Stock: </td><td hidden> <input type='text' name='Stok21'> </td> </tr>
				 <tr><td hidden>Stock: </td><td hidden> <input type='text' name='Stok22'> </td> </tr>
				 <tr><td><input type='submit' value='Save' name='simpan'> </td> </tr> 
				 </table>
				 </form>  
				 ";
				}
				$sqlnya="select * from barang";
				$hasil=mysqli_query($koneksinya,$sqlnya);

				echo "<table border= '2'>";
				echo "<tr><td>Kode Barang </td><td>Nama Barang </td> <td>Harga Beli</td><td>Harga Jual</td><td>Stock </td></tr>";
				if(mysqli_num_rows($hasil)>0)
				{
					while($baris=mysqli_fetch_assoc($hasil))
					{
						$a=$baris["KodeBrg"];
						$b=$baris["NamaBrg"];
						$c=$baris["HargaBeli"];
						$d=$baris["HargaJual"];
						$e=$baris["Stock"];
						$f=$baris["StokJual"];
						$g=$baris["StokBeli"];
						echo "<form action='' method='post'>";
						echo "<tr><td><input type='text' value = '$a' name='KodeBrg1'></td>";
						echo "<td><input type='text' value = '$b' name='NamaBrg1'></td>";
						echo "<td><input type='text' value = '$c' name='HrgBeli1'></td>";
						echo "<td><input type='text' value = '$d' name='HrgJual1'></td>";
						echo "<td><input type='text' value = '$e' name='Stok1'></td>";
						echo "<td hidden><input type='text' value = '$f' name='Stok21'></td>";
						echo "<td hidden><input type='text' value = '$g' name='Stok22'></td>";
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
