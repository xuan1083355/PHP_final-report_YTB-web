<?php
    session_start();
    require("DBconnect.php");
   // $link = @mysqli_connect('localhost','root','Suga19930309','report');
    // unset($_SESSION['shopcar']);
    // $_SESSION['shopcar']=array();
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>YTB-F</title>
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Noto+Sans+TC:100,300,400,500,700,900&display=swap");
        @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css");
        *{
            margin: 0;
            padding: 0;
            list-style: none;
            height:auto;
            font-family: 'Noto Sans TC', sans-serif;
        }
        html,body{
            height:auto;
        }
        body{
            background-color: #ffffff;
        }

        /*  側邊欄位------------------------------------- */
        .side-menu{
            width: 20%;
            height: 1000px;
            padding: 50px 0;
            box-sizing: border-box;
            background-color: #FFA514;
            flex-direction: column;
            float:left;
            box-shadow: 5px 0px 10px hsla(240, 40%, 15%,.6);
        }
        .menu{
            position:relative;
            margin: 150px 0px 0px 0px;
        }
        nav a{
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
        nav a + a::before{
            content: '';
            position: absolute;
            border-top: 1px solid rgb(255,255,255,.4);
            left: 10px;
            right: 10px;
            top: 0;
        }
        /*  首頁------------------------------------- */
        .content 
        {
            width: 80%;
            float:right;
        }
        .content nav + nav::before{
            content: '';
            position: absolute;
            border-top: 1px solid rgb(255,255,255,.4);
            left: 10px;
            right: 10px;
            top: 0;
        }
        nav div{
            float:left;
            position: relative;
            left: 10%;
        }
        nav div + div::before{
            content: '';
            position: absolute;
            border-top: 1px solid rgb(255,255,255,.4);
            left: 10px;
            right: 10px;
            top: 0;
        }
        .title{
            color: #905900;
            font-family: 'Noto Sans TC', sans-serif;
            position:relative;
            left: 5%;
            top: 10%;
            margin: 20px 0px 0px 0px;
            font-size: 40px;
            font-weight: 700;
        }
        /*  功能列------------------------------------- */
        .login{
            position: absolute;
            right: 10%;
            top: 10px;
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
        .singup{
            position: absolute;
            right: 5%;
            top: 10px;
            padding: 1px 1px;
            border:0 none;

            color: #FFA514;
            font-size: 20px;
            font-weight: 700;
            line-height: normal;
            text-decoration:none;
        }
        .send{
            position: absolute;
            right: 5%;
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
        .continue{
            position: absolute;
            right: 15%;
            padding: 1px 1px;
            border:0 none;

            color: #FFA514;
            font-size: 20px;
            font-weight: 700;
            line-height: normal;
            text-decoration:none;
        }
        /*  首頁內容------------------------------------- */
        .progressbar{
            display: block;
            float: left;
            width: 50px;
            height: 50px;
            background-color: #FFC364;
            border-radius: 50%;
        }
        .progressbar>div {
            position: relative;
            top: 15px;
            left: 20px;
            color: #905900;
        }
        
        /*  table------------------------------------- */
        
        .produt thead th{
            color: #09224B; /* 表頭文字白色 */
            border-bottom: 2px solid #e5e5e5;
        }

        .produt tbody td,
        .produt tbody th {
            text-align: center; /* 文字置中顯示 */
            padding: 0px 10px; /* 添加內距 */
            border-bottom: 1px solid #e5e5e5;
        }

        

        
    </style>
    <script id="rendered-js">
        window.onload = function() {
            var del = document.getElementsById("del"); //減號
            var uVol = getElementById("uVol"); //件數
            var add = document.getElementsById("add"); //加號
            var pPrice = document.getElementsById("pPrice"); //單價
            var smallPrice = document.getElementsById("smallPrice"); //小計
            var totalPrice = document.getElementById("totalPrice"); //總價
            alert(totalPrice);
            for (var i = 0; i < del.length; i++) {
                del[i].index = i;
                add[i].index = i;
                liCheck[i].index = i;
                del[i].onclick = function() {
                    if (uVol[this.index].value <= 1) {
                        this.disabled = true; //當件數小於等於0時, 將減號按鈕禁用
                    }
                    uVol[this.index].value --;
                    smallPrice[this.index].value = Number(smallPrice[this.index].value) - Number(pPrice[this.index].value);
                    totalCount.value--;
                    totalPrice.value = Number(totalPrice.value) - Number(pPrice[this.index].value);
                }
                add[i].onclick = function() {
                    del[this.index].disabled = false;
                    uVol[this.index].value++;
                    smallPrice[this.index].value = Number(smallPrice[this.index].value) + Number(pPrice[this.index].value);
                    totalCount.value++;
                    totalPrice.value = Number(totalPrice.value) + Number(pPrice[this.index].value);
                }
            }
        };
    </script>
</head>

<body>
<div class="side-menu">
    <h1 style="color: #ffffff;
        font-family: 'Noto Sans TC', sans-serif;
        text-align:center;">
        YTB-F</h1>
    <div class="menu">
        <nav>
            <a href="home.php">
                首頁
            </a>
            <a href="suggest.php" style="color:#FFFFFFB2;">
                聯絡我們
            </a>
        </nav>
    </div>
</div>
<div style="width: 80%;
            float:right;">
    <div>    
        <h1 class="title">
            <img src="shop.png" style="width: 35px;
                hight: 35px; margin: 0px 20px 0px 0px;">購物車
                <b style="margin: 0px 10px 0px 0px;
                    font-size: 20px;
                    color: #905900;
                    font-weight: 500;">共1件商品</b>
                </h1>
            <a href='login.php' class='login'>登入</a>
            <a href='singup.php' class='singup'>註冊</a>
    </div>
    <div style="width: 80%; float: none;">
        <div class="progressbar" style="margin: 0px 50px 0px 40%;">
            <div>1</div>
            
        </div>
        
        <div class="progressbar" style="margin: 0px 50px 0px 50px;">
            <div style="color: #E6910B;">2</div>
            
        </div>
        <div class="progressbar" style="margin: 0px 0px 0px 30px;">
            <div style="color: #E6910B;">3</div>
            
        </div>
    </div>
    <div style="width: 80%; float: left;display: flex;">
        <p style="margin: 0px 50px 0px 40%;">購物車</p>
        <p style="margin: 0px 40px 0px 45px;">填寫資料</p>
        <p style="margin: 0px 0px 0px 30px;">訂單完成</p>
    </div>
</div>

<table class="produt" style="width: 70%; margin: 30px; position:relative; top: 20px; left: 5%;">
    <thead>
        <tr>
            <th>商品</th>
            <th></th>
            <th>單價</th>
            <th>數量</th>
            <th>總計</th>
            <th></th>
        </tr>
    </thead>
    
    <tbody>
    <?php
        if(isset($_SESSION['shopcar'])){
            $arr = array();
            $arr = $_SESSION["shopcar"];
            $totalPrice = 0;
            foreach ($arr as $v){
                echo $v[0];
                echo $v[1]."<br>";
                $SQL="SELECT * FROM product WHERE pNo='{$v[0]}'";
                $result=mysqli_query($link, $SQL);
                $row=mysqli_fetch_assoc($result);
                $uVol=$v[1];
                $pPrice=$row["pPrice"];
                $smallPrice=$uVol*$pPrice;
                echo "<tr>
                        <td><img src='".$row["pPath"]."' style='width: 150px; margin:10px;'></td>
                        <td>".$row["pName"]."<br>".$row["pSize"].".".$row["pStyle"]."</td>
                        <td>NT$<span id='pPrice'>".$pPrice."</span></td>
                        <td><span>".$v[1]."件</span></td>
                        <td>NT$<span id='smallPrice'>".$smallPrice."</span></td>
                        <td><a href='delet.php?pNo=".$row["pNo"]."'>"."刪除"."</a></td>
                    </tr>";
                $totalPrice += $smallPrice;
            }
        }
        ?>
        
        
    </tbody>  
</table>

<div style="width: 80%;
            float:right;
            display: flex;">
    <div style="width: 40%; border: 2px solid #C4C4C4;
                position:relative; top: 20px; left: 5%;">
        <div style="background-color:#C4C4C4;">
            <div style="color: #ffffff; 
            font-family: Inter;
            font-size: 20px;
            font-weight: 600;
            line-height: normal;
            padding: 10px 20px;">送貨資訊</div>
        </div>
        <div style="padding: 10px 20px;">
            <form action="informationO.php" method="POST">
            <table>
                <tr>
                    <th>配送地區</th>
                    <td style="margin:20px 50px;"><select name="area">
                        <option value="本島">本島</option>
                        <option value="離島">離島</option>                        
                    </select></td>
                </tr>
                <tr>
                    <th>配送方式</th>
                    <td style="margin:20px 50px;"><select name="way">
                        <option value="超商取貨">超商取貨</option>
                        <option value="中華郵政">中華郵政</option>
                        <option value="宅配">宅配</option>                        
                        </select></td>
                </tr>
                <tr>
                    <th>付款方式</th>
                    <td style="margin:20px 50px;"><select value="pay">
                        <option value="貨到付款">貨到付款</option>
                        <option value="信用卡/金融卡">信用卡/金融卡</option>
                        <option value="銀行轉帳">銀行轉帳</option>                      
                    </select></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    <div style="width: 40%; border: 2px solid #C4C4C4;
                position:relative; top: 20px; left: 10%;">
        <div style="background-color:#C4C4C4;">
            <div style="color: #ffffff; 
            font-size: 20px;
            font-weight: 600;
            line-height: normal;
            padding: 10px 20px;">訂單資訊</div>
        </div>
        <div style="padding: 10px 20px;">
            <form >
            <table>
                <tr>
                    <th>訂單費用</th>
                    <td><span class="totalPrice"><?php echo $totalPrice; ?></span></td>
                </tr>
                <tr>
                    <th>運費</th>
                    <td></td>
                </tr>
                <tr>
                    <th>總計</th>
                    <td></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<div style="width: 80%;
            float:right;
            position:relative;
            top: 50px;">
    <a href='information.php' class='send'>送出訂單</a>
    <a href='home.php' class='continue'>繼續購物</a>
</div>
</body>
</html>