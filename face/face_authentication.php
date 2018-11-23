<?php

	include 'AipFace.php';
	//连接数据库代码块
	include 'lianjie.php';
	require_once 'AipFace.php';

	// 你的 APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
	var_dump($_POST);

	$groupId = "001";//组ID
	
	$image = $_POST["base64_data"];

	$imageType = "BASE64";

	$groupIdList = "001";
	
	$userId = $_POST["user_id"];//用户ID
	
	$options = array();
	$options["quality_control"] = "NORMAL";
	$options["liveness_control"] = "LOW";
	$options["user_id"] = "$userId";//用户ID
	$options["max_user_num"] = 1;

	// 调用人脸搜索
	

	$result = $client->search($image, $imageType, $groupIdList,$options);
	
	$result2 = $result["result"]["user_list"]["0"];
	
	$score = $result2["score"];
	
	$facetoken = $result["result"]["face_token"];
	
	var_dump($result);
	var_dump($result2);
	
	echo "\r\n";
	
	if($score>=80){
		echo 1;
		//现在是Henry改写的
		//功能：
		//		记录此时验证拍下的照片，以时间戳为文件名，传入数据库
		//
		$file = $_FILES["img"];
		// 先判断有没有错
		if ($file["error"] == 0) {
			// 成功 
			// 判断传输的文件是否是图片，类型是否合适
			// 获取传输的文件类型
			$typeArr = explode("/", $file["type"]);
			if($typeArr[0]== "image")
			{
				// 如果是图片类型
				$imgType = array("png","jpg","jpeg");
				if(in_array($typeArr[1], $imgType)){ // 图片格式是数组中的一个
					// 类型检查无误，保存到文件夹内
					// 给图片定一个新名字 (使用时间戳，防止重复)
					$fname = date("Y-m-d-H-i-s-A",time());//时间做文件名,年月日+具体时间
					$ext = strrchr($file['name'],'.');//截取文件的扩展名
					$path = './'.date('Y/m/d');//文件存储的路径
					//如果目录不存在，就创建目录
					if(!is_dir($path))
					{
						mkdir($path,0777,true);
					}
					$saveFile = $path.'/'.$fname.$ext;//保存的文件名
					// 将上传的文件写入到文件夹中
					// 参数1: 图片在服务器缓存的地址
					// 参数2: 图片的目的地址（最终保存的位置）
					// 最终会有一个布尔返回值
					//echo move_uploaded_file($file["tmp_name"],$saveFile)?"ok":"fail";
					
					move_uploaded_file($file["tmp_name"],$saveFile);
				};
				else
				{
					// 不是图片类型
					echo "没有图片，再检查一下吧！";
				};
		}
		else
		{
			// 失败
			echo $file["error"];
		}
		//
		//
		
		// 调用人脸更新
		//$result = $client->updateUser($image, $imageType, $groupId, $userId);
		
		//var_dump($result);
	}else{
		//现在是Henry改写的
		//功能：
		//		记录此时验证拍下的照片，以时间戳为文件名，传入数据库
		//
		echo 0;
	}

?>