<?php
// 使用php_PDO_mysql_query.php 版本

$hostname = 'localhost'; 
$username = 'root'; 
$password = '';
$db_name="test_blog";

try{
    //使用PDO建立MySQL連線 $db
    $db = new PDO(
        "mysql:host=".$hostname.";
        dbname=".$db_name, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));//設定編碼
                
        //發生錯誤時，出現錯誤提醒
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo '連線成功';
    // $db=null; //結束與資料庫連線
} 
catch(PDOException $e){
    //error message
    die($e->getMessage()); 
}

?>