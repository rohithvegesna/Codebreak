<?php
	
	if( !isset($_POST) || !isset($_POST['que']) )
	{
		var_dump($_POST);
		exit("No Form Submitted !"); die;
	}
	include_once('db.php');
	$time = time();
	
	$que = mysqli_real_escape_string($conn, $_POST['que']);
	$ans = mysqli_real_escape_string($conn, $_POST['ans']);
	$menu = mysqli_real_escape_string($conn, $_POST['menu']);
	$url = mysqli_real_escape_string($conn, $_POST['url']);
	
	$validextensions = array("jpeg", "jpg", "png", "gif", "JPG");
	
	for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
	{
		$ext = explode('.', basename($_FILES['file']['name'][$i]));
		$file_extension = end($ext);
		if( !in_array($file_extension, $validextensions) )  
		{
			
		}
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS faq ( ID INT NOT NULL AUTO_INCREMENT, Question TEXT, Rawanswer TEXT, Answer TEXT, Menu TEXT, Url TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";

	$sql = "INSERT into faq (`Question`, `Rawanswer`, `Answer`, `Menu`, `Url`) VALUES ('$que', '$ans', '', '$menu', '$url')";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	$sql = "SELECT ID FROM faq WHERE Question='$que' AND Rawanswer='$ans'";
	$res = mysqli_fetch_array(mysqli_query($conn, $sql));
	$ID = $res['ID'];
	
	$rawDesc = $ans;
	$rawDesc = preg_replace('/@url_(.*?)_(.*?)@/', '<a target="_blank" href="//$2">$1</a>', $rawDesc);
	$rawDesc = preg_replace('/@sub_(.*?)@/', '</p><h2>$1</h2><p>', $rawDesc);
	$rawDesc = preg_replace('/@b_(.*?)@/', '<span style="font-weight: bold;">$1</span>', $rawDesc);
	$rawDesc = preg_replace('/@i_(.*?)@/', '<span style="font-style: italic;">$1</span>', $rawDesc);
	$rawDesc = preg_replace('/@u_(.*?)@/', '<span style="text-decoration: underline;">$1</span>', $rawDesc);
	$rawDesc = preg_replace('/@enter@/', '<br>', $rawDesc);
	
	preg_match_all('/@pic_([0-9]*?)@/', $rawDesc, $matches, PREG_OFFSET_CAPTURE );
	
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
		$Replacement = '<br /><br /><div class="row"><div class="col-sm-12 text-center"><img style="width:50%;" src="admin/img/'.$ID.'_faq_'.$match[0].'.'.getFileExtension($match[0]).'" /></div></div><br /><br />';
		echo "Replaceing ".$match[0]." with ". $Replacement.PHP_EOL;
		$diff = strlen($Replacement) - strlen($matches[0][$no][0]);
		
		$rawDesc = substr_replace( $rawDesc, $Replacement, $matches[0][$no][1], strlen($matches[0][$no][0]));
		
		for( $k = $no; $k < sizeof($matches[0]); $k++ )
		{
			$matches[0][$k][1] += $diff;
		}
		$no++;
	}
	
	$sql = "UPDATE `faq` SET `Answer`='$rawDesc' WHERE ID=$ID";
	$qury = mysqli_query($conn, $sql);
	if(!$qury) echo "Database Error ! Failed !";
	
	$target_path = "../img/";
	
	for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
	{
		$ext = explode('.', basename($_FILES['file']['name'][$i]));
		$file_extension = end($ext);
		$name = pathinfo($_FILES['file']['name'][$i]);
		$target_path = "../img/" . $ID . "_faq_" . basename($_FILES['file']['name'][$i], '.'.$name['extension']). "." . $ext[count($ext) - 1];
		
		if( in_array($file_extension, $validextensions) )  
		{
			if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) 
			{
				header("Location: ../faq.php");
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
	header("Location: ../faq.php");
?>


