<?php

	//Disable error reporting
	error_reporting(0);
	
	header('Content-Type:text/html;charset=GB2312');

	include 'AipFace.php';
	//�������ݿ�����
	//include 'lianjie.php';
	require_once 'AipFace.php';

	// ���?APPID AK SK
	const APP_ID = '15018574';
	const API_KEY = 'WPQL1gkWQqxrZRvGrZ9jIiRC';
	const SECRET_KEY = 'vp3FRvataSK1Q6agWsASopvqVDv1PYjw';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
	//var_dump($_POST);

	//$groupId = "001";//��ID
	
	$image = $_POST["base64_data"];
	
	//var_dump($image);	
	/*$encode = '<img src="data:image/jpg/png/gif;base64,' . $image .'" >'; 
			    echo $encode; */

	$imageType = "BASE64";

	$groupIdList = "resident,tourist";
	
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
	
	//�����ػ�������ǰһ������ʱ��userID�����͵�ǰ����ʱ��ȡ��userID���бȶ�
	//Ŀ�ģ�
	//��ֹ��֤ʱͬһ���˵���Ƭ��α����������ռ���˷�
	if (!session_id()) session_start();
	$lastuserid=$_SESSION["userid"];
	$_SESSION["userid"]=$user_id;//�ûػ�����ǰһ�����յĵ�userIDֵ
	
	//��currentuserId���浱ǰ���յ�userIdֵ
	if($score>=80){
		$currentuserId=$user_id;
		echo "��ӭ! ".$group_id." : ".$user_id;
		
		//������Henry�޸ĵ�
		//���ܣ�
		//��¼��ʱ��֤�ɹ����µ���Ƭ����ʱ���Ϊ�ļ������������ݿ�
		//echo $_SESSION['userId'];
		//echo $currentuserId;
		if($lastuserid==$currentuserId)//����ж�Ϊͬһ�����ظ����գ��򲻱���ͼƬ��Ϣ
		{	
			// do nothing
			//echo "<br>";
			//echo "lastuserid:".$lastuserid;
			//echo "<br>";
			//echo "currentuserId:".$currentuserId;
			
			
		}
		else
		{
		$_SESSION["userid"]=$currentuserId;
		$data=base64_decode($image);
		$fname=date("H-i-s-A",time()+8*3600).'_'.$userId.'.jpg';
		$path='./'.'register'.'/'.date('Y/m/d');
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
		}
		$saveFile=$path.'/'.$fname;//������ļ���
		$saveimg=file_put_contents($saveFile,$data);
		
		
		// ������������
		$result3 = $client->updateUser($image, $imageType, $group_id, $user_id);
		$servername = "localhost"; 
		$username = "root"; 
		$password = "root"; 

// �������� 
		$conn = mysql_connect($servername, $username, $password); 
		mysql_query("SET NAMES 'utf8'");

// ������� 
		if (!$conn) { 
			die("Connection failed: " . mysqli_connect_error()); 
			}
			$time = date("Y-m-d H:i:s", time()+8*3600);
	$SQL3 = "INSERT INTO table.log (id,name,time,image) VALUES('$user_id','$group_id','$time','$saveFile')";
               $res3 = mysql_query($SQL3);
			echo "fdsfdsfsdfsd";
		
		}
		//var_dump($result3);
	}else if($score>0&&$score<80){	
		echo "İ����";
		
		echo $_SESSION['userId'];
		echo $currentuserId;
		//������Henry�޸ĵ�
		//���ܣ�
		//��¼��ʱ��֤ʧ�����µ���Ƭ����ʱ���Ϊ�ļ������������ݿ�
		
		$data=base64_decode($image);
		$fname=date("H-i-s-A",time()+8*3600).'_'.$userId.'.jpg';
		$path='./'.'non-register'.'/'.date('Y/m/d');
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
		}
		$saveFile=$path.'/'.$fname;//������ļ���
		$saveimg=file_put_contents($saveFile,$data);
		

	}
	else 
		echo "��ӭ����__С��";
	//���ܹرջػ�
	//�⽫����ÿһ�ε���php�ļ�ʱ��lastuserid�ᱻ���ø���
	//session_destroy();

?>