<?php
require("DBconnect.php");

if(isset($_POST['uNo'])){

    $uNo=$_POST['uNo'];

    $SQL="DELETE FROM user WHERE uNo='$uNo'";

    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('刪除成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=user_management.php'>";  //content=0-->0秒 
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('刪除失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=user_management.php'>";
    }

}

?>