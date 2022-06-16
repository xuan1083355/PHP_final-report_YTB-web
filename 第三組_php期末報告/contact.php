<!doctype html>
<html lang="en">
    <?php
        session_start();
        require("DBconnect.php");
        //$link = @mysqli_connect('localhost','root','Suga19930309','report');
        /*確認是否合法進入(非法進入回到home.php進行登入/註冊)、打招呼、登出*/
        ob_start();
        /*-----------------------------*/
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
        /*歡迎、登入*/
        .welcome{
            padding: 1px 1px;
            border:0 none;
            margin: 10px 0 0 0;

            color: #000000;
            font-size: 20px;
            font-weight: 700;
            text-decoration:none;
        }
        .logout{
            padding: 1px 5px;
            background: #7F5321;
            border:0 none;
            border-radius: 5px;

            color: #ffffff;
            font-size: 20px;
            font-weight: 500;
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
        table{ 
            text-align:center;
            width: 100%;
            height:20px;
        }
        th{
            color:#FFFFFF;
            background-color: #AC8367;
            font-size:20px;
        }
        .table-striped tbody tr:nth-of-type(odd){
            background-color: #F1E3CC;
        }
        .table-striped tbody tr:nth-of-type(even){
            background-color: #D9CABD;
        }
        .btn-primary{
            background-color: #AC8367;
            border: 0 none;
        }
        .btn-primary:hover{
            background-color: #7F5321;
            border: 0 none;
        }
        /*-------SELECT樣式-------*/
        select {
            background-color: white;
            border: thin solid blue;
            border-radius: 4px;
            display: inline-block;
            font-size: 15px;
            font-weight: 500;
        /*移除箭頭樣式*/
        /* appearance:none;
        -moz-appearance:none;
        -webkit-appearance:none; */

        /*改變右邊箭頭樣式*/
        /* background: url("arrow.png") no-repeat right center transparent; */
/*         
        border:0px;
        width:80%;
        height:34px;
        padding-left:2px;
        padding-right:20px;
        background-color:#ffffff;
        color:black;  /*字體顏色*/
        text-align:center; */
        }

        /*IE隱藏箭頭樣式*/
        select::-ms-expand { 
        display: none; 
        }

        select:focus{
        box-shadow: 0 0 5px 2px #467BF4;    
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
    <div class="col-md-3" style="background-color:#7F5321;">
        <div class="list-group sticky-top mt-3">
            <h1 class="h10">
                YTB-F</h1>
            <nav class="menu">
                <a href="user_management.php" style="color:#FFFFFFB2;">
                    使用者
                </a>
                <a href="commodity.php" style="color:#FFFFFFB2;">
                    周邊商品
                </a>
                <a href="order.php" style="color:#FFFFFFB2;">
                    訂單
                </a>
                <a href="contact.php">
                    聯絡表單
                </a>
            </nav>
        </div>
    </div>

    <div class="col-md-9">
        <div class="tab-content">
            <nav class="navbar navbar-light" style="margin: 40px 0 0 0;">
                <h1 class="h11">
                聯絡表單管理</h1>
                <div class="ml-auto">
                    <?php
                        if(isset($_SESSION['login'])){
                            if($_SESSION['login']=="Yes"){
                                $uname=@$_SESSION["uName"];
                                if($uname){
                                    echo "<a class='welcome'>$uname.管理者您好</h1>";
                                    echo "<a href='logout.php' class='logout' >登出</a>";
                                }
                                else{
                                    header('Location: home.php');
                                }
                            }
                            else{
                                header('Location: home.php');
                            }
                        }
                        else{
                            header('Location: home.php');
                            ob_end_flush();
                        }  
                        
                    ?>
                </div>
            </nav>
            <div style="margin: 5% 2% 0 2%">
            <div class="tab-content-center">
                <?php
                    $SQL="SELECT * FROM suggest";
                    if($result=mysqli_query($link,$SQL)){
                        echo "<table class='table table-striped table-sm'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>使用者編號</th><th>姓名</th><th>電子郵件</th><th>建議</th><th>目前狀態</th><th>狀態更改</th><th>狀態更新</th><th>刪除</th><th>檢視</th>";
                                echo "<tr/>";
                            echo "</thead>";
            
                    
                            echo "<tbody>";
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td width='120px'>".$row["sNo"]."</td><td width='80px'>".$row["sName"]."</td><td width='160px'>".$row["sEmail"]."</td><td width='250px'>".$row["Suggest"]."</td>";
                            echo "<td>".$row["state"]."</td>";
                            echo "<td><form action='contact_update.php' method='POST'><select name='state'><option value='0'>未讀</option><option value='1'>已閱</option></select></td>";
                            echo "<td><input class='btn btn-primary btn-sm' type='submit' name='update' value='更新'></td>
                                  <td><input class='btn btn-primary btn-sm' type='submit' name='update' value='刪除'></td>
                                  <td><input class='btn btn-primary btn-sm' type='submit' name='update' value='檢視'></td>
                                  <input type='hidden' name='sNo' value='".$row["sNo"]."'></form>";
                            echo "</tr>";
                        }
                            echo "</tbody>";
            
                         echo "</table>";
                    }
                    ?>   
                <h6 style="margin: 15% 0 0 0; color:#ffffff;">1</h1>
            </div>
        </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    

</body>

</html>