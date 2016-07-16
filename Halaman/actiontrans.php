<?php 
session_start();
include "koneksi2.php";
include "funcion.php";
$LastID=FormatNoTrans(OtomatisID());
$total=$_SESSION['total'];
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("y-m-d");
$namasuplier=$_POST['hasilsuplier'];
$sql = mysql_query("insert into tbltransaksi(idtransaksi, tanggal, grandtotal) values ('$LastID','$tanggal','$total')");

$awal = $_SESSION['isi'];
	$j=0;
	while($j <= $awal){
		$KodeBrg = @$_SESSION['akhir'][$j][4];
		$Stock = @$_SESSION['akhir'][$j][2];
		$sub = @$_SESSION['akhir'][$j][3];
		
		if($LastID!="" and $KodeBrg!="" and $Stock!=""){
			$query = mysql_query("INSERT INTO tbltransaksidetail (idtransaksi,KodeBrg,supplier,Stock,HargaJual)
				values('$LastID','$KodeBrg','$namasuplier','$Stock','$sub')
			");
			if($query){
				echo "<script>alert('berhasil masuk');<script>";
			}
			$tampilid=mysql_fetch_array(mysql_query("select StokBeli from barang where KodeBrg='$KodeBrg'"));
			@$stok_jual2=$tampilid["StokBeli"];
			@$stok_jual3=$stok_jual2+$Stock;
			$query3 = mysql_query("
				update barang set StokBeli='$stok_jual3' where KodeBrg='$KodeBrg' 
			");
		}
		$j++;
	}
	echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
	echo "<script>document.location.href='Pembelian.php';</script>";
	unset($_SESSION['isi']);
	unset($_SESSION['nilai']);
	echo "".mysql_error();

?>