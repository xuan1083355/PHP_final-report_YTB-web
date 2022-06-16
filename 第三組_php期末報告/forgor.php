<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'src\Exception.php';
    require 'src\PHPMailer.php';
    require 'src\SMTP.php';
    if(isset($_POST["uemail"])){
        if($_POST["uemail"]!=null)
        {
            $uemail=$_POST["uemail"];
            
            $link = @mysqli_connect('localhost','root','Suga19930309','report');
            $SQL="SELECT * FROM user WHERE uEmail='$uemail'";
            $result=mysqli_query($link, $SQL);

            if(mysqli_num_rows($result)==1){
                $row=mysqli_fetch_assoc($result);
                $mail = new PHPMailer(true);
                if($row['uRole']=='admin'){
                    $uRole="管理員";
                }
                else{
                    $uRole="使用者";
                }
                try {
                    //Server settings
                    $mail->SMTPDebug = 2;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.mail.yahoo.com';                  //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'vivi61212102@yahoo.com';                     //SMTP username
                    $mail->Password   = 'Suga19930309';                               //SMTP password
                    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    $mail->SMTPSecure = "ssl";
                    $mail->Charset="UTF-8";
                
                    if($result=mysqli_query($link,$SQL)){
                        $mail->setFrom('vivi61212102@yahoo.com', 'vivi');
                        $mail->addAddress($uemail);
                        $mail->isHTML(true);
                        $mail->Subject = "=?utf-8?B?".base64_encode("您好，".$row["uName"]."先生/小姐，這是您的註冊資料")."?=";
                        $mail->Body    = "您好，".$row["uName"]."先生/小姐，這是您的註冊資料</br>
                                            <table>
                                            <tr>
                                                <th>電子信箱</th>
                                                <td>".$row["uEmail"]."</td>
                                            </tr>
                                            <tr >
                                                <th>帳號</th>
                                                <td>".$row['uName']."</td>
                                            </tr>
                                            <tr>
                                                <th>密碼</th>
                                                <td>".$row['uPwd']."</td>
                                            </tr>
                                            <tr>
                                                <th>您的身份</th>
                                                <td>".$uRole."</td>
                                            </tr>
                                        </table>";
                        $mail->send();
                    }
                    echo '訊息已傳送';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            else{
            }
        }
        else{
        }            
    }else{
        
    }
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
        }
        html,body{
            height: 100%;
        }
        body{
            background-color: #ffffff;
        }
        /*  側邊欄位------------------------------------- */
        .side-menu{
            width: 20%;
            height: 100%;
            padding: 50px 0;
            box-sizing: border-box;
            background-color: #FFA514;
            flex-direction: column;
            float:left;
            box-shadow: 5px 0px 10px hsla(240, 40%, 15%,.6);
        }
        .menu{
            position:relative;
            top: 20% 
        }
        .h10
        {
            color: #ffffff;
            font-family: 'Noto Sans TC', sans-serif;
            text-align:center;
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
        /*  內容------------------------------------- */
        .content
        {
            width: 80%;
            position: relative;
            top: 30%;
            float:left;
        }
        .main
        {
            padding: 25px;
        }
        .h12
        {
            color: #000000;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 40px;
            font-weight: 700;
            text-align:center;
        }
        .h13
        {
            color: #000000;
            font-size: 20px;
            font-weight: 500;
            text-align:center;
        }
        
        /*  登入註冊------------------------------------- */
        .login{
            position: absolute;
            right: 5%;
            top: 10px;
            padding: 1px 5px;
            background: #FFA514;
            border:0 none;
            border-radius: 5px;

            color: #ffffff;
            font-family: Inter;
            font-size: 20px;
            font-weight: 600;
            line-height: normal;
            text-decoration:none;
        }
        .singup{
            position: absolute;
            right: 1%;
            top: 10px;
            padding: 1px 1px;
            border:0 none;

            color: #FFA514;
            font-family: Inter;
            font-size: 20px;
            font-weight: 700;
            line-height: normal;
            text-decoration:none;
        }

        /*  table------------------------------------- */
        input {
            padding:5px 15px; 
            background:#C4C4C4;
            border:0 none;
            cursor:auto;
            border-radius: 5px; 
            box-shadow: 0px 5px 20px rgba(27, 31, 49, 0.25);

            color: #ffffff;
            font-size: 20px;
            font-weight: 700;
            line-height: normal;
        }
        input::placeholder {
            color: #000000;
            font-size: 20px;
            line-height: normal;
        }
        
        table{
            margin-left:auto; 
            margin-right:auto;

            color: #09224B;
            font-family: Inter;
            font-size: 20px;
            font-weight: 700;
            line-height: normal;
        }
        table td{
            padding: 10px;
        }
    </style>
</head>

<body>
<div class="side-menu">
    <h1 class="h10">
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
<div class="content">
    <h1 class="h12">
        忘記密碼</h1>
    <div class="main">
    <table>
        <form action="" method="post" enctype="multipart/form-data">
        <tr>
            <td colspan="2" align="center"><input type="email" name="uemail" placeholder="電子信箱"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="確定送出" style="background-color:#FFA514; cursor:pointer;"></td>
        </tr>
        </form>
    </table>
    <?php
        if(isset($_POST["uemail"])){
            if($_POST["uemail"]!=null)
            {
                $uemail=$_POST["uemail"];
                
                $link = @mysqli_connect('localhost','root','Suga19930309','report');
                
                $SQL="SELECT * FROM user WHERE uEmail='$uemail'";

                $result=mysqli_query($link, $SQL);

                if(mysqli_num_rows($result)==1){
                    
                }
                
                else{
                    echo "<h1 class='h13'>
                    查無此電子信箱，請重新輸入</h1>";
                }
            }
            else{
                echo "<h1 class='h13'>
                    您尚未輸入電子信箱</h1>";
            }            
        }else{
            
        }
    ?>
    </div>
</div>
</body>
</html>