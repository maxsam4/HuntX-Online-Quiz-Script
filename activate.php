<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Activate Your Account</title>


    
    
    
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

</head>
<body><?php 
include('config.php');



if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
{
    $email = $_GET['email'];
}
else
echo '<div class="errormsgbox">Oops !Your account could not be activated. Please recheck the link or contact the system administrator. <a href="/">Click here to continue</a></div>';
if (isset($_GET['key']) && (strlen($_GET['key']) == 32))//The Activation key will always be 32 since it is MD5 Hash
{
    $key = $_GET['key'];
}
else
echo '<div class="errormsgbox">Oops !Your account could not be activated. Please recheck the link or contact the system administrator. <a href="/">Click here to continue</a></div>';
	


if (isset($email))
{

    // Update the database to set the "activation" field to null
	
	$query = "SELECT * FROM members WHERE Email ='$email'"; 
	 
$result = mysql_query($query) or die(mysql_error());

$user = mysql_fetch_array($result) or die(mysql_error());
	
	
	$query_activate_account = "UPDATE members SET Activation=NULL WHERE(Email ='$email' AND Activation='$key')LIMIT 1";

   
    $result_activate_account = mysql_query($query_activate_account) ;

    // Print a customized message:
    $quer = "SELECT * FROM members WHERE Email ='$email'"; 
	 
$resul = mysql_query($quer) or die(mysql_error());

$use = mysql_fetch_array($resul) or die(mysql_error());

$as = $use['Activation'];
	if (!isset($as))//if update query was successfull
    {
    echo '<div class="success">Your account is now active. </br> <a href="/">Click here to continue</a></div>';

    } else
    {
        echo '<div class="errormsgbox">Oops !Your account could not be activated. Please recheck the link or contact the system administrator. <a href="/">Click here to continue</a></div>';
		
    }

    mysql_close($dbhandle);

} else {
        echo '<div class="errormsgbox">Error Occured .</div>';
}


?>
</body>
</html>
