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
?><table id="main" align="center" border="0">
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
<form action="Edit_Keeper.php" method="post">
<input type="text" name="search" required /> &nbsp;<input type="submit" value="Search" name="searchi" />
</form><br /><br /><br /><br />
<?php
if(isset($_POST['searchi']))
{
$sea=$_POST['search'];
$query="select* from keeper INNER JOIN type_of_keeper INNER JOIN District ON keeper.type=type_of_keeper.id and keeper.District_Id=district.District_id where keeper_Id='$sea' or Id_number='$sea' ";
$answer=mysql_db_query($database,$query);
$count=mysql_num_rows($answer);
if($count==0)
{
echo"<script> alert('No Keeper found.');
window.location.href='Edit_Keeper.php';</script>";
}
else
{
?>

<?php
while($line=mysql_fetch_object($answer))
{
$id=$line ->keeper_Id;
$Fname=$line ->First_Name;
$gender=$line ->gender;
$Lname=$line ->Last_Name;
$district=$line ->District_Name;
$district_id=$line -> District_Id;
$NID=$line ->Id_number;
$type_id=$line ->type;
$phone=$line ->phone;
?>
<div style="text-align:center; border:solid; width:400px; margin-left:400px; border-bottom:none;">
<form action="Edit_Keeper1.php" method="post">
<table align="center" cellpadding="5">
<caption><input type="hidden" name="idd" value="<?php echo "$id"; ?>" /></caption>
<tr><td align="left">
<label>First Name:</label></td><td><input type="text" name="fname" value="<?php echo "$Fname"; ?>" /></td></tr>
<tr><td align="left">
<label>Last Name:</label></td><td><input type="text" name="lname" value="<?php echo "$Lname"; ?>" /></td></tr>
<tr><td align="left">
<label>National ID:</label></td><td><input type="text" name="id" value="<?php echo "$NID"; ?>" /></td></tr>
<tr><td align="left">
<label>Phone:</label></td><td><input type="text" name="phone" value="<?php echo "$phone"; ?>" /></td></tr>
<tr><td align="left">
<label>Gender:</label></td><td align="left"><select name="gender"><option value="<?php echo "$gender"; ?>">Choose Gender</option>
<option value="Female">Female</option>
<option value="Male">Male</option></select></td></tr>
<tr><td align="left">
<label>District:</label></td><td align="left">
<select name="district">
<option value="<?php echo "$district_id"; ?>">Please choose</option>
<?php 
$query1="select* from district ORDER BY District_Name";
$answer=mysql_db_query($database,$query1);
$count=mysql_num_rows($answer);
while($line=mysql_fetch_object($answer))
{
$D_name=$line ->District_Name;
$D_Id=$line ->District_Id;
?>
>
<option value="<?php echo $D_Id ?>"><?php echo $D_name ?></option>
<?php
}
?>
</select></td></tr>
<tr>
<td align="left"><label>Type:</label></td><td align="left">
<select name="type">
<option value="<?php echo "$type_id"; ?>">Type here</option
><?php 
$query11="select* from type_of_keeper";
$answer11=mysql_db_query($database,$query11);
$count11=mysql_num_rows($answer11);
while($line=mysql_fetch_object($answer11))
{
$T_name=$line ->name;
$T_Id=$line ->id;
?>
>
<option value="<?php echo $T_Id ?>"><?php echo $T_name ?></option>
<?php
}
?>
</select><br /><br />
</td>
</tr>
<tr><td>
</td><td></td></tr>
<tr><td>
<input type="submit" value="UPDATE" name="update" style=" padding:1px; 1px; background-color:#0066FF;" /></td><td><input type="reset" name="reset" value="RESET" />
</td></tr>
</table></form></div>

<?php 

}

}

}


mysql_close($connect);
?>


</div>

</td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
