<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->connect_errno){
	die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');

//执行SQL查询
//添加记录
//执行单条SQL语句,只能执行一条SQL语句
// $sql="INSERT user(username,password) VALUES('king','king');";
// $sql.="DROP TABLE user;";
$sql="INSERT user(username,password) VALUES('queen1','queen1'),('queen2','queen2'),('queen3','queen3'),('queen4','queen4')";
$res=$mysqli->query($sql);
if($res){
	//得到上一插入操作产生的AUTO_INCREMENT的值
	echo '恭喜您注册成功，您是网站第'.$mysqli->insert_id.'位用户<br/>';
	//得到上一步操作产生的受影响记录条数
	echo '有'.$mysqli->affected_rows.'记录被影响';
}else{
	//得到上一步操作产生的错误号和错误信息
	echo 'ERROR '.$mysqli->errno.':'.$mysqli->error;
}
echo '<hr/>';

//将表中年龄+10
$sql="UPDATE user SET age=age+10";
$res=$mysqli->query($sql);
if($res){
	echo $mysqli->affected_rows.'条记录被更新';
}else{
	echo "ERROR ".$mysqli->errno.':'.$mysqli->error;
}
echo '<hr/>';

//将表中id<=6的用户删除掉
$sql="DELETE FROM user WHERE id<=6";
$res=$mysqli->query($sql);
if($res){
	echo $mysqli->affected_rows.'条记录被删除';
}else{
	echo "ERROR ".$mysqli->errno.':'.$mysqli->error;
}
//关闭到MySQL的连接
$mysqli->close();
















