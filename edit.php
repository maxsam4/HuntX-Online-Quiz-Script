<?php 
ob_start();
session_start();
if ($_SESSION['Username'] != 'admin')
{
    header("Location: adminlogin.php");
    exit();
}
include('config.php');
if (isset($_POST["id"]))
{
    $level  = $_POST['id'];
    $query2 = "SELECT * FROM questions WHERE level='$level'";
    $result2 = mysql_query($query2) or die(mysql_error());
    
    if (mysql_num_rows($result2) == 0)
    {
?>
		<!DOCTYPE html>
		<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
		<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
		<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
		<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
		<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
		<head>
		<meta charset="UTF-8" />
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
		<title><?php 
        echo $sitetitle;
?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style4.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		</head>
		<body>
		<div class="container">
		
		<header>
		<h1><?php 
        echo $sitetitle;
?></h1>
		<?php 
        include('nav.php');
?>	
		</header>
		<section>				
		<div id="container_demo" >
		
		<a class="hiddenanchor" id="toregister"></a>
		<a class="hiddenanchor" id="tologin"></a>
		<div id="wrapper">
		<div id="login" class="animate form">
		<h1>Question Does Not Exist!!</h1>
		<form method="post" action="edit.php" class="login">
		
		<p>
		<label for="username" class="uname" data-icon="u" > </br> </label>
		<input name="id" type="text" id="Username" required="required" placeholder="Enter Level Number">
		</p>

		
		<input type="hidden" name="formsubmitted" value="TRUE" />
		<p class="login button"> 
		<input type="submit" value="Submit" /> 
		
		</p>

		</form>
		</div>
		
		
		</div>
		</div>  
		</section>
		</div>
		</body>
		</html>
		<?php 
    }
    else
    {$q = mysql_fetch_array($result2) or die(mysql_error());
        if (isset($_POST['ques']))
        {
            session_start();
            $error             = array();
            $ques              = $_POST['ques'];
            $key               = ($_POST['key']);
            $key               = preg_replace('/[^\da-z]/i', "", $key);
            $key               = strtolower($key);
            $code              = $_POST['code'];
            $path              = "i/";
            $actual_image_name = $q['image'];
            $ie                = 0;
            $valid_formats     = array(
                "jpg",
                "png",
                "gif",
                "bmp",
                "jpeg"
            );
            {
                $name = $_FILES['photoimg']['name'];
                $size = $_FILES['photoimg']['size'];
                if (strlen($name))
                {
                    list($txt, $ext) = explode(".", $name);
                    if (in_array($ext, $valid_formats))
                    {
                        if ($size < (1024 * 1024))
                        {
                            $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
                            $tmp               = $_FILES['photoimg']['tmp_name'];
                            if (move_uploaded_file($tmp, $path . $actual_image_name))
                            {
                                $fm = 'Question Edited!';
                            }
                            else
                            {
                                $fm = 'failed';
                                $ie = 1;
                            }
                        }
                        else
                        {
                            $fm = 'Image file size max 1 MB';
                            $ie = 1;
                        }
                    }
                    else
                    {
                        $fm = 'Invalid image file format';
                        $ie = 1;
                    }
                }
                else
                    $fm = 'Question Edited!';
            }
            if ($ie == 0)
            {
                $query = "INSERT into `questions` (`level`,`question`,`image`,`answer`,`code`) values('$level','$ques','$actual_image_name','$key','$code')";
                $result = mysql_query($query) or die(mysql_error());
            }
?><!DOCTYPE html>
			<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
			<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
			<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
			<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
			<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
			<head>
			<meta charset="UTF-8" />
			<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
			<title><?php 
            echo $sitetitle;
?></title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

			
			<link rel="stylesheet" type="text/css" href="css/demo.css" />
			<link rel="stylesheet" type="text/css" href="css/style4.css" />
			<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
			</head>
			<body>
			<div class="container">
			
			<header>
			<h1><?php 
            echo $sitetitle;
?></h1>
			<?php 
            include('nav.php');
?>	
			</header>
			<section>				
			<div id="container_demo" >
			
			<a class="hiddenanchor" id="toregister"></a>
			<a class="hiddenanchor" id="tologin"></a>
			<div id="wrapper">
			<div id="login" class="animate form">
			<h1><?php 
            echo $fm;
?></h1>
			
			</div>
			
			
			</div>
			</div>  
			</section>
			</div>
			</body>
			</html><?php 
        }
        else
        {
?>


			<!DOCTYPE html>
			<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
			<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
			<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
			<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
			<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
			<head>
			<meta charset="UTF-8" />
			<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
			<title><?php 
            echo $sitetitle;
?></title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

			
			<link rel="stylesheet" type="text/css" href="css/demo.css" />
			<link rel="stylesheet" type="text/css" href="css/style4.css" />
			<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
			</head>
			<body>
			<div class="container">
			
			<header>
			<h1><?php 
            echo $sitetitle;
?></h1>
			<?php 
            include('nav.php');
?>		
			<script type="text/javascript" >
			$(document).ready(function() { 
				
				$('#photoimg').live('change', function()			{ 
					$("#preview").html('');
					$("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
					$("#imageform").ajaxForm({
target: '#preview'
					}).submit();
					
				});
			}); 
			</script>		
			</header>
			<section>				
			<div id="container_demo" >
			
			<a class="hiddenanchor" id="toregister"></a>
			<a class="hiddenanchor" id="tologin"></a>
			<div id="wrapper">
			<div id="login" class="animate form">
			<b><h1>Edit question number <?php 
            echo $level;
?></h1></b>
			<form method="post" action="edit.php" enctype="multipart/form-data" class="login">
			
			<p>
			<label for="username" class="uname" data-icon="u" > </br> </label>
			<input name="ques" type="text" id="Username" value="<?php 
            echo $q['question'];
?>">
			</p>	
			<p>Upload Image (only if changed)
			<input type="file" name="photoimg" id="photoimg" />						
			</p>
			<p>
			<p>
			<label for="username" class="uname" data-icon="u" > </br> </label>
			<input name="code" type="text" id="Username" value="<?php 
            echo $q['code'];
?>">
			</p>
			<p>
			<label for="username" class="uname" data-icon="u" > </br> </label>
			<input name="key" required="required" type="text" id="Username" value="<?php 
            echo $q['answer'];
?>">
			</p>

			<input type="hidden" name="formsubmitted" value="TRUE" />
			<input type="hidden" name="id" value="<?php 
            echo $level;
?>" />
			<p class="login button"> 
			<input type="submit" value="Submit" /> 
			
			</p>

			</form>
			</div>
			
			
			</div>
			</div>  
			</section>
			</div>
			</body>
			</html>

			<?php 
        }
    }
}
else
{
?>
	<!DOCTYPE html>
	<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
	<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
	<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
	<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="UTF-8" />
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
	<title><?php 
    echo $sitetitle;
?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/style4.css" />
	<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
	</head>
	<body>
	<div class="container">
	
	<header>
	<h1><?php 
    echo $sitetitle;
?></h1>
	<?php 
    include('nav.php');
?>	
	
	</header>
	<section>				
	<div id="container_demo" >
	
	<a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
	<div id="login" class="animate form">
	<h1>Enter the question number to edit!</h1>
	<form method="post" action="edit.php" class="login">
	
	<p>
	<label for="username" class="uname" data-icon="u" > </br> </label>
	<input name="id" type="text" id="Username" required="required" placeholder="Enter Level Number">
	</p>

	
	<input type="hidden" name="formsubmitted" value="TRUE" />
	<p class="login button"> 
	<input type="submit" value="Submit" /> 
	
	</p>

	</form>
	</div>
	
	
	</div>
	</div>  
	</section>
	</div>
	</body>
	</html>
	<?php 
}
?>