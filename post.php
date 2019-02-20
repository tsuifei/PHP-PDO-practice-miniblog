<?php
  require_once('../conn42.php');
  require_once('./int/header.php');
  require_once('./utils/Parsedown.php');
  require_once('./utils/utils.php');
  ?>

    <div class="posts">
      <?php
      $ID = $_GET['id'];
      // mysql 取資料顯示 以降序顯示
      // $sql = "SELECT * FROM posts WHERE ID =" . $ID; 
      // $sql = "SELECT * FROM posts LEFT JOIN categories ON posts.category_id = categories.ID WHERE posts.ID =" . $ID; 
      $sql = "SELECT P.post_title, P.post_content, P.post_status, C.category_name, P.created_at FROM blog_posts AS P LEFT JOIN blog_categories AS C ON P.category_id = C.ID WHERE P.ID =" . $ID; 
      // $result = [];
      $select = $db->prepare($sql); 
      $select -> execute([]);
      $row = $select->fetch(PDO::FETCH_ASSOC); 
      // foreach($results as $result){

      // 撈出內容轉成吃 Markdown 格式
      $post_content = escapeOut($row['post_content']);
      $md = new Parsedown();
      $md->setSafeMode(true); 
      $post_content = $md->text($post_content); // 把內文轉成 markdown 格式

        //將查詢出的資料輸出
        echo "<div class='post'>";
        echo "<h2 class='post__title'>" . escapeOut($row['post_title']). "</h2>";
        echo "<p class='post__content'>" . $post_content ."</p>";
        // echo "<p class='post__content'>" . $row['post_content']."</p>";
        echo "<p class='post__status'>Status : " . escapeOut($row['post_status']) . "</p>";
        echo "<p class=''> Category : " . escapeOut($row['category_name']) ."</p>";
        echo "<p class=''>" . escapeOut($row['created_at']) ."</p>";
        echo "</div>";


      // }





      ?>
    </div>

<?php require_once('./int/footer.php'); ?>