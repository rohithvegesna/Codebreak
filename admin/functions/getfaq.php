<?php
error_reporting(0);
$q = $_GET['q'];
include "db.php";

if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
else{
		if($q == '5'){
			echo '<h1 style="font-size: xx-large; color: black; font-weight: 600;">Inquires</h1><br />
					<p><form action="admin/functions/contact.php" method="post">
					<div class="form-group">
						<label for="text">Select Region:</label>
						<input type="text" class="form-control" name="state" id="text" required>
					</div>
					<div class="row"><div class="col-sm-6">
					<div class="form-group">
						<label for="text">Business Name:</label>
						<input type="text" class="form-control" name="name" id="text" required>
					</div>
					</div>
					<div class="col-sm-6">
					<div class="form-group">
						<label for="text">Type of Business:</label>
						<input type="text" class="form-control" name="business" id="text" required>
					</div>
					</div></div>
					<div class="row"><div class="col-sm-6">
					<div class="form-group">
						<label for="text">Mobile Number:</label>
						<input type="number" class="form-control" name="mobile" id="text" pattern=".{10,10}" required>
					</div>
					</div>
					<div class="col-sm-6">
					<div class="form-group">
						<label for="text">Email Address:</label>
						<input type="email" class="form-control" name="email" id="text" required>
					</div>
					</div></div>
					<div class="form-group">
						<label for="text">What would you like to say to us?</label>
						<textarea type="text" class="form-control" name="querry" id="text" maxlength="500" required></textarea>
					</div>
						<div class="checkbox">
						<label><input type="checkbox" required>Agree Terms & conditions</label>
					</div>
						<button style="font-family: Oswald, bold !important; text-transform: uppercase;" type="submit" class="btn btn-default">Submit</button>
					</form></p>';
					
				if( $_GET['sent'] == 'success' )
					{
						echo '<div class="alert alert-success">
								  <strong>Success!</strong> Thank You for your querry '.$_GET['name'].'. We will get back to you in a while.
								</div>';
					}
				else {}
		}
		elseif($q == '4'){
			echo '<h1 style="font-size: xx-large; color: black; font-weight: 600;">Feedback</h1><br />
					<p><form action="admin/functions/feedback.php" method="post">
					<div class="row"><div class="col-sm-6">
					<div class="form-group">
						<label for="text">First Name:</label>
						<input type="text" class="form-control" name="name" id="text" required>
					</div>
					</div>
					<div class="col-sm-6">
					<div class="form-group">
						<label for="text">Last Name:</label>
						<input type="text" class="form-control" name="business" id="text" required>
					</div>
					</div></div>
					<div class="row"><div class="col-sm-6">
					<div class="form-group">
						<label for="text">Mobile Number:</label>
						<input type="number" class="form-control" name="mobile" id="text" pattern=".{10,10}">
					</div>
					</div>
					<div class="col-sm-6">
					<div class="form-group">
						<label for="text">Email Address:</label>
						<input type="email" class="form-control" name="email" id="text" required>
					</div>
					</div></div>
					<div class="form-group">
						<label for="text">Please describe your issue:</label>
						<textarea type="text" class="form-control" name="querry" id="text" maxlength="500" required></textarea>
					</div>
						<button style="font-family: Oswald, bold !important; text-transform: uppercase;" type="submit" class="btn btn-default">Submit</button>
					</form></p>';
					
				if( $_GET['sent'] == 'success' )
					{
						echo '<div class="alert alert-success">
								  <strong>Success!</strong> Thank You for your querry '.$_GET['name'].'. We will get back to you in a while.
								</div>';
					}
				else {}
		}
		else{
			$sql = "SELECT * FROM faq WHERE Menu='".$q."' ORDER BY ID ASC";
			$res = mysqli_query( $db, $sql );
			
				while($array = mysqli_fetch_array($res))
				{
					$string = $array['Answer'];
					$patterns = array();
					$patterns[0] = '/@enter@/';
					$replacements = array();
					$replacements[0] = '<br>';
					$ans = preg_replace($patterns, $replacements, $string);
					echo '<div class="panel-group" id="accordion">
							  <div class="panel panel-default">
								<div id="panel-heading" class="panel-heading">
								  <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$array['ID'].'">
								   <h4 id="panel-title" class="panel-title">'.$array['Question'].'</h4>
								  </a>
								</div>
								<div id="collapse'.$array['ID'].'" class="panel-collapse collapse">
								  <div id="panel-body" class="panel-body">'.$ans.'</div>
								</div>
							  </div>
							</div>';
				}
				}
	}