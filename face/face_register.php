<?php

	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// ��� APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);	
	
	include 'OneFaceHandle.php';
	
	$image = $base64_1;

	$imageType = "BASE64";//ͼƬ����

	$groupId = "001";//��ID

	$userId = $_POST["passwords"];//�û�ID
	
	
	
	//var_dump($_POST);
	
	//echo $userId;
	
	
	// ��������ע��
	$result = $client->addUser($image, $imageType, $groupId, $userId);
	
	$error_code = $result["error_code"];
	alert('$error_code');
	//var_dump($result);

?>