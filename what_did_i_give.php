<?php
@session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="JAVASCRIPT/Javascript.js" type="text/javascript">

</script>
<style>
.data:nth-child(odd)
{
background-color:#99CCFF;
}
.data:hover
{ background-color:#006666;}
</style>
<link rel="stylesheet" type="text/css" href="CSS/css1.css" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>www.keep_computer_safe.com</title>
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
 
<li><a class="link">Ibya wakoze</a>
<ul id="submenus2">
<li><a href="what_did_i_keep.php">1-Wabitse</a></li><br />
<li><a href="what_did_i_give.php">2-Watanze</a></li><br />
</ul>
</li> 
  
<li><a href="Logout.php" class="link">Gusohoka</a></li>
</ul></td></tr>
<tr id="middle"><td><div style="overflow:auto; max-height:400px;">
<form action="what_did_i_give.php" method="post" name="Myform" style="display:block; text-align:right; margin-right:140px; margin-top:20px;" onsubmit="return validate();">
<input type="date" name="date" id="search"  style="padding:3px 20px;" /> &nbsp; &nbsp;<input type="submit" name="search" value="Shakisha" style="padding:3px 9px;" /><br />
</form></div> 

<br />
<?php
if(isset($_POST['search']))
{
$keeper=$_SESSION['id'];
$getdate=$_POST['date'];
$q="select* from computer INNER JOIN give_out INNER JOIN keeper INNER JOIN owner ON computer.Serial_Number=give_out.computer_id and give_out.keeper_id=keeper.keeper_Id and computer.Owner_Reg_Number=owner.Reg_Number where give_date like '%$getdate%' and keeper.keeper_Id=$keeper  GROUP BY computer.Serial_Number";
$an=mysql_db_query($database,$q);
$c=mysql_num_rows($an);
if($c==0)
{
?>

<table align="center" cellspacing="2" cellpadding="7" >
<tr bgcolor="#6699FF"><th>SERIAL NUMBER</th><th>IZINA</th><th>NYIRAYO</th><th>PHONE YE</th></tr>
<tr><td>Ntayo mwatanze </td><td>Ntayo mwatanze</td><td>Ntayo mwatanze</td><td>Ntayo mwatanze</td></tr></table>
<?php
}
else
{
?>

<table align="center" cellspacing="2" cellpadding="7" >
<tr bgcolor="#6699FF"><th>SERIAL NUMBER</th><th>IZINA</th><th>NYIRAYO</th><th>PHONE YE</th></tr>
<?php
while($line=mysql_fetch_object($an))
{
$computer=$line ->Serial_Number;
$fowner=$line ->First_Name;
$lowner=$line ->Last_Name;
$date=$line ->give_date;
$cname=$line ->Name;
$phone=$line ->Phone;
?>
<tr class="data"><td><?php echo $computer ;?></td><td><?php echo $cname ?></td><td align="left"><?php echo $lowner." ".$fowner ?></td><td><?php echo $phone ?></td></tr>

<?php
}
}
}
else
{
?>

<?php

$keeper=$_SESSION['id'];
$query="select* from computer INNER JOIN give_out INNER JOIN keeper INNER JOIN owner ON computer.Serial_Number=give_out.computer_id and give_out.keeper_id=keeper.keeper_Id and computer.Owner_Reg_Number=owner.Reg_Number where give_out.keeper_id=$keeper  ORDER BY give_out.id desc";
$answer=mysql_db_query($database,$query);
$count=mysql_num_rows($answer);
if($count==0)
{
echo"<script> alert('Ntanimwe mwatanze.');
window.location.href('Main_keeper2.php');</script>";
}
else
{
?>
<table align="center" cellspacing="2" cellpadding="7" >
<tr bgcolor="#6699FF"><th>SERIAL NUMBER</th><th>IZINA</th><th>NYIRAYO</th><th>PHONE YE</th><th> DATE</th></tr>
<?php
while($line=mysql_fetch_object($answer))
{
$computer=$line ->Serial_Number;
$fowner=$line ->First_Name;
$lowner=$line ->Last_Name;
$date=$line ->give_date;
$cname=$line ->Name;
$phone=$line ->Phone;
?>
<tr class="data"><td><?php echo $computer ;?></td><td><?php echo $cname ?></td><td align="left"><?php echo $lowner." ".$fowner ?></td><td><?php echo $phone ?></td><td><?php echo $date ?></td></tr>

<?php
}
}
}
mysql_close($connect);
?>
</table>
</div>
</td>
</table>
</tr>
</table>

</body>
</html>
