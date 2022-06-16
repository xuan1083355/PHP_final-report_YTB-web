<?php
require("DBconnect.php");
if(isset($_POST['oNo'])){

    $oNo=$_POST['oNo'];

    $SQL="DELETE FROM orderform WHERE oNo='$oNo'";

    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('刪除成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=order.php'>";  //content=0-->0秒 
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('刪除失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=order.php'>";
    }

}

?>