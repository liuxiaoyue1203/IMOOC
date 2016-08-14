<?php 
$mysqli=new mysqli('localhost','root','root','test');
if($mysqli->connect_errno){
	die($mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$id=$_GET['id'];
$sql="SELECT id,username,password,age FROM user WHERE id=".$id;
$mysqli_result=$mysqli->query($sql);
if($mysqli_result && $mysqli_result>0){
	$row=$mysqli_result->fetch_assoc();
}
//print_r($row);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Document</title>
</head>
<body>
	<h2>编辑用户</h2>
	<form action="doAction.php?act=editUser&id=<?php echo $id;?>" method='post'>
		<table border='1' cellpadding='0' cellspacing='0' bgcolor='#ABCDEF' width='80%'>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" id="" value="<?php echo $row['username'];?>" required='required'/></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="password" id=""  placeholder='请输入密码' required='required'/></td>
			</tr>
			<tr>
				<td>年龄</td>
				<td><input type="number" name="age" id="" min='1' max='125' value="<?php echo $row['age'];?>" required='required'/></td>
			</tr>
			<tr>
				<td colspan='2'><input type="submit" value="编辑用户" /></td>
			</tr>
		</table>
	</form>
	
	
	
</body>
</html>