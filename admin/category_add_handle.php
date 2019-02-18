<?php
  require_once('../../conn42.php');
  
  $category = htmlspecialchars($_POST['category'],ENT_QUOTES);

  // 確認是否填入資料為空
  if (empty($category)) { 
    echo '<script language="JavaScript">;alert("Please fill in all the required fields.");location.href="./category_add.php";</script>;';
    // die('');
  } else { 
    // 新增資料
    $sql = "INSERT INTO blog_categories(category_name) values(?)";
    $add = $db->prepare($sql);
    $result = $add->execute([$category]);

  if ($result) {  
    header('Location: ./category_admin.php');
  } else {  
    echo 'failed';
    die($e->getMessage()); 
  }
  }
  ?>