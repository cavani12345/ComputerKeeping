<?php
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="JAVASCRIPT/script1.js">
</script>
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
<tr id="middle"><td><form action="change_password.php" method="post" onsubmit="return validate();"><table align="center" cellpadding="10">
<tr><td align="left"><label>CODE:</label></td><td>
<input type="number" name="id" min="1" required border="2" placeholder="Code "> &nbsp; e.g: 1</td></tr>
<tr><td align="left"><label>Isanzwemo:</label></td><td align="left">
<input type="password" name="old" required border="2" placeholder="Password Usanganwe"></td></tr>
<tr><td align="left"><label>Inshyashya:</label></td><td align="left">
<input type="password" name="new" id="new" required border="2" placeholder="Password nshyashya"></td></tr>
<tr><td align="left"><label>Emeza Inshyashya:</label></td><td align="left">
<input type="password" name="renew" id="renew" required border="2" placeholder="yemeze"></td></tr>
<tr><td><input type="submit" name="change" value="Change"></td><td>
<input type="reset" name="reset" value="Reset"><?php /*
echo base64_decode("am95");*/?></td></tr></table></form>
<br /><br />
<?php
if(isset($_POST['change']))
{
$code=$_POST['id'];
$OP=$_POST['old'];
$new=$_POST['new'];
$enc=base64_encode($OP);
$query="select password from keeper where keeper_Id=$code AND password='$enc'";
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
$enc1=base64_encode($new);
$query1="update keeper set password='$enc1' where keeper_Id=$code AND password='$enc'";
$answer1=mysql_db_query($database,$query1);
if($answer1)
{
echo "<script> alert('Password yanyu yahindutse');
window.location.href='login.php'; </script>";
}
else
{
echo "<script> alert('Password yanyu Ntiyahindutse. Mwongere mugerageze');
window.location.href('change_password.php'); </script>";
}
}
}
}
mysql_close($connect);
?>
</td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
