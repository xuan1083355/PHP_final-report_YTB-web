<?php
require("DBconnect.php");
session_start();
//$link = @mysqli_connect('localhost','root','Suga19930309','report');// include("DBconnent.php");

$oName=$_POST["oName"];
$oTel=$_POST["oTel"];
$oEmail=$_POST["oEmail"];
$oRemark=$_POST["oRemark"];
$oCity=$_POST["oCity"];
$oPost=$_POST["oPost"];
$oAddress=$_POST["oAddress"];

$oOrder='';
$arr = array();
$arr = $_SESSION["shopcar"];
foreach ($arr as $v){
    $oOrder = $oOrder.$v[0]."號商品:".$v[1]."件\n";
}

$SQL="INSERT INTO orderform (oName, oEmail, oTel, oRemark, oAddress, oOrder) 
VALUES('$oName', '$oEmail', '$oTel', '$oRemark', '$oPost$oCity$oAddress', '$oOrder')";
if($oName=="" || $oEmail=="" || $oTel=="" || $oCity=="" || $oPost=="" || $oAddress==""){
    echo "<script type='text/javascript'>";
    echo "alert('提交失敗');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=information.php'>";
}
else{
    if(mysqli_query($link, $SQL)){
        $id = $link->insert_id;
        setcookie('final', serialize($arr), time()+30);
        unset($_SESSION['shopcar']);
        echo "<script type='text/javascript'>";
        echo "alert('提交成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=informationC.php?oNo=".$id."'>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('提交失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=information.php'>";
    }
}

?>