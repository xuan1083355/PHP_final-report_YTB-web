<?php
require("DBconnect.php");

if(isset($_POST['name'])){
$name=$_POST['name'];
$size=$_POST['size'];
$style=$_POST['style'];
$price=$_POST['price'];
$size_str=preg_split("/[,@ ，]/",$size);    //preg_split("/[]/"):[]內放入要切割的標點符號，切割成字串陣列
$str_count=count($size_str);                //計算陣列數

// $arr = array(array());
// $pSize = array();
// $pStyle = array();
// $SQL="SELECT * FROM product WHERE pName='$name'";
// $result=mysqli_query($link, $SQL);

// while($row=mysqli_fetch_assoc($result)){
//     $arr[] = array(array($row["pSize"], $row["pStyle"]));
//     if(empty($pSize)){
//         if($row["pSize"] != $size)
//         $pSize[] = $row["pSize"];
//     }
//     else{
//         $exist = false;
//         foreach($pSize as $v){
//             if($v == $row["pSize"]){
//                 $exist = true;
//             }
//         }
//         if(!$exist){
//             $pSize[] = $row["pSize"];
//         }
//     }
//     if(empty($pStyle)){
//         $pStyle[] = $row["pStyle"];
//     }
//     else{
//         $exist = false;
//         foreach($pStyle as $v){
//             if($v == $row["pStyle"]){
//                 $exist = true;
//             }
//         }
//         if(!$exist){
//             $pStyle[] = $row["pStyle"];
//         }
//     }
// }
// foreach($pSize as $v){
//     if($v == $row["pStyle"]){
//         $exist = true;
//     }
// }
// foreach(){

// }


for($i=0;$i<$str_count;$i++){
    if($size_str[$i]!=''){      //陣列字串不為空時再新增
        if($name == "黃大謙 UCCU大學tee"){
            $SQL="INSERT INTO product(pName,pSize,pStyle,pPrice, pPath) VALUES ('$name','$size_str[$i]','$style','950', 'tee.png')";
        }
        else{
            $SQL="INSERT INTO product(pName,pSize,pStyle,pPrice, pPath) VALUES ('$name','$size_str[$i]','$style','150', 'notebook.png')";
        }
        
        if($i==$str_count-1){       //最後一筆資料寫入後，顯示新增成功通知
            if(mysqli_query($link,$SQL)){
                echo "<script type='text/javascript'>";
                echo "alert('新增成功')";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";  //content=0-->0秒 
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('修改失敗')";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=commodity.php'>";
            }
        }else{                 //不為最後一筆資料時僅將資料寫入
            mysqli_query($link,$SQL);
        }
    }
}

}

?>