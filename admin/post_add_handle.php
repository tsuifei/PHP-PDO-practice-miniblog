<?php
  require_once('../../conn42.php');
  
  $postTitle = htmlspecialchars($_POST['post_title'],ENT_QUOTES);
  $postName = htmlspecialchars($_POST['post_content'],ENT_QUOTES);
  $postStatus = htmlspecialchars($_POST['post_status'],ENT_QUOTES);
  $postCategoryId = htmlspecialchars($_POST['category_id'],ENT_QUOTES);

  // 確認是否填入資料為空
  if (empty($postTitle) || empty($postName) || empty($postCategoryId) || empty($postStatus)) { 
    // echo $postTitle,$postName,$postStatus,$postCategoryId;
    echo '<script language="JavaScript">;alert("Please fill in all the required fields.");location.href="./post_add.php";</script>;';
    // die('');
  } 

    // 新增資料
  $sql = "INSERT INTO blog_posts(post_title, post_content, post_status, category_id) values(?,?,?,?)";
  $insert = $db->prepare($sql);
  $result = $insert->execute([$postTitle, $postName, $postStatus, $postCategoryId]);

  if ($result) {  
    header('Location: ./post_admin.php');
  } else {  
    echo 'failed';
    die($e->getMessage()); 
  }
  
  ?>