<?php
    session_start();
    $pNo=$_GET["pNo"];
    if(isset($_SESSION['shopcar'])){
        $arr = array();
        $arr = $_SESSION["shopcar"];
        
        $i=0;
        foreach($arr as $v){
            if($v[0] == $pNo){
                array_splice($arr, $i, 1);
                $_SESSION["shopcar"]=$arr;
            }
            $i++;
        }
        echo "<meta http-equiv='Refresh' content='0; url=home.php'>";
    }
?>