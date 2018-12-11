<?php

	//Disable error reporting
	error_reporting(0);
	
	header('Content-Type:text/html;charset=GB2312');

	include 'AipFace.php';
	//锟斤拷锟斤拷锟斤拷锟捷匡拷锟斤拷锟斤拷
	//include 'lianjie.php';
	require_once 'AipFace.php';

	// 锟斤拷锟?APPID AK SK
	const APP_ID = '15018574';
	const API_KEY = 'WPQL1gkWQqxrZRvGrZ9jIiRC';
	const SECRET_KEY = 'vp3FRvataSK1Q6agWsASopvqVDv1PYjw';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
	//var_dump($_POST);

	//$groupId = "001";//锟斤拷ID
	
	$image = $_POST["base64_data"];
	
	//var_dump($image);	
	/*$encode = '<img src="data:image/jpg/png/gif;base64,' . $image .'" >'; 
			    echo $encode; */

	$imageType = "BASE64";

	$groupIdList = "resident,tourist";
	
	/*$userId = $_POST["user_id"];//锟矫伙拷ID
	
	$options = array();
	$options["quality_control"] = "NORMAL";
	$options["liveness_control"] = "LOW";
	$options["user_id"] = "$userId";//锟矫伙拷ID
	$options["max_user_num"] = 1;*/

	// 锟斤拷锟斤拷锟斤拷锟斤拷锟斤拷锟斤拷
	

	$result = $client->search($image, $imageType, $groupIdList);
	
	$result2 = $result["result"]["user_list"]["0"];
	
	$group_id = $result2["group_id"];
	$user_id = $result2["user_id"];
	$score = $result2["score"];
	
	$facetoken = $result["result"]["face_token"];
	
	//var_dump($result);
	//var_dump($result2);
	
	//echo "\r\n";
	
	//启动回话，保存前一次拍照时的userID用来和当前拍照时获取的userID进行比对
	//目的：
	//防止验证时同一个人的照片多次保存造成物理空间的浪费
	if (!session_id()) session_start();
	$lastuserid=$_SESSION["userid"];
	$_SESSION["userid"]=$user_id;//用回话保存前一次拍照的的userID值
	
	//用currentuserId保存当前拍照的userId值
	if($score>=80){
		$currentuserId=$user_id;
		echo "欢迎! ".$group_id." : ".$user_id;
		
		//现在是Henry修改的
		//功能：
		//记录此时验证成功拍下的照片，以时间戳为文件名，传入数据库
		//echo $_SESSION['userId'];
		//echo $currentuserId;
		if($lastuserid==$currentuserId)//如果判断为同一个人重复拍照，则不保存图片信息
		{	
			// do nothing
			//echo "<br>";
			//echo "lastuserid:".$lastuserid;
			//echo "<br>";
			//echo "currentuserId:".$currentuserId;
			
			
		}
		else
		{
		$_SESSION["userid"]=$currentuserId;
		$data=base64_decode($image);
		$fname=date("H-i-s-A",time()+8*3600).'_'.$userId.'.jpg';
		$path='./'.'register'.'/'.date('Y/m/d');
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
		}
		$saveFile=$path.'/'.$fname;//保存的文件名
		$saveimg=file_put_contents($saveFile,$data);
		
		
		// 锟斤拷锟斤拷锟斤拷锟斤拷锟斤拷锟斤拷
		$result3 = $client->updateUser($image, $imageType, $group_id, $user_id);
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
			$time = date("Y-m-d H:i:s", time()+8*3600);
	$SQL3 = "INSERT INTO table.log (id,name,time,image) VALUES('$user_id','$group_id','$time','$saveFile')";
               $res3 = mysql_query($SQL3);
			echo "fdsfdsfsdfsd";
		
		}
		//var_dump($result3);
	}else if($score>0&&$score<80){	
		echo "陌生人";
		
		echo $_SESSION['userId'];
		echo $currentuserId;
		//现在是Henry修改的
		//功能：
		//记录此时验证失败拍下的照片，以时间戳为文件名，传入数据库
		
		$data=base64_decode($image);
		$fname=date("H-i-s-A",time()+8*3600).'_'.$userId.'.jpg';
		$path='./'.'non-register'.'/'.date('Y/m/d');
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
		}
		$saveFile=$path.'/'.$fname;//保存的文件名
		$saveimg=file_put_contents($saveFile,$data);
		

	}
	else 
		echo "欢迎来到__小区";
	//不能关闭回话
	//这将导致每一次调用php文件时，lastuserid会被重置更新
	//session_destroy();

?>