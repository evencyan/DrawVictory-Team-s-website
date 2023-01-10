<?php
use PHPMailer\PHPMailer\PHPMailer;
$username = $_POST['number'];
$usermail = $_POST['email'];
$userpass = $_POST['password'];
$userpass2 = $_POST['password2'];
$token = md5($username.$usermail);
$token_exptime = time()+60*60*3;
$success = array('msg' => 'OK');
$connect = new mysqli('127.0.0.1','db951abb','QWEqwe123','db951abb');
$sql='SET NAMES UTF8';  
mysqli_query($connect,$sql); 
if($username == '' || $userpass == '' || $usermail == ''){
    $success['result'] = 'error1';
}else if($userpass!==$userpass2){
    $success['result'] = 'error2';
}
else if($userpass==$userpass2){
    $sql1 = "select*from t_user where username = '$username'";
    $result =$connect->query($sql1);
    $sql2 = "select*from t_user where email = '$usermail'";
    $result2 = $connect->query($sql2);
    while ($row = $result->fetch_assoc()) {
        $s = $row;
    }
    while ($row2 = $result2->fetch_assoc()){
        $s2 = $row2;
    }
        if ($s) {
            $success['result'] = 'error3';
        } else if ($s2) {
            $success['result'] = 'error4';
    } else {
        sendmail($username,$usermail,$token);
        $what = "insert into t_user value(null,\"$username\",\"$userpass\",\"$usermail\",\"$token\",\"$token_exptime\",0,default,0,0,0)";
        $ret = $connect->query($what);
        $success['result'] = 'ok';
    }
    }
    function sendmail($sendname,$sendmail,$key)
        {
            $test = '调用函数';
            require 'PHPMailer-master/src/Exception.php';
            require 'PHPMailer-master/src/PHPMailer.php';
            require 'PHPMailer-master/src/SMTP.php';
            $mail = new PHPMailer(); //建立邮件发送类
            $mail->IsSMTP(); // 使用SMTP方式发送
            $mail->CharSet='UTF-8';// 设置邮件的字符编码
            $mail->Host = "smtp.qq.com"; // 您的企业邮局域名
            $mail->SMTPAuth = true; // 启用SMTP验证功能
            $mail->SMTPSecure = "ssl";
            $mail->Port = "465"; //SMTP端口
            $mail->Username = 'zoo.to@qq.com'; // 邮局用户名(请填写完整的email地址)
            $mail->Password = "qouswstycgvneddc"; // 邮局密码
            $mail->From = 'zoo.to@qq.com'; //邮件发送者email地址
            $mail->FromName = "DrawVictory Team";
            $mail->AddAddress($sendmail,'custume');//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//$mail->AddReplyTo("", "");
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
//$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
            $mail ->IsHTML(true);
            $mail->Subject = "请激活您的账号"; //邮件标题
            $mail->Body = "<div style='position:absolute;'><div style='position: relative;
            margin: auto;
            left: 0;
            right: 0;
            width: 630px;
            height: 700px;
            background-color: #24292d;'>
            <img  style='width: 100px;
            position: absolute;
            left: 0;
            right: 0;
            top: 50px;
            margin: auto;' src='https://www.gaojianwen.xyz/picture/logo.svg'>  
            <h1 style=' width: 180px;
            position: absolute;
            left: 245px;
            top: 210px;
            margin: auto;
            font-size: 35px;
            font-weight: 600;
            color: #ff7675;'>账户激活</h1>
            <div style='width: 80%;
            position: absolute;
            left: 0;
            right: 0;
            top: 270px;
            margin: auto;
            height: 2px;
            background-color: #ff7675;'></div>
            <p style='color: #ff7675;
            font-size: 20px;
            position: absolute;
            top: 280px;
            left: 65px;'>亲爱的".$sendname.":</p>
            <p style='height: 40px;
            width: 75%;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            font-size: 17px;
            color: white;
            top: 345px;'>感谢您在我们的网站注册了账号，为了确保账户唯一性以及您不是个机器人，需要您使用邮箱激活账户，激活链接如下，请点击链接并完成账户初始设置，谢谢合作！٩(๑>◡<๑)۶ </p>
            <a style='position: absolute;
            background-color: #24292d;
            color: #ff7675;
            border: 2px solid #ff7675;
            padding: 6px 10px;
            letter-spacing: 1px;
            font-size: 26px;
            outline: none;
            height: 35px;
            width: 163px;
            text-decoration: none;
            top: 430px;
            right: 0;
            left: 0;
            margin: auto;
            cursor: pointer;' href='https://localhost/web/php/active.php?verify=".$key."' target='_blank'>点我激活账户</a>
            <p style='position: absolute;
            font-size: 14px;
            color: white;
            width: 70%;
            margin: auto;
            left: 0;
            right: 0;
            bottom: 150px;'>无法跳转？请复制以下链接进行激活<a href='https://localhost/web/php/active.php?verify=".$key."' target='_blank'>http://localhost/web/php/active.php?verify=".$key."</a></p>
            <p style='position: absolute;
            line-height: 0;
            color: white;
            font-weight: 500;
            bottom: 90px;
            left: 400px;'>祝您愉快！</p>
            <p style='position: absolute;
            line-height: 0;
            color: white;
            font-weight: 500;
            bottom: 70px;
            left: 400px;'>DrawVictory Team</p>
            <div style='position: absolute;
            height: 40px;
            width: 3px;
            background-color: #ff7675;
            bottom: 77px;
            right: 70px;'></div>
            </div></div>"; //邮件内容
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
            $result5 = $mail->send();
            return $result5;
        }
echo json_encode($success);
mysqli_close($connect);
?>