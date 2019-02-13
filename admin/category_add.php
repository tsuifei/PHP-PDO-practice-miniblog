<?php
  require_once('../conn.php');
  require_once('./admin_header.php');
  ?>
    <div class="posts">
      <div class="post">
        <form action="./category_add_handle.php" method="POST">
          <input name="category" type="text" placeholder="Category's Name" required>
          <input type="submit" value="Add">
        </form>
      </div>
    </div>
  
    <?php require_once('./admin_footer.php'); ?>