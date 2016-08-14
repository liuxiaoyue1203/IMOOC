<?php
header('content-type:text/html;charset=utf-8');
//1.建立到MySQL数据的连接
// $mysqli=new mysqli('localhost','root','root');
// //print_r($mysqli);
// //2.打开指定的数据库
// $mysqli->select_db('test');
// $mysqli=new mysqli();
// $mysqli->connect('127.0.0.1','root','root');
// print_r($mysqli);

//建立连接的同时打开指定数据库
$mysqli=@new mysqli('localhost','root','root','test');
//print_r($mysqli);
//$mysqli->connect_errno:得到连接产生的错误编号
//$mysqli->connect_error:得到连接产生的错误信息
if($mysqli->connect_errno){
	die('Connect Error:'.$mysqli->connect_error);
}
print_r($mysqli);
echo '<hr color="red"/>';
echo '客户端的信息：'.$mysqli->client_info.'<br/>';
echo $mysqli->get_client_info().'<br/>';
echo '客户端的版本：'.$mysqli->client_version.'<br/>';
echo '<hr/>';
echo '服务器端信息：'.$mysqli->server_info.'<br/>';
echo $mysqli->get_server_info();
echo '<hr/>';
echo '服务器版本：'.$mysqli->server_version.'<br/>';

echo '<hr/>';


















