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
if(isset($_SESSION['Username']))
	{echo '<meta http-equiv="refresh" content="0; url=' . $site . '/start.php">';}

$aa=0;
include ('config.php');
if (isset($_POST['formsubmitted'])) {
    // Initialize a session:
session_start();
    $error = array();//this aaray will store all error messages
	

    if (empty($_POST['Username'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your Email ';
    } 	else {        $Username = $_POST['Username'];    }


    if (empty($_POST['Password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $Password = $_POST['Password'];
    }


       if (empty($error))//if the array is empty , it means no error found
    { 

       

        $query_check_credentials = "SELECT * FROM members WHERE (Username='$Username' AND md5(password)=md5('$Password')) AND Activation IS NULL";
   
        

        $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
            echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.

           


            $_SESSION = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable
           
echo '<meta http-equiv="refresh" content="0; url=' . $site . '/start.php">';
          

        }else
        { 
            
            $msg_error= 'Either Your Account is inactive or Username /Password is Incorrect';
        }

    }  else {
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
    
    
    if(isset($msg_error)){
        
        $aa=1;  
  }
    /// var_dump($error);
    mysqli_close($dbc);

} // End of the main Submit conditional.



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
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="<?php echo $site;?>/leader.php">
                    <strong>See the Leader Board</strong>
                </a>
                <span class="right">
                    <a href="<?php echo $site?>/rules.php">
                        <strong>Read the Rules</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1><?php echo $sitetitle?></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method="post" action="index.php" autocomplete="on"> 
                                <h1>Log in</h1> 
                                
                                
                                
								<?php 
									if(isset($_SESSION['Username']))
									{
									?><li><a href="/logout.php">Logout</a></li><?php 
									}?>
								</ul>
							</nav>
					
						<?php if(!isset($_SESSION['Username']))
						{?>
							<form method="post" action="index.php" class="login">
							
								<p>
      									<label for="username" class="uname" data-icon="u" > </br> </label>
									<input name="Username" required="required" type="text" id="Username" placeholder="Username">
								</p>

								<p><label for="password" class="youpasswd" data-icon="p"> </br> </label>
									<input name="Password" required="required" type="password" id="Password" placeholder="Password">
								</p>

									<input type="hidden" name="formsubmitted" value="TRUE" />
     <p class="login button"> 
                                    <input type="submit" value="Login" /> 
									
								</p>

								<p class="forgot-password"><a href="forgot.php">Forgot password?</a></p>
							</form>
						<?php }?>
						
                               
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>
						

                        <div id="register" class="animate form">
                            <form  method="post" action="register.php" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> <label for="username" class="uname" data-icon="u" >  </br></label>
                                    <input placeholder="Your Name" id="n" name="n" required="required" type="text"  />
                                </p>
                                <p> <label for="emailsignup" class="youmail" data-icon="e" > </br> </label>
                                    <input id="e-mail" name="e-mail" required="required" type="email" placeholder="Your Email"/> 
                                </p>
								
								<p> <label for="username" class="uname" data-icon="u" > </br> </label>
                                    <input  name="schoolname" required="required" type="text" placeholder="School Name" id="schoolname"/> 
                                </p>
<p> <label for="username" class="uname" data-icon="u" > </br> </label>
                                    <input id="name" name="name" required="required" type="text" placeholder="Your Username" />
                                </p>
                                <p> <label for="password" class="youpasswd" data-icon="p"> </br> </label>
                                    <input id="Password" name="Password" required="required" type="password" placeholder="Password"/>
                                </p>
                                <p class="signin button"> 
								<input type="hidden" name="formsubmitted" value="TRUE" />
									<input type="submit" name="send" value="Register" id="submit" /> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html><script>
