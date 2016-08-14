<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->connect_errno){
	die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$sql="SELECT id,username,age FROM user";
$mysqli_result=$mysqli->query($sql);
//var_dump($mysqli_result);
if($mysqli_result && $mysqli_result->num_rows>0){
	//echo $mysqli_result->num_rows;
	//$rows=$mysqli_result->fetch_all();//获取结果集中所有记录，默认返回的是二维的
	//索引+索引的形式
	//$rows=$mysqli_result->fetch_all(MYSQLI_NUM);
	//$rows=$mysqli_result->fetch_all(MYSQLI_ASSOC);
	//$rows=$mysqli_result->fetch_all(MYSQLI_BOTH);
// 	$row=$mysqli_result->fetch_row();//取得结果集中一条记录作为索引数组返回
// 	print_r($row);
// 	echo '<hr/>';
// 	$row=$mysqli_result->fetch_assoc();//取得结果集中的一条记录作为关联数组返回
// 	print_r($row);
// 	echo '<hr/>';
// 	$row=$mysqli_result->fetch_array();
// 	print_r($row);
	
// 	echo '<hr/>';
// 	$row=$mysqli_result->fetch_array(MYSQLI_ASSOC);
// 	print_r($row);
	
// 	echo '<hr/>';
// 	$row=$mysqli_result->fetch_object();
// 	print_r($row);
// 	echo '<hr/>';
// 	//移动结果集内部指针
// 	$mysqli_result->data_seek(0);
// 	$row=$mysqli_result->fetch_assoc();
// 	print_r($row);
	
// 	print_r($rows);

	while($row=$mysqli_result->fetch_assoc()){
		//print_r($row);
		//echo '<hr/>';
		$rows[]=$row;
	}
	print_r($rows);
	
	//释放结果集
	$mysqli_result->free();
	
	
}else{
	echo '查询错误或者结果集中没有记录';
}
$mysqli->close();


