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
abbr:hover{ font-size:34px;}
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
<div id="shaka">
<style>
#current{ text-align:left;}
</style>
<div align="left" style="margin-left:100px;"><a href="Current_Stock.php"><font color="#CC3300" size="+3">Current Stock</font></a></div>
<div align="center">
<a href="Print_kept.php"><font color="#3300CC" size="+1">Go To Print</font></a>
</div>
<br /><br />
<form action="Kept.php" method="post" name="Myform" style="display:block; text-align:right; margin-right:140px; margin-top:20px;" onsubmit="return validate();">
<input type="date" name="date" id="search"  style="padding:3px 20px;" /> &nbsp; &nbsp;<input type="submit" name="search" value="Search" style="padding:2px 5px; background-color:#FFFFFF" /><br />
</form></div> 
<br />
<?php
if(isset($_POST['search']))
{
$getdate=$_POST['date'];
$q="select computer.Serial_Number as CSN,computer.Name as CN,owner.Reg_Number as ORN,owner.First_Name as OFN,owner.gender as OG,owner.Last_Name as OLN,owner.Department as OD,owner.Phone as OP,district.District_Name as DDN,keeper.Id_number as KIN,keeper.First_Name as KFN,keeper.Last_Name as KLN,keeper.gender as KG,keeper.phone as KP,keep.keep_date as KKD from computer INNER JOIN owner INNER JOIN keep INNER JOIN keeper INNER JOIN status INNER JOIN district ON computer.Serial_Number=keep.Serial_Number AND owner.Reg_Number=computer.Owner_Reg_Number AND keeper.keeper_Id=keep.keeper_id AND computer.mode=status.id and keeper.District_Id=district.District_Id where keep.keep_date like '%$getdate%' ORDER BY keep.id desc";
$an=mysql_db_query($database,$q);
$c=mysql_num_rows($an);
if($c==0)
{
?>

<table align="center" cellspacing="2" cellpadding="7" >
<tr bgcolor="#6699FF"><th>COMPUTER</th><th>OWNER</th><th>KEEPER</th></tr>
<tr><td>No Data </td><td>No Data</td><td>No Data</td></tr></table>
<?php
}
else
{
?>
<table align="center" cellspacing="2" cellpadding="7" >
<tr bgcolor="#6699FF"><th>COMPUTER</th><th>OWNER</th><th>KEEPER</th></tr>
<?php
while($line=mysql_fetch_object($an))
{
//$keeper_id=$line ->keeper_Id;
$Serial_Number=$line ->CSN;
$Computer_Name=$line ->CN;
$Owner_Reg_Number=$line ->ORN;
$Owner_Fname=$line ->OFN;
$Owner_gender=$line ->OG;
$Owner_Lname=$line ->OLN;
$Owner_dept=$line ->OD;
$keeper_district=$line ->DDN;
$NID=$line ->KIN;
$Owner_phone=$line ->OP;
$keeper_Fname=$line ->KFN;
$keeper_Lname=$line ->KLN;
$keeper_gender=$line ->KG;
$keeper_phone=$line ->KP;
$keep_date=$line ->KKD;
?>
<tr class="data"><td align="left"><abbr title="<?php echo "$Computer_Name"; ?>"><?php echo "$Serial_Number";?></abbr></td>

<td align="left"><abbr title="<?php echo "NAME: $Owner_Fname $Owner_Lname 
GENDER: $Owner_gender
TELEPHONE: $Owner_phone
DEPARTMENT:  $Owner_dept "; ?>
">
<?php echo "$Owner_Reg_Number"; ?>
</abbr></td>

<td align="left"><abbr title="<?php echo "NAME: $keeper_Fname $keeper_Lname
Gender: $keeper_gender
Telephone: $keeper_phone
District: $keeper_district"; ?>">
<?php echo "$NID"; ?>

</abbr></td>

</tr>
<?php
}
?>
</table>
<?php
}
}
else
{
?>
<?php
$query="select computer.Serial_Number as CSN,computer.Name as CN,owner.Reg_Number as ORN,owner.First_Name as OFN,owner.gender as OG,owner.Last_Name as OLN,owner.Department as OD,owner.Phone as OP,district.District_Name as DDN,keeper.Id_number as KIN,keeper.First_Name as KFN,keeper.Last_Name as KLN,keeper.gender as KG,keeper.phone as KP,keep.keep_date as KKD from computer INNER JOIN owner INNER JOIN keep INNER JOIN keeper INNER JOIN status INNER JOIN district ON computer.Serial_Number=keep.Serial_Number AND owner.Reg_Number=computer.Owner_Reg_Number AND keeper.keeper_Id=keep.keeper_id AND computer.mode=status.id and keeper.District_Id=district.District_Id ORDER BY keep.id desc";
$answer=mysql_db_query($database,$query);
$count=mysql_num_rows($answer);
if($count==0)
{
echo"<script> alert('No computer kept.');
window.location.herf('Main_keeper1.php');</script>";
}
else
{
?>

<table align="center" cellspacing="2" cellpadding="7" >
<tr bgcolor="#6699FF"><th>COMPUTER</th><th>OWNER</th><th>KEEPER</th><th>DATE</th></tr>
<?php
while($line=mysql_fetch_object($answer))
{
//$keeper_id=$line ->keeper_Id;
$Serial_Number=$line ->CSN;
$Computer_Name=$line ->CN;
$Owner_Reg_Number=$line ->ORN;
$Owner_Fname=$line ->OFN;
$Owner_gender=$line ->OG;
$Owner_Lname=$line ->OLN;
$Owner_dept=$line ->OD;
$keeper_district=$line ->DDN;
$NID=$line ->KIN;
$Owner_phone=$line ->OP;
$keeper_Fname=$line ->KFN;
$keeper_Lname=$line ->KLN;
$keeper_gender=$line ->KG;
$keeper_phone=$line ->KP;
$keep_date=$line ->KKD;

?>
<tr class="data"><td align="left"><abbr title="<?php echo "$Computer_Name"; ?>"><?php echo "$Serial_Number";?></abbr></td>

<td align="left"><abbr title="<?php echo "NAME: $Owner_Fname $Owner_Lname 
GENDER: $Owner_gender
TELEPHONE: $Owner_phone
DEPARTMENT:  $Owner_dept "; ?>
">
<?php echo "$Owner_Reg_Number"; ?>
</abbr></td>

<td align="left"><abbr title="<?php echo "NAME: $keeper_Fname $keeper_Lname
Gender: $keeper_gender
Telephone: $keeper_phone
District: $keeper_district"; ?>">
<?php echo "$NID"; ?>

</abbr></td>

<td align="left"><?php echo $keep_date; ?></td></tr>
<?php
}
?>
</table>

<?php
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
