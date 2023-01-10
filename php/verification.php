<?php
	session_start();										//启动session
	header('Content-type: image/gif');						//输出头信息
	$image_w=100;											//验证码图形的宽				
	$image_h=25;											//验证码图形的高
	$number=range(0,9);										//定义一个成员为数字的数组
	$character=range("Z","A");								//定义一个成员为大写字母的数组
	$result=array_merge($number,$character);				//合并两个数组
	$string="";												//初始化
	$len=count($result);									//新数组的长
	for($i=0;$i<6;$i++)
	{
		$new_number[$i]=$result[rand(0,$len-1)];			//在$result数组中随机取出6个字符
		$string=$string.$new_number[$i];					//生成验证码字符串
	}
	$_SESSION['string']=$string;							//使用$_SESSION变量传值
	$check_image=imagecreatetruecolor($image_w,$image_h);	//创建图片对象
	$white=imagecolorallocate($check_image, 255, 255, 255);	
	$black=imagecolorallocate($check_image, 0, 0, 0);	
	imagefill($check_image,0,0,$white);//设置背景颜色为白色
	$line_color=imagecolorallocate($check_image, 255, 0, 0);//设直线的颜色
	imageline($check_image, 0, 10, 100,20, $line_color);//画线
	for($i=0;$i<100;$i++)									//加入100个干扰的黑点
	{
		imagesetpixel($check_image, rand(0,$image_w), rand(0,$image_h),$black);
	}
	for($i=0;$i<count($new_number);$i++)					//在背景图片中循环输出4位验证码
	{
		$x=mt_rand(1,7)+$image_w*$i/6;						//设定字符所在位置X坐标
		$y=mt_rand(1,$image_h/6);							//设定字符所在位置Y坐标
		//随机设定字符颜色
		$color=imagecolorallocate($check_image,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
		//输入字符到图片中
		imagestring($check_image,5,$x,$y,$new_number[$i],$color);
	}
	imagepng($check_image);
	imagedestroy($check_image);
?>