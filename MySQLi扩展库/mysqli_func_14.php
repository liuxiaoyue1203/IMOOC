<?php
header('content-type:text/html;charset=utf-8');
//1.连接
$link=mysqli_connect('localhost','root','root','test') or die('Connect Error:'.mysqli_connect_errno().":".mysqli_connect_error());

//2.设置编码方式
mysqli_set_charset($link,'UTF8');

//执行SQL查询
$sql="SELECT id,username,password,age FROM user";
$result=mysqli_query($link,$sql);
//echo mysqli_num_rows($result);
if($result && mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
		//print_r($row);
		$rows[]=$row;
	}
}
//print_r($rows);
//释放结果集
mysqli_free_result($result);
mysqli_close($link);



