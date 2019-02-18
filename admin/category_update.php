<?php
  require_once('../../conn42.php');
  require_once('./admin_header.php');

  $id = $_GET['id'];

  // 先把資料取出，顯示在form上
  $sql = "SELECT * FROM blog_categories  WHERE ID =" . $id;
  $result = $db->prepare($sql);
  $result -> execute(array($id));
  $row = $result->fetch(PDO::FETCH_ASSOC); //取出結果
  ?>

    <div class="posts">
      <div class="post">
        <form action="./category_update_handle.php" method="POST">
          <input name="category_name" type="text" value="<?php echo $row['category_name']?>" placeholder="Category's Name">
          
          
          <input type="hidden" name="id" value="<?php echo $row['ID']?>"><!-- 把ID藏在這裡待過去update handle -->
          <input type="submit" value="Update">
        </form>
        </div>
      </div>
     
    </div>

<?php require_once('./admin_footer.php'); ?>