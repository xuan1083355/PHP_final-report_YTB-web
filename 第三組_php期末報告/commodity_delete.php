<?php
require("DBconnect.php");
if(isset($_POST['pNo'])){

    $pNo=$_POST['pNo'];

    $SQL="DELETE FROM product WHERE pNo='$pNo'";
                        
                        if(mysqli_query($link,$SQL)){
                            echo "<script type='text/javascript'>";
                            echo "alert('刪除成功')";
                            echo "</script>";
                            echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";  //content=0-->0秒 
                        }else{
                            echo "<script type='text/javascript'>";
                            echo "alert('刪除失敗')";
                            echo "</script>";
                            echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
                        }
    

}

?>