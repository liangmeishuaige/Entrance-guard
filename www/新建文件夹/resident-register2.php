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


$password = $_POST['passwords']; //第一次输入密码
$confirmPassword = $_POST['confirmPasswords']; //第二次
$adress = $_POST['adress'];  //地址
$idcard = $_POST['idcard']; //身份证
$name = $_POST['userNames']; //姓名
$wSQL = "SELECT * FROM table.key1 WHERE  keyes='$name'"; //判断key值
$res1 = mysql_query($wSQL);
if($res1){
if($password!=$confirmPassword){ 
	 echo"<script>alert('输入的密码和确认密码不相等！');history.go(-1);</script>"; 
}else{
  
if($name == "" || $password == "")
		{
			echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
		}
else{
$NameSQL = "SELECT * FROM table.resident_message WHERE name='$name'"; 
$result = mysql_query($NameSQL); 
$userNameSQL = "SELECT * FROM table.resident_message WHERE name='$name'"; 
$resultSet = mysql_query($userNameSQL); 
if(mysql_num_rows($resultSet)>0&&mysql_num_rows($result)>0){
     echo"<script>alert('用户名已经被占用，请更换其他用户名！');history.go(-1);</script>"; 
	 closeConnection();
}else{
$time = date("Y-m-d H:i:s", time()+8*3600);   //时间
$sql = "INSERT INTO table.resident_message (name,password,adress,idcard,Date of regist ration) VALUES('$name','$password','$adress','$idcard','$time')";
$res = mysql_query($sql);
					if($res){
						 echo  "<script>alert('用户信息注册成功！');history.go(-1);</script>"; 
						 
					}else{ 
                    echo  "<script>alert('用户信息注册失败qqqqqqqqqqqqqqqqq！')</script>"; 
}}}}}
else{
	echo  "<script>alert('您暂无权限注册')history.go(-1);</script>";
}

 ?>