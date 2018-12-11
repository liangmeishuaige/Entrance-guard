<html>
<head>
	<meta charset="utf-8">
</head>
<link rel="stylesheet" href="css/1.css">
<body>


<div class="event" id="login_box6" style="display: none;">
		<div class="login" style="height:350px" >
			<div class="title"  >
				<span class="t_txt">给选定用户布置任务</span>
				<span class="del" onClick="deleteLogin6()">X</span>
			</div>
			<form action="double.php" method="post">
				<input type="text" readonly="true" name="userName" id="userName"  />
				<input type="text" name="task1name" id="" value=""placeholder="请输入任务名" />
				<input type="submit"value="布置" class="btn5" /></form>	<br>
				<div class="text-center">			
				</div>
				</div>
				</div>
			
		</div>

<div class="bg_color" onClick="deleteLogin()" id="bg_filter" style="display: none;">
</div>
</div>
<p style="font-size:25px">全体业主如下</p>
<form action="allresident.php" method="post">
				
				<input type="submit"value="返回" class="btn5" /></form>	<br>
<hr>

<p style="position:absolute;left:200px">
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
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

$i=0;
$result = mysql_query("SELECT * FROM table.resident_message");
$table = '<table border="0" width=200px>';

echo "已经注册的用户有：";
echo "<br>";

while($row=mysql_fetch_array($result)){
$i=$i+1;
 echo "<input type='checkbox'  value='$row[name]'  name='key'  method='post'>";
echo $row['name'];
echo  "<br>";
}


echo "共 $i 位";
echo "<br>";
echo "<input type='button'    value='删除'  onclick='showBox6()' />";



?>
<script>
function deleteLogin6(){
	var del=document.getElementById("login_box6");
	var bg_filter=document.getElementById("bg_filter");
	bg_filter.style.display="none";
	del.style.display="none";
};
function showBox6(){
    obj = document.getElementsByName("key");
    check_val = [];
    for(k in obj)
{
        if(obj[k].checked)
            check_val.push(obj[k].value);
    }   
var show=document.getElementById("login_box6");
	var bg_filter=document.getElementById("bg_filter");
	show.style.display="block";
	bg_filter.style.display="block";
document.getElementById('userName').value=check_val+",";

};
</script>




</body>
</html>