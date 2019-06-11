<?php
	include_once('db.php');
	
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$answer = mysqli_real_escape_string($conn, $_POST['answer']);
		$url = mysqli_real_escape_string($conn, $_POST['url']);
		
		$sql = "UPDATE faq SET Question = '$title', Rawanswer = '$answer', Url = '$url' WHERE ID=".$id;
		$qury = mysqli_query($conn, $sql);
		
		$sql1 = "SELECT ID FROM faq WHERE Question='$title' AND Rawanswer='$answer'";
		
		$res1 = mysqli_fetch_array(mysqli_query($conn, $sql1));
		$ID = $res1['ID'];
		
		$rawDesc = $answer;
		$rawDesc = preg_replace('/@url_(.*?)_(.*?)@/', '<a target="_blank" href="//$2">$1</a>', $rawDesc);
		$rawDesc = preg_replace('/@sub_(.*?)@/', '</p><h2>$1</h2><p>', $rawDesc);
		$rawDesc = preg_replace('/@b_(.*?)@/', '<span style="font-weight: bold;">$1</span>', $rawDesc);
		$rawDesc = preg_replace('/@i_(.*?)@/', '<span style="font-style: italic;">$1</span>', $rawDesc);
		$rawDesc = preg_replace('/@u_(.*?)@/', '<span style="text-decoration: underline;">$1</span>', $rawDesc);
		$rawDesc = preg_replace('/@enter@/', '<br>', $rawDesc);
		preg_match_all('/@pic_([0-9]*?)@/', $rawDesc, $matches, PREG_OFFSET_CAPTURE );
		
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
		
		$sql2 = "UPDATE `faq` SET `Answer`='$rawDesc' WHERE ID=$ID";
		$qury2 = mysqli_query($conn, $sql2);
		if(!$qury) echo "Database Error ! Failed !";
		mysqli_close( $conn );
		if(!$qury) {
			echo "Database Error ! Failed !";
		}
		else {
			header("Location: ../faq.php");
			}