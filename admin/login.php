<?php
	session_start();
	if(!isset($_SESSION['userName'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codebreak</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  @import "bourbon";

	body {
		background: #eee !important;	
	}

	.wrapper {	
		margin-top: 80px;
	  margin-bottom: 80px;
	}

	.form-signin {
	  max-width: 380px;
	  padding: 15px 35px 45px;
	  margin: 0 auto;
	  background-color: #fff;
	  border: 1px solid rgba(0,0,0,0.1);  

	  .form-signin-heading,
		.checkbox {
		  margin-bottom: 30px;
		}

		.checkbox {
		  font-weight: normal;
		}

		.form-control {
		  position: relative;
		  font-size: 16px;
		  height: auto;
		  padding: 10px;
			@include box-sizing(border-box);

			&:focus {
			  z-index: 2;
			}
		}

		input[type="text"] {
		  margin-bottom: -1px;
		  border-bottom-left-radius: 0;
		  border-bottom-right-radius: 0;
		}

		input[type="password"] {
		  margin-bottom: 20px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
	}
  </style>
</head>
<body>

<div class="container">
  <div class="wrapper">
    <form class="form-signin" action="signin.php" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="name" placeholder="Username" required="" autofocus="" /><br />
      <input type="password" class="form-control" name="pwd" placeholder="Password" required=""/><br />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </div>
</div>

</body>
</html>
<?php } else { header('Location: index.php');}
?>