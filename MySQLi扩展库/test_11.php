<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->errno){
	die('Connect Error'.$mysqli->error);
}
$mysqli->set_charset('UTF8');
//先关闭自动提交功能
$mysqli->autocommit(FALSE);
$sql="UPDATE account SET money=money-200 WHERE username='king'";
$res=$mysqli->query($sql);
$res_affect=$mysqli->affected_rows;

$sql1='UPDATE1 account SET money=money+200 WHERE username="queen"';
$res1=$mysqli->query($sql1);
$res1_affect=$mysqli->affected_rows;
if($res &&$res_affect>0 && $res1 && $res1_affect>0){
	$mysqli->commit();
	echo '转账成功<br/>';
	$mysqli->autocommit(TRUE);
}else{
	$mysqli->rollback();
	echo '转账失败<br/>';
}
$mysqli->close();















