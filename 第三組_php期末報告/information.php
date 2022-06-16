<!doctype html>
<html lang="en">
    <?php
        session_start();
        require("DBconnect.php");
       // $link = @mysqli_connect('localhost','root','Suga19930309','report');

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
            padding: 5px 100px;
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
        .back{
            padding: 1px 1px;
            border:0 none;
            background: #f7f7f700;

            color: #FFA514;
            font-size: 20px;
            font-weight: 500;
            line-height: normal;
            text-decoration:none;
        }
        .back:hover{
            background: #f7f7f700;
            color: #000000;
        }
        .singup{
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
        .singup:hover{
            color: #000000;
            text-decoration:none;
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
    <div class="col">
        <div class="h1 text-center"  style="margin: 5% 0 0 0;"><strong>YTB-F 訂單確認</strong></div>
        <div class="row mt-3">
            <div class="col-12 col-md">
                <div class="alert alert-success alert-rounded text-center" role="alert" 
                    style="background:#FFC364; border:0 none; color: #905900;font-weight: 700;">
                    1.輸入訂單資料</div>
            </div>
            <div class="col-12 col-md">
                <div class="alert alert-light alert-rounded text-center" role="alert">2.訂單完成</div>
            </div>
        </div>
        <?php
            $totalPrice=0;
            $total = 0;
            if(!empty($_SESSION['shopcar'])){
                $arr = array();
                $arr = $_SESSION["shopcar"];
                foreach ($arr as $v){
                    $SQL="SELECT * FROM product WHERE pNo='{$v[0]}'";
                    $result=mysqli_query($link, $SQL);
                    $row=mysqli_fetch_assoc($result);
                    $totalPrice += $row["pPrice"]*$v[1];
                    $total += $v[1];
                }
                echo "<div class='row justify-content-center mt-4'>
                        <div class='col-md-8'>
                            <div class='accordion' id='accordionExample'>
                                <div class='card card-bottom'>
                                    <div class='card-header d-block justify-content-between' id='headingOne'>
                                        <div class='h4 text-center'>
                                                <strong>總計NT$".$totalPrice."</strong>
                                        </div>
                                        <div style='text-align:center;'>
                                            <button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapseOne'
                                                aria-expanded='true' aria-controls='collapseOne' style='color:#000000;'>
                                                購物車(".$total."件)∨
                                            </button>
                                        </div>
                                    </div>
                                </div>";
            }
        ?>
         
                                <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <?php
                                        if(!empty($_SESSION['shopcar'])){
                                            $arr = array();
                                            $arr = $_SESSION["shopcar"];
                                            $totalPrice = 0;
                                            echo "<table class='table table-sm'>";
                                            echo "<thead>
                                                    <tr>
                                                        <th></th>
                                                        <th colspan='2'>商品</th>
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
                                                echo "<td class='align-middle'>
                                                        <img src=".$row["pPath"]."
                                                        alt='...' width='80px;'>
                                                        </td>";
                                                echo "<td>".$row["pName"]."<br>".$row["pSize"].".".$row["pStyle"]."</td>";
                                                echo "<td>NT$<span id='pPrice'>".$row["pPrice"]."</span></td>";
                                                echo "<td><span>".$v[1]."件</span></td>";
                                                echo "<td>NT$<span id='smallPrice'>".$row["pPrice"]*$v[1]."</span></td>";
                                                echo "</tr>";
                                                $totalPrice += $row["pPrice"]*$v[1];
                                            }
                                            $totalPrice +=60;
                                            echo "<tr class='text-right'>
                                                    <td colspan='5'><strong>運費</strong></td>
                                                    <td><strong>NT$ 60</strong></td>
                                                        </tr>
                                                        <tr class='text-right'>
                                                            <td colspan='5'><strong>合計</strong></td>
                                                            <td><strong>NT$ ".$totalPrice."</strong></td>
                                                        </tr>
                                                    </tbody>";
                                            echo "</table>";
                                            echo "</div>";
                                        }
                                        else{
                                            echo "<div style='text-align:center;margin: 20% 0 55% 0;'>";
                                            echo "<h5 style='text-align:center;margin: 0 0 20px 0;'>你的購物車是空的</h5>";
                                            echo "<a href='home.php' class='login'>繼續購物</a>";
                                            echo "</div>";
                                        }
                                    ?>
                                </div></div></div>
                <?php
                    if(!empty($_SESSION['shopcar'])){
                        $uNam='';
                        $uEmail='';
                        if(isset($_SESSION['uName'])){
                            $uName=$_SESSION['uName'];
                            $USER = "SELECT * FROM user WHERE uName='$uName'";
                            $result=mysqli_query($link, $USER);
                            $row=mysqli_fetch_assoc($result);
                            $uEmail=$row["uEmail"];
                        }
                    echo "<div class='row justify-content-center mt-4'>
                    <div class='col-md-8'>
                    <div class='card text-center my-5  border-0 '>
                            <div class='card-header border-0'>
                                <div class='h3 mt-1'> 訂購人資訊 </div>
                            </div>
                            <form action='informationupdate.php' method='post' enctype='multipart/form-data' class='needs-validation' novalidate>
                                <div class='form-row text-left mt-3'>
                                    <div class='form-group col-md-6'>
                                        <label for='name'>姓名</label>
                                        <input type='text' class='form-control ' id='name' name='oName' value='".@$uName."' placeholder='姓名' required>
                                        <div class='invalid-feedback'>請填寫姓名</div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='name'>電話號碼</label>
                                        <input type='tel' class='form-control ' id='name' name='oTel' placeholder='電話' required>
                                        <div class='invalid-feedback'>請填寫電話號碼</div>
                                    </div>
                                </div>
                                <div class='form-row text-left mt-3'>
                                    <div class='form-group col-md-6'>
                                        <label for='mail'>Email</label>
                                        <input type='email' class='form-control' id='mail' name='oEmail' placeholder='Email' value='".$uEmail."' required>
                                        <div class='invalid-feedback'>請填寫Email</div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='name'>訂單備註</label>
                                        <textarea class='form-control' id='name' name='oRemark'></textarea>
                                    </div>
                                </div>
                                <div class='form-row text-left'>
                                    <div class='form-group col-md-4'>
                                        <label for='zone'>城市</label>
                                        <select name='oCity' id='zone' class='form-control'>
                                            <option value='台北市'>台北市</option>
                                            <option value='台中市'>台中市</option>
                                            <option value='高雄市'>高雄市</option>
                                        </select>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label for='postal-code'>郵遞區號</label>
                                        <input type='text' class='form-control' id='postal-code' name='oPost' placeholder='' required>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <label for='address'>地址</label>
                                    <input type='text' class='form-control' id='mail' name='oAddress' placeholder='XXX路xx號' required>
                                </div>
                                <div class='mt-3 d-flex justify-content-end'>
                                    <a href='home.php' class='btn btn-secondary mr-2 back'>繼續選購</a>
                                    <input type='submit' class='singup' value='提交訂單'>
                                </div>
                        </form>
                        </div></div>";}
                    ?>
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
            
            </div>
        </div>
    </div>
</div>
    

</body>

</html>