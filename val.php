<?php
$key = 'eb6cf9a6d08b8aba8d78113590d8235f';
if(!($_GET)){
	echo 'Error 404';
}
elseif($_GET['key'] == $key){
	$em = $_GET['em'];
	include "admin/functions/db.php";
	$sql = "SELECT * FROM quizval WHERE Email='".$em."'";
	$res = mysqli_query( $db, $sql );
	$array = mysqli_fetch_array($res);
	if($em == $array['Email']){
		echo $array['Valuesu'];
	}
	elseif($em == null){
		echo 'Email does not exists!!';
	}
	else{
		echo 'Email does not exists!!';
	}
}
else{}
?>