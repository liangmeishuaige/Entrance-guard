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

$name = addslashes($_POST['userNames']); 
$password = addslashes($_POST['passwords']); 
$confirmPasswords=addslashes($_POST['confirmPasswords']);
$idcard=addslashes($_POST['idcard']);
$adress=addslashes($_POST['adress']);

$sqla="SELECT * FROM table.key1 WHERE keyes='$name'";
$reseta=mysql_query($sqla);
if($reseta)
{
	if($password!=$confirmPasswords)
	{
		 echo"<script>alert('输入的密码和确认密码不相等！');history.go(-1);</script>"; 
	}	
	else
	{
		if($name == "" || $password == "")
		{
			echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
		}
		else
		{
		$time = date("Y-m-d H:i:s", time()+8*3600);  
		$sql = "INSERT INTO table.resident_message (name,password,adress,idcard,timex) VALUES('$name','$password','$adress','$idcard','$time')";
		$resultSeta = mysql_query($sql);
		if($resultSeta){
		echo  "<script>alert('注册成功！！');history.go(-1);</script>";
		}
		}
	}
}		
else{
	 echo  "<script>alert('您不是本小区居民！！');</script>";
}




?>