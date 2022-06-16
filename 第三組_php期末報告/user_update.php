<?php
require("DBconnect.php");

if(isset($_POST['account'])){
    $name=$_POST['account'];
    $psw=$_POST['psw'];
    $mail=$_POST['mail'];
    $identity=$_POST['identity'];
    $uNo=$_POST['uNo'];

    $SQL="UPDATE user SET uEmail='$mail', uName='$name', uPwd='$psw',uRole='$identity' WHERE uNo='$uNo'";

    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('修改成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=user_management.php'>";  //content=0-->0秒 
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('修改失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=user_management.php'>";
    }
    
    }
    ?>