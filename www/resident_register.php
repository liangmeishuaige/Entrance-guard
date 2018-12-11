<?php

	header('Content-Type:text/html;charset=GB2312');
	
	include 'AipFace.php';
	
	require_once 'AipFace.php';

	// 你的 APPID AK SK
	const APP_ID = '15018574';
	const API_KEY = 'WPQL1gkWQqxrZRvGrZ9jIiRC';
	const SECRET_KEY = 'vp3FRvataSK1Q6agWsASopvqVDv1PYjw';

	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);	
	
	
	$image = $_POST["base64_data"];

	$imageType = "BASE64";//图片类型

	$groupId = "resident";//组ID

	$userId = $_POST["user_id"];//用户ID
	
	$sign = $_POST["sign"];
	
	if (!session_id()) session_start();
	$user_id=$_SESSION["user_id"];
	$idcard= $_SESSION["idcard"];
	$passwords=$_SESSION["passwords"];
	$adress= $_SESSION["adress"];
	
	
	//$userId = 001;
	
	//var_dump($_POST);
	
	//echo $userId;
	if($sign=="0"){
		$client->deleteUser($groupId,$userId);
	}
	
	$ECheck=-1;
	$yawCheck=0;
	$detectResult=$client->detect($image, $imageType);
	$detectErrorCode=$detectResult["error_code"];
	if($detectErrorCode==0){
		$angle = $detectResult["result"]["face_list"]["0"]["angle"];
	
		$face_token=$detectResult["result"]["face_list"]["0"]["face_token"];
		
		$yaw=$angle["yaw"];
		$pitch=$angle["pitch"];
		
		if($pitch>-15&&$pitch<25){
			$pitchCheck=1;
		}else{
			$pitchCheck=-3;
		}
		//echo($pitchCheck);
		
		if($yaw>-15&&$yaw<15){
			$yawCheck=2;
		}elseif($yaw>=15&&$yaw<65){
			$yawCheck=1;
		}elseif($yaw>-65&&$yaw<=-15){
			$yawCheck=0;
		}
		//echo($yawCheck);
		
		/*$sign0="0";
		$sign1="1";
		$sign2="2";
		
		$ECheck=(int)$sign0+$yawCheck+$pitchCheck;
		echo($ECheck);
		$ECheck=(int)$sign1+$yawCheck+$pitchCheck;
		echo($ECheck);
		$ECheck=(int)$sign2+$yawCheck+$pitchCheck;
		echo($ECheck);*/
		
		$ECheck=(int)$sign+$yawCheck+$pitchCheck;
	}

	
	
	
	
	if($detectErrorCode==0&&$ECheck==3){
		// 调用人脸注册
		
		$image=$face_token;
		$imageType="FACE_TOKEN";
		
		$result = $client->addUser($image, $imageType, $groupId, $userId);
		$error_code = $result["error_code"];
		
		if($error_code=="0"){
			if($sign=="0"){
				echo("注册进度:1/3 请用左侧脸对着屏幕");
			}else if($sign=="1"){
				echo("注册进度:2/3 请用右侧脸对着屏幕");
			}else{
				//echo("注册进度:3/3 注册完成，即将跳转。");
				error_reporting(0);
				$servername = "localhost";
				$username = "root";
				$password = "root";

			// 创建连接
				$conn = mysql_connect($servername, $username, $password);
				mysql_query("SET NAMES 'utf8'");
			// 检测连接
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
					}
				$time = date("Y-m-d H:i:s", time()+8*3600);  
				$sql = "INSERT INTO table.resident_message (name,password,adress,idcard,timex) VALUES('$user_id','$passwords','$adress','$idcard','$time')";
				$resultSeta = mysql_query($sql);	
				echo("注册进度:3/3 ,注册成功，请返回");	
				//echo "<script>window.open('new 4.html')</script>";	
				//header("location:new 4.html");	
				//echo "<script>alert('删除成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
				//echo "<script>history.go(-1);</script>";
			}
		}else{
			if($sign=="0"){
				echo("注册进度:0/3 请用正脸对着屏幕");
			}elseif($sign=="1"){
				echo("注册进度:1/3 请用左侧脸对着屏幕");
			}else{
				echo("注册进度:2/3 请用右侧脸对着屏幕");
				
			}
		}
	}else{			//不调用人脸注册对策
		if($sign=="0"){
			echo("注册进度:0/3 请用正脸对着屏幕");
		}elseif($sign=="1"){
			echo("注册进度:1/3 请用左侧脸对着屏幕");
		}else{
			echo("注册进度:2/3 请用右侧脸对着屏幕");
		}
	}
	
	
	
	//echo $error_code;
	//var_dump($result);

?>