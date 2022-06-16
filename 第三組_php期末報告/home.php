<!doctype html>
<html lang="en">
    <?php
        session_start();
        require("DBconnect.php");
        //$link = @mysqli_connect('localhost','root','Suga19930309','report');

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
                熱門</h1>
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
            <div class="col-md-16">
                <div class="row">
                    <div class="col-md-4 my-3 h-100">
                        <img src="https://linkstorage.linkfire.com/medialinks/images/e0048e88-034b-4abb-8f64-4ab079a2d623/artwork-440x440.jpg" class="card-img-top" alt="...">
                    </div>
                <div class="col-md-8 my-3">
                    <h1 class="h13" style="margin: 0 0 40px 0;">黃大謙<h1>
                    <h1 class="h12">
                        簡介</h1>
                    <hr style="width:95%;">
                    <h1 class="h13">
                    我很棒</br>Life is a bitch.</br></h1>
                </div>
            </div>
            <div class="col-md-16">
                <h1 class="h12">
                        周邊商品</h1>
                    <hr style="width:95%;">
            </div>
            <div class="tab-pane active" id="pane-1" role="tabpanel">
                <div class="row">
                    <div class="col-md-4 my-3" onclick="location.href='productTee.php'">
                        <div class="card text-center h-100 border-0 box-shadow">
                            <img src="tee.png"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <span class="h14" style="font-size: 20px;"><input type="hidden" name="pName">黃大謙 UCCU大學tee</span>
                                <p class="card-text ">NT$950</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3" onclick="location.href='productNotebook.php'">
                                <div class="card text-center h-100 border-0 box-shadow">
                                    <img src="notebook.png"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <span class="h14" style="font-size: 20px;"><input type="hidden" name="pName">做自己很好 勵志A5筆記本</span>
                                        <p class="card-text ">NT$150</p>
                                    </div>

                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    

</body>

</html>