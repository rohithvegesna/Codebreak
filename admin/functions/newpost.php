<?php
	
	if( !isset($_POST) || !isset($_POST['title']) )
	{
		var_dump($_POST);
		exit("No Form Submitted !"); die;
	}
	include_once('db.php');
	$time = time();
	
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$des = mysqli_real_escape_string($conn, $_POST['desc']);
	
	$validextensions = array("jpeg", "jpg", "png", "gif", "JPG");
	
	for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
	{
		$ext = explode('.', basename($_FILES['file']['name'][$i]));
		$file_extension = end($ext);
		if( !in_array($file_extension, $validextensions) )  
		{
			exit("Invalid Extension file Selected.");die;
		}
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS blog ( ID INT NOT NULL AUTO_INCREMENT, Title TEXT, RawDescription TEXT, Description TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	$sql = "INSERT into blog (`Title`, `RawDescription`, `Description`, `Doe`) VALUES ('$title', '$des', '', '$time')";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	$sql = "SELECT ID FROM blog WHERE Title='$title' AND RawDescription='$des' AND Doe='$time'";
	$res = mysqli_fetch_array(mysqli_query($conn, $sql));
	$ID = $res['ID'];
	
	$rawDesc = $des;
	$rawDesc = preg_replace('/@url_(.*?)_(.*?)@/', '<a target="_blank" href="$2">$1</a>', $rawDesc); //checking url from string
	$rawDesc = preg_replace('/@sub_(.*?)@/', '</p><h2>$1</h2><p>', $rawDesc); //checking subtitles
	$rawDesc = preg_replace('/@b_(.*?)@/', '<span style="font-weight: bold;">$1</span>', $rawDesc); //checking bold letters
	$rawDesc = preg_replace('/@i_(.*?)@/', '<span style="font-style: italic;">$1</span>', $rawDesc); //checking italic text
	$rawDesc = preg_replace('/@u_(.*?)@/', '<span style="text-decoration: underline;">$1</span>', $rawDesc); //checking underlined text
	$rawDesc = preg_replace('/@enter@/', '<br>', $rawDesc); //checking line breaks
	
	preg_match_all('/@pic_([0-9]*?)@/', $rawDesc, $matches, PREG_OFFSET_CAPTURE ); //checking pictures
	
	function getFileExtension( $filename )
	{
		foreach( $_FILES['file']['name'] as $UploadFilename ) 
		{
			$UploadedFileparts = pathinfo($UploadFilename);
			if( $UploadedFileparts['filename'] === $filename )
			{
				return $UploadedFileparts['extension'];
			}
		}
	}
	
	$no = 0;
	foreach( $matches[1] as $match )
	{
		$Replacement = '<br /><br /><img style="width:50%;" src="admin/img/'.$ID.'_blog_'.$match[0].'.'.getFileExtension($match[0]).'" /><br /><br />'; //replacing with image tag
		echo "Replaceing ".$match[0]." with ". $Replacement.PHP_EOL;
		$diff = strlen($Replacement) - strlen($matches[0][$no][0]);
		
		$rawDesc = substr_replace( $rawDesc, $Replacement, $matches[0][$no][1], strlen($matches[0][$no][0]));
		
		for( $k = $no; $k < sizeof($matches[0]); $k++ )
		{
			$matches[0][$k][1] += $diff;
		}
		$no++;
	}
	
	$sql = "UPDATE `blog` SET `Description`='$rawDesc' WHERE ID=$ID";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	$target_path = "../img/";
	
	for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
	{
		$ext = explode('.', basename($_FILES['file']['name'][$i]));
		$file_extension = end($ext);
		$name = pathinfo($_FILES['file']['name'][$i]);
		$target_path = "../img/" . $ID . "_blog_" . basename($_FILES['file']['name'][$i], '.'.$name['extension']). "." . $ext[count($ext) - 1]; //getting file ext
		
		if( in_array($file_extension, $validextensions) )  
		{
			if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) 
			{
				header("Location: ../index.php");
			} 
			else 
			{
				echo "Failed.";
			}
		} 
		else 
		{
			echo "Failed.";
		}
	}
	header("Location: ../index.php");
?>


