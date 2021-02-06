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
textarea:hover
{
border-radius:8px;
border-collapse:separate;
border-color:#0033FF;
}
input[type=submit]
{
font-style:italic; font-size:25px; border-style:solid; background-color:#9999FF;
}
input[type=reset]
{
font-style:italic; font-size:25px; border-style:solid; background-color:#9999FF;
}
input[type=submit]:hover
{
border-radius:12px;
background-color:#FF3366;
}
input[type=reset]:hover
{
border-radius:12px;
background-color:#FF3366;
}
</style>
</head>
<body>
<?php
include 'Call.php';
?>
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
<tr id="middle"><td>
<p><center><a href="New_student.php"><font color="#CC0033"><u>Nyirayo ni mushya</u></font></a></center></p>
<div id="this" style="border:1px #33CC33 solid; width:470px; margin-left:370px;">
<form action="New_computer.php" method="post">
<table align="center" cellpadding="10">
<tr>
<td align="left"><label>Serial Number:</label></td><td align="left"><input type="text" name="snumber" placeholder="Mwinjizemo neza" required  /></td></tr>
<tr>
<td align="left"><label>Izina:</label></td><td><input type="text" name="name" required placeholder="izina rya Computer" /><font color="#6666FF" size="-1"> Urug: HP</font></td>
</tr>
<tr>
<td align="left"><label>Ubusobanuro:</label></td><td align="left"><textarea name="description"></textarea></td>
</tr>
<tr>
<td align="left"><label>Reg Number:</label></td><td align="left"><input type="text" name="owner" required placeholder="Nyirayo usanzwemo" /></td>
</tr>
<tr>
<td align="center"><input type="submit" name="save" value="Bika" /></td><td align="center"><input type="reset" name="reset" value="Siba" /></td>
</tr>
<?php
if(isset($_POST['save']))
{
$snumber=$_POST['snumber'];
$cname=$_POST['name'];
$des=$_POST['description'];
$owner=$_POST['owner'];
$query1="select* from computer INNER JOIN owner ON computer.Owner_Reg_Number=owner.Reg_Number where Serial_Number='$snumber'";

$answer1=mysql_db_query($database,$query1);

$count1=mysql_num_rows($answer1);

if($count1>0)
{
while($line=mysql_fetch_object($answer1))
{
$owner_f_name=$line ->First_Name;
$owner_l_name=$line ->Last_Name;
}
echo"<script> alert('Computer ifite $snumber isanzwe muri system ni iya $owner_f_name $owner_l_name. Murebe ko mutibeshye imibare');
window.location.href('New_computer.php');</script>";
}
else
{
$query11="select* from owner where Reg_Number='$owner'";
$answer11=mysql_db_query($database,$query11);
$count11=mysql_num_rows($answer11);
if($count11==0)
{
echo"<script> alert('Umunyeshuri ufite $owner ntawuri muri system. Mubanze mumwijizemo');
window.location.href('New_computer.php');</script>";
}
else
{
$keeper_id=$_SESSION['id'];
$query2="insert into computer(Serial_Number,Name,Description,Owner_Reg_Number,mode) VALUES('$snumber','$cname','$des','$owner',1)";
$answer2=mysql_db_query($database,$query2);
if($answer2)
{
echo"<script> alert('Computer ifite $snumber murayibitse ')</script>";
$query3="insert into keep(keep_date,Serial_Number,keeper_id) VALUES(Now(),'$snumber',$keeper_id)";
$number="insert into number(computers) VALUES('$snumber')";
$answer3=mysql_db_query($database,$query3);
$number1=mysql_db_query($database,$number);
if($answer3)
{
$q="select* from number ORDER BY Number_Id asc";
$an=mysql_db_query($database,$q);
$c=mysql_num_rows($an);
while($l=mysql_fetch_object($an))
{
$Number_Id=$l ->Number_Id;
}
echo"<script> alert('Computer ifite $snumber Muyanditse ku munyeshuri ufite $owner. System imuhaye Umubare $Number_Id');
window.location.href('New_computer.php');</script>";
}
}
}
}
}
mysql_close($connect);
?>
</table>
</form>
</div>
</td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
