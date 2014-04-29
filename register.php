<?php
include ('config.php');
?>
<style type="text/css">
body {
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color: #fff;font-size:18px; color:#000; margin:5px 5px 5px 10px; 
}


.success{
		width:30%;
		background-size: 40px 40px;
		background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 55%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);										
		 box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
		 border: 1px solid;
		 color: #fff;
		 padding: 5px;
		 
		 z-index:4;
		 text-shadow: 0 1px 0 rgba(0,0,0,.5);
		 animation: animate-bg 5s linear infinite;
		 background-color: #61b832;
		 border-color: #55a12c;
		 }
.errormsgbox{
		width:30%;
		background-size: 40px 40px;
		background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 55%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);										
		 box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
		 border: 1px solid;
		 color: #fff;
		 padding: 5px;
		 
		 z-index:4;
		 text-shadow: 0 1px 0 rgba(0,0,0,.5);
		 animation: animate-bg 5s linear infinite;
		 background-color: #de4343;
		 border-color: #c43d3d;

		 }

</style>
<?
if (isset($_POST['formsubmitted'])) {
    $error = array();//Declare An Array to store any error message  
    if (empty($_POST['name'])) {//if no name has been supplied 
        $error[] = 'Please Enter a name ';//add to array "error"
    } else {
        $name = $_POST['name'];//else assign it a variable
    }

    if (empty($_POST['e-mail'])) {
        $error[] = 'Please Enter your Email ';
    } else {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {
           //regular expression for email validation
            $Email = $_POST['e-mail'];
        } else {
             $error[] = 'Your EMail Address is invalid  ';
        }


    }
	
	if (empty($_POST['n'])) {//if no name has been supplied 
        $error[] = 'Please Enter your name ';//add to array "error"
    } else {
        $n = $_POST['n'];//else assign it a variable
    }

    if (empty($_POST['Password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $Password = $_POST['Password'];
    }
	
		
	$s = $_POST['schoolname'];


    if (empty($error)) //send to Database if there's no error '

    { // If everything's OK...

        // Make sure the email address is available:
        $query_verify_email = "SELECT * FROM members  WHERE Email ='$Email'";
        $result_verify_email = mysqli_query($dbc, $query_verify_email);
        if (!$result_verify_email) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Email Already Taken! ';
        }
		
		$query_verify_un = "SELECT * FROM members  WHERE Username ='$name'";
        $result_verify_un = mysqli_query($dbc, $query_verify_un);
        if (!$result_verify_un) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Username Already Taken! ';
        }

        if ((mysqli_num_rows($result_verify_email) == 0) && (mysqli_num_rows($result_verify_un) == 0)) { // IF no previous user is using this email .


            // Create a unique  activation code:
            $activation = md5(uniqid(rand(), true));


            $query_insert_user = "INSERT INTO `members` ( `Username`, `Email`, `Password`, `Activation`, `name`, `school`) VALUES ( '$name', '$Email', '$Password', '$activation', '$n', '$s')";


            $result_insert_user = mysqli_query($dbc, $query_insert_user);
            if (!$result_insert_user) {
                echo 'Query Failed ';
            }

            if (mysqli_affected_rows($dbc) == 1) { //If the Insert Query was successfull.


                // Send the email:
                $link = $site . '/activate.php?email=' . urlencode($Email) . "&key=$activation";
				$message = " To activate your account, please click on this link or copy and paste it in your browser :\n\n";
                $message .= '<a href="' . $link . '">' . $link . '</a>';
                $headers = "From: " . $mail . "\r\n";
$headers .= "Reply-To: ". $mail . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				mail($Email, 'Registration Confirmation', $message, $headers);

                // Flush the buffered output.


                // Finish the page:
                echo '<div class="success"><p class="ta"> Thank you for registering! A confirmation email
							has been sent to '.$Email.' Please click on the Activation Link to Activate your account </p></div>';


            } else { // If it did not run OK.
                echo '<div class="errormsgbox"><p class="ta"> You could not be registered due to a systemerror. We apologize for any inconvenience.</p></div>';
            }

        } else { // The email address is not available.
            echo '<div class="errormsgbox" ><p class="ta">That email address has already been registered.</p>
</div>';
        }

    } else {//If the "error" array contains error msg , display them
        
        

echo '<div class="errormsgbox"> ';
        foreach ($error as $key => $values) {
            
            echo '	<p class="ta">'.$values.'</p>';


       
        }
        echo '</div>';

    }
  
    mysqli_close($dbc);//Close the DB Connection

 // End of the main Submit conditional.

}
else
{
?><META http-equiv="refresh" content="0;URL=<?echo $site?>/#toregister"><?
}
?>