<?
   
if(isset($_POST['ans']))
{
	$ans = ($_POST['ans']);
	$ans = preg_replace('/[^\da-z]/i', "", $ans);
	$ans = strtolower($ans);
	if ($ans == $ques['answer'])
	{	
			$up = "UPDATE members SET level=level+1 WHERE Username = '$un'"; 
			$up1 = "UPDATE members SET time=CURRENT_TIMESTAMP WHERE Username = '$un'";
			$upd1 = mysql_query($up1) or die(mysql_error());
			$upd = mysql_query($up) or die(mysql_error());
			
		$a=2;
		?><meta http-equiv="refresh" content="0; url=<?echo $site?>/start.php"><?
	}
	else
	{
		$a=1;
	}
			
}
?>
