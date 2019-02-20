<?php
  require_once('../../conn42.php');
  require_once('../utils/utils.php');
  
  $postTitle = escapeIn($_POST['post_title']);
  $postContent = escapeIn($_POST['post_content']);
  $postStatus = escapeIn($_POST['post_status']);
  $postCategoryId = escapeIn($_POST['category_id']);

  // 確認是否填入資料為空
  if (empty($postTitle) || empty($postContent) || empty($postCategoryId) || empty($postStatus)) { 
    // echo $postTitle,$postName,$postStatus,$postCategoryId;
    echo '<script language="JavaScript">;alert("Please fill in all the required fields.");location.href="./post_add.php";</script>;';
    // die('');
  } 

    // 新增資料
  $sql = "INSERT INTO blog_posts(post_title, post_content, post_status, category_id) values(?,?,?,?)";
  $insert = $db->prepare($sql);
  $result = $insert->execute([$postTitle, $postContent, $postStatus, $postCategoryId]);

  if ($result) {  
    header('Location: ./post_admin.php');
  } else {  
    echo 'failed';
    die($e->getMessage()); 
  }
  
  ?>