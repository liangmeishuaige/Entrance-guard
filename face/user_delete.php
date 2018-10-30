<?php

	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// 你的 APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);	

	$groupId = "001";//组ID

	$userId = $_POST["userId"];//用户ID
	
	// 调用人脸删除
	$result = $client->deleteUser($groupId,$userId);
	
	var_dump($result);

?>