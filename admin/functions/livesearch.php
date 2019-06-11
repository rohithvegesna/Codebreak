<?php
error_reporting(0);
$q = $_GET['q'];
include "db.php";

if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
else{
	$sql = "SELECT * FROM faq WHERE Question LIKE '%".$q."%' OR Answer LIKE '%".$q."%' LIMIT 3";
	$res = mysqli_query( $db, $sql );
		while($array = mysqli_fetch_array($res))
		{
			echo '<a style="color: black !important; font-family: Oswald, bold !important; font-size: large;" href="faq.php?q='.$array['Url'].'">'.$array['Question'].'</a><hr>';
		}
	}