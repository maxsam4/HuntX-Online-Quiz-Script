<?php 
if(isset($_POST['ans']))
{
$un = ($_POST['ans']);
$error = array();
if (empty($_POST['ans'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your Email ';
    }
else if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['ans'])) {
           $error[] = 'Invalid Email!';
		   }
else
{


include ('config.php');

$query = "SELECT * FROM members WHERE Email = '$un'";
$result = mysql_query($query) ; 

if(!$result){
            $error[] = 'Invalid Email!';
        }
else
{		
$user = mysql_fetch_array($result) or die(mysql_error());
$uu = $user['Username'];
$up = $user['Password'];


	
		
	$message = " The password for username $uu is $up ";
                
                mail($un, 'Password', $message, '');
$error[] = 'Password sent via Email Successfully!';
				}}
echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
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
										<h2><a href="#">Forgot your password?</a></h2>
										<span class="byline">Resend your password to your email.</span>
									</header>
		
									<p>Enter your email below</p>
			<form action="forgot.php" method="post" >						
    <p>
      <input type="text" name="ans" id="ans" placeholder="someone@example.com">
    </p>
			<input type="hidden" name="formsubmitted" value="TRUE" />
         <button type="submit" class="login-button">Submit</button>
		 </form>
										
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
