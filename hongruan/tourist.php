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

$name = addslashes($_POST['touristname']); //访客
$password = addslashes($_POST['password']); 
$confirmPassword = addslashes($_POST['confirmPassword']);
$wname = addslashes($_POST['resident']);//业主
$idcard = addslashes($_POST['idcard']); 

$sql="SELECT * FROM table.resident_message WHERE name='$wname'";
$resa=mysql_query($sql);


if(mysql_num_rows($resa)>0)
{
	if($password!=$confirmPassword)
	{
		 echo"<script>alert('输入的密码和确认密码不相等！');location.href='".$_SERVER["HTTP_REFERER"]."';</script>"; 
	}	
	else
	{
		if($name == "" || $password == ""||$idcard=="")
		{
			echo "<script>alert('请输入用户名 密码 身份证号！'); location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		}
		else
		{
		$time = date("Y-m-d H:i:s", time()+8*3600);  
		$sqla = "INSERT INTO table.tourist_message (touristname,password,idcard,timex,resident) VALUES('$name','$password','$idcard','$time','$wname')";
		$resultSeta = mysql_query($sqla);
		if($resultSeta){
		echo  "<script>alert('注册成功！！');history.go(-1);</script>";
		}
		}
	}
}
else
{
	 echo  "<script>alert('您访问的业主不在本小区！！');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}










?>