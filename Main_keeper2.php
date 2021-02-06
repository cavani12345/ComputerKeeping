<?php
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" type="text/css" href="CSS/css1.css" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>www.keep_computer_safe.com</title>
</head>
<body>

<table id="main" align="center" border="0">
<tr><td rowspan="3" class="sides"><div id="left">Enjoy</div></td><td id="top"><div id="menus">
<ul><li><a href="Main_keeper2.php" class="link">Ahabanza</a></li> 

<li><a class="link">Imashini</a>
<ul id="submenus11">
<li><a href="keep.php">1-Kubika</a></li><br />
<li><a href="give.php">2-Gutanga</a></li><br />
<li><a href="New_computer.php">3-Inshyashya</a></li><br />

</ul>
</li> 
&nbsp;
<li><a class="link">Ibya wakoze</a>
<ul id="submenus2">
<li><a href="what_did_i_keep.php">1-Wabitse</a></li><br />
<li><a href="what_did_i_give.php">2-Watanze</a></li><br />


</ul>
</li> 
&nbsp; 
<li><a href="Logout.php" class="link">Gusohoka</a></li></ul></td></tr>
<tr id="middle"><td><?php echo $_SESSION['NID']; ?></td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
