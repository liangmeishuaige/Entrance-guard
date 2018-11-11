<?php

	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// 你的 APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);	
	
	include 'OneFaceHandle.php';
	
	$image = $base64_1;

	$imageType = "BASE64";//图片类型

	$groupId = "001";//组ID

	$userId = $_POST["passwords"];//用户ID
	
	
	
	//var_dump($_POST);
	
	//echo $userId;
	
	
	// 调用人脸注册
	$result = $client->addUser($image, $imageType, $groupId, $userId);
	
	$error_code = $result["error_code"];
	alert('$error_code');
	//var_dump($result);

?>