<?php
  require_once('../conn.php');
  require_once('./admin_header.php');
  ?>

    <div class="posts">
      <ul>
        <li>
        <?php
      
      // mysql 取資料顯示 以降序顯示
      $sql = "SELECT * FROM categories ORDER BY created_at DESC"; 
      $results = [];
      $select = $db->prepare($sql); 
      $select -> execute($results);
      $results = $select->fetchAll(PDO::FETCH_ASSOC); //fatchAll要依照取的資料型態下參數

      foreach($results as $result){
        //將查詢出的資料輸出
        echo "<div class='post'>";
        echo "<p class=''>" . $result['category_name']."</p>";
        echo "<div class='category__foot'>";
        echo  "<a href='./category_update.php?id=".$result['ID']."' class='bnt'>Update  </a>";
        echo  "<a href='./category_delete.php?id=".$result['ID']."' class='bnt'>Delete</a>";
        echo "</div>";
        echo "</div>";
      }
        ?>
        </li>
      </ul>
    </div>

<?php require_once('./admin_footer.php'); ?>