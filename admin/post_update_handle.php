<?php
  require_once('../../conn42.php');
  require_once('../utils/utils.php');
  
  $postId = $_POST['id'];
  $postTitle = $_POST['post_title'];
  $postContent = $_POST['post_content'];
  $postStatus = $_POST['post_status'];
  $postCategoryId = $_POST['category_id'];

  // 確認是否填入資料為空
  if (empty($postTitle) || empty($postContent) || empty($postCategoryId) || empty($postStatus)) { 
    // echo $postTitle,$postName,$postStatus,$postCategoryId;
    echo '<script language="JavaScript">;alert("Please fill in all the required fields.");location.href="./post_add.php";</script>;';
    // die('');
  } 

    // 更新資料
    $sql = "UPDATE blog_posts SET post_title='$postTitle', post_content = '$postContent',post_status='$postStatus', category_id = '$postCategoryId' WHERE ID = " .$postId;
    $update = $db->prepare($sql);
    $result = $update->execute(['$postTitle', '$postContent', '$postCategoryId','$postStatus']);

  if ($result) {  
    header('Location: ./post_admin.php');
  } else {  
    echo 'failed';
    die($e->getMessage()); 
  }
  
  ?>