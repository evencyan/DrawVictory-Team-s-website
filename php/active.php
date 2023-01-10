<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="../javascript/jquery-3.5.1.min.js"></script>
    <link rel="shortcut icon" href="../picture/logo.ico" type="image/x-ico"/>
    <link rel="stylesheet" href="../crooper/cropper.min.css">
    <link href="../css/active.css" rel="stylesheet">
    <script src="../crooper/cropper.min.js"></script>
    <script src="../javascript/alert.js"></script>
    <script src="../javascript/picture.js"></script>
    <title>账户激活</title>
</head>
<body>
</body>
<?php
    $verify = stripslashes(trim($_GET['verify'])); 
    $nowtime = time(); 
    $connection = new mysqli('127.0.0.1','db951abb','QWEqwe123','db951abb');
    $result = $connection -> query("select id,token_exptime from t_user where `status`='0' and
`token`='$verify'");
while ($row = $result->fetch_assoc()){
    $s = $row;
    $id = $row['id'];
    $time = $row['token_exptime'];
}if($s){
    if($nowtime>$time){ //24hour
        echo $row['token_exptime'];
        echo  "<div class='p1'>您的激活有效期已过，请登录您的帐号重新发送激活邮件.</div>"; 
        $cle =mysqli_query($connection,"UPDATE `t_user` SET `token` = '', WHERE `t_user`.`id` =" .$id);
    }else{ 
        	static $realip;
  if (isset($_SERVER)){
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
      $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
      $realip = $_SERVER["HTTP_CLIENT_IP"];
    } else {
      $realip = $_SERVER["REMOTE_ADDR"];
    }
  } else {
    if (getenv("HTTP_X_FORWARDED_FOR")){
      $realip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("HTTP_CLIENT_IP")) {
      $realip = getenv("HTTP_CLIENT_IP");
    } else {
      $realip = getenv("REMOTE_ADDR");
    } 
  }
  $s_ip = $realip;
        //$sql = mysqli_query($connection,"UPDATE `t_user` SET status='1',ip='$s_ip'  WHERE id=".$id);
        //$clean =mysqli_query($connection,"UPDATE `t_user` SET `token` = ''  WHERE `t_user`.`id` =" .$id);
        //创建一个结果集
        //$sql
	if(1 == 1){
      echo "<div class='p1'>账户激活成功！接下来请完成您的账户初始操作</div>";
      echo "<button class='btn' onclick='picture()'>START</button>";
	}else{
		echo "<div class='p1'>账户激活失败'</div>";
	}
} }
else{
    echo "<div class='p1'>抱歉，您的激活链接无效。</div>";
}
mysqli_close( $connection );
?></html>