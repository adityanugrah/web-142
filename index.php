<?php
	include('config.php');
	include('fungsi.php');

	session_start(); // Menciptakan session

	if(cek_login($mysqli) == true){
		header('location: ./depan.php');
		exit();	
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['username']) and isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(login($username, $password, $mysqli) == true){
				// Berhasil login
			if($_SESSION['level'] == "admin"){  // Jika user yang login admin
				header('location: http://localhost/dpweb/uas1/Halaman/Home.php'); // Alihkan ke halaman Home (home.php)
				exit();	
			}else{   // Jika user yang login selain admin
				header('location: http://localhost/dpweb/uas/login/depan.php'); // Alihkan ke halaman depan (depan.php)
				exit();	
			}
				
			}else{
				// Gagal login
				header('location: ./index.php');
				exit();	
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Kelapa Muda Online</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="post" class="form-login">
    <h2 align="center">Kelapa Muda Online</h2>
	<p>
    	<input type="text" name="username" placeholder="Username" class="normal-input" />
	</p>
    <p>
    	<input type="password" name="password" placeholder="Password" class="normal-input" />
	</p>
    <input type="submit" value="Login" class="tombol" name="login"  />
    
    </form>
</body>
</html>