<?php

	//这个操作会把该用户之前所有的人脸图片删除！
	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// 你的 APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);	
	
	$image = $base64_1;

	$imageType = "BASE64";//图片类型

	$groupId = "001";//组

	$userId = $_POST["userId"];//用户ID
	
	
	// 调用人脸更新
	$result = $client->updateUser($image, $imageType, $groupId, $userId);
	
	var_dump($result);

?>