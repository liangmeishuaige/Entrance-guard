<!doctype html>

<html>
<head>
<style>
body{
	background-color: #A1B8B6;
//body的颜色
	
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
$user_id= addslashes($_POST['user_id']); 
$idcard= addslashes($_POST['idcard']); 
$passwords=addslashes($_POST['passwords']);
$confirmPassword=addslashes($_POST['confirmPasswords']);
$adress=addslashes($_POST['adress']);

if (!session_id()) session_start();
$_SESSION["user_id"]=$user_id;
$_SESSION["idcard"]=$idcard;
$_SESSION["passwords"]=$passwords;
$_SESSION["adress"]=$adress;

if($passwords=="")
{
	echo"<script>alert('密码不能为空！');history.go(-1);</script>"; 
}else{
	if($passwords!=$confirmPassword){ 
		echo"<script>alert('输入的密码和确认密码不相等！');history.go(-1);</script>"; 
	}	else{
   $table .= '<tr>
<td><form action="removeresident.php" method="post"  name="name">

<td>您的姓名：<input type="text" readonly="true" id="user_id" value="'.$user_id.'" /></td>
<br><br>
<td>身份证号：<input type="text" readonly="true" id="idcard" value="'.$idcard.'" /></td>
<br><br>
<td>您的密码：<input type="text" readonly="true" id="passwords" value="'.$passwords.'"/></td>
<br><br>
<td>您的住址：<input type="text" readonly="true" id="adress"value="'.$adress.'" /></td>  
</form>
	</td>

  <tr>';

$table .= '</table>';
echo ($table);
}
}
?>

<br><br>

  <p style="text-align-last:center">确认后将开始录入人脸，请放松保持微笑</p>
<br>



 <input type="button" value="确认" onClick="show()  "/>
<br><br><br><br>

 <script>



	function show(){        
    var result = document.getElementById("user_id").value;        
    location.href="authentication/demos/resident_register?"+result;      //利用url参数传递！！！
	}

</script>

</body>
</html>