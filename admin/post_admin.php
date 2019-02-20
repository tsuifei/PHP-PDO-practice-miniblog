<?php
  require_once('../../conn42.php');
  require_once('./admin_header.php');
  require_once('../utils/Parsedown.php');
  require_once('../utils/utils.php');
  ?>

    <div class="posts">
      <ul>
        <li>
        <?php
      
      // mysql 取資料顯示 以降序顯示
      // $sql = "SELECT * FROM posts ORDER BY created_at DESC"; 

      $sql = "SELECT P.ID, P.post_title, P.post_content, P.post_status, C.category_name, P.created_at FROM blog_posts AS P LEFT JOIN blog_categories AS C ON P.category_id = C.ID ORDER BY created_at DESC"; 

      // $results = [];
      $select = $db->prepare($sql); 
      $select -> execute([]);
      $results = $select->fetchAll(PDO::FETCH_ASSOC); //fatchAll要依照取的資料型態下參數

      


      foreach($results as $row){
        // 撈出內容轉成吃 Markdown 格式
        $post_content = escapeOut($row['post_content']);
        $md = new Parsedown();
        $md->setSafeMode(true); 
        $post_content = $md->text($post_content); // 把內文轉成 markdown 格式

        //將查詢出的資料輸出
        echo "<div class='post'>";
          echo "<h2 class='post__title'>" . escapeOut($row['post_title'])."</h2>";
          echo "<p class=''>" . $post_content ."</p>";
          echo "<p class='post__category'>" . escapeOut($row['category_name'])."</p>";
          echo "<p class='post__status'>" . escapeOut($row['post_status'])."</p>";
          echo "<p class='post__date'>" . escapeOut($row['created_at'])."</p>";
          echo "<div class='post__foot'>";
            echo  "<a href='./post_update.php?id=". escapeOut($row['ID']) ."' class='bnt'>Update  </a>";
            echo  "<a href='./post_delete.php?id=". escapeOut($row['ID']) ."' class='bnt'>Delete</a>";
          echo "</div>";
        echo "</div>";
      }
        ?>
        </li>
      </ul>
    </div>

<?php require_once('./admin_footer.php'); ?>