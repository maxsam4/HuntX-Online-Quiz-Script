<?php 


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
           
?><meta http-equiv="refresh" content="0; url=<?php echo $site?>/admin.php"><?php 
          

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
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $sitetitle?></title>
  <link rel="stylesheet" href="css/loginstyle.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  

  <form method="post" action="adminlogin.php" class="login">
    
	<p>
      <label for="Username">Username:</label>
      <input type="text" name="Username" id="Username" value="admin">
    </p>

    <p>
      <label for="Password">Password:</label>
      <input type="password" name="Password" id="Password" placeholder="password">
    </p>

    <p class="login-submit">
      <input type="hidden" name="formsubmitted" value="TRUE" /><button type="submit" class="login-button">Login</button>
    </p>
<?php if($aa==1)
  {?>
	<p class="forgot-password"><font color="red">Either Your Account is inactive or Username/Password is Incorrect</font></p>
<?php }?>
    <p class="forgot-password"><a href="forgot.php">Forgot your password?</a></p>
	<p class="forgot-password"><a href="register.php" target="_parent">Don't have an account? Register now</a></p>
  </form>

  
</body>
</html>
