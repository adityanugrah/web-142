<?php
	$konek=mysql_connect("localhost","root","");
	$db=mysql_select_db("uas1", $konek);
	$namasup=$_GET['namasup'];
	echo $namasup;
	
?>