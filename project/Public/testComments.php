 <?php
  include '../Private/initialise.php';
  $_SESSION['username'] = "Grace";
  $page_title = "Test Comments";
  $shared='../Private/Shared';
  include $shared.'/header.php';  
  $Post = new Post;
  $table = "temp_posts";
  $result = mysqli_query($db, "SELECT * FROM `temp_posts`");

  // CREATE TABLE comments (
  // id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  // user VARCHAR(255),
  // content TEXT,
  // post_id VARCHAR(255) 
  // );
  // 

  if (is_post_request()) {
    # code...
    $sql = "INSERT INTO `comments` (`user`,`content`,`post_id`)";
    $sql .= "VALUES (";
    $sql .= "'".Database::db_escape($db, $_POST['user'])."', ";
    $sql .= "'".Database::db_escape($db, $_POST['comment'])."', ";
    $sql .= "'".Database::db_escape($db, $_POST['post_id'])."'";
    $sql .= ")";

    $res = mysqli_query($db, $sql);
    if ($res) {
      redirect_to('testComments.php');
    }

  }


?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
    <?php

    $posts = Post::find_all($table);


    if($posts!=false){

    while($post1 = mysqli_fetch_assoc($posts)){ ?>
      <div class="post">
        <p style="font-size: 2rem; font-weight:bold"><?= $post1['title']?></p>
        <p><?= $post1['body']?></p>
      </div>
      <!-- <div class="comment bg-success m-2 p-2">
        <p>This is a comment</p>
      </div> -->
      <form action="testComments.php" method="post">
        <div class="form-group">
          <!-- <label for="commentArea">Comment Here</label> -->
          <input type="hidden" name="post_id" value=<?= $post1['id']?>>
          <input type="hidden" name="<?= $_SESSION['username'];?>">
          <textarea name="comment" id="commentArea" rows="3" class="form-control"></textarea>
        </div>
      <input type="submit" value="Comment" class="btn btn-primary">
    </form>
      <?php 
      $comments = mysqli_query($db, "SELECT * FROM `comments` WHERE `post_id` ='".$post1['id']."'");
      while($comment = mysqli_fetch_assoc($comments)) {?>
        <div class="bg-succcess">
          <h5><?= $comment['user'] ?></h5>
          <p><?= $comment['content'] ?></p>
        </div>
      <?php } ?>

    <?php }
     }else{
    echo 'Nothing was found';
    }
    ?>
    </div>
    <div class="col-md-6"></div>
  </div>
</div>


<?php include $shared.'/footer.php'; ?>