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
		//现在是Henry改写的
		//功能：
		//		记录此时验证成功拍下的照片，以时间戳为文件名，传入数据库
		//
		$data= base64_decode($image);//对截取后的字符使用base64_decode进行解码
		$fname = date("H-i-s-A",time()).'_'.$userId.'.jpg';//时间做文件名 具体时间_userid.png
		$path = './'.'register'.'/'.date('Y/m/d');//验证文件存储的路径
		//如果目录不存在，就创建目录
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
		}
		$saveFile = $path.'/'.$fname;//保存的文件名	
		// file_put_contents函数的第一个参数必须保证存在该目录
		//我已经创建好的目录 register/year/month/day,因此第一个参数中最多只能再有一个/符号，一开始我的第一个参数是$path.'/'.$fname.'/'.$userId.'.png'这样子是不行的找不到目录的！
		$saveimg=file_put_contents($saveFile,$data);

		
		// 调用人脸更新
		$result3 = $client->updateUser($image, $imageType, $group_id, $user_id);
		

		//var_dump($result3);
	}else{
		echo "stranger";
		//现在是Henry改写的
		//功能：
		//		记录此时验证成功拍下的照片，以时间戳为文件名，传入数据库
		//
		$data= base64_decode($image);//对截取后的字符使用base64_decode进行解码
		
		$fname = date("H-i-s-A",time()).'_'.$userId.'.jpg';//时间做文件名 具体时间_userid.png
		//$ext = strrchr($file['name'],'.');//截取文件的扩展名
		$path = './'.'none_register'.'/'.date('Y/m/d');//验证文件存储的路径
		//如果目录不存在，就创建目录
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
		}
		$saveFile = $path.'/'.$fname;//保存的文件名	
		echo $saveFile;
		// file_put_contents函数的第一个参数必须保证存在该目录
		//我已经创建好的目录 register/year/month/day,因此第一个参数中最多只能再有一个/符号，一开始我的第一个参数是$path.'/'.$fname.'/'.$userId.'.png'这样子是不行的找不到目录的！
		$saveimg=file_put_contents($saveFile,$data);

	}

?>