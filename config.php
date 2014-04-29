<?
/*
HuntX - http://www.huntx.tk

Copyright (c) Mudit Gupta

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

$site = "http://www.huntx.tk"; //enter the site url in the same format
$mail = "muditthedevil@gmail.com"; //enter your email
$adminpassword = "admin"; //enter the password of the admin account.
$sitetitle = "HuntX";  //enter your site title
$sitedesc = "HuntX : The Online Treasure Hunt & Quiz Script!";  //Your site description
$bottom = "Site Developed by Mudit Gupta"; //Text at the bottom of your site
$username = "huntx_user";	//enter mysql user name
$password = "pass"; //enter mysql user password
$database = "huntx_db";  //enter database name
$hostname = "localhost"; 	//enter hostname (usually localhost)

$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

$selected = mysql_select_db($database,$dbhandle) 
  or die("Could not select examples");

$dbc = @mysqli_connect($hostname, $username, $password, $database);

if(isset($_SESSION['Username']))
{
$un = $_SESSION['Username'];

$query = "SELECT * FROM members WHERE Username = '$un'"; 
	 
$result = mysql_query($query) or die(mysql_error());

$user = mysql_fetch_array($result) or die(mysql_error());
}

?>