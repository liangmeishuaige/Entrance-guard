<?php

	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// ��� APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);	

	$groupId = "001";//��ID

	$userId = $_POST["userId"];//�û�ID
	
	// ��������ɾ��
	$result = $client->deleteUser($groupId,$userId);
	
	var_dump($result);

?>