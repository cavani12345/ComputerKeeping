
<?php
$server="localhost";
$database="computer_store";
$user="root";
$password="";
$connect=mysql_connect($server,$user,$password) or die ('server not found'.mysql_error());
$db_connect=mysql_select_db($database,$connect) or die ('Database not found'.mysql_error());
?>