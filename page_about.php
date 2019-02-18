<?php
  require_once('../conn42.php');
  require_once('./int/header.php');
  ?>

    <div class="pages">
      <?php
      // mysql 取資料顯示 以降序顯示
      // FETCH SINGLE POST 取單筆資料
$sql = "SELECT * FROM blog_pages WHERE ID = :id";
$stmt = $db->prepare($sql);
$stmt->execute(['ID' => $id]); // 將id =>指向$id這個變數
$result = $stmt->fetch();
var_dump($result);
echo "<div class='page'>";
 echo "<h2><?php echo $result->page_title ?></h2>";
 echo "<p><?php echo $result->page_content ?></p>";
 echo "<p><?php echo $result->created_at ?></p>";
echo "</div>";



      // $sql = "SELECT * FROM blog_pages ORDER BY created_at DESC"; 
      // $results = [];
      // $select = $db->prepare($sql); 
      // $select -> execute($results);
      // $results = $select->fetch(PDO::FETCH_ASSOC); //fatchAll要依照取的資料型態下參數
      // foreach($results as $result){
      //   //將查詢出的資料輸出
      //   $ID = $result['ID'];
      //   echo "<div class='page'>";
      //   echo "<h2 class='page__title'> <a href='./post.php?id=$ID'>" .$result['post_title']. "</a> </h2>";
      //   echo "<p class=''>" .$result['created_at'] ."</p>";
      
      //   echo "</div>";
      // }
      ?>
    </div>

<?php require_once('./int/footer.php'); ?>