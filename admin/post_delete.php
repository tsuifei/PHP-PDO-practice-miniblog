<?php
require_once('../../conn42.php');
require_once('../utils/utils.php');

$id = escapeIn($_GET['id']);

// 刪除資料
$sql = "DELETE FROM blog_posts WHERE ID = " .$id;
$delete = $db->prepare($sql);
$delete->execute([$id]);
if($delete){ 
  header("Location: ./post_admin.php");
} else {
  echo 'failed : ';
  die($e->getMessage()); 
}

?>