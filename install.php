<?
include ('config.php');
$newtable = "CREATE TABLE IF NOT EXISTS members ( ". 
  "Memberid int(10) NOT NULL AUTO_INCREMENT, ".
  "Username varchar(200) NOT NULL, ".
  "Email varchar(200) NOT NULL, ".
  "Password varchar(36) NOT NULL, ".
  "Activation varchar(40) DEFAULT NULL, ".
  "level int(11) NOT NULL DEFAULT '1',".
  "time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,".
  "name text NOT NULL,".
  "school text NOT NULL,".
  "PRIMARY KEY (Memberid)".
  ")";
$newtable2 = "CREATE TABLE IF NOT EXISTS questions ( ". 
  "level int(10) NOT NULL,".
  "question text DEFAULT NULL,".
  "image text DEFAULT NULL,".
  "answer text DEFAULT NULL,".
  "code text DEFAULT NULL,".
  "PRIMARY KEY (level)".
  ")";
$run = mysql_query($newtable) or die(mysql_error());
$run2 = mysql_query($newtable2) or die(mysql_error());
$query_insert_user = "INSERT INTO `members` ( `Username`, `Email`, `Password`, `Activation`, `name`, `school`) VALUES ( 'admin', '$mail', '$adminpassword', NULL, 'admin', 'admin')";
$result_insert_user = mysqli_query($dbc, $query_insert_user);
echo "Installation Completed, you may now delete this file";
?>
