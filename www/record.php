<?php
	error_reporting(E_ERROR | E_PARSE);	
	$servername = "localhost";
	$username = "root";
	$password = "root";

// 创建连接
	$conn = mysql_connect($servername, $username, $password);
	mysql_query("SET NAMES 'utf8'");
	echo "1sdddddddddddddddddddddddddd";
// 检测连接
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
		$SQL = "SELECT * FROM table.resident_message WHERE name='$userId '";
        $res = mysql_query($SQL);
	    if(mysql_num_rows($res)>0){
			echo "1sdddddddddddddddddddddddddd";
			//while($row = mysql_fetch_array($res))
			
               $name =$row['name'];
			   $time = date("Y-m-d H:i:s", time()+8*3600);  
		       $SQL2 = "INSERT INTO table.log(id,name,time,image) VALUES(1,2','$time','$saveFile')";
			   echo "1sdddddddddddddddddddddddddd";
               $res2 = mysql_query($SQL2);
			   if($res2){
			   echo "insert successfully!";}
			   else{
				   echo "defeat";
			   }			   	
		
		}else{
				   
		$SQL1 = "SELECT * FROM tourist_message WHERE 'id'='$userId '";
        $res1 = mysql_query($SQL1);	
		while($row = mysql_fetch_array($res1)){
               $name =$row['name'];
			   $time = date("Y-m-d H:i:s", time()+8*3600);  
		       $SQL3 = "INSERT INTO table.log (id,name,time,image) VALUES('$userId','$name','$time','$saveFile')";
               $res3 = mysql_query($SQL3);
			   
			   }
		}

?>