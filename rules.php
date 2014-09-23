<?php 
ob_start();
    session_start();
	include ('config.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $sitetitle?> </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
	</head>
	<body class="left-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Content -->
					<div id="content">
						<div id="content-inner">
					
							<!-- Post -->
								<article class="is-post is-post-excerpt">
									<header>
										<h2><a href="#">Rules & Instructions!</a></h2>
										<span class="byline">Here is some info that would help you to solve the questions!</span>
									</header>
									<p>
									1.There are some intentional and some unintentional spelling and grammar mistakes in the questions :P</br>
									2.All the answers are alphanumeric, no special symbol & We have hired a team of trained hamsters who can understand your language so entering spaces or capital letters will make no difference.</br>
									3.Not All questions can be found on Google :P</br>
									4.Do NOT share Answers or else.........<br>
									5.Hints would be provided in the forum<br>
									6.That's it folks! Now you can proudly say that you have read the rules!</br>
									7.Point no. 2,3 & 6 are really important.</br>
									8.Admins are better than you.</br>
									9.You should not start reading the rules from the last!</br>
									</p>
										
								</article>
												</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
					
						<!-- Logo -->
							<div id="logo">
								<h1><a href="/"><?php echo $sitetitle?></a></h1>
							</div>
					
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li ><a href="/start.php">Start the Quiz</a></li>
									<li><a href="/rules.php">Rules </a></li>
									<li><a href="/leader.php">Leader Board</a></li>
									<?php if(!isset($_SESSION['Username']))
						{?><li><a href="/register.php">REGISTER</a></li><?php }
									else
									{
									?><li><a href="/logout.php">Logout</a></li><?php 
									}?>
								</ul>
							</nav>
					
						<?php if(!isset($_SESSION['Username']))
						{?>
							<form method="post" action="login.php" class="login">
							<H4 for="login">LOGIN </H4> 
								<p>
      
									<input type="text" name="Username" id="Username" placeholder="Username">
								</p>

								<p>
									<input type="password" name="Password" id="Password" placeholder="Password">
								</p>

									<input type="hidden" name="formsubmitted" value="TRUE" /><button type="submit" class="login-button">Login</button>
    

								<p class="forgot-password"><a href="forgot.php">Forgot password?</a></p>
							</form>
						<?php }?>
						
						<!-- Text -->
							<section class="is-text-style1">
								<div class="inner">
									<p>
										<strong><?php echo $sitedesc?></strong>
									</p>
								</div>
							</section>					

						<!-- Copyright -->
							<div id="copyright">
								<p>
									
									<?php  echo $bottom?>
								</p>
							</div>

					</div>

			</div>

	</body>
</html>
