<?php

	//���������Ѹ��û�֮ǰ���е�����ͼƬɾ����
	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// ��� APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);	
	
	$image = $base64_1;

	$imageType = "BASE64";//ͼƬ����

	$groupId = "001";//��

	$userId = $_POST["userId"];//�û�ID
	
	
	// ������������
	$result = $client->updateUser($image, $imageType, $groupId, $userId);
	
	var_dump($result);

?>