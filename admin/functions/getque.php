<?php
session_start();
$q = $_GET['q'];
$qno = $_GET['que'];
$ses = $qno;

include "db.php";

if($qno != 1 && $qno != 2 && $qno != 10 && $qno != 19){
	$sql = "SELECT Opt".$q."A FROM questions WHERE ID=".$qno;
	$res = mysqli_query( $db, $sql );
	$array = mysqli_fetch_array($res);
	$q1 = $array['Opt'.$q.'A'];
}
else{
	$q1 = $q;
}

if( isset($_SESSION['answerString']) )
{
	$_SESSION['answerString'][ strval($ses)] = $q1;
}
else
{
	$_SESSION['answerString'] = array();
	$_SESSION['answerString'][ strval($ses)] = $q1;
}
//print_r($_SESSION['answerString']);exit;die;
if($qno == '1' || $qno == '10' || $qno == '19' || $qno == '21'){$q = "1";}

if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
else{
	if($qno == '2'){
		if(($_SESSION['answerString'][1] >= 21) && ($_SESSION['answerString'][1] <= 30)){
				$q = 1;
				$sql = "SELECT Opt1ID FROM questions WHERE ID=".$qno;
				$res = mysqli_query( $db, $sql );
				$array = mysqli_fetch_array($res);
				$sql1 = "SELECT * FROM questions WHERE ID=".$array['Opt'.$q.'ID'];
				$res1 = mysqli_query( $db, $sql1 );
				$array1 = mysqli_fetch_array($res1);
				if($array1['Opt3A'] != null){
					$opt3 = '<label class="radio-inline"><input type="radio" value="2" onchange="showUser(this.value)"><i id="opt" class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>'.$array1['Opt3An'].'</label>';
				}
				else{
					$opt3 ='';
				}
					echo '<div class="jumbotron" style="background-color: transparent;">
							<div class="row text-center">
								<div class="col-sm-12 text-center">
									<h1 style="font-family: Oswald, bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">'.$array1['Que'].'</h1><br />
									<h3><input type="hidden" id="qno" name="id" value="'.$array1['ID'].'">
									<label class="radio-inline"><input type="radio" value="1" onchange="showUser(this.value)"><i class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>'.$array1['Opt1An'].'</label>
									<label class="radio-inline"><input type="radio" value="2" onchange="showUser(this.value)"><i class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>'.$array1['Opt2An'].'</label>'.$opt3.'<h3>
								</div>
							</div>
						</div>';
		}
		elseif(($_SESSION['answerString'][1] >= 31) && ($_SESSION['answerString'][1] <= 46)){
			echo '<style>
					#qbtn:hover{
						background-color: white !important;
						color: black !important;
						transition: 0.5s;
					}
					</style>
					<div class="jumbotron" style="background-color: transparent;">
							<div class="row text-center">
								<div class="col-sm-12 text-center">
									<h1 style="font-family: Oswald, bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">Double income home?</h1><br />
									<h3><input type="hidden" id="qno" name="id" value="11">
									<label class="radio-inline"><input type="radio" value="1" onchange="showUser(this.value)"><i class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>YES</label>
									<label class="radio-inline"><input type="radio" value="2" onchange="showUser(this.value)"><i class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>NO</label><h3>
								</div>
							</div>
						</div>';
		}
		elseif(($_SESSION['answerString'][1] >= 47) && ($_SESSION['answerString'][1] <= 59)){
			echo '<style>
					#qbtn:hover{
						background-color: white !important;
						color: black !important;
						transition: 0.5s;
					}
					</style>
					<div class="jumbotron" style="background-color: transparent;">
						<div class="row text-center">
							<div class="col-sm-12 text-center">
								<h1 style="font-family: Oswald, bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">Have children?</h1><br />
								<h3><input type="hidden" id="qno" name="id" value="18">
								<label class="radio-inline"><input type="radio" value="1" onchange="showUser(this.value)"><i class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>YES</label>
								<label class="radio-inline"><input type="radio" value="2" onchange="showUser(this.value)"><i class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>NO</label><h3>
							</div>
						</div>
					</div>';
		}
	}
	elseif(($qno == '18' && $q == '1') || $q == '21'){
			$sql = "SELECT Opt1ID FROM questions WHERE ID=".$qno;
			$res = mysqli_query( $db, $sql );
			$array = mysqli_fetch_array($res);
			$sql1 = "SELECT * FROM questions WHERE ID=".$array['Opt1ID'];
			$res1 = mysqli_query( $db, $sql1 );
			$array1 = mysqli_fetch_array($res1);
			echo '<style>
					#qbtn:hover{
						background-color: white !important;
						color: black !important;
						transition: 0.5s;
					}
					</style>
					<div class="jumbotron" style="background-color: transparent;">
							<div class="row text-center">
								<div class="col-sm-12 text-center">
									<h1 style="font-family: Oswald, bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">'.$array1['Que'].'</h1><div class="row text-center">
										<div class="col-sm-4"></div>
										<div class="col-sm-4 text-center">
											<input type="hidden" id="qno" value="'.$array1['ID'].'"><br /><br />
											<input id="sal" style="font-size: x-large; color: white; background-color: transparent; border-color: white; border-width: medium; border-top-color: transparent; border-left-color: transparent; border-right-color: transparent;" type="text" class="valid form-control" placeholder="" onchange="showUser(this.value)" id="q"><br/>
											<div class="row text-center"><div class="col-sm-4"></div><div class="col-sm-4"><a style="width: 100%; color: white; background-color: transparent; border-color: white; font-size: large;" class="btn btn-default btn-lg">NEXT</a></div><div class="col-sm-4"></div></div>
										</div>
										<div class="col-sm-4"></div>
									</div>
								</div>
							</div>
						</div>';
		}
	elseif($qno == 9999){
		
		$valstr = json_encode($_SESSION['answerString']);
		$time = time();
		$sql = "CREATE TABLE IF NOT EXISTS quizval ( ID INT NOT NULL AUTO_INCREMENT, Email TEXT, Valuesu TEXT, Verified TEXT NULL, Doe TEXT, PRIMARY KEY (ID) )";
		$qury = mysqli_query($db, $sql);
		
		$sql="INSERT into quizval (`Email`, `Valuesu`, `Doe`) VALUES ('$q', '$valstr', '$time')";
		$qury = mysqli_query($db, $sql);
		echo '<style>
					#qbtn:hover{
						background-color: white !important;
						color: black !important;
						transition: 0.5s;
					}
					</style>
					<div class="jumbotron" style="background-color: transparent;">
					<div class="row text-center">
						<div class="col-sm-6 text-center">
							<p style="font-family: Vollkorn, regular !important; color: #fff; text-align: justify !important; font-size: initial;">
								Why, hello there! Thanks for letting us get to know you a little better. It feels like we\'re practically buddies now!
							</p>
							<p style="font-family: Vollkorn, regular !important; color: #fff; text-align: justify !important; font-size: initial;">
								We tried to estimate your future earnings and expenditures based off of our brief chat. See that white line? Those are your earnings (if things stay as they are). See the red line? Those are your expenses.
							</p>
							<p style="font-family: Vollkorn, regular !important; color: #fff; text-align: justify !important; font-size: initial;">
								Now you\'re probably wondering what those unruly spikes are. Those are large, unexpected expenses (like Housing, Children\'s Eduction, yada yada) that you can actually plan for if you invest smarter.
							</p>
							<p style="font-family: Vollkorn, regular !important; color: #fff; text-align: justify !important; font-size: initial;">
								Codebreak makes investing a breeze. Just sit back, relax, and let us do the work. And guess what? It’s free! Type in your email address in the box below so we can start you off!
							</p>
							<div class="row text-center">
								<div class="col-sm-2"></div>
								<div class="col-sm-6 text-center">
									<p style="font-family: Oswald, bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">Thanks! We\'ll get in touch with you right away!</p>
								</div>
								<div class="col-sm-2"></div>
							</div>
						</div>
						<div class="col-sm-6 text-center">
							<iframe style="width: 100%; height: 300px; overflow: hidden !important; border: 0px;" src="./test.php"></iframe>
						</div>
					</div>
				</div>';
	}
else{
	if($qno == '1'){
			echo '<style>
					#qbtn:hover{
						background-color: white !important;
						color: black !important;
						transition: 0.5s;
					}
					</style>
					<div class="jumbotron" style="background-color: transparent;">
							<div class="row text-center">
								<div class="col-sm-12 text-center">
									<h1 style="font-family: Oswald, bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">Your annual after tax salary?</h1><div class="row text-center">
										<div class="col-sm-4"></div>
										<div class="col-sm-4 text-center">
											<input type="hidden" id="qno" value="2"><br /><br />
											<input id="sal" style="font-size: x-large; color: white; background-color: transparent; border-color: white; border-width: medium; border-top-color: transparent; border-left-color: transparent; border-right-color: transparent;" type="text" class="valid form-control" placeholder="" onchange="showUser(this.value)" id="q"><br/>
											<div class="row text-center"><div class="col-sm-4"></div><div class="col-sm-4"><a style="width: 100%; color: white; background-color: transparent; border-color: white; font-size: large;" class="btn btn-default btn-lg">NEXT</a></div><div class="col-sm-4"></div></div>
										</div>
										<div class="col-sm-4"></div>
									</div>
								</div>
							</div>
						</div>';
		}
	elseif($qno == '9'){
			$sql = "SELECT Opt1ID FROM questions WHERE ID=".$qno;
			$res = mysqli_query( $db, $sql );
			$array = mysqli_fetch_array($res);
			$sql1 = "SELECT * FROM questions WHERE ID=".$array['Opt1ID'];
			$res1 = mysqli_query( $db, $sql1 );
			$array1 = mysqli_fetch_array($res1);
			echo '<style>
					#qbtn:hover{
						background-color: white !important;
						color: black !important;
						transition: 0.5s;
					}
					</style>
					<div class="jumbotron" style="background-color: transparent;">
					<div class="row text-center">
						<div class="col-sm-12 text-center">
							<h1 style="font-family: Oswald, bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">'.$array1['Que'].'</h1><div class="row text-center"><br /><br />
								<div class="col-sm-3"><h1 style="font-size: xx-large; font-family: Oswald, medium !important; text-transform: uppercase; color: #fff;">Once every</h1></div>
								<div class="col-sm-6 text-center">
									<input type="hidden" id="qno" value="'.$array1['ID'].'"><br />
									<input id="sal" style="font-size: x-large; color: white; background-color: transparent; border-color: white; border-width: medium; border-top-color: transparent; border-left-color: transparent; border-right-color: transparent;" type="text" class="valid form-control" placeholder="" onchange="showUser(this.value)" id="q"><br/>
									<div class="row text-center"><div class="col-sm-4"></div><div class="col-sm-4"><a id="qbtn" style="width: 100%; color: white; background-color: transparent; border-color: white; font-size: large;" class="btn btn-default btn-lg">NEXT</a></div><div class="col-sm-4"></div></div>
								</div>
								<div class="col-sm-3"><h1 style="font-size: xx-large; font-family: Oswald, medium !important; text-transform: uppercase; color: #fff;">Years</h1></div>
							</div>
						</div>
					</div>
				</div>';}
	else{
		if($qno == '2' || $qno == '10'){$q = "1";}
		$sql = "SELECT * FROM questions WHERE ID=".$qno;
		$res = mysqli_query( $db, $sql );
		
		if( !is_bool($res) )
		{
			while($array = mysqli_fetch_array($res))
			{
				if($array['Opt'.$q.'ID'] == '999'){
					echo '<style>
					#qbtn:hover{
						background-color: #E74C3C !important;
						color: black !important;
						transition: 0.5s;
					}
					</style>
					<div class="jumbotron" style="background-color: transparent;">
								<div class="row text-center">
									<div class="col-sm-6 text-center">
										<p style="font-family: Vollkorn, regular !important; color: #fff; text-align: justify !important; font-size: initial;">
											Why, hello there! Thanks for letting us get to know you a little better. It feels like we\'re practically buddies now!
										</p>
										<p style="font-family: Vollkorn, regular !important; color: #fff; text-align: justify !important; font-size: initial;">
											We tried to estimate your future earnings and expenditures based off of our brief chat. See that white line? Those are your earnings (if things stay as they are). See the red line? Those are your expenses.
										</p>
										<p style="font-family: Vollkorn, regular !important; color: #fff; text-align: justify !important; font-size: initial;">
											Now you\'re probably wondering what those unruly spikes are. Those are large, unexpected expenses (like Housing, Children\'s Eduction, yada yada) that you can actually plan for if you invest smarter.
										</p>
										<p style="font-family: Vollkorn, regular !important; color: #fff; text-align: justify !important; font-size: initial;">
											Codebreak makes investing a breeze. Just sit back, relax, and let us do the work. And guess what? It’s free! Type in your email address in the box below so we can start you off!
										</p>
										<div class="row text-left">
											<div class="col-sm-8 text-left">
												<input type="hidden" id="qno" value="9999">
												<input type="email" id="sal" style="height: 48px; color: black; font-family: Oswald, bold !important; text-transform: uppercase; border-radius: 2px !important;" type="text" class="valid form-control" placeholder="EMAIL" onchange="showUser1(this.value)" id="q"><br/>
													<a id="qbtn" style="color: white; width: 100%; height: 45px; background-color: #E74C3C; border-color: #E74C3C; font-weight: 600; font-family: Oswald, bold !important; text-transform: uppercase; border-radius: 2px !important; font-size: large;" class="btn btn-default">JOIN!</a>
											</div>
											<div class="col-sm-4"></div>
										</div>
									</div>
									<div class="col-sm-6 text-center">
										<iframe style="width: 100%; height: 300px; overflow: hidden !important; border: 0px;" src="./test.php"></iframe>
									</div>
								</div>
							</div>';
				}
				else{
				$sql1 = "SELECT * FROM questions WHERE ID=".$array['Opt'.$q.'ID'];
				$res1 = mysqli_query( $db, $sql1 );
				$array1 = mysqli_fetch_array($res1);
				if($array1['Opt3A'] != null){
					$opt3 = '<label class="radio-inline"><input type="radio" value="2" onchange="showUser(this.value)"><i id="opt" class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>'.$array1['Opt3An'].'</label>';
				}
				else{
					$opt3 ='';
				}
					echo '<div class="jumbotron" style="background-color: transparent;">
							<div class="row text-center">
								<div class="col-sm-12 text-center">
									<h1 style="font-family: Oswald, bold !important; text-transform: uppercase; color: #fff; font-weight: 900;">'.$array1['Que'].'</h1><br />
									<h3><input type="hidden" id="qno" name="id" value="'.$array1['ID'].'">
									<label class="radio-inline"><input type="radio" value="1" onchange="showUser(this.value)"><i class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>'.$array1['Opt1An'].'</label>
									<label class="radio-inline"><input type="radio" value="2" onchange="showUser(this.value)"><i class="fa fa-circle-thin fa-1x" aria-hidden="true"></i><br>'.$array1['Opt2An'].'</label>'.$opt3.'<h3>
								</div>
							</div>
						</div>';}}}}}}
?>