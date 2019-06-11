<footer class="section bg-gray footer" style="background-color: #000000;">
	<div class="container">
		<div class="row">
		<?php
				$iPod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
				$iPhone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
				$iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
				$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
				if($iPad||$iPhone||$iPod||$android){?>
				<div class="col-sm-12 text-center">
						<div class="panel-group" id="accordion">
						  <div id="footpan" class="panel panel-default">
							<div id="foothead" class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapsef1">
									<h4 id="foottit" class="panel-title" style="font-family: 'Oswald', bold !important; text-transform: uppercase; font-size: large;">Company</h4>
								</a>
							</div>
							<div id="collapsef1" class="panel-collapse collapse">
							<div id="footbody" class="panel-body">
								<ul class="list-group">
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" href="jobs.php">Jobs</a></li>
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" href="faq.php">FAQ</a></li>
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" href="aboutus.php">Codebreak</a></li>
								</ul>
							</div>
							</div>
						  </div>
						  
						  <div id="footpan" class="panel panel-default">
							<div id="foothead" class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapsef2">
									<h4 id="foottit" class="panel-title" style="font-family: 'Oswald', bold !important; text-transform: uppercase; font-size: large;">Social</h4>
								</a>
							</div>
							<div id="collapsef2" class="panel-collapse collapse">
							<div id="footbody" class="panel-body">
								<ul class="list-group">
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" target="_blank" href="https://www.facebook.com/CodebreakHQ/">Facebook</a></li>
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" target="_blank" href="https://twitter.com/CodebreakHQ">Twitter</a></li>
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" target="_blank" href="https://in.pinterest.com/CodebreakHQ/">Pinterest</a></li>
								</ul>
							</div>
							</div>
						  </div>
						  
						  <div id="footpan" class="panel panel-default">
							<div id="foothead" class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapsef3">
									<h4 id="foottit" class="panel-title" style="font-family: 'Oswald', bold !important; text-transform: uppercase; font-size: large;">Business</h4>
								</a>
							</div>
							<div id="collapsef3" class="panel-collapse collapse">
							<div id="footbody" class="panel-body">
								<ul class="list-group">
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" href="faq.php?q=contact">Inquires</a></li>
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" href="terms.php" target="_blank">Terms of Service</a></li>
									<li id="foothead" class="list-group-item"><a style="font-size: large;" id="foottit" href="privacy.php" target="_blank">Privacy Policy</a></li>
								</ul>
							</div>
							</div>
						  </div>
						</div>
					</div><?php }else{?>
					<div class="col-sm-4 text-center">
						<h5 style="font-family: 'Oswald', bold !important; text-transform: uppercase; font-size: large;">Company</h5>
						<ul class="list-unstyled">
							<li><a style="font-size: large;" href="jobs.php">Jobs</a></li>
							<li><a style="font-size: large;" href="faq.php">FAQ</a></li>
							<li><a style="font-size: large;" href="aboutus.php">Codebreak</a></li>
						</ul>
					</div>

					<div class="col-sm-4 text-center">
						<h5 style="font-family: 'Oswald', bold !important; text-transform: uppercase; font-size: large;">Social</h5>
						<ul class="list-unstyled">
							<li><a style="font-size: large;" target="_blank" href="https://www.facebook.com/CodebreakHQ/">Facebook</a></li>
							<li><a style="font-size: large;" target="_blank" href="https://twitter.com/CodebreakHQ">Twitter</a></li>
							<li><a style="font-size: large;" target="_blank" href="https://in.pinterest.com/CodebreakHQ/">Pinterest</a></li>
						</ul>
					</div>

					<div class="col-sm-4 text-center">
						<h5 style="font-family: 'Oswald', bold !important; text-transform: uppercase; font-size: large;">Business</h5>
						<ul class="list-unstyled">
							<li><a style="font-size: large;" href="faq.php?q=contact">Inquires</a></li>
							<li><a style="font-size: large;" href="terms.php" target="_blank">Terms of Service</a></li>
							<li><a style="font-size: large;" href="privacy.php" target="_blank">Privacy Policy</a></li>
						</ul>
					</div><?php }?>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="footer-alt text-center">
					<p class="text-muted m-b-0">© <?php echo date('Y');?> Codebreak. All rights reserved.</p>
				</div>
			</div>
		</div> <!-- end row -->

	</div> <!-- end container -->
</footer>