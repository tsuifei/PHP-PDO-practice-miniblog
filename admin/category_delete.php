<?php
require_once('../conn.php');

$id = $_GET['id'];

// 刪除資料
$sql = "DELETE FROM categories WHERE ID = " .$id;
$delete = $db->prepare($sql);
$delete->execute([$id]);
if($delete){ 
  header("Location: ./category_admin.php");
} else {
  echo 'failed : ';
  die($e->getMessage()); 
}

?>