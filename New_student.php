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
<tr id="middle"><td><div id="scrol" style="overflow:auto; max-height:450px;">
<p><center><a href="New_computer.php"><font color="#CC0033"><u>Kubika</u></font></a></center></p>
<div id="this" style="border:1px #33CC33 solid; width:470px; margin-left:350px;">
<script>
/*function phone_validation()
{
var phon=document.getElementById('phone').length;
var reg=document.getElementById('regn').length;

if(reg!=9)
{
alert('Reg No igomba kuba characters 9.Please reload the page ');
regn.focus();
regn.style='border-color:red;';
return false;
}
else if(phon!=13)
{
alert('Phone igomba kuba characters 13. Please Reload the page');
phone.focus();
phone.style='border-color:red;';
return false;
}
else
{
return true;
}
}*/
</script>
<form action="New_student.php" method="post"  onsubmit="return phone_validation();" >
<table align="center" cellpadding="10">
<tr>
<td align="left"><label>Reg N<sup>o</sup>:</label></td><td align="left"><input type="text" maxlength="9" id="regn" name="regn" required placeholder="Mwinjizemo neza" /></td></tr>
<tr>
<td align="left"><label>First Name:</label></td><td align="left"><input type="text" name="fname" required placeholder="izina rya mbere" /> <font color="#6666FF" size="-1">Urug: Peter</font></td>
</tr>
<tr>
<td align="left"><label>Last Name:</label></td><td align="left"><input type="text" name="lname" required placeholder="izina rya kabiri" /> <font color="#6666FF" size="-1"> Urug: KALISA</font></td>
</tr>
<tr>
<td align="left"><label>Gender:</label></td><td align="left"><input type="radio" name="gender" value="Male" />Male &nbsp;&nbsp;&nbsp;
<input type="radio" name="gender" value="Female" />Female </td>
</tr>
<tr>
<td align="left"><label>Telephone:</label></td><td>
<input type="text" name="phone" value="+2507" maxlength="13" id="phone" required placeholder="Phone Number" /> <font color="#6666FF" size="-1">Urug: +250728115847</font></td>
</tr>
<tr>
<td align="left"><label>Department:</label></td><td><input type="text" name="dept" required placeholder="dept yigamo" /> <font color="#6666FF" size="-1">Urug: Computer Science</font></td>
</tr>
<tr>
<td align="center"><input type="submit" name="save" value="Bika" /></td><td align="center"><input type="reset" name="reset" value="Siba" /></td>
</tr>
<?php
if(isset($_POST['reset']))
{
echo"<script>window.location.href('New_student.php');</script>";
}
else if(isset($_POST['save']))
{
$reg=$_POST['regn'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$dept=$_POST['dept'];
$query1="select* from owner where Reg_Number='$reg'";
$answer1=mysql_db_query($database,$query1);
$count=mysql_num_rows($answer1);
if($count>0)
{
echo"<script> alert('Umunyeshuri ufite $reg asanzwe ari muri system. Murebe neza ko mutibeshye');
window.location.href('New_student.php');</script>";
}
else
{
$query2="insert into owner(Reg_Number,First_Name,Last_Name,gender,Department,Phone) VALUES('$reg','$fname','$lname','$gender','$dept','$phone')";
$answer2=mysql_db_query($database,$query2);
if($answer2)
{
echo"<script> alert('Umunyeshuri ufite $reg mumwinjije muri system. Mushobora kumwandikaho computer');
window.location.href('New_student.php');</script>";
}
else
{
echo"<script> alert('Ntibikunze. Murebe ko mwinjijemo amakuru akwiye, nibikomeza kwanga mumenyeshe abayobozi');
window.location.href('New_student.php');</script>";
}
}
}
mysql_close($connect);
?>
</table>
</form>

</div>
</div>
</td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
