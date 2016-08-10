<?php
	
	session_start();

	//create
	$image=imagecreatetruecolor(100,30);	//创建一张宽100，高30的底图，默认黑色
	$bgcolor=imagecolorallocate($image,255,255,255);	//为$image分配颜色
	imagefill($image,0,0,$bgcolor);		//为$image填充颜色$bgcolor
	
	$captch_code='';
	
	//add fontcontent 0-9
/*	for($i=0;$i<4;$i++){
		$fontsize=6;
		$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));	//为$image中的$fontcontent分配颜色
		$fontcontent=rand(0,9);
		
		$x=($i*100/4)+rand(5,10);	//内容坐标，避免重叠
		$y=rand(5,10);
		
		imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);	//水平地画出一行字符串
	}
*/	
	//add fontcontent a-z0-9
/*	for($i=0;$i<4;$i++){
		$fontsize=6;
		$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));	//为$image中的$fontcontent分配颜色
		
		$data='abcdefghijklmnopqrstuvwxyz1234567890';	//可以去掉相似项
		$fontcontent=substr($data,rand(0,strlen($data)),1);
		
		$x=($i*100/4)+rand(5,10);	//内容坐标，避免重叠
		$y=rand(5,10);
		
		imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);	//水平地画出一行字符串
	}
*/
	//add fontcontent a-z0-9 session
	for($i=0;$i<4;$i++){
		$fontsize=6;
		$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));	//为$image中的$fontcontent分配颜色
		
		$data='abcdefghijklmnopqrstuvwxyz1234567890';
		$fontcontent=substr($data,rand(0,strlen($data)),1);
		$captch_code.=$fontcontent;	
		
		$x=($i*100/4)+rand(5,10);	//内容坐标，避免重叠
		$y=rand(5,10);
		
		imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);	//水平地画出一行字符串
	}
	
	
	$_SESSION['authcode']=$captch_code;	//通过SESSION存储验证信息
	
	//add point
	for($i=0;$i<200;$i++){
		$pointcolor=imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));	//为$image中的干扰点分配颜色
		imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);	//画一个单一像素
	}
	
	//add line
	for($i=0;$i<3;$i++){
		$linecolor=imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));	//为$image中的干扰线分配颜色
		imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);	//画一条线段
	}
	
	//show or save
	header('content-type:image/png');
	imagepng($image);	//以PNG格式将图像输出到浏览器或文件
	
	
	//end
	imagedestroy($image);
?>