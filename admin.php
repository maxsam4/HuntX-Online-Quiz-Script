<?php 
ob_start();
    session_start();
if($_SESSION['Username']!='admin'){
         header("Location: adminlogin.php");
    exit();

}
include('config.php');
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
        <title><?php echo $sitetitle?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   
        
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style4.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            
            <header>
                <h1><?php echo $sitetitle?></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    
                    <div id="wrapper">
                        <div id="login" class="animate form">
     
   <h1>Admin Panel</h1>
<p class="login button"> 
                                    <input type="submit" onclick="location.href = '/add.php';" value="Add Question"> 
									
								
                                    <input type="submit" onclick="location.href = '/edit.php';" value="Edit Question"> 
									
								
                                    <input type="submit" onclick="location.href = '/users.php';" value="See user details"> 
									
								</p>
									

									
								

                        </div>
						
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>