<?php
$shared='../Private/Shared';
 include $shared.'/header.php';  
	include '../Private/initialise.php';
  // include SHARED_PATH.'/header.php';  
  
  $table = "temp_posts";

  /**
   * This is our temporary table for the blog post
   * 
   * CREATE TABLE temp_posts (
   *  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   *  title VARCHAR(255) DEFAULT 'My Blog Post',
   *  body TEXT,
   *  author VARCHAR(255) DEFAULT 'user' 
  
   * );
   */
  $Post = new Post;

   if(is_post_request()) {
    if (isset($_POST['insert_post'])) {
      $Post->insert($_POST);
    } elseif (isset($_POST['insert_comment'])) {
      // The comment code
      $sql = "INSERT INTO `comments` (`user`,`content`,`post_id`)";
      $sql .= "VALUES (";
      $sql .= "'".Database::db_escape($db, $_POST['user'])."', ";
      $sql .= "'".Database::db_escape($db, $_POST['comment'])."', ";
      $sql .= "'".Database::db_escape($db, $_POST['post_id'])."'";
      $sql .= ")";

      $res = mysqli_query($db, $sql);
      if ($res) {
        redirect_to('blog.php');
      }

    }
    
   }
?>
<div class="_container">
  <div class="row">
    <div class="col-md-12">
      <h2>CREATE A BLOG POST</h2>
      <p>Make a blog post and share with other members what you are doing</p>
    </div>

    <div class="col-md-12">
      <div class="row">
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-8">
          <form method="POST" action="blog.php">
          <input type="hidden" name="insert_post" value="true">
            <div class="form-group">
              <label for="title">Title of the post</label>
              <input class="form-control" id="title" rows="3" name="title">
            </div>
            <div class="form-group">
              <label for="postArea">Post and share here</label>
              <textarea class="form-control" id="postArea" rows="3" name="body"></textarea>
            </div>
            <div class="form-group">
            <input type="submit" value="Post" class="btn btn-primary">
            </div>
          </form>
         
          <?php

          $posts = Post::find_all($table);

        
          if($posts!=false){

           while($post1 = mysqli_fetch_assoc($posts)){ ?>
            <div class="post">
              <p style="font-size: 2rem; font-weight:bold"><?= $post1['title']?></p>
              <p><?= $post1['body']?></p>
            </div>
            <!-- The comment form  -->
            <form action="blog.php" method="post">
              <div class="form-group">
                <!-- <label for="commentArea">Comment Here</label> -->
                <input type="hidden" name="post_id" value=<?= $post1['id']?>>
                <input type="hidden" name="<?= $_SESSION['username'];?>">
                <input type="hidden" name="insert_comment" value="true">
                <textarea name="comment" id="commentArea" rows="3" class="form-control"></textarea>
              </div>
            <input type="submit" value="Comment" class="btn btn-primary">
          </form>
          <div class="container">
          
          <?php 
            $comments = mysqli_query($db, "SELECT * FROM `comments` WHERE `post_id` ='".$post1['id']."'");
            while($comment = mysqli_fetch_assoc($comments)) {?>
            
              <div class="_bg-success m-1 p-0">
                <h5><?= $comment['user'] ?></h5>
                <p><?= $comment['content'] ?></p>
              </div>
            <?php } ?>
            </div>
          <?php }
        }else{
          echo 'Nothing was found';
        }
          ?>
        </div><!-- col-md-6 -->
        <div class="col-md-3">&nbsp;</div>
      </div><!-- row -->
    </div><!-- col-md-12 -->

  </div><!-- row -->
</div><!-- container -->



<?php include $shared.'/footer.php'; ?>
