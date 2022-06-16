<!doctype html>
<html lang="en">
    <?php
        session_start();
        $size = array();
        $style = array();
        require("DBconnect.php");
        $pname="做自己很好 勵志A5筆記本";
        $SQL="SELECT * FROM product WHERE pName='$pname'";
        $result=mysqli_query($link, $SQL);
        while($row=mysqli_fetch_assoc($result)){
            if(empty($size)){
                $size[] = $row["pSize"];
            }
            else{
                $exist = false;
                foreach($size as $v){
                    if($v == $row["pSize"]){
                        $exist = true;
                    }
                }
                if(!$exist){
                    $size[] = $row["pSize"];
                }
            }
            if(empty($style)){
                $style[] = $row["pStyle"];
            }
            else{
                $exist = false;
                foreach($style as $v){
                    if($v == $row["pStyle"]){
                        $exist = true;
                    }
                }
                if(!$exist){
                    $style[] = $row["pStyle"];
                }
            }
        }
       // $link = @mysqli_connect('localhost','root','Suga19930309','report');
        if(isset($_POST["uVol"])){
            if($_POST["uVol"]!=null && $_POST["uVol"] > 0){   
                $pname="做自己很好 勵志A5筆記本";
                $pSize=$_POST["pSize"];
                $pStyle=$_POST["pStyle"];
                $uVol=$_POST["uVol"];
                
                $SQL="SELECT * FROM product WHERE pName='$pname' AND pSize='$pSize' AND pStyle='$pStyle'";
                $result=mysqli_query($link, $SQL);
                $row=mysqli_fetch_assoc($result);
                if(mysqli_num_rows($result)==1){
                    if(!isset($_SESSION["shopcar"]))
                    {
                        $arr = array(array($row["pNo"], $uVol));
                        $_SESSION["shopcar"]=$arr;
                    }
                    else
                    {
                        $arr = $_SESSION["shopcar"];
                        $exist = false;
                        foreach ($arr as $v) {
                            if ($v[0] == $row["pNo"])
                            {
                                $exist = true;
                            }
                        }
                        if($exist)
                        {
                            //購物車中有此商品
                            for($i=0;$i<count($arr);$i++)
                            {
                                if($arr[$i][0] == $row["pNo"])
                                {
                                    $Num = $arr[$i][1];
                                    $Num += $uVol;
                                    $arr[$i][1] += $uVol;
                                    echo "<script type='text/javascript'>";
                                    echo "alert('成功加入購物車');";
                                    echo "</script>";
                                }
                            }
                            $_SESSION["shopcar"] = $arr;
                        }
                        else
                        {
                            //這裡就只剩下：購物車裡有東西，但是並沒有這件商品
                            $asg = array($row["pNo"], $uVol);
                            //設一個小陣列
                            $arr[] = $asg;
                            $_SESSION["shopcar"]=$arr;
                            echo "<script type='text/javascript'>";
                            echo "alert('成功加入購物車');";
                            echo "</script>";
                        }
                    }
                }
                else{
                    echo "<script type='text/javascript'>";
                    echo "alert('抱歉目前沒有該商品');";
                    echo "</script>";
                }
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('請輸入您要商品的數量');";
                echo "</script>";
            }
        }
    ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <title>YTB-F</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Noto+Sans+TC:100,300,400,500,700,900&display=swap");
        *{
            margin: 0;
            padding: 0;
            list-style: none;
            height:auto;
            font-family: 'Noto Sans TC', sans-serif;
        }
        .btn-cart{
            
            position: relative;
        }
        .dropdown-menu-right{
            position: absolute;
            right: 0;
            left: auto;
        }
        .btn-cart .badge{
            position: absolute;
            top: -1px;
            right: -1px;
        }

        .list-group-item{
            background-color: #FFA514;
            border: 0 none;
            text-align:center;
            color: #FFFFFFB2;
        }
        .list-group-item-action:active{
            color: #FFF;
        }
        .list-group-item + .list-group-item ::before{
            background-color: #FFA514;
            border-top: 1px solid rgb(255,255,255,.4);
        }

        .jumbotron-bg{
            background-image: url(https://images.unsplash.com/photo-1465199549974-7d82de6e2830?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80);
            background-position: center 0;
            background-size: cover;
            min-height: 400px;
        }
        .jumbotron-text{
            background-color: rgba(0,0,0, 0.25);
        }
        .box-shadow{
            box-shadow: 0 3px 5px rgba(0,0,0, 0.15);
            cursor: pointer;
            transition: 0.5s;
        }
        .box-shadow:hover{
            transform: scale(1.1,1.1);
        }
        .btn.disabled{
            pointer-events: none;
        }
        .alert-rounded{
            border-radius: 50px;
        }
        .card-bottom{
            border-bottom: solid 1.5px #eee !important;
        }
        .fa-trash-alt{
            color: #000;
        }
        .fa-trash-alt:hover{
            color: #f77754;
        }
        .h10{
            color: #ffffff;
            font-family: 'Noto Sans TC', sans-serif;
            margin: 50px 0 0 0;
            text-align:center;
        }
        .menu{
            margin: 200px 0 0 0;
        }
        .menu a{
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            text-align:center;
            font-size: 20px;
            font-weight:bold;
            position: relative;
            font-family: 'Noto Sans TC', sans-serif;
        }
        .menu a + a::before{
            content: '';
            position: absolute;
            border-top: 1px solid rgb(255,255,255,.4);
            left: 10px;
            right: 10px;
            top: 0;
        }
        .h11{
            color: #905900;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 40px;
            font-weight: 700;
        }
        .login{
            padding: 1px 5px;
            background: #FFA514;
            border:0 none;
            border-radius: 5px;
            margin: 0 10px;

            color: #ffffff;
            font-size: 20px;
            font-weight: 600;
            line-height: normal;
            text-decoration:none;
        }
        .login:hover{
            color: #000000;
            text-decoration:none;
        }
        .singup{
            padding: 1px 1px;
            border:0 none;

            color: #FFA514;
            font-size: 20px;
            font-weight: 700;
            line-height: normal;
            text-decoration:none;
        }
        .singup:hover{
            color: #000000;
            text-decoration:none;
        }
        .logout{
            padding: 1px 5px;
            background: #FFA514;
            border:0 none;
            border-radius: 5px;

            color: #ffffff;
            font-size: 20px;
            font-weight: 600;
            line-height: normal;
            text-decoration:none;
        }
        .logout:hover{
            color: #000000;
            text-decoration:none;
        }
        .h12{
            margin: 10px 0;
            color: #000000;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 30px;
            font-weight: 700;
        }
        .h13{
            color: #000000;
            font-family: 'Noto Sans TC', sans-serif;
            margin: 0 0 0 5%;
            font-size: 40px;
            font-weight: 700;
        }
        .h14{
            color: #000000;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 20px;
            font-weight: 700;
        }
        input[type="radio"] {
            display: none;
        }

        input:checked+.button {
            background: #FFA514;
            color: #fff;
            cursor: default;
        }

        .button {
            display: inline-block;
            margin: 0 5px 10px 0;
            padding: 5px 10px;
            background: #f7f7f7;
            color: #333;
            cursor: pointer;
        }

        .button:hover {
            background: #bbb;
            color: #fff;
        }

        .round {
            border-radius: 5px;
        }
        input {
            padding:0px 15px; 
            border:2px solid #e5e5e5;
            cursor:auto;
            border-radius: 5px; 

            color: #000000;
            font-size: 20px;
            font-weight: 500;
            line-height: normal;
        }

    </style>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#removeModal').on('show.bs.modal', function (event) {
                var btn = $(event.relatedTarget);
                var title = btn.data('title');
                var price = btn.data('price');
                var modal = $(this);
                modal.find('.modal-title').text('確認刪除 ' + title);
                modal.find('.modal-body').text('您要刪除 ' + title + ' $ ' + price + '元 嗎?');
            });

        });
        window.onload = function() {
            var uVol = document.getElementById("uVol");
            var add = document.getElementById("add");
            var del = document.getElementById("del");

            add.onclick = function() {
                // var num = parseInt(uVol.value) + 1;
                // if(num > pVol){
                //     alert('抱歉，本商品最多可購買件');
                // }
                // else{
                    uVol.value = parseInt(uVol.value) + 1;
                // }
            };
            del.onclick = function() {
                var num = parseInt(uVol.value) - 1;
                if(num<1){
                    uVol.value = 1;
                }
                else{
                    uVol.value = parseInt(uVol.value) - 1;
                }
            };
        };
    </script>
</head>

<body>
<div class="row">
    <div class="col-md-3" style="background-color:#FFA514;">
        <div class="list-group sticky-top mt-3">
            <h1 class="h10">
                YTB-F</h1>
            <nav class="menu">
                <a href="home.php">
                    首頁
                </a>
                <a href="suggest.php" style="color:#FFFFFFB2;">
                    聯絡我們
                </a>
            </nav>
        </div>
    </div>

    <div class="col-md-9">
        <div class="tab-content">
            <nav class="navbar navbar-light" style="margin: 40px 0 0 0;">
                <h1 class="h11">
                商品資訊</h1>
                <div class="dropdown ml-auto">
                    <button class="btn btn-cart btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-cart text-dark fa-2x"></i>
                        <?php
                            if(!empty($_SESSION['shopcar'])){
                                $arr = array();
                                $arr = $_SESSION["shopcar"];
                                $total = 0;
                                foreach ($arr as $v){
                                    $total += $v[1];
                                }
                                echo "<span class='badge badge-pill badge-danger'>".$total."</span>";
                            }
                        ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 500px" aria-labelledby="dropdownMenuButton">
                        <div class="p-3">
                            <table class="table table-sm ">
                                <?php
                                    if(!empty($_SESSION['shopcar'])){
                                        $arr = array();
                                        $arr = $_SESSION["shopcar"];
                                        echo "<h6>已選擇商品</h6>";
                                        echo "<thead>
                                                <tr>
                                                    <th></th>
                                                    <th>商品</th>
                                                    <th>單價</th>
                                                    <th>數量</th>
                                                    <th>總計</th>
                                                </tr>
                                            </thead>";
                                        echo "<tbody>";
                                        foreach ($arr as $v){
                                            $SQL="SELECT * FROM product WHERE pNo='{$v[0]}'";
                                            $result=mysqli_query($link, $SQL);
                                            $row=mysqli_fetch_assoc($result);
                                            echo "<tr>";
                                            echo "<td class='align-middle text-center'>
                                                    <a href='delet.php?pNo=".$row["pNo"]."'><i class='far fa-trash-alt'></i></a>
                                                </td>";
                                            echo "<td>".$row["pName"]."<br>".$row["pSize"].".".$row["pStyle"]."</td>";
                                            echo "<td>NT$<span id='pPrice'>".$row["pPrice"]."</span></td>";
                                            echo "<td><span>".$v[1]."件</span></td>";
                                            echo "<td>NT$<span id='smallPrice'>".$row["pPrice"]*$v[1]."</span></td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        echo "<a href='information.php' class='btn btn-block btn-primary btn-sm text-white'>確認結帳</a>";
                                    }
                                    else{
                                        echo "<h6 class='text-center'>你的購物車是空的</h6>";
                                        echo "</table>";
                                    }
                                ?>
                        </div>
                    </div>
                    <?php
                        if(isset($_SESSION['login'])){
                            if($_SESSION['login']=="Yes"){
                                $uname=@$_SESSION["uName"];
                                if($uname){
                                    echo "<a class='singup' style='margin: 0 5px 0 5px;'>".$uname."歡迎回來</a>";
                                    echo "<a href='logout.php' class='logout'>登出</a>";
                                }
                                else{
                                    echo "<a href='login.php' class='login'>登入</a>";
                                    echo "<a href='singup.php' class='singup'>註冊</a>";
                                }
                            }
                            else{
                                echo "<a href='login.php' class='login'>登入</a>";
                                echo "<a href='singup.php' class='singup'>註冊</a>";
                            }
                        }
                        else{
                            echo "<a href='login.php' class='login'>登入</a>";
                            echo "<a href='singup.php' class='singup'>註冊</a>";
                        }  
                        
                    ?>
                </div>
            </nav>
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-md-4 my-3 h-100">
                        <img src="notebook.png" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-8 my-3">
                        <h1>做自己很好 勵志A5筆記本</h1>
                        <h1>NT$150</h1>
                        <h3 style="font-size: 20px;">尺寸</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div id="radio">
                            <?php
                                foreach($size as $v){
                                    echo "<label><input type='radio' name='pSize' value='".$v."' checked='checked'><span class='round button'>".$v."</span></label>";
                                }
                            ?>
                        </div>
                        <h3 style="font-size: 20px;">款式</h3>
                        <div id="radio">
                            <?php
                                foreach($style as $v){
                                    echo "<label><input type='radio' name='pStyle' value='".$v."' checked='checked'><span class='round button'>".$v."</span></label>";
                                }
                            ?>
                        </div>
                        <h3 style="font-size: 20px;">數量</h3>
                        <div>
                            <input type='button' value='-' id='del' style="cursor:pointer;">
                            <input type="number" name="uVol" value="1" min="1" max="99" id="uVol">
                            <input type='button' value='+' id='add' style="cursor:pointer;">
                        </div>
                    </div>
                </div>
                <div style="width: 80%; text-align:center;">
                    <input type="submit" value="加入購物車" style="color:#ffffff;background-color:#FFA514; cursor:pointer;border:0 none; margin: 0 0 20% 0;">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>