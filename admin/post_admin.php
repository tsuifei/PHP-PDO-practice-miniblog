<?php
  require_once('../conn.php');
  require_once('./admin_header.php');
  ?>

    <div class="posts">
      <ul>
        <li>
        <?php
      
      // mysql 取資料顯示 以降序顯示
      // $sql = "SELECT * FROM posts ORDER BY created_at DESC"; 

      $sql = "SELECT P.ID, P.post_title, P.post_content, P.post_status, C.category_name, P.created_at FROM posts AS P LEFT JOIN categories AS C ON P.category_id = C.ID"; 

      // $sql = "SELECT P.post_title, P.post_content, P.post_status, C.category_name, P.created_at FROM posts AS P LEFT JOIN categories AS C ON P.category_id = C.ID WHERE P.ID =" . $ID; 

      // $results = [];
      $select = $db->prepare($sql); 
      $select -> execute([]);
      $results = $select->fetchAll(PDO::FETCH_ASSOC); //fatchAll要依照取的資料型態下參數

      foreach($results as $row){
        //將查詢出的資料輸出
        echo "<div class='post'>";
          echo "<p class=''>" . $row['post_title']."</p>";
          echo "<p class=''>" . $row['post_content']."</p>";
          echo "<p class=''>" . $row['category_name']."</p>";
          echo "<p class=''>" . $row['post_status']."</p>";
          echo "<p class=''>" . $row['created_at']."</p>";
          echo "<div class='post__foot'>";
            echo  "<a href='./post_update.php?id=".$row['ID']."' class='bnt'>Update  </a>";
            echo  "<a href='./post_delete.php?id=".$row['ID']."' class='bnt'>Delete</a>";
          echo "</div>";
        echo "</div>";
      }
        ?>
        </li>
      </ul>
    </div>

<?php require_once('./admin_footer.php'); ?>