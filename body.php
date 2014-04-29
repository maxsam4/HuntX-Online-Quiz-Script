<!DOCTYPE HTML>
<html>
	<head>
		<title><?echo $sitetitle?></title>
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
										<h2><a href="#">Level <?=$lvl;?></a></h2>
									</header>
		<p><?
if($a==1)
{
	?><div class="errormsgbox1"><p class="ta">Naah...</br>Try something else.</p></div><?
}
else if($a==2)
{
	?><div class="successbox"><p class="ta">YEAH!!</br>You got it.</p></div><?
}
?></p>			
<p>
<?if(isset($ques['question']) && $ques['question']!=''){?>
<? echo $ques['question'] ?><br></br>
<?}?>
<?if(isset($ques['image']) && $ques['image']!=''){?>									
<img src="/i/<?echo $ques['image']?>" alt="" />
<?}?>
</p>
			<form action="start.php" method="post" >						
    <p>
      <input type="text" name="ans" id="ans" placeholder="answer">
    </p>
			<input type="hidden" name="formsubmitted" value="TRUE" />
         <button type="submit" class="ans-button">TRY THIS !!</button>
		 </form>
		 <?if(isset($ques['code']) && $ques['code']!=''){ echo $ques['code']; }?>
										
								</article>
												</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
					
						<!-- Logo -->
							<div id="logo">
								<h1><a href="/"><?echo $sitetitle?></a></h1>
							</div>
					
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li ><a href="/start.php">Start the Quiz</a></li>
									<li><a href="/rules.php">Rules </a></li>
									<li><a href="/leader.php">Leader Board</a></li>
									<?if(!isset($_SESSION['Username']))
						{?><li><a href="/register.php">REGISTER</a></li><?}
									else
									{
									?><li><a href="/logout.php">Logout</a></li><?
									}?>
								</ul>
							</nav>
					
						<?if(!isset($_SESSION['Username']))
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
						<?}?>
						
						<!-- Text -->
							<section class="is-text-style1">
								<div class="inner">
									<p>
										<strong><?echo $sitedesc?></strong>
									</p>
								</div>
							</section>					

						<!-- Copyright -->
							<div id="copyright">
								<p>
									
									<? echo $bottom?>
								</p>
							</div>

					</div>

			</div>

	</body>
</html>
