<?php
  require_once('../../conn42.php');
  require_once('./admin_header.php');
  $ID = $_GET['id'];

  // 抓 posts 內容
  $sql = "SELECT * FROM blog_posts  WHERE ID=" . $ID;
  $result = $db->prepare($sql);
  $result -> execute([$ID]);
  $row = $result->fetch(PDO::FETCH_ASSOC); //取出結果

  // 抓 categories 內容
  $sql_category = "SELECT * FROM blog_categories ORDER BY created_at DESC";
  $result_cat = $db->prepare($sql_category);
  $result_cat -> execute(array($ID));

  ?>
    <div class="posts">
      <div class="post">
        <form action="./post_update_handle.php" method="POST">
          <input name="post_title" type="text" value="<?php echo $row['post_title']?>" >
          <textarea name="post_content" rows="10" required><?php echo $row['post_content']?></textarea>
          <div>category : <select name='category_id'>
          <?php 
            while($rowCat = $result_cat->fetch(PDO::FETCH_ASSOC)){
              //將分類的資料輸出
              $catId = $rowCat['ID'];
              $catName = $rowCat['category_name'];
              $is_checked = $row['category_id'] === $catId ? 'selected' : '';
              echo "<option value='$catId' $is_checked>$catName</option>";
            }
          ?>
          </select></div>
          <div>Post status:<select elect name='post_status'>
            <?php 
              // 抓原本form裡的值
              $status = $row ['post_status'];
              var_dump($is_checked);
              if($status === 'publish' ){
                echo "<option value='$status' selected>$status</option>";
                echo "<option value='draft'>Draft</option>";
              } else {
                echo "<option value='$status' selected>$status</option>";
                echo "<option value='publish'>publish</option>";
              }
            ?>
           </select>
         </div> 

          <input type="hidden" name="id" value="<?php echo $row['ID']?>">
          <!-- 把ID藏在這裡待過去update handle -->
          <input type="submit" value="Update">
        </form>
      </div>
    </div>
  
    <?php require_once('./admin_footer.php'); ?>





