<?php
require("DBconnect.php");
if(isset($_POST['pNo'])){
$size=$_POST['size'];
$style=$_POST['style'];
$price=$_POST['price'];
$pNo=$_POST['pNo'];

$SQL="UPDATE product SET pSize='$size',pStyle='$style',pPrice='$price' WHERE pNo='$pNo'";

if(mysqli_query($link,$SQL)){
    echo "<script type='text/javascript'>";
    echo "alert('修改成功')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";  //content=0-->0秒 
}else{
    echo "<script type='text/javascript'>";
    echo "alert('修改失敗')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
}

}
?>