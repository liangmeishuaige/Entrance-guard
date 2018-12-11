<!doctype html>

<html lang="en">
<head>
<style>
body{
	background-color: #A1B8B6;
}

#name{
	text-align: center;
}
</style>

</head>
<body>
<br><br>
<div style="background-color:#FDFCFA;width: 94%;margin-left: 3% " id="name">
<br><br>
<p style="text-align: center; font-size: 25px">&nbsp;&nbsp;确认信息</p>
<br>
<?php

error_reporting(0);
$user_id= addslashes($_POST['touristname']); 
$idcard= addslashes($_POST['idcard']); 
$passwords=addslashes($_POST['password']);
$confirmPassword=addslashes($_POST['confirmPassword']);
$resident=addslashes($_POST['resident']);
$key=addslashes($_POST['key']);

$servername = "localhost";
$username = "root";
$password = "root";
$conn = mysql_connect($servername, $username, $password);
mysql_query("SET NAMES 'utf8'");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$time = date("Y-m-d H:i:s", time()+8*3600);

if (!session_id()) session_start();
$_SESSION["user_id"]=$user_id;
$_SESSION["idcard"]=$idcard;
$_SESSION["passwords"]=$passwords;
$_SESSION["resident"]=$resident;


$wSQL = "SELECT * FROM table.key1 WHERE  key1='$key' and kind=0 and isvalid=1";//0为业主生成key
$res1 = mysql_query($wSQL);
if(mysql_num_rows($res1)>0){
	$sql3 = "UPDATE table.key1 SET isvalid=0 WHERE key1='$key'";//改变key的存在
      $res3 = mysql_query($sql3);

	if($passwords!=$confirmPassword){ 
		echo"<script>alert('输入的密码和确认密码不相等！');history.go(-1);</script>"; 
	}else{
		$SQL = "SELECT * FROM table.resident_message WHERE  name='$resident'";
		$RES=mysql_query($SQL);
		if(mysql_num_rows($RES)<=0)
		{
			echo "<script>alert('访客不在本小区！');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			}else{
			$table .= '<tr>
			<td><form action="removeresident.php" method="post"  name="abc">

			<td>访客姓名：<input type="text" readonly="true" id="user_id" value="'.$user_id.'" /></td>
			<br><br>
			<td>身份证号：<input type="text" readonly="true" id="idcard" value="'.$idcard.'" /></td>
			<br><br>
			<td>您的密码：<input type="text" readonly="true" id="passwords" value="'.$passwords.'"/></td>
			<br><br>
			<td>访问业主：<input type="text" readonly="true" id="resident"value="'.$resident.'" /></td>  
			</form>
			</td>
			<tr>';

//分页显示内容的代码
			$table .= '</table>';
			echo ($table);
			}
}}
else
{
	echo "<script>alert('key值错误！');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}
?>
<br><br>

  <p style="text-align-last:center">确认后将开始录入人脸，请放松保持微笑</p>
<br>
</div>
<br>
<div  style="text-align:center">
 <input type="button" value="确认" onclick="show()" />
</div>
 <br><br><br><br>
 <script>



	function show(){        
    var result = document.getElementById("user_id").value;        
    location.href="authentication/demos/tourist_register?"+result;      //利用url参数传递！！！
	}

</script>

</body>
</html>