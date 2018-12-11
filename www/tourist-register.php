<?php
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


if(empty($_POST)){ 
     exit("您提交的表单数据超过post_max_size的配置！<br/>"); 
}

$name = addslashes($_POST['touristname']); 
$password = addslashes($_POST['password']); 
$confirmPasswords=addslashes($_POST['confirmPassword']);
$idcard=addslashes($_POST['idcard']);

$key=addslashes($_POST['key']);
$base64_1="";

$wSQL = "SELECT * FROM key1 WHERE  'key1'='$key' and kind='0' and 'isvalid'='1'";//0为业主生成key

$reawSQL=mysql_query($wSQL);
if($reawSQL){
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
		$sql = "INSERT INTO table.tourist_message (touristname,password,adress,idcard,timex) VALUES('$name','$password','$adress','$idcard','$time')";
		
require_once 'AipFace.php';

	// 你的 APPID AK SK
	
	  $APP_ID ='14511390';
	  $API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	$SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace($APP_ID, $API_KEY, $SECRET_KEY);	
	
	
			mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
// 接收文件
//var_dump($_FILES); // 区别于$_POST、$_GET
//print_r($_FILES);
//var_dump($_FILES);
 $file=$_FILES['img']; 
// 先判断有没有错
//var_dump($file);
if ($file["error"] == 0) {
 // 成功 
 // 判断传输的文件是否是图片，类型是否合适
 // 获取传输的文件类型
 	$typeArr = explode("/", $file["type"]);
 	if($typeArr[0]== "image"){
  	// 如果是图片类型
  	$imgType = array("png","jpg","jpeg");
  	if(in_array($typeArr[1], $imgType)){ // 图片格式是数组中的一个
   		// 类型检查无误，保存到文件夹内
   		// 给图片定一个新名字 (使用时间戳，防止重复)
   		
   		/**
   			*
   			*这一段是图片的保存
   			*后端自己修改连接数据库和保存位置
   			*/
   		//$fname = rand(10000,99999);//随机文件名
   		$fname = date("H-i-s-A",time());//时间做文件名
			$ext = strrchr($file['name'],'.');//截取文件的扩展名
			$path = './'.date('Y/m/d');//文件存储的路径
			//如果目录不存在，就创建目录
			if(!is_dir($path)){
			    mkdir($path,0777,true);
			}
   		$saveFile = $path.'/'.$fname.$ext;//保存的文件名
   		// 将上传的文件写入到文件夹中
   		// 参数1: 图片在服务器缓存的地址
   		// 参数2: 图片的目的地址（最终保存的位置）
   		// 最终会有一个布尔返回值
   		//echo move_uploaded_file($file["tmp_name"],$saveFile)?"ok":"fail";
   		move_uploaded_file($file["tmp_name"],$saveFile);
   		
			if($fp = fopen($saveFile,"rb", 0)) 
			{ 
			    $gambar = fread($fp,filesize($saveFile)); 
			    fclose($fp); 

			     
			    $base64_1 = base64_encode($gambar); 
				//var_dump($base64_1);
//			    echo $base64_1;
			    // 输出
//			    $encode = '<img src="data:image/jpg/png/gif;base64,' . $base64_1 .'" >'; 
//			    echo $encode; 
			}
  	};
 	} else {
  	// 不是图片类型
  	echo "没有图片，再检查一下吧！";
 	};
} else {
 	// 失败
 	echo $file["error"];
};

	
	
	
	
	
	$image = $base64_1;

	$imageType = "BASE64";//图片类型

	$groupId = "001";//组ID

	$userId =$password;//用户ID
	
	
	
	//var_dump($_POST);
	
	//echo $userId;
	
	
	// 调用人脸注册
	$result = $client->addUser($image, $imageType, $groupId, $userId);
	
	$error_code = $result["error_code"];

	//var_dump($result);
		
		
		
		$resultSeta = mysql_query($sql);
		
		if($resultSeta){
			//echo "check1gfdsgdsfgfdsgdfgdfgdfgfd";
		echo  "<script>alert('注册成功！！');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		}
		}
	}
}	
else{
	 echo  "<script>alert('您不是本小区居民！！');history(-1);</script>";
}

}else{
	
	echo  "<script>alert('key wrong！');history(-1);</script>";
}


?>