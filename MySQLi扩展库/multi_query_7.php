<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->errno){
	die('Connect Error'.$mysqli->error);
}
$mysqli->set_charset('UTF8');
$sql="INSERT user(username,password,age) VALUES('imooc3','imooc3',32);";
$sql.="UPDATE1 user SET age=5 WHERE id=28;";
$sql.="DELETE FROM user WHERE id=25;";
//$mysqli->query($sql);
//针对多条SQL语句的查询
$res=$mysqli->multi_query($sql);
var_dump($res);