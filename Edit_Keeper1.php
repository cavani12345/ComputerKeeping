<?php
@session_start();
?>
<?php
include 'Call.php';
$idd=$_POST['idd'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$idnumber=$_POST['id'];
$phone=$_POST['phone'];
$district_Id=$_POST['district'];
$type=$_POST['type'];
$q="update keeper set First_Name='$fname',Last_Name='$lname',gender='$gender',Id_number='$idnumber',phone='$phone',District_Id=$district_Id,type=$type where keeper_Id=$idd";
$an=mysql_db_query($database,$q);
if($an)
{
echo "<script>alert('Work Done properly');
window.location.href='existing_keepers.php';</script>";
}
else
{
echo "<script>alert('Work Aborted');
window.location.href='existing_keepers.php';</script>";
}

mysql_close($connect);
?>
