<?php
  require_once('../conn42.php');
  require_once('./int/header.php');
  ?>

    <div class="posts">
      <?php
      // mysql 取資料顯示 以降序顯示
      $sql = "SELECT * FROM blog_posts WHERE post_status = 'publish' ORDER BY created_at DESC"; 
      $results = [];
      $select = $db->prepare($sql); 
      $select -> execute($results);
      $results = $select->fetchAll(PDO::FETCH_ASSOC); //fatchAll要依照取的資料型態下參數
      foreach($results as $result){
        //將查詢出的資料輸出
        $ID = $result['ID'];
        echo "<div class='post'>";
        echo "<h2 class='post__title'> <a href='./post.php?id=$ID'>" .$result['post_title']. "</a> </h2>";
        echo "<p class='post__date'>" .$result['created_at'] ."</p>";
        echo "</div>";
      }
      ?>
    </div>

<?php require_once('./int/footer.php'); ?>