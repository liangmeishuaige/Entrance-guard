<?php

	include 'AipFace.php';
	//�������ݿ�����
	include 'lianjie.php';
	require_once 'AipFace.php';

	// ��� APPID AK SK
	const APP_ID = '14511390';
	const API_KEY = 'LSfn1X7S0FqfDq1GvxTGloVe';
	const SECRET_KEY = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
	var_dump($_POST);

	$groupId = "001";//��ID
	
	$image = $_POST["base64_data"];

	$imageType = "BASE64";

	$groupIdList = "001";
	
	$userId = $_POST["user_id"];//�û�ID
	
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
	
	var_dump($result);
	var_dump($result2);
	
	echo "\r\n";
	
	if($score>=80){
		echo 1;
		//������Henry��д��
		//���ܣ�
		//		��¼��ʱ��֤���µ���Ƭ����ʱ���Ϊ�ļ������������ݿ�
		//
		$file = $_FILES["img"];
		// ���ж���û�д�
		if ($file["error"] == 0) {
			// �ɹ� 
			// �жϴ�����ļ��Ƿ���ͼƬ�������Ƿ����
			// ��ȡ������ļ�����
			$typeArr = explode("/", $file["type"]);
			if($typeArr[0]== "image")
			{
				// �����ͼƬ����
				$imgType = array("png","jpg","jpeg");
				if(in_array($typeArr[1], $imgType)){ // ͼƬ��ʽ�������е�һ��
					// ���ͼ�����󣬱��浽�ļ�����
					// ��ͼƬ��һ�������� (ʹ��ʱ�������ֹ�ظ�)
					$fname = date("Y-m-d-H-i-s-A",time());//ʱ�����ļ���,������+����ʱ��
					$ext = strrchr($file['name'],'.');//��ȡ�ļ�����չ��
					$path = './'.date('Y/m/d');//�ļ��洢��·��
					//���Ŀ¼�����ڣ��ʹ���Ŀ¼
					if(!is_dir($path))
					{
						mkdir($path,0777,true);
					}
					$saveFile = $path.'/'.$fname.$ext;//������ļ���
					// ���ϴ����ļ�д�뵽�ļ�����
					// ����1: ͼƬ�ڷ���������ĵ�ַ
					// ����2: ͼƬ��Ŀ�ĵ�ַ�����ձ����λ�ã�
					// ���ջ���һ����������ֵ
					//echo move_uploaded_file($file["tmp_name"],$saveFile)?"ok":"fail";
					
					move_uploaded_file($file["tmp_name"],$saveFile);
				};
				else
				{
					// ����ͼƬ����
					echo "û��ͼƬ���ټ��һ�°ɣ�";
				};
		}
		else
		{
			// ʧ��
			echo $file["error"];
		}
		//
		//
		
		// ������������
		//$result = $client->updateUser($image, $imageType, $groupId, $userId);
		
		//var_dump($result);
	}else{
		//������Henry��д��
		//���ܣ�
		//		��¼��ʱ��֤���µ���Ƭ����ʱ���Ϊ�ļ������������ݿ�
		//
		echo 0;
	}

?>