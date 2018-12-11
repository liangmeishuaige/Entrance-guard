<!DOCTYPE html><html><head>
   <title>虹软小区</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  
  
  <div style="background-color:#F9FCFA">
<h5 style="font-size: 25px; color: rgba(10,10,10,1.00);padding-left: 30px;">注册业主如下</h5>
<form action="all.php" method="post"></form>
	</div>
<div style="background-color: #D5DCD7;padding-left:820px;">
<table   style="width=600px;text-align:left;"><tr>
	<td style="width:70px"><img src="images/全选.png" width="13" height="10" onclick="showBox()" alt=""/>&nbsp;选择</td>
	<td style="width:70px"><img src="images/添加.png"  width="13" height="10" alt=""/>&nbsp;添加</td>
	<td style="width:70px"><img src="images/修改.png" width="13" height="10" alt=""/>&nbsp;修改</td>
	<td style="width:70px"><img src="images/删除.png" width="13" height="10" alt=""/>&nbsp;删除</td>
	<td style="width:70px"><img src="images/保存.png" width="13" height="10" alt=""/>&nbsp;保存</td></tr>
</table>
</div>
<div style="padding-top: 10px;padding-bottom: 10px;background-color:#DDE8DF;">
<table   style="width=600px;text-align:center; "><tr><td style="width: 180px;">用户名</td>
	<td style="width:180px">密码</td>
	<td style="width:120px">住址</td>
	<td style="width:140px">身份证号</td>
	<td style="width:140px">注册时间</td>
  
</table>
</div>

<div style="background-color: #FCFDFC">
 <?php
error_reporting(E_ERROR | E_PARSE);
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

$table = '<table border="0" width=500px style="text-align:center;">'; //定义table的style

$perNumber=10; //每页显示的记录数
$page=$_GET["page"]; //获得当前的页面值
$count=mysql_query("select count(*) from table.resident_message"); //获得记录总数
$rs=mysql_fetch_array($count);
$totalNumber=$rs[0];
$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
if (!isset($page)) {
$page=1;
} //如果没有值,则赋值1
$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录
$result=mysql_query("select * from table.resident_message limit $startCount,$perNumber"); //根据前面的计算出开始的记录和记录数 

while ($row=mysql_fetch_array($result)) {    //while循环输出数据库内容
   $table .= ' <table  class="table table-hover">
   <tr>
<td><form action="removeresident.php" method="post"  name="abc">
<td><input type="text" readonly="true" name="residentname"style="border:0px" value="'.$row["name"].'" /></td>
<td><input type="text" readonly="true"name="password"  value="'.$row["password"].'" /></td>
<td><input type="text" readonly="true"name="adress"  value="'.$row["adress"].'" /></td>
<td><input type="text" readonly="true"name="idcard"  value="'.$row["idcard"].'" /></td>
<td><input type="text" readonly="true"name="timex"  value="'.$row["timex"].'" /></td>

<td><input type="submit"  value="删除"  /></td>    

</form>
	</td>

  <tr> 
  </table>';
}
//分页显示内容的代码
$table .= '</table>';
echo ($table);
if ($page != 1) { //页数不等于1
?>
<a href="allresident.php?page=<?php echo $page - 1;?>">上一页</a> <!--显示上一页-->
<?php
}
for ($i=1;$i<=$totalPage;$i++) { //循环显示出页面
?>
<a href="allresident.php?page=<?php echo $i;?>"><?php echo $i ;?></a>
<?php
}
if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
?>
<a href="allresident.php?page=<?php echo $page + 1;?>">下一页</a>
<?php
}
echo  "当前在第 $page 页";
?>
</div>
<iframe name="formsubmit" style="display:none;top:300px">    
</iframe>

 

 <div class="event" id="login_box" style="display: none;" target="formsubmit">
		<div class="login" style="height:300px">
			<div class="title">
				<span class="t_txt">您将选择修改记录<br></span>
				<span class="del" onClick="deleteLogin()">X</span>
			</div>
	
			<form action="choice.php" method="post">
			<input type="text"readonly="true" style="border:0px" value="警告：这可能会导致信息缺失！！">
				<input type="submit"value="确认继续" class="btn5" /></form>	<br>
				<div class="text-center">
				</div>
				</div>
				</div>
<div class="bg_color" onClick="deleteLogin()" id="bg_filter" style="display: none;">
</div>
<script>
function showBox(){
	var show=document.getElementById("login_box");
	var bg_filter=document.getElementById("bg_filter");
	show.style.display="block";
	bg_filter.style.display="block";
};

function deleteLogin(){
	var del=document.getElementById("login_box");
	var bg_filter=document.getElementById("bg_filter");
	bg_filter.style.display="none";
	del.style.display="none";
};
</script>
</body>
</html>