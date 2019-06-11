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
	                <li class="active">
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
	                <li>
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
	                                <h4 class="title">Blog</h4>
									<p class="category">Please make sure what you are doing !!</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="functions/newpost.php" method="post" enctype="multipart/form-data">
	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group">
													<label class="control-label">Photo</label>
													<input type="file" class="form-control" id="file" name="file[]" multiple="multiple" required>
													<output id="result" />
												</div>
	                                        </div>
	                                    </div>
										
										<div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Headding</label>
													<textarea type="text" class="form-control" name="title" required></textarea>
												</div>
	                                        </div>
	                                    </div>
										
	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Content</label>
													<textarea type="text" style="height: 300px;" class="form-control" name="desc" required></textarea>
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
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<script>
	window.onload = function(){
        
    //Check File API support
		if(window.File && window.FileList && window.FileReader)
		{
			var filesInput = document.getElementById("file");
			
			filesInput.addEventListener("change", function(event){
				
				var files = event.target.files; //FileList object
				var output = document.getElementById("result");
				
				for(var i = 0; i< files.length; i++)
				{
					var file = files[i];
					
					//Only pics
					if(!file.type.match('image'))
					  continue;
					
					var picReader = new FileReader();
					
					picReader.addEventListener("load",function(event){
						
						var picFile = event.target;
						
						var div = document.createElement("div");
						
						div.innerHTML = "<img style='width: 50%;' src='" + picFile.result + "' title='" + picFile.name + "'/>";
						
						output.insertBefore(div,null);            
					
					});
					
					 //Read the image
					picReader.readAsDataURL(file);
				}                               
			   
			});
		}
		else
		{
			console.log("Your browser does not support File API");
		}
	}
	</script>

</html>
