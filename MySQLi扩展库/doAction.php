<?php
header('content-type:text/html;charset=utf-8');
//接收页面
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->connect_errno){
	die($mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$username=$_POST['username'];
$username=$mysqli->escape_string($username);
$password=md5($_POST['password']);
$age=$_POST['age'];
$act=$_GET['act'];
$id=$_GET['id'];
//根据不同操作完成不同功能
switch($act){
	case 'addUser':
		//echo '添加用户的操作';
		$sql="INSERT user(username,password,age) VALUES('{$username}','{$password}','{$age}')";
		$res=$mysqli->query($sql);
		if($res){
			$insert_id=$mysqli->insert_id;
			echo "<script type='text/javascript'>
					alert('添加成功，网站的第{$insert_id}位用户');
					location.href='userList_6.php';
					</script>";
			exit;
		}else{
			echo "<script type='text/javascript'>
			alert('添加失败,重新添加');
			location.href='addUser.php';
			</script>";
			exit;
		}
		break;
	case 'delUser':
		//echo '删除记录'.$id;
		$sql="DELETE FROM user WHERE id=".$id;
		$res=$mysqli->query($sql);
		if($res){
			$mes='删除成功';
		}else{
			$mes='删除失败';
		}
		$url='userList_6.php';
		echo "<script type='text/javascript'>
			alert('{$mes}');
			location.href='{$url}';
			</script>";
			exit;
		break;
	case 'editUser':
		$sql="UPDATE user SET username='{$username}',password='{$password}',age='{$age}' WHERE id=".$id;
		$res=$mysqli->query($sql);
		if($res){
			$mes='更新成功';
		}else{
			$mes='更新失败';
		}
		$url='userList_6.php';
		echo "<script type='text/javascript'>
		alert('{$mes}');
		location.href='{$url}';
		</script>";
		exit;
		
		break;
}
