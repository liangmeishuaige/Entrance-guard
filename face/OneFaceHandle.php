<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
// 接收文件
//var_dump($_FILES); // 区别于$_POST、$_GET
//print_r($_FILES);
$file = $_FILES["img"];
// 先判断有没有错
if ($file["error"] == 0) {
 // 成功 
 // 判断传输的文件是否是图片，类型是否合适
 // 获取传输的文件类型
 	$typeArr = explode("/", $file["type"]);
 	if($typeArr[0]== "image"){
  	// 如果是图片类型
  	$imgType = array("png","jpg","jpeg");
  	if(in_array($typeArr[1], $imgType)){ // 图片格式是数组中的一个
   		// 类型检查无误，保存到文件夹内
   		// 给图片定一个新名字 (使用时间戳，防止重复)
   		
   		/**
   			*
   			*这一段是图片的保存
   			*后端自己修改连接数据库和保存位置
   			*/
   		//$fname = rand(10000,99999);//随机文件名
   		$fname = date("H-i-s-A",time());//时间做文件名,具体时间
			$ext = strrchr($file['name'],'.');//截取文件的扩展名
			$path = './'.date('Y/m/d');//文件存储的路径
			//如果目录不存在，就创建目录
			if(!is_dir($path)){
			    mkdir($path,0777,true);
			}
   		$saveFile = $path.'/'.$fname.$ext;//保存的文件名
   		// 将上传的文件写入到文件夹中
   		// 参数1: 图片在服务器缓存的地址
   		// 参数2: 图片的目的地址（最终保存的位置）
   		// 最终会有一个布尔返回值
   		//echo move_uploaded_file($file["tmp_name"],$saveFile)?"ok":"fail";
   		move_uploaded_file($file["tmp_name"],$saveFile);
   		
			if($fp = fopen($saveFile,"rb", 0)) 
			{ 
			    $gambar = fread($fp,filesize($saveFile)); 
			    fclose($fp); 

			     
			    $base64_1 = base64_encode($gambar); 
//			    echo $base64_1;
			    // 输出
//			    $encode = '<img src="data:image/jpg/png/gif;base64,' . $base64_1 .'" >'; 
//			    echo $encode; 
			}
  	};
 	} else {
  	// 不是图片类型
  	echo "没有图片，再检查一下吧！";
 	};
} else {
 	// 失败
 	echo $file["error"];
};
?>