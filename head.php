<!-- Navbar -->
        <div class="navbar navbar-custom sticky" role="navigation" id="sticky-nav" <?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'blog' || $_SESSION['page'] == 'index' || $_SESSION['page'] == 'about' || $_SESSION['page'] == 'down' || $_SESSION['page'] == 'new' || $_SESSION['page'] == 'jobs' || $_SESSION['page'] == 'faq' || $_SESSION['page'] == 'gal' )		{echo 'style="background-color: transparent;"';} elseif( isset($_SESSION['page']) && $_SESSION['page'] == 'blogdes' )		{echo 'style="background-color: black;"';} else{echo 'style="background-color: #1A2B32;"';}?>>
            <div class="container">

                <!-- Navbar-header -->
                <div class="navbar-header">

                    <!-- Responsive menu button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- LOGO -->
                    <a class="navbar-brand logo" href="index.php">
                        <img id="my_image" style="width: 150px; height: initial;" src="assets/images/logo.png" />
                    </a>

                </div>
                <!-- end navbar-header -->

                <!-- menu -->
                <div class="navbar-collapse collapse" id="navbar-menu" <?php
				$iPod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
				$iPhone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
				$iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
				$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
				if($iPad||$iPhone||$iPod||$android){echo 'style="background-color: black;"';} else{}?>>

                    <!-- Navbar left -->
                    <ul id="navfont" class="nav navbar-nav navbar-right"><!--nav-custom-left-->
                        <li <?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'index' )		echo 'class="active"';?>>
                            <a style="font-family: 'Oswald', medium !important; text-transform: uppercase !important; font-size: large !important;" href="index.php" class="nav-link">Home</a><?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'index' )		echo '<hr style="height: .25rem;margin: 0;background: white;border: none;">';?>
                        </li>
                        <li <?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'blog' )		echo 'class="active"';?>>
                            <a style="font-family: 'Oswald', medium !important; text-transform: uppercase !important; font-size: large !important;" href="blog.php" class="nav-link">Blog</a><?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'blog' )		echo '<hr style="height: .25rem;margin: 0;background: white;border: none;">';?>
                        </li>
                        <li <?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'down' )		echo 'class="active"';?>>
                            <a style="font-family: 'Oswald', medium !important; text-transform: uppercase !important; font-size: large !important;" href="download.php" class="nav-link">Download</a><?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'down' )		echo '<hr style="height: .25rem;margin: 0;background: white;border: none;">';?>
                        </li>
                        <li <?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'gal' )		echo 'class="active"';?>>
                            <a style="font-family: 'Oswald', medium !important; text-transform: uppercase !important; font-size: large !important;" href="adverts.php" class="nav-link">Adverts</a><?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'gal' )		echo '<hr style="height: .2rem;margin: 0;background: white;border: none;">';?>
                        </li>
                        <li <?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'new' )		echo 'class="active"';?>>
                            <a style="font-family: 'Oswald', medium !important; text-transform: uppercase !important; font-size: large !important;" href="whatsnew.php" class="nav-link">What's New?</a><?php if( isset($_SESSION['page']) && $_SESSION['page'] == 'new' )		echo '<hr style="height: .25rem;margin: 0;background: white;border: none;">';?>
                        </li>
                    </ul>

                </div>
                <!--/Menu -->
            </div>
            <!-- end container -->
        </div>
        <!-- End navbar-custom -->