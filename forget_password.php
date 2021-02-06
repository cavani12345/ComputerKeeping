<?php
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" type="text/css" href="CSS/css.css" />
<style>
input[type=number]
{
font-family:"Times New Roman", Times, serif;
font-size:14px;
font-style:italic;
}
input[type=number]:hover
{
border:groove; color:#339966;
border-radius:6px; transition-duration:1s; width:150px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>www.keep_computer_safe.com</title>
</head>
<body>
<?php
include 'Call.php';
?>
<table id="main" align="center" border="0">
<tr><td rowspan="3" class="sides"><div id="left">Welcome</div></td><td id="top"><div id="menus"><a href="Main Page.php" class="link">Home</a> &nbsp;<a href="" class="link">About</a> &nbsp;
<a href="" class="link">Contact</a></td></tr>
<tr id="middle"><td><form action="forget_password.php" method="post"><table align="center" cellpadding="10"><tr><td><label>CODE:</label></td><td>
<input type="number" name="id" min="1" required border="2" placeholder="Code "> &nbsp; e.g: 1</td></tr>
<tr><td><label>Indangamuntu:</label></td><td align="left">
<input type="text" name="NID" required border="2" placeholder="Indangamuntu"></td></tr>
<tr><td><input type="submit" name="remind" value="Remind"></td><td>
<input type="reset" name="reset" value="Reset"><?php /*
echo base64_decode("am95");*/?></td></tr></table></form>
<br /><br />
<?php
if(isset($_POST['remind']))
{
$code=$_POST['id'];
$NID=$_POST['NID'];
$query="select password from keeper where keeper_Id=$code AND Id_number='$NID'";
$answer=mysql_db_query($database,$query);
$count=mysql_num_rows($answer);
if($count==0)
{
echo "<script> alert('Amakuru mutanze ntabwo ari yo');
window.location.href('forget_password.php'); </script>";
}
else
{
while($line=mysql_fetch_object($answer))
{
$pass=$line ->password;
$dec=base64_decode($pass);
echo "<script> alert('Password yanyu ni $dec');
window.location.href='login.php'; </script>";
}
}
}
?>
</td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
