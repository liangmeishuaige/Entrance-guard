<?php

	//Disable error reporting
	error_reporting(0);

	include 'AipFace.php';
	//锟斤拷锟斤拷锟斤拷锟捷匡拷锟斤拷锟斤拷
	//include 'lianjie.php';
	require_once 'AipFace.php';

	// 锟斤拷锟?APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
	//var_dump($_POST);

	//$groupId = "001";//锟斤拷ID
	
	$image = $_POST["base64_data"];
	
	//var_dump($image);	
	/*$encode = '<img src="data:image/jpg/png/gif;base64,' . $image .'" >'; 
			    echo $encode; */

	$imageType = "BASE64";

	$groupIdList = "resident,tourist,stranger";
	
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
	
	if($score>=80){

		echo "Welcome! ".$group_id." : ".$user_id;
		
		//现在是Henry修改的
		//功能：
		//记录此时验证成功拍下的照片，以时间戳为文件名，传入数据库
		sleep(6);//延时执行保存3秒
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
		

		//var_dump($result3);
	}else if($score>0&&$score<80){	
		echo "stranger";
		//现在是Henry修改的
		//功能：
		//记录此时验证失败拍下的照片，以时间戳为文件名，传入数据库
		sleep(6);//延时执行保存3秒
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
		echo "no one in the camera";

?>