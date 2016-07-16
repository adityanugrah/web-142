<?php
function OtomatisID() 
{ 
$querycount="SELECT count(idtransaksi) as LastID FROM tbltransaksi"; 
$result=mysql_query($querycount) or die(mysql_error()); 
$row=mysql_fetch_array($result, MYSQL_ASSOC);
return $row['LastID']; 
}

function FormatNoTrans($num) { 
		$num=$num+1; switch (strlen($num)) 
		{     
		case 1 : $NoTrans = "KM0000".$num; break;     
		case 2 : $NoTrans = "KM000".$num; break;     
		case 3 : $NoTrans = "KM00".$num; break;     
		case 4 : $NoTrans = "KM0".$num; break;     
		default: $NoTrans = $num;        
		}           
		return $NoTrans; 
} 
?>