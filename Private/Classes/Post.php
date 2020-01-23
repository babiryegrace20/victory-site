<?php  
  class Post extends Database {
    private $_table = 'temp_posts';
    // Add new user
    // Log in
    // Log out
    // Check log in

    //I will avoid the __construct method because your code doesn't look like you can explain the existance and work of magic methods

    public function insert (array $post) {
      global $db;

      $sql = "INSERT INTO ". $this->_table." (`title`, `body`) VALUES (";
      $sql .= "'".parent::db_escape($db, $post['title'])."',";
      $sql .= "'".parent::db_escape($db, $post['body'])."'";
      $sql .= ")";

      $result = mysqli_query($db, $sql);

      if($result) {
        redirect_to('blog.php');
      } else {
        die(mysqli_error($db));
      }
    }

    public static function find_all($table) {
      // Am not using it yet
      if(!isset($table)) {
        $table = $this->_table;
      }

      global $db;

      $sql = "SELECT * FROM `temp_posts` ORDER BY id DESC";

      $result = mysqli_query($db, $sql);
      if ($result) {
        return $result;
      } else {
        return false;
      }
    }

  }
  

?>