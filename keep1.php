<?php
@session_start();
?>
<?php
include 'Call.php';

$Snumber=$_POST['snumber1'];
$keeper_id=$_SESSION['id'];//get keeper id from session
$query2="insert into keep(keep_date,Keep_Date_Only,Serial_Number,keeper_id) values(Now(),Now(),'$Snumber',$keeper_id)";
$answer2=mysql_db_query($database,$query2);
if($answer2)
{
$query3="update computer set mode=1 where Serial_Number='$Snumber'";
$answer3=mysql_db_query($database,$query3);
if($answer3)
{
echo"<script> alert('Computer ifite $Snumber murayibitse.');
window.location.href='keep.php';</script>";
}
else
{
echo"<script> alert('Ntibikunze Mwongere mukanya.Mukoreshe serial Number Nibikomeza kwanga mumenyeshe abayobozi.');
window.location.href='keep.php';</script>";
}//else
}



