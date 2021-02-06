<?php
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>

<link rel="stylesheet" type="text/css" href="CSS/css1.css" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>www.keep_computer_safe.com</title>
<style>
input[type=text]
{
font-family:"Times New Roman", Times, serif;
}
input[type=password]
{
font-family:"Times New Roman", Times, serif;
}
input[type=text]:hover
{
border-radius:8px;
border-collapse:separate;
border-color:#0033FF;
}
input[type=password]:hover
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
#this:hover{ border-radius:37px;}
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
<li><a href="#">2-Given</a></li><br />


</ul>
</li> 
&nbsp; 
<li><a href="Logout.php" class="link">Gusohoka</a></li></ul></td></tr>
<tr id="middle"><td><div id="scrol" style="overflow:auto; max-height:450px;">
<div id="this" style="border:1px #33CC33 solid; width:470px; margin-left:300px;">
<form action="add_keeper.php" method="post">
<table align="center" cellpadding="10">
<tr>
<td align="left"><label>First Name:</label></td><td align="left"><input type="text" name="fname" required placeholder="izina rya mbere" /> <font color="#6666FF" size="-1">Urug: Peter</font></td>
</tr>
<tr>
<td align="left"><label>Last Name:</label></td><td align="left"><input type="text" name="lname" required placeholder="izina rya kabiri" /> <font color="#6666FF" size="-1"> Urug: KALISA</font></td>
</tr>
<tr>
<td align="left"><label>ID Number:</label></td><td align="left"><input type="text" name="id" maxlength="16" required placeholder="National Id" value="119" /></td>
</tr>
<tr>
<td align="left"><label>Gender:</label></td><td align="left"><input type="radio" name="gender" value="Male" />Male &nbsp;&nbsp;&nbsp;
<input type="radio" name="gender" value="Female" />Female </td>
</tr>
<tr>
<td align="left"><label>Telephone:</label></td><td><input type="text" name="phone" value="+2507" maxlength="13" required placeholder="Phone Number" /> <font color="#6666FF" size="-1">Urug: +25072....</font></td>
</tr>
<tr>
<td align="left"><label>Address:</label></td><td align="left"><select name="district">
<option value="">District</option
><?php 
$idn=$_POST['id'];
$qq="select* from keeper where Id_number='$idn'";
$aa=mysql_db_query($database,$qq);
$cc=mysql_num_rows($aa);
if($cc!=0)
{
echo "<script> alert('ID Number was used by an other keeper');
window.location.href('Main_keeper1.php');</script>";
}
else
{
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
</select><br /><br />
</td>
</tr>
<tr>
<td align="left"><label>Type:</label></td><td align="left"><select name="type">
<option value="">Type here</option
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
<tr>
<td align="left"><label>Password:</label></td><td align="left"><input type="password" name="password" required placeholder="Give him a password" /></td>
</tr>
<tr>
<td align="center"><input type="submit" name="save" value="Save" /></td><td align="center"><input type="reset" name="reset" value="Reset" /></td>
</tr>


</table>
</form>
<?php
if(isset($_POST['save']))
{
if(!empty($_POST['id']) && !empty($_POST['type']) && !empty($_POST['gender']) && !empty($_POST['district']) && !empty($_POST['phone']))
{
$NID=$_POST['id'];
$Fname=$_POST['fname'];
$Lname=$_POST['lname'];
$password=$_POST['password'];   $enc_password=base64_encode($password);
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$district=$_POST['district'];
$type=$_POST['type'];

$query1="select* from keeper where Id_number";
$answer1=mysql_db_query($database,$query1);
$count=mysql_num_rows($answer1);
if($count<1)
{
echo"<script> alert('This ID Number is already in system. No more than one person on single ID Number .');
window.location.herf('add_keeper.php');</script>";
}
else
{
$query2="insert into keeper(First_Name,Last_Name,gender,password,Id_number,phone,District_Id,type) VALUES('$Fname','$Lname','$gender','$enc_password','$NID','$phone',$district,$type)";
$answer2=mysql_db_query($database,$query2);
if($answer2)
{
$q="select* from keeper order by keeper_Id asc ";
$an=mysql_db_query($database,$q);

while($line=mysql_fetch_object($an))
{
$code=$line ->keeper_Id;
}
?>
<font color="#0033CC" size="+1">The Keeper is successfully saved and is now Having <font color="#FF0000" size="+3"> <?php echo "$code"; ?></font> as code</font> 
<?php


}
else
{
?>
<font color="red" size="+1">The work failed, try again and fill out all fields</font> 
<?php
}
}
}// end of not empty fields
else
{
?>
<font color="#0033CC" size="+1"> please Start over and fill out all fields</font> 
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
