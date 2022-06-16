<?php
    session_start();
    require("DBconnect.php");
    $uNo=$_GET["uNo"];
    //$link = @mysqli_connect('localhost','root','Suga19930309','report');
    $SQL="SELECT * FROM user WHERE uNo='$uNo'";
    $result=mysqli_query($link,$SQL);
    $row=mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
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
        /*  登入註冊
        ------------------------------------- */
        .login{
            padding: 5px 30px;
            background: #FFA514;
            border:0 none;
            border-radius: 5px;

            color: #ffffff;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 20px;
            font-weight: 700;
            line-height: normal;
            text-decoration:none;
        }
        .login:hover{
            color: #000000;
            text-decoration: none;
        }
        /*  table------------------------------------- */
        
        table{
            margin-left:auto; 
            margin-right:auto;
            border-collapse:separate; 
            border-spacing: 0 15px;

            color: #09224B;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 25px;
            font-weight: 700;
            line-height: normal;
        }
        table th{
            padding: 2px 20px;
        }
        table td{
            padding: 2px 20px;
            font-weight: 400;
        }
        .txt{
            outline: 1px solid;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(27, 31, 49, 0.25);
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
            <div class="col-md-16">
                <h1 style="color: #000000;
                    font-family: 'Noto Sans TC', sans-serif;
                    font-size: 40px;
                    font-weight: 700;
                    text-align:center;
                    margin: 15% 0 0 0;">
                    註冊成功</h1>
                    <p style="color: #000000;
                        font-family: 'Noto Sans TC', sans-serif;
                        position:relative;
                        font-size: 20px;
                        font-weight: 400;
                        text-align:center;">
                        哈囉，<?php echo $row['uName']; ?>先生/小姐，這是您的註冊資料</p>
                        <table>
                            <tr class="txt">
                                <th>電子信箱</th>
                                <td><?php echo $row['uEmail'];?></td>
                            </tr>
                            <tr class="txt">
                                <th>帳號</th>
                                <td><?php echo $row['uName'];?></td>
                            </tr>
                            <tr class="txt">
                                <th>密碼</th>
                                <td><?php echo $row['uPwd'];?></td>
                            </tr>
                            <tr class="txt">
                                <th>您的身份</th>
                                <td><?php 
                                        if($row['uRole']=='admin'){
                                            echo "管理員";
                                        }
                                        else{
                                            echo "使用者";
                                        }?></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><a href='login.php' class='login'>登入</a></td>
                            </tr>
                            </form>
                        </table>
                <h6 style="margin: 10% 0 0 0; color:#ffffff;">1</h1>
            </div>
           
        </div>
    </div>
    </div>
    </div>
    

</body>

</html>