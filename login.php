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

<table id="main" align="center" border="0">
<tr><td rowspan="3" class="sides"><div id="left">Welcome</div></td><td id="top"><div id="menus"><a href="Main Page.php" class="link">Home</a> &nbsp;<a href="" class="link">About</a> &nbsp;
<a href="" class="link">Contact</a></td></tr>
<tr id="middle"><td><form action="login1.php" method="post"><table align="center" cellpadding="10">
<tr><td align="left"><label>CODE Yawe:</label></td><td>
<input type="number" name="id" min="1" required border="2" placeholder="Enter ID"> &nbsp; e.g: 1</td></tr>
<tr><td align="left"><label>Password:</label></td><td align="left">
<input type="password" name="password" required border="2" placeholder="Password"></td></tr>
<tr><td align="left"><input type="submit" name="login" value="Log in"></td><td>
<input type="reset" name="reset" value="Reset"><?php /*
echo base64_decode("am95");*/?></td></tr></table></form>
<br /><br />
<div><a href="forget_password.php"><font color="#CC3300" size="+1"><u>Forgot Password??</u></font></a></div><br /><br />
<div><a href="change_password.php"><font color="#CC3300" size="+1"><u>Change Password??</u></font></a></div></td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
