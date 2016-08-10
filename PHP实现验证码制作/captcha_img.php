<?php
	
	session_start();

	$table=array(
		'pic0'=>'hqn2',
		'pic1'=>'m5x5',
		'pic2'=>'v2s8',
		'pic3'=>'7ikx'
	);
	
	$index=rand(0,3);
	$value=$table['pic'.$index];
	$_SESSION['authcode']=$value;
	
	$filename=dirname(__FILE__).'\\pic'.$index.'.png';
	$contents=file_get_contents($filename);
	
	header('content-type:image/png');
	echo $contents;
?>