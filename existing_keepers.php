<?php
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" type="text/css" href="CSS/css1.css" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>www.keep_computer_safe.com</title>
<style>
input[type=text]
{
font-family:"Times New Roman", Times, serif;
}
input[type=text]:hover
{
border-radius:8px;
border-collapse:separate;
border-color:#0033FF;
}
input[type=submit]
{
font-style:italic; font-size:25px; border-style:solid; background-color:#3366FF;
}
input[type=submit]:hover
{
border-radius:12px;
background-color:#FF3366;
}
#this:hover{ border-radius:37px;}
.data:nth-child(odd)
{
background-color:#99CCFF;
}
.data:hover
{ background-color:#006666;}
</style>
</head>
<body>
<?php
include 'Call.php';
?>
<table id="main" align="center" border="0">
<tr><td rowspan="3" class="sides"><div id="left">Enjoy</div></td><td id="top"><div id="menus">
<ul><li><a href="Main_keeper1.php" class="link">Home</a></li> 

<li><a class="link">Keepers</a>
<ul id="submenus1" style="margin-left:250px;">
<li><a href="existing_keepers.php">1-Existing</a></li><br />
<li><a href="add_keeper.php">3-Add New</a></li>
</ul>
</li> 
&nbsp;
<li><a class="link">Reports</a>
<ul id="submenus2" style="margin-left:400px;">
<li><a href="Kept.php">1-Kept</a></li><br />
<li><a href="Given.php">2-Given</a></li><br />


</ul>
</li> 
&nbsp; 
<li><a href="Logout.php" class="link">Gusohoka</a></li></ul></td></tr>
<tr id="middle"><td><div id="scrol" style="overflow:auto; max-height:450px;">
<?php
$query="select* from keeper INNER JOIN type_of_keeper INNER JOIN District ON keeper.type=type_of_keeper.id and keeper.District_Id=district.District_id ORDER BY type ";
$answer=mysql_db_query($database,$query);
$count=mysql_num_rows($answer);
if($count==0)
{
echo"<script> alert('No Keeper.');
window.location.href('Main_keeper1.php');</script>";
}
else
{
?>
<div align="right"><a href="Edit_Keeper.php"><font color="#CC3300" size="+3">Edit One</font></a></div>
<table align="center" cellspacing="2" cellpadding="7" >
<tr bgcolor="#6699FF"><th>NAME</th><th>GENDER</th><th>NATIONAL ID</th><th>PHONE</th><th>DISTRICT</th></tr>
<?php
while($line=mysql_fetch_object($answer))
{
$id=$line ->keeper_Id;
$Fname=$line ->First_Name;
$gender=$line ->gender;
$Lname=$line ->Last_Name;
$district=$line ->District_Name;
$NID=$line ->Id_number;
$phone=$line ->phone;
?>
<tr class="data"><td align="left"><?php echo "$Fname $Lname";?></td><td align="left"><?php echo "$gender"; ?></td><td align="left"><abbr title="ID:<?php echo "$id"; ?>"><?php echo "$NID"; ?></abbr></td><td align="left"><?php echo "$phone"; ?></td><td align="left"><?php echo "$district"; ?></td></tr>
<?php
}
}
mysql_close($connect);
?>
</table>
</div>

</td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
