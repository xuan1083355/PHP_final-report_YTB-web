<?php
require("DBconnect.php");
if(isset($_POST['oNo'])){
    $oNo=$_POST['oNo'];
    $oOrder=$_POST['oOrder'];
    $oAddress=$_POST['oAddress'];

    $SQL="UPDATE orderform SET oOrder='$oOrder', oAddress='$oAddress' WHERE oNo='$oNo'";

    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('修改成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=order.php'>";  //content=0-->0秒 
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('修改失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=order.php'>";
    }
    
}else{
    echo "取得訂單編號失敗";
}
    ?>