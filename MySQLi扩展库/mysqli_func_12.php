<?php
//1.连接
$link=mysqli_connect('localhost','root','root','test') or die('Connect Error:'.mysqli_connect_errno().":".mysqli_connect_error());

//2.设置编码方式
mysqli_set_charset($link,'UTF8');

//3.执行SQL查询
$sql="INSERT user(username,password,age) VALUES('imooc1','imooc1',22);";
$res=mysqli_query($link, $sql);
if($res){
	echo 'AUTO_INCREMENT:'.mysqli_insert_id($link);
	echo '<hr/>';
	echo 'AFFECTED ROWS:'.mysqli_affected_rows($link);
}else{
	echo 'ERROR:<br/>';
	echo mysqli_errno($link).':'.mysqli_error($link);
}
echo '<hr/>';
$sql="UPDATE user SET age=age+10 WHERE id=41;";
$sql.="DELETE FROM user WHERE id=40";
$res=mysqli_multi_query($link, $sql);
var_dump($res);
echo '<hr/>';
//关闭连接
mysqli_close($link);















