<?php
	 session_start();
	if( !isset($_SESSION['userName']) || $_SESSION['Admin'] != 'Yes')
	{
		header('Location: login.php');
	}
	
	include_once("functions/db.php"); 

	$user = htmlspecialchars($_POST['n']);
	$pass = htmlspecialchars($_POST['p']);
	$adm = htmlspecialchars($_POST['adm']);
	
	$sql = "CREATE TABLE IF NOT EXISTS clients ( ID INT NOT NULL AUTO_INCREMENT, UserName TEXT, Password TEXT, IsAdmin TEXT, PRIMARY KEY (ID) )";
	
	$qury = mysqli_query($conn, $sql);
	$sql = "INSERT into clients (`UserName`, `Password`, `IsAdmin`) VALUES ('$user', '".md5(md5($pass))."', '$adm')";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed ".mysqli_error($db);
	}
	else
	{
		header('Location: users.php');
	}
?>