<?php
  require_once('../../conn42.php');

  $id = htmlspecialchars($_POST['id'],ENT_QUOTES); 
  $categoryName = htmlspecialchars($_POST['category_name'],ENT_QUOTES); 
  
  // 確認是否填入資料為空
  if (empty($categoryName) ) { 
    die('il faut tout remplier');
  } else { 
    // 更新資料
    $sql = "UPDATE categories SET blog_category_name='$categoryName' WHERE ID = " . $id;
    $update = $db->prepare($sql);
    $result = $update->execute([$categoryName]);

    if ($result) {  
      header('Location: ./category_admin.php');
    } else {  
      echo 'failed';
      die($e->getMessage()); 
    }
  }
?>