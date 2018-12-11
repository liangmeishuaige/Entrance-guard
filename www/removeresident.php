<?php//删除用户
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
$name = addslashes($_POST['residentname']);
$res1 = mysql_query("SELECT * FROM tables.resident_message WHERE name='$name'");
$res2 = mysql_query("SELECT * FROM tables.resident_message WHERE name='$name' and 'is valid'='0'");
if(mysql_num_rows($res1)>0){
	if(mysql_num_rows($res2)>0){
		"<script>alert('该用户已删除');history.go(-1);</script>"; 
	}
	else{
$sql = "UPDATE  tables.resident_messager SET 'is valid'='0' WHERE name='$name'";//使1变为0
$res = mysql_query($sql);  
if($res){
	echo "<script>alert('删除成功');history.go(-1);</script>"; 
	}
else{
	echo mysql_error();
}}
}
else{
	
		echo "<script>alert('该用户不存在');history.go(-1);</script>"; 

}
?>