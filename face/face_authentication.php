<?php

	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// ��� APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);

	include 'OneFaceHandle.php';

	$groupId = "001";//��ID
	
	$image = $base64_1;

	$imageType = "BASE64";

	$groupIdList = "001";
	
	$userId = $_POST["userId"];//�û�ID
	
	$options = array();
	$options["quality_control"] = "NORMAL";
	$options["liveness_control"] = "LOW";
	$options["user_id"] = "$userId";//�û�ID
	$options["max_user_num"] = 1;

	// ������������
	

	$result = $client->search($image, $imageType, $groupIdList,$options);
	
	$result2 = $result["result"]["user_list"]["0"];
	
	$score = $result2["score"];
	
	$facetoken = $result["result"]["face_token"];
	
	//var_dump($result);
	//var_dump($result2);
	
	echo "\r\n";
	
	if($score>=80){
		echo 1;
		
		// ������������
		//$result = $client->updateUser($image, $imageType, $groupId, $userId);
		
		//var_dump($result);
	}else{
		echo 0;
	}

?>