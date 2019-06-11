<?php
	 session_start();
	if( !isset($_SESSION['userName']) || $_SESSION['Admin'] != 'Yes')
	{
		header('Location: login.php');
	}
	elseif($_GET['id'] == null)
	{
		header('Location: faq.php');
	}
	else{
		$get = $_GET['id'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Faq</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<?php
		include_once "functions/db.php";
		$sql = "SELECT * FROM blog WHERE ID=".$get;
		$res = mysqli_query( $db, $sql );
		
		if( !is_bool($res) )
		{
			while($array = mysqli_fetch_array($res))
			{
				echo '<div class="jumbotron text-center">
							<h1>'.$array['Title'].'</h1> 
							<p>'.$array['Description'].'</p> 
						</div>
						<form action="functions/editblog.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label">Photo</label>
							<input type="file" class="form-control" name="file[]" multiple="multiple" required>
						</div>
						  <div class="form-group">
							<label for="tit">Title:</label>
							<input type="hidden" class="form-control" name="id" value="'.$array['ID'].'">
							<input type="text" class="form-control" name="title" value="'.$array['Title'].'">
						  </div>
						  <div class="form-group">
							<label for="ans">Answer:</label>
							<textarea type="text" class="form-control" name="answer">'.$array['RawDescription'].'</textarea>
						  </div>
						  <button type="submit" class="btn btn-default">Submit</button>
						</form>';
			}
		}
	?>
</div>

</body>
</html>