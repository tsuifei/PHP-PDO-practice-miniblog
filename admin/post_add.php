<?php
  require_once('../../conn42.php');
  require_once('./admin_header.php');
  require_once('../utils/Parsedown.php');
  require_once('../utils/utils.php');

// mysql 取資料顯示 以降序顯示
      $sql = "SELECT * FROM blog_categories ORDER BY created_at DESC"; 
      $results = [];
      $select = $db->prepare($sql); 
      // $select -> execute();
      $select -> execute($results);
      $results = $select->fetchAll(PDO::FETCH_ASSOC); 
      //fatchAll要依照取的資料型態下參數
      
  ?>
    <div class="posts">
      <div class="post">
        <form action="./post_add_handle.php" method="POST">
          <input name="post_title" type="text" placeholder="Post Title" required>
          <textarea name="post_content" rows="10" placeholder="Post Content" required></textarea>
          <div class="select">category : <select name='category_id'>
          <?php 
            foreach($results as $result){
              //將查詢出的資料輸出
              $categoryId = $result['ID'];
              $categoryName = $result['category_name'];
              echo "<option  value='$categoryId'>" . $categoryName . "</option>";
              echo var_dump($categoryId);
            }
          ?>
          </select></div>
          <div class="select">Post status:
            <select name='post_status'>
              <option selected="selected" value="publish">Publish</option>
              <option value="draft">Draft</option>
            </select>
          </div>
          
          <input type="submit" value="Add">
        </form>
      </div>
    </div>
  
    <?php require_once('./admin_footer.php'); ?>