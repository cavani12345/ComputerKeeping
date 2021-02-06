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
<button onclick="show_and_hide('shaka');" style="display:none;">Shaka itariki</button><br />
<div id="shaka">
<div id="shaka">
<form action="what_did_i_keep.php" method="post" name="Myform" style="display:block; text-align:right; margin-right:140px; margin-top:20px;" onsubmit="return validate();">
<input type="date" name="date" id="search" style="padding:3px 20px;" /> &nbsp; &nbsp;<input type="submit" name="search" value="Shakisha" style="padding:3px 9px;" /><br />
</form></div> 

<br />
<?php
if(isset($_POST['search']))
{
$keeper=$_SESSION['id'];
$getdate=$_POST['date'];
$query0="select* from computer INNER JOIN keep INNER JOIN keeper INNER JOIN owner INNER JOIN status ON computer.Serial_Number=keep.Serial_Number and keep.keeper_id=keeper.keeper_Id and computer.Owner_Reg_Number=owner.Reg_Number and computer.mode=status.Id where keep.keeper_id=$keeper and keep_date like '%$getdate%' GROUP BY computer.Serial_Number";
$answer0=mysql_db_query($database,$query0);
$count0=mysql_num_rows($answer0);
?>
<table align="center" cellspacing="2" cellpadding="7"  >
<tr bgcolor="#6699FF"><th>SERIAL NUMBER</th><th>IZINA</th><th>NYIRAYO</th><th>PHONE YE</th><th> Mode</th></tr>
<?php
if($count0==0)
{
?>
<tr class="data"><td>Ntacyakozwe</td><td>Ntacyakozwe</td><td>Ntacyakozwe</td><td>Ntacyakozwe</td><td> Ntacyakozwe</td></tr>

<?php
}
else
{
while($line=mysql_fetch_object($answer0))
{
$computer=$line ->Serial_Number;
$fowner=$line ->First_Name;
$lowner=$line ->Last_Name;
$date=$line ->keep_date;
$cname=$line ->Name;
$phone=$line ->Phone;
$mode=$line ->status_Name;
?>
<tr class="data"><td><?php echo $computer ;?></td><td><?php echo $cname ?></td><td align="left"><?php echo $lowner." ".$fowner ?></td><td><?php echo $phone ?></td><td><?php echo $mode ?></td></tr>

<?php
}
}
?>
</table>
<?php

}
else
{
?>
<?php
$keeper=$_SESSION['id'];
$query="select* from computer INNER JOIN keep INNER JOIN keeper INNER JOIN owner INNER JOIN status ON computer.Serial_Number=keep.Serial_Number and keep.keeper_id=keeper.keeper_Id and computer.Owner_Reg_Number=owner.Reg_Number and computer.mode=status.Id where keep.keeper_id=$keeper  ORDER BY keep.id";
$answer=mysql_db_query($database,$query);
$count=mysql_num_rows($answer);
if($count==0)
{
echo"<script> alert('Ntanimwe mwabitse.');
window.location.herf('Main_keeper2.php');</script>";
}
else
{
?>
<table align="center" cellspacing="2" cellpadding="7"  >
<tr bgcolor="#6699FF"><th>SERIAL NUMBER</th><th>IZINA</th><th>NYIRAYO</th><th>PHONE YE</th><th> ITARIKI</th><th> Mode</th></tr>
<?php
while($line=mysql_fetch_object($answer))
{
$computer=$line ->Serial_Number;
$fowner=$line ->First_Name;
$lowner=$line ->Last_Name;
$date=$line ->keep_date;
$cname=$line ->Name;
$phone=$line ->Phone;
$mode=$line ->status_Name;
?>
<tr class="data"><td><?php echo $computer ;?></td><td><?php echo $cname ?></td><td align="left"><?php echo $lowner." ".$fowner ?></td><td><?php echo $phone ?></td><td><?php echo $date ?></td><td><?php echo $mode ?></td></tr>

<?php
}
}
}
mysql_close($connect);
?>
</table>
</div>
</td>


</tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
