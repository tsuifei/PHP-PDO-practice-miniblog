<?php
  require_once('../../conn42.php');
  
  $postId = htmlspecialchars($_POST['id'],ENT_QUOTES);
  $postTitle = htmlspecialchars($_POST['post_title'],ENT_QUOTES);
  $postContent = htmlspecialchars($_POST['post_content'],ENT_QUOTES);
  $postStatus = htmlspecialchars($_POST['post_status'],ENT_QUOTES);
  $postCategoryId = htmlspecialchars($_POST['category_id'],ENT_QUOTES);

  // 確認是否填入資料為空
  if (empty($postTitle) || empty($postContent) || empty($postCategoryId) || empty($postStatus)) { 
    // echo $postTitle,$postName,$postStatus,$postCategoryId;
    echo '<script language="JavaScript">;alert("Please fill in all the required fields.");location.href="./post_add.php";</script>;';
    // die('');
  } 

    // 更新資料
    $sql = "UPDATE blog_posts SET post_title='$postTitle', post_content = '$postContent',post_status='$postStatus',category_id = '$postCategoryId' WHERE ID = " .$postId;
    $update = $db->prepare($sql);
    $result = $update->execute(['$postTitle', '$postContent', '$postCategoryId','$postStatus']);

  if ($result) {  
    header('Location: ./post_admin.php');
  } else {  
    echo 'failed';
    die($e->getMessage()); 
  }
  
  ?>