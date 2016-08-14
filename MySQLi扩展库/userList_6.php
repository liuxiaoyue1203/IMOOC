<?php
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->connect_errno){
	die('CONNECT ERROR:'.$mysqli->connect_error);
}
$sql="SELECT id,username,age FROM user";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result && $mysqli_result->num_rows>0){
	while($row=$mysqli_result->fetch_assoc()){
		$rows[]=$row;
	}
}
//print_r($rows);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Document</title>
</head>
<body>
<h2>用户列表-<a href='addUser.php'>添加用户</a></h2>
	<table border='1' cellpadding='0' cellspacing='0' width='80%' bgcolor='#ABCDEF'>
		<tr>
			<td>编号</td>
			<td>用户名</td>
			<td>年龄</td>
			<td>操作</td>
		</tr>
		
		<?php $i=1; foreach($rows as $row):?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['age'];?></td>
			<td><a href="editUser.php?id=<?php echo $row['id'];?>">更新</a>|<a href="doAction.php?act=delUser&id=<?php echo $row['id'];?>">删除</a></td>
		</tr>
		<?php $i++;endforeach;?>
		
	</table>
	
	
</body>
</html>