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
if(empty($_POST)){ 
     exit("您提交的表单数据超过post_max_size的配置！<br/>"); 
} 

session_start();
$password = $_POST['password']; 
$confirmPassword = $_POST['confirmPassword'];
$idcard = $_POST['idcard']; 
$name = $_POST['touristname']; //访客
$wname = $_POST['resident'];//业主

$SQL = "SELECT * FROM table.resident_message WHERE  'name'='$wname'"; 
$res1 = mysql_query($SQL);
if(mysql_num_rows($res1)>0){ 
if($password!=$confirmPassword){ 
	 echo"<script>alert('输入的密码和确认密码不相等！');history.go(-1);</script>"; 
}else{ 
if($name == "" || $password == "")
		{
			echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
		}
else{
$NameSQL = "SELECT * FROM table.tourist_message WHERE name='$name'"; 
$result = mysql_query($NameSQL); 
$userNameSQL = "SELECT * FROM table.touris_tmessage WHERE name='$name'"; 
$resultSet = mysql_query($userNameSQL); 
if(mysql_num_rows($resultSet)>0&&mysql_num_rows($result)>0){
     echo"<script>alert('用户名已经被占用，请更换其他用户名！');history.go(-1);</script>"; 
	
}else{
$time = date("Y-m-d H:i:s", time()+8*3600);   
$sql = "INSERT INTO table.tourist_message (touristname,password,timex,idcard,resident) VALUES('$name','$password','$time','$idcard','$wname')";
$res = mysql_query($sql);
					if($res){
						 echo  "<script>alert('用户信息注册成功！')history.go(-1);</script>"; 
						 
					}else{ 
                    echo  "<script>alert('用户信息注册失败！')</script>"; 
}}}}}
else{
	echo  "<script>alert('您暂无权限')history.go(-1);</script>";
}

 ?>