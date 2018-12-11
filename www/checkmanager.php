<?php
 
error_reporting(E_ALL ^ E_DEPRECATED);

//收集表单提交数据 
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 

// 创建连接 
$conn = mysql_connect($servername, $username, $password); 
mysql_query("SET NAMES 'utf8'");

// 检测连接 
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
}
if(empty($_POST)){ 
     exit("您提交的表单数据超过post_max_size的配置！<br/>"); 
}

$name = addslashes($_POST['managername']); 
$password = addslashes($_POST['managerpassword']); 

$sql="SELECT * FROM table.manager_message WHERE managername='$name' and managerpassword='$password'";
$resa=mysql_query($sql);
  if(mysql_num_rows($resa)>0){ 
	echo "<script>alert('管理员登录成功！'); </script>";
	 include("manager.html");
  }else{
echo "<script>alert('请输入正确的管理员账号密码');history.go(-1); </script>";
  }
?>