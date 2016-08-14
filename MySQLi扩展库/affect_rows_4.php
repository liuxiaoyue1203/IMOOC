<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->connect_errno){
	die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//$sql="INSERT user(username,password1) VALUES('A','A')";
$sql='DELETE FROM user WHERE id=1';
$mysqli->query($sql);
echo $mysqli->affected_rows;
/*
 affected_rows值为3种：
 1.受影响的记录条数
 2.-1,代表SQL语句有问题
 3.0，代表没有受影响记录的条数
 */
$mysqli->close();
