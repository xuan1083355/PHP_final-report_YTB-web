<?php
require("DBconnect.php");
//$link = @mysqli_connect('localhost','root','Suga19930309','report');// include("DBconnent.php");

$uEmail=$_POST["uEmail"];
$uName=$_POST["uName"];
$uPwd=$_POST["uPwd"];
$uRole=$_POST["uRole"];

// echo $uName.$uPasswd.$role;

$SQL="INSERT INTO user (uEmail, uName, uPwd, uRole) VALUES('$uEmail', '$uName','$uPwd','$uRole')";
$find = "SELECT * FROM user where uEmail='$uEmail'";
$result=mysqli_query($link, $find);
if($uEmail=="" || $uName=="" || $uPwd=="" || $uRole==""){
    echo "<script type='text/javascript'>";
    echo "alert('資料尚未填寫齊全');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=singup.php'>";
    // header('Location: enroll.php');
}
elseif(mysqli_num_rows($result)>=1){
    echo "<script type='text/javascript'>";
    echo "alert('該Email已註冊過');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=singup.php'>";
}
else{
    if(mysqli_query($link, $SQL)){
        $id = $link->insert_id;
        echo "<script type='text/javascript'>";
        echo "alert('註冊成功');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=singupC.php?uNo=".$id."'>";
        // header('Location: list.php');
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('註冊失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=singup.php'>";
        // header('Location: enroll.php');
    }
}

?>