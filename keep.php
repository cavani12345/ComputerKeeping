<?php
@session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="JAVASCRIPT/Javascript.js" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="CSS/css1.css" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>www.keep_computer_safe.com</title>
<style>
input[type=submit]
{

background-color:#CCFFFF;
font-size:16px;
font-family:Georgia, "Times New Roman", Times, serif;
font-style:italic;
transition-duration:2s;
}
input[type=submit]:hover
{
background-color:#0099FF;
border-radius:12px;
}
input[type=reset]
{

background-color:#CCFFFF;
font-size:16px;
font-family:Georgia, "Times New Roman", Times, serif;
font-style:italic;
transition-duration:2s;
}
input[type=reset]:hover
{
background-color:#0099FF;
border-radius:12px;
}
input[type=text]
{
font-style:italic;
color:#9900CC;

}
input[type=text]:hover
{
border-radius:7px;
}
.input
{
font-size:15px; color:#000000;
}
abbr:hover{ font-size:27px; color:#0000CC; cursor:auto;}
</style>
</head>
<body>
<!-- php scripts -->
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
<li><a href="New_computer.php">3-Inshashya</a></li><br />

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
<tr id="middle"><td> <div style="overflow:auto; max-height:400px;">

<table align="center" id="kubika" cellpadding="10">
<tr><td>
<form action="keep.php" method="post" ><!--onsubmit="return keepgivesearch();"--><label>S N<sup><u>0</u></sup>,Code, R N<sup><u>0</u></sup>:</label></td><td><input type="text" name="snumber" id="keepgive" placeholder="S number or Reg N" autofocus />
&nbsp;<input type="submit" value="Ni iyande" name="nde" style="border-bottom-style:none;" />
<?php

if(isset($_POST['nde']))
{
$get_number=$_POST['snumber'];

$query="select * from owner INNER JOIN computer INNER JOIN status INNER JOIN number ON owner.Reg_Number=computer.Owner_Reg_Number
and computer.mode=status.id and computer.Serial_Number=number.computers where computer.Serial_Number='$get_number' or owner.Reg_Number='$get_number' or number.Number_Id='$get_number'";
$answer=mysql_db_query($database,$query);
$count=mysql_num_rows($answer);
if($count==0)
{
echo"<script> alert('Ibyo mushatse ntibibonetse, Ntabisanzwemo.');
window.location.href('keep.php');</script>";
}
else
{
?>

<?php
while($line=mysql_fetch_object($answer))
{
$umubare=$line ->Number_Id;
$Snumber=$line ->Serial_Number;
$regN=$line ->Reg_Number;
$Lname= $line ->Last_Name;
$Fname=$line ->First_Name;
$dept=$line ->Department;
$mode=$line ->status_Name;
$mode_Id=$line ->id;
$phone=$line ->Phone;

?>&nbsp;
</td></tr>
<tr><td colspan="2" align="left">
<center>
<div style="border:solid; border-bottom:none;">
<h3>AMAKURU AHAGIJE</h3><br />
<abbr title="<?php echo "AMAZINA:  $Lname $Fname
REG NUMBER:  $regN
TELEPHONE:  $phone
DEPARTMENT:  $dept
MODE:  $mode
UMUBARE WAYO:  $umubare "; ?>"><?php  echo "$Snumber"; ?></abbr> <br /><br /> &nbsp;&nbsp;

<?php
if($mode_Id==1)//activate
{
echo" <script> alert('Iyi computer Irabitse.');
window.location.href('keep.php');</script>";
}
else
{
?>
</form>
<form action="keep1.php" method="post">
<input type="text" name="snumber1" readonly="readonly" value="<?php echo "$Snumber"; ?>" /> &nbsp;
<input type="submit" name="keep" value="YIBIKE" /></form>
<?php
}

}//end of while
}
}
?>
</div>
</center>

</td></tr>
<?php
mysql_close($connect);
?>

<!--<tr><td><input type="submit" value="Keep" name="keep"/></td><td align="left"><input type="reset" value="Reset" name="reset" /></td></tr>
-->
</table>
</div>
</td></tr>
<tr id="bottom"><td colspan="3"><i> Copyright &copy; NISHIMIRWE Jean Paul </i></td></tr> 
</table>
</div>
</body>
</html>
