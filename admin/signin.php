<?php 
	include_once("functions/db.php"); 
	session_start(); 
 
	$uname = htmlspecialchars($_POST['name']);
	$pass = htmlspecialchars($_POST['pwd']);

	$sql = "SELECT count(*),ID,IsAdmin FROM clients WHERE( UserName='".$uname."' AND Password='".md5(md5($pass))."')";

	$qury = mysqli_query($db, $sql);

	$result = mysqli_fetch_array($qury);
	
	if($result['count(*)']!=0)
	{
		$_SESSION['userName'] = $uname;
		$_SESSION['userID'] = $result['ID'];
		$_SESSION['Admin'] = $result['IsAdmin'];
		$_SESSION['IsAdmin'] = (($result['IsAdmin']=='Yes')?true:false);
		$_SESSION['time'] = time();
		
		$_SESSION['showMessage'] = "You are now logged in. Welcome";
		header('Location: index.php');
		exit;
	}
	header('Location: login.php');
?>