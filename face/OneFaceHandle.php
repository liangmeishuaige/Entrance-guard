<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
// �����ļ�
//var_dump($_FILES); // ������$_POST��$_GET
//print_r($_FILES);
$file = $_FILES["img"];
// ���ж���û�д�
if ($file["error"] == 0) {
 // �ɹ� 
 // �жϴ�����ļ��Ƿ���ͼƬ�������Ƿ����
 // ��ȡ������ļ�����
 	$typeArr = explode("/", $file["type"]);
 	if($typeArr[0]== "image"){
  	// �����ͼƬ����
  	$imgType = array("png","jpg","jpeg");
  	if(in_array($typeArr[1], $imgType)){ // ͼƬ��ʽ�������е�һ��
   		// ���ͼ�����󣬱��浽�ļ�����
   		// ��ͼƬ��һ�������� (ʹ��ʱ�������ֹ�ظ�)
   		
   		/**
   			*
   			*��һ����ͼƬ�ı���
   			*����Լ��޸��������ݿ�ͱ���λ��
   			*/
   		//$fname = rand(10000,99999);//����ļ���
   		$fname = date("H-i-s-A",time());//ʱ�����ļ���,����ʱ��
			$ext = strrchr($file['name'],'.');//��ȡ�ļ�����չ��
			$path = './'.date('Y/m/d');//�ļ��洢��·��
			//���Ŀ¼�����ڣ��ʹ���Ŀ¼
			if(!is_dir($path)){
			    mkdir($path,0777,true);
			}
   		$saveFile = $path.'/'.$fname.$ext;//������ļ���
   		// ���ϴ����ļ�д�뵽�ļ�����
   		// ����1: ͼƬ�ڷ���������ĵ�ַ
   		// ����2: ͼƬ��Ŀ�ĵ�ַ�����ձ����λ�ã�
   		// ���ջ���һ����������ֵ
   		//echo move_uploaded_file($file["tmp_name"],$saveFile)?"ok":"fail";
   		move_uploaded_file($file["tmp_name"],$saveFile);
   		
			if($fp = fopen($saveFile,"rb", 0)) 
			{ 
			    $gambar = fread($fp,filesize($saveFile)); 
			    fclose($fp); 

			     
			    $base64_1 = base64_encode($gambar); 
//			    echo $base64_1;
			    // ���
//			    $encode = '<img src="data:image/jpg/png/gif;base64,' . $base64_1 .'" >'; 
//			    echo $encode; 
			}
  	};
 	} else {
  	// ����ͼƬ����
  	echo "û��ͼƬ���ټ��һ�°ɣ�";
 	};
} else {
 	// ʧ��
 	echo $file["error"];
};
?>