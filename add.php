<?php
ob_start();
    session_start();
if($_SESSION['Username']!='admin'){
         header("Location: adminlogin.php");
    exit();

}
include('config.php');
$query2 = "SELECT * FROM questions";
$result2 = mysql_query($query2) or die(mysql_error());
$level = (mysql_num_rows($result2) + 1);
if (isset($_POST['formsubmitted'])) 
{  
	session_start();
	
$error = array();
	$ques = $_POST['ques'];    
	
	$key = ($_POST['key']);
	$key = preg_replace('/[^\da-z]/i', "", $key);
	$key = strtolower($key);
	$code = $_POST['code'];
		$path = "i/";
		$actual_image_name = '';
		$ie = 0;
	   $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg");
	   {
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									$fm = 'Question Added!';
								}
							else
								{$fm = 'failed';
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
						$fm = 'Invalid file format';
						$ie=1;
						}
				}
				
			else
				$fm = 'Question Added!';
				
			
		}
		if ($ie==0)
		{
	$query = "INSERT into `questions` (`level`,`question`,`image`,`answer`,`code`) values('$level','$ques','$actual_image_name','$key','$code')"; 
	$result = mysql_query($query) or die(mysql_error());
	}?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title><?echo $sitetitle?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   
        
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style4.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            
            <header>
                <h1><?echo $sitetitle?></h1>
<?include('nav.php');?>	
            </header>
            <section>				
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
    <h1><?echo $fm;?></h1>
							
                        </div>
						
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html><?
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
        <title><?echo $sitetitle?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   
        
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style4.css" />
		<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            
            <header>
                <h1><?echo $sitetitle?></h1>
				<?include('nav.php');?>	
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
    <b><h1>Add question number <?echo $level;?></h1></b>
							<form method="post" action="add.php" enctype="multipart/form-data" class="login">
							
								<p>
      									<label for="username" class="uname" data-icon="u" > </br> </label>
									<input name="ques" type="text" id="Username" placeholder="Question">
								</p>
								</p>
								
								<p>Upload Image
	<input type="file" name="photoimg" id="photoimg" />						
</p>
								<p>
      									<label for="username" class="uname" data-icon="u" > </br> </label>
									<input name="code" type="text" id="Username" placeholder="html code">
								</p>
								<p>
      									<label for="username" class="uname" data-icon="u" > </br> </label>
									<input name="key" required="required" type="text" id="Username" placeholder="Answer">
								</p>

									<input type="hidden" name="formsubmitted" value="TRUE" />
     <p class="login button"> 
                                    <input type="submit" value="Submit" /> 
									
								</p>

							</form>
                        </div>
						
						
                    </div>
                </div>  </section><section><div id="wrapper"><div id="container_demo" ><div id="login" class="animate form">
            
			<h1>Instructions!</h1>
			<p>1)	Entering image, html code and question are optional.</br>
2)	Entering the answer is mandatory.</br>
3)  Question can also contain html code.<br>
</p>
			</div></div></div>
			</section>
        </div>
    </body>
</html>

<?}?>