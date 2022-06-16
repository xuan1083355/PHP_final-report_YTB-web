<?php
require("DBconnect.php");
//$link = @mysqli_connect('localhost','root','Suga19930309','report');// include("DBconnent.php");

$sName=$_POST["sName"];
$sEmail=$_POST["sEmail"];
$Suggest=$_POST["Suggest"];

// echo $uName.$uPasswd.$role;

$SQL="INSERT INTO suggest (sName, sEmail, Suggest) VALUES('$sName', '$sEmail','$Suggest')";
if($sName=="" || $sEmail=="" || $Suggest==""){
    echo "<script type='text/javascript'>";
    echo "alert('提交失敗');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=suggest.php'>";
    // header('Location: enroll.php');
}
else{
    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('提交成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=suggest.php'>";
        // header('Location: list.php');
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('提交失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=suggest.php'>";
        // header('Location: enroll.php');
    }
}

?>