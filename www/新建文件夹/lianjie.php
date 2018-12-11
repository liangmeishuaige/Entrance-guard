<?php 
     error_reporting(E_ALL ^ E_DEPRECATED);
     
     $databaseConnection = null; 
     $hostname = "localhost"; 			//数据库服务器主机名，可以用IP代替 				
     $userName = "root"; 				//数据库服务器用户名 
     $password = "root";                    //数据库服务器密码 
	 $database = "table"; 				//数据库名 	
     $databaseConnection = mysql_connect($hostname, $userName, $password, $database) or die ("数据库连接错误！"); 							//连接数据库服务器 
     global $databaseConnection; 
     $databaseConnection = @mysql_connect($hostname, $userName, $password) or die (mysql_error()); 							//连接数据库服务器 
     mysql_query("SET NAMES 'utf8'");	//设置字符集 
     @mysql_select_db($database, $databaseConnection) or die(mysql_error()); 

function closeConnection(){ 
     global $databaseConnection; 
     if($databaseConnection){ 
     		mysql_close($databaseConnection) or die(mysql_error()); 
     } 
} 


?>