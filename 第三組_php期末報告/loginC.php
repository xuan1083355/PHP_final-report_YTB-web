<?php
session_start();
require("DBconnect.php");
$uname=@$_SESSION["uName"];
$admin="admin";
//$link = @mysqli_connect('localhost','root','Suga19930309','report');
$SQL="SELECT * FROM user WHERE uName='$uname'";
$result=mysqli_query($link, $SQL);
$row=mysqli_fetch_assoc($result);
if($row["uRole"]==$admin)
{
    header("location:user_management.php");
}
else
{
    header("location:home.php");
}
?>


<!--
    HW5作業:
    1.連資料庫判斷帳密對不對
    2.用資料庫裡面的內容判斷登入者是管理員還是使用者
-->