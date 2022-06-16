<?php
require("DBconnect.php");
if($_POST["update"]=="更新"){
    if(isset($_POST['state'])){
        $state=$_POST['state'];
        $sNo=$_POST['sNo'];

        if($state==0){
            $state="未讀";
        }else{
            $state="已閱";
        }

        $SQL="UPDATE suggest SET state='$state' WHERE sNo='$sNo'";

        if(mysqli_query($link,$SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('修改成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=contact.php'>";  //content=0-->0秒 
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('修改失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=contact.php'>";
        }

    }
}else if($_POST["update"]=="刪除"){
    if(isset($_POST["sNo"])){
        $sNo=$_POST['sNo'];

        $SQL="DELETE FROM suggest WHERE sNo='$sNo'";

        if(mysqli_query($link,$SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('刪除成功')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=contact.php'>";  //content=0-->0秒 
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('刪除失敗')";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=contact.php'>";
        }
    }else{
        echo "使用者編號讀取錯誤";
    }

}else if($_POST["update"]=="檢視"){
    if(isset($_POST["sNo"])){
        $sNo=$_POST['sNo'];//船參數到check頁，顯示詳細資訊
        header("Location: contactDetail.php?sNo=".$sNo);
    
    }else{
        echo "使用者編號讀取錯誤";
    }
}
?>