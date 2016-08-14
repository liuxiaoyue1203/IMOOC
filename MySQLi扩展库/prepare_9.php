<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->errno){
	die('Connect Error'.$mysqli->error);
}
$mysqli->set_charset('UTF8');
$sql="INSERT user(username,password,age) VALUES(?,?,?)";
//准备预处理语句
$mysqli_stmt=$mysqli->prepare($sql);
//print_r($mysqli_stmt);
//s,i,d
$username='king';
$password=md5('king');
$age=12;
//绑定参数
$mysqli_stmt->bind_param('ssi',$username,$password,$age);

//执行预处理语句
if($mysqli_stmt->execute()){
	echo $mysqli_stmt->insert_id;
	echo '<br/>';
}else{
	$mysqli_stmt->error;
}

$username='king1';
$password=md5('king1');
$age=22;
//绑定参数
$mysqli_stmt->bind_param('ssi',$username,$password,$age);

//执行预处理语句
if($mysqli_stmt->execute()){
	echo $mysqli_stmt->insert_id;
	echo '<br/>';
}else{
	$mysqli_stmt->error;
}

$username='king2';
$password=md5('king2');
$age=32;
//绑定参数
$mysqli_stmt->bind_param('ssi',$username,$password,$age);

//执行预处理语句
if($mysqli_stmt->execute()){
	echo $mysqli_stmt->insert_id;
	echo '<br/>';
}else{
	$mysqli_stmt->error;
}














