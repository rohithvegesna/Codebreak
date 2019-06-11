<?php
	 session_start();
	if( !isset($_SESSION['userName']) || $_SESSION['Admin'] != 'Yes')
	{
		header('Location: login.php');
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Codebreak ~ Admin</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">
	    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a class="simple-text">
					Codebreak
				</a>
			</div>

	    	<div class="sidebar-wrapper">
				<ul class="nav">
	                <li>
	                    <a href="index.php">
	                        <i class="material-icons">question_answer</i>
	                        <p>New Post</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="table.php">
	                        <i class="material-icons">content_paste</i>
	                        <p>Blog Posts</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="notifications.php">
	                        <i class="material-icons text-gray">notifications</i>
	                        <p>Notifications</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="newjob.php">
	                        <i class="material-icons">accessibility</i>
	                        <p>New Job</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="application.php">
	                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
	                        <p>Applications</p>
	                    </a>
	                </li>
	                <li class="active">
	                    <a href="faq.php">
	                        <i class="fa fa-question-circle" aria-hidden="true"></i>
	                        <p>Faq</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="feedback.php">
	                        <i class="fa fa-comments-o" aria-hidden="true"></i>
	                        <p>Feedback</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="users.php">
	                        <i class="fa fa-users" aria-hidden="true"></i>
	                        <p>Users</p>
	                    </a>
	                </li>
					<li>
	                    <a href="logout.php">
	                        <i class="fa fa-sign-out" aria-hidden="true"></i>
	                        <p>LogOut</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">FAQ</h4>
									<p class="category">Please make sure what you are doing !!</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="functions/newfaq.php" method="post" enctype="multipart/form-data">
	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group">
													<label class="control-label">Photo</label>
													<input type="file" class="form-control" name="file[]" multiple="multiple">
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Question</label>
													<textarea type="text" class="form-control" name="que" required></textarea>
												</div>
	                                        </div>
	                                    </div>
										
	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Answer</label>
													<textarea type="text" class="form-control" name="ans" required></textarea>
												</div>
	                                        </div>
	                                    </div>
										
	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Menu</label>
													<select class="form-control" name="menu" required>
														<option value="1">Getting started</option>
														<option value="2">Discover</option>
														<option value="3">Utility</option>
													</select>
												</div>
	                                        </div>
	                                    </div>
										
	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">URL</label>
													<textarea type="text" class="form-control" name="url" required></textarea>
												</div>
	                                        </div>
	                                    </div>
	                                    <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right">Post</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
					<div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Faq's</h4>
	                                <p class="category"></p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Title</th>
	                                    	<th>Edit</th>
	                                    	<th>Delete</th>
	                                    </thead>
	                                    <tbody>
	                                        <?php
											include_once "functions/db.php";
											$sql = "SELECT * FROM faq";
											$res = mysqli_query( $db, $sql );
											
											if( !is_bool($res) )
											{
												while($array = mysqli_fetch_array($res))
												{
													echo '<tr>
															<td>'.$array['Question'].'</td>
															<td><a class="btn btn-primary" target="_blank" href="editfaq.php?id='.$array['ID'].'">Edit</a></td>
															<td><a class="btn btn-primary" href="functions/delfaq.php?id='.$array['ID'].'">Delete</a></td>
														  </tr>';
												}}?>
	                                    </tbody>
	                                </table>

	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <footer class="footer">
	            <div class="container-fluid">
	                <p class="copyright pull-right">&copy;<script>document.write(new Date().getFullYear())</script> Codebreak.</p>
	            </div>
	        </footer>
	    </div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

</html>
