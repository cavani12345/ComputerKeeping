<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>www.keep_computer_safe.comt</title>
</head>
<body>
<?php
session_start();
if(isset($_POST['login']))
{

include 'Call.php';

$get_id=$_POST['id'];
$get_password=$_POST['password'];
$query="select * from keeper where keeper_Id='$get_id'";
$answer=mysql_db_query($database,$query);

$count=mysql_num_rows($answer);
if($count<1)
{
echo"<script> alert('Ibyo mwinjijemo sibyo'); window.location.href="login.php"; </script>";
}
else
{

$arr=mysql_fetch_array($answer);
$name=$arr['keeper_Id'];
$password=$arr['password'];
$dec_password=base64_decode($password);
if($get_id==$name && $dec_password==$get_password)
{
$_SESSION['sess']=$_POST['login'];
$_SESSION['NID']=$arr['Id_number'];
$_SESSION['FName']=$arr['First_Name'];
$_SESSION['LName']=$arr['Last_Name'];
$_SESSION['password']=$arr['password'];
$_SESSION['id']=$arr['keeper_Id'];
$_SESSION['phone']=$arr['phone'];
$_SESSION['district']=$arr['District_Id'];
$_SESSION['type']=$arr['type'];
$fnam= $_SESSION['FName'];
$lnam=$_SESSION['LName'];
echo" <script> alert('Ikaze $fnam $lnam')</script>";
$type=$_SESSION['type']; //differentiate manager and simple keeper
if($type==1)
{
include('Main_keeper1.php');
}
else if($type==2)
{
include('Main_keeper2.php');
}
}
else
{
echo"<script> alert('Ibyo mwinjijemo sibyo'); window.location.href='login.php'; </script>";
}
}
mysql_close($connect);
}// end of the login button
/*else if(isset($_POST['reset']))
{
include('login.php');
}*/

?>
</body>
</html>
