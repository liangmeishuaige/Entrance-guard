
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
 
$name = addslashes($_POST['userNames']); 
$password = addslashes($_POST['passwords']); 
//$authcode = addslashes($_POST['authcode']); //验证码
$sql1 = "SELECT * FROM table.resident_message WHERE name='$name' and password='$password'"; 
$res = mysql_query($sql1); 
         
           if(mysql_num_rows($res)>0){ 
		     session_start();
	       $_SESSION['name']=$name ;
		   echo  "<script>alert('登录成功！');</script>"; 
		   include("second.html");//跳转
		   
		  
    }
		else{ 
		   
			
		   
     echo  "<script>alert('用户名和密码输入错误！登录失败！');history.go(-1);</script>"; 
		}   
    

?> 