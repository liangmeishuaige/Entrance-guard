<?php

	//Disable error reporting
	error_reporting(0);

	include 'AipFace.php';
	//�������ݿ�����
	//include 'lianjie.php';
	require_once 'AipFace.php';

	// ���?APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
	//var_dump($_POST);

	//$groupId = "001";//��ID
	
	$image = $_POST["base64_data"];
	
	//var_dump($image);	
	/*$encode = '<img src="data:image/jpg/png/gif;base64,' . $image .'" >'; 
			    echo $encode; */

	$imageType = "BASE64";

	$groupIdList = "resident,tourist,stranger";
	
	/*$userId = $_POST["user_id"];//�û�ID
	
	$options = array();
	$options["quality_control"] = "NORMAL";
	$options["liveness_control"] = "LOW";
	$options["user_id"] = "$userId";//�û�ID
	$options["max_user_num"] = 1;*/

	// ������������
	

	$result = $client->search($image, $imageType, $groupIdList);
	
	$result2 = $result["result"]["user_list"]["0"];
	
	$group_id = $result2["group_id"];
	$user_id = $result2["user_id"];
	$score = $result2["score"];
	
	$facetoken = $result["result"]["face_token"];
	
	//var_dump($result);
	//var_dump($result2);
	
	//echo "\r\n";
	
	//��ػ�������ǰһ������ʱ��userID�����͵�ǰ����ʱ��ȡ��userID���бȶ�
	//Ŀ�ģ�
	//��ֹ��֤ʱͬһ���˵���Ƭ��α����������ռ���˷�
	if (!session_id()) session_start();
	$lastuserid=$_SESSION["userid"];
	$_SESSION["userid"]=$user_id;//�ûػ�����ǰһ�����յĵ�userIDֵ
	
	//��currentuserId���浱ǰ���յ�userIdֵ
	if($score>=80){
		
		echo "Welcome! ".$group_id." : ".$user_id;
		//������Henry��д��
		//���ܣ�
		//		��¼��ʱ��֤�ɹ����µ���Ƭ����ʱ���Ϊ�ļ������������ݿ�
		//
		$data= base64_decode($image);//�Խ�ȡ����ַ�ʹ��base64_decode���н���
		$fname = date("H-i-s-A",time()).'_'.$userId.'.jpg';//ʱ�����ļ��� ����ʱ��_userid.png
		$path = './'.'register'.'/'.date('Y/m/d');//��֤�ļ��洢��·��
		//���Ŀ¼�����ڣ��ʹ���Ŀ¼
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
		}
		$saveFile = $path.'/'.$fname;//������ļ���	
		// file_put_contents�����ĵ�һ���������뱣֤���ڸ�Ŀ¼
		//���Ѿ������õ�Ŀ¼ register/year/month/day,��˵�һ�����������ֻ������һ��/���ţ�һ��ʼ�ҵĵ�һ��������$path.'/'.$fname.'/'.$userId.'.png'�������ǲ��е��Ҳ���Ŀ¼�ģ�
		$saveimg=file_put_contents($saveFile,$data);

		
		
		// ������������
		$result3 = $client->updateUser($image, $imageType, $group_id, $user_id);
		
		}
		//var_dump($result3);
	}else if($score>0&&$score<80){	
		echo "stranger";
		//������Henry��д��
		//���ܣ�
		//		��¼��ʱ��֤�ɹ����µ���Ƭ����ʱ���Ϊ�ļ������������ݿ�
		//
		$data= base64_decode($image);//�Խ�ȡ����ַ�ʹ��base64_decode���н���
		
		$fname = date("H-i-s-A",time()).'_'.$userId.'.jpg';//ʱ�����ļ��� ����ʱ��_userid.png
		//$ext = strrchr($file['name'],'.');//��ȡ�ļ�����չ��
		$path = './'.'none_register'.'/'.date('Y/m/d');//��֤�ļ��洢��·��
		//���Ŀ¼�����ڣ��ʹ���Ŀ¼
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
		}
		$saveFile = $path.'/'.$fname;//������ļ���	
		echo $saveFile;
		// file_put_contents�����ĵ�һ���������뱣֤���ڸ�Ŀ¼
		//���Ѿ������õ�Ŀ¼ register/year/month/day,��˵�һ�����������ֻ������һ��/���ţ�һ��ʼ�ҵĵ�һ��������$path.'/'.$fname.'/'.$userId.'.png'�������ǲ��е��Ҳ���Ŀ¼�ģ�
		$saveimg=file_put_contents($saveFile,$data);

	}
	else 
		echo "no one in the camera";
	//���ܹرջػ�
	//�⽫����ÿһ�ε���php�ļ�ʱ��lastuserid�ᱻ���ø���
	//session_destroy();

?>