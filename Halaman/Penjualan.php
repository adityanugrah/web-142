<!doctype html>
<html>
	<head>
		<title> Kelapa Muda </title>
		<link rel="stylesheet" href="http://localhost/dpweb/uas1/css/style.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="http://localhost/dpweb/uas1/css/style1.css" media="screen" type="text/css" />
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
		<h2> Transaksi Penjualan </h2>
		<?php
		include "koneksi2.php";
		include "funcion2.php";

		$LastID=FormatNoTrans(OtomatisID());
		?>
		<?php
		session_start();
		if((empty($_GET["destroy"])==FALSE)){
		 session_destroy();

		}
		?>
		<form name="f" method="post" action="";">
			<table>
				<tr>
					<td>Kode Pembelian </td>
					<td>:</td>
					<td><input type="text" name="id_transaksi" disabled value="<?php echo $LastID ?>">
					</td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><input type="text" name="tanggal_transaksi" disabled value="<?php date_default_timezone_set("Asia/Jakarta");echo date("d-m-Y");?>" />
					</td>
				</tr>
				
				<tr>
					<td>Nama Produk</td>
					<td>:</td>
					<td>
						<select name="NamaBrg">
						<?php  
							include 'koneksi.php';
							$query = "SELECT NamaBrg FROM barang";
							$exec = mysql_query($query);
							while($row = mysql_fetch_assoc($exec))
							{
								$NamaBrg = $row["NamaBrg"];
								echo "<option value='".$row['NamaBrg']."'>".$row['NamaBrg']."</option>";
							}
						?>
						</select>
					</td>
				</tr>
				<tr>
					
				</tr>
				<tr>
					<td>Jumlah Barang</td>
					<td>:</td>
					<td><input type="number" required name="Stock" value="1"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<input type="submit" name="button" value="Tambah" />
					</td>
				</tr>
			</table>
		</form>	
		<form  action="actiontrans2.php" method="post">

		<table>
							<tr style="background-color:#E8DEBD">
							<th style="text-align:center">No.</th>
							<th style="text-align:center">Nama Barang</th>
							<th style="text-align:center">Harga Barang</th>
							<th style="text-align:center">Jumlah Barang</th>
							<th style="text-align:center">Sub Total</th>
							<th style="text-align:center" hidden>Kode Barang</th>
			<?php
			$awal=1;$sub=0;$total=0;
			if (@$_POST["NamaBrg"]!=''){
				if (empty($_SESSION["isi"])==TRUE){
					$_SESSION["isi"]=1;
				}else{
					$_SESSION["isi"]++;
				}
				@$NamaBrg = $_POST['NamaBrg'];
				$tampil = mysql_fetch_array(mysql_query("select NamaBrg, HargaJual from barang where NamaBrg = '$NamaBrg'"));
				@$NamaBrg= $tampil["NamaBrg"];
				@$HargaJual=$tampil["HargaJual"];
				@$Stock=trim($_POST["Stock"]);
				@$sub=$HargaJual*$Stock;
				$tampilid=mysql_fetch_array(mysql_query("select KodeBrg from barang where NamaBrg='$NamaBrg'"));
				@$KodeBrg=$tampilid["KodeBrg"];
				
				
				//@$xx=$xx+$sub;
				$_SESSION["akhir"][$_SESSION["isi"]]=array($NamaBrg,$HargaJual,$Stock,$sub,$KodeBrg);
			}//else{
				//echo "<script type='text/javascript'>alert('Silahkan isi terlebih dahulu!')</script>";
			//}

				@$awal = $_SESSION["isi"];
				
				for ($i=0;$i<=$awal;$i++) {
				if (@$_SESSION['akhir'][$i][0]!=''){ ?>
					<tr>
							<td><?php echo $i ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][0] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][1] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][2] ?></td>
							<td><?php echo @$_SESSION['akhir'][$i][3] ?></td>
							<td hidden><?php echo @$_SESSION['akhir'][$i][4] ?></td>
					</tr>
						
					
					<?php }
					$total=@$_SESSION['akhir'][$i][3]+$total;
					@$_SESSION['total'] = $total;
				}
			
			?>
			
			<tr>
			
			<tr>
				<td colspan=4>
				<?php echo "Grand Bayar";?>
				</td>
					<td>
					<?php echo " Rp. $total";?>
					</td>
			</tr>
			<tr>
			<td colspan=6>
							<input type='submit' value="Save" name="Simpan"/>
							<!--<a href='destroy.php'><input type='button' value='Hapus'></a>-->
			</td>
			</tr>			
			</tr>
						
			</table>
		</form>
	</div>
	
	<div id="footer">
		Copyright © Adit Juniior - 23:19 WIB
	</div>

</body>
</html>