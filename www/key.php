<?php
//点击生成key
//include_once("lianjie.php");
error_reporting(E_ALL ^ E_DEPRECATED);

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

include 'AipFace.php';

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

$num = str_pad(mt_rand(0, 999999), 6, "0", STR_PAD_BOTH);//生成六位数
$sql = "INSERT INTO table.key1 (key1,isvalid,kind) VALUES('$num','1','0')";//0代表用户生成的key
$res = mysql_query($sql);
if($res){
	echo "<script>alert('成功获得key为$num');</script>"; 
	  include("second.html");
}
else{
echo mysql_error();}

?>