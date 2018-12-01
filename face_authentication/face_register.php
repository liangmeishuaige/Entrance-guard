<?php

	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// 你的 APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);	
	
	
	$image = $_POST["base64_data"];

	$imageType = "BASE64";//图片类型

	$groupId = "resident";//组ID

	$userId = $_POST["user_id"];//用户ID
	
	$sign = $_POST["sign"];
	//$userId = 001;
	
	//var_dump($_POST);
	
	//echo $userId;
	if($sign=="0"){
		$client->deleteUser($groupId,$userId);
	}
	
	
	// 调用人脸注册
	$result = $client->addUser($image, $imageType, $groupId, $userId);
	$error_code = $result["error_code"];
	if($error_code=="0"){
		if($sign=="0"){
			echo("progress:1/3");
		}elseif($sign=="1"){
			echo("progress:2/3");
		}else{
			echo("progress:3/3");
		}
	}else{
		echo("progress:0/3");
	}
	
	//echo $error_code;
	//var_dump($result);

?>