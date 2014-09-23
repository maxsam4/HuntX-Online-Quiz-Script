<?php 
/*
HuntX - http://www.huntx.tk

Copyright (c) Mudit Gupta

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
ob_start();
    session_start();
include ('config.php');
if(!isset($_SESSION['Username']))
	{?><meta http-equiv="refresh" content="0; url=<?php echo $site?>"><?php }

$a=0;
$lvl = $user['level'];
$query2 = "SELECT * FROM questions WHERE level='$lvl'"; 	 
$result2 = mysql_query($query2) or die(mysql_error());
if (mysql_num_rows($result2) == 0) {
  ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $sitetitle?></title>
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
										<h2>NO MORE QUESTIONS!</h2>
									</header>
		
										
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

<?php 
}
else
{
$ques = mysql_fetch_array($result2) or die(mysql_error());
include ('check.php');
include ('body.php');
}
mysql_close($dbhandle);
?>
