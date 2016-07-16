<?php
	include('config.php');
	include('fungsi.php');

	session_start();

	if(cek_login($mysqli) == false){ 	// Jika user tidak login
		header('location: ./index.php'); // Alihkan ke halaman login (index.php)
		exit();	
	}
	
	// Cek apakah level yang login memenuhi kriteria halaman yang diakses
	if($_SESSION['level'] != "user"){  // Jika user yang login bukan level member
		header('location: ./logout.php'); // Alihkan ke halaman login (index.php)
		exit();	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Apa Kabar User </title>
		<link rel="stylesheet" href="http://localhost/dpweb/uas/css/style.css" media="screen" type="text/css" />
	</head>
	<body>

		<div id="header">
			<h1>Apa Kabar User</h1>
				<ul id="menu">
				  <li><a href="./ye.html">Home</a></li>
				  <li><a href="./tabel/tblbarang/tblbarang.php">Barang</a></li>
				  <li><a href="/js/default.asp">Pembelian</a></li>
				  <li><a href="/js/default.asp">Penjualan</a></li>
				  <li><a href="/php/default.asp">Supplier</a></li>
				  <li><a href="/php/default.asp">Pegawai</a></li>
				  <li><a href="http://localhost/dpweb/uas/login/logout.php">Keluar</a></li>
				</ul> 
		</div>

		<div id="nav">
			 
		</div>

		<div id="section">
			
			<h1 style="font-family:Arial, Helvetica, sans-serif;">Kelapa Muda</h1>
			<p>
				London is the capital city of England. It is the most populous city in the United Kingdom,
				with a metropolitan area of over 13 million inhabitants.
			</p>
			<p>
				Standing on the River Thames, London has been a major settlement for two millennia,
				its history going back to its founding by the Romans, who named it Londinium.
			</p>
		</div>
		
		<div id="footer">
		Copyright Aditya @ 2015
		</div>

	</body>
</html>
