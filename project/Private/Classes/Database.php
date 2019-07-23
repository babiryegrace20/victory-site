<?php
 class Database {

    public static function db_connect() {
    //  $connection = mysqli_connect('localhost', 'Liberty', 'liberty', 'Liberty');
    $connection = mysqli_connect('localhost', 'root', '', 'registration');
     // $connection = mysqli_connect('sql308.website.tk', 'wetk_22358123', 'liberty', 'wetk_22358123_Liberty');
     self::_confirm_db_connect();
     return $connection;
    }

    public static function db_disconnect($connection) {
      if(isset($connection)) {
        mysqli_close($connection);
      }
    }

    private static function _confirm_db_connect() {
      if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_errno();
       $msg .= "( ". mysqli_connect_errno() . ")";
       exit($msg);
      }
   }

   public static function db_escape($connection, $string) {
     global $db;
     return mysqli_real_escape_string($db, $string);
    }

    public static function confirm_result_set($result_set){
      if(!$result_set){
        exit("Database query failed");
      }
    }

    public static function find_all($table_name) {
      global $db;
      $sql = "SELECT * FROM {$table_name} ";
      // if(isset($condition)) {
      //   $sql .= $condition . " ";
      // }
      $result = mysqli_query($db, $sql);
      self::confirm_result_set($result);
      // $result =
      //Call the mysqli_fetch_assoc
      return $result;
    }

    public static function find_by_id($table_name, $id) {
      global $db;
      $sql = "SELECT * FROM {$table_name} ";
      $sql .= "WHERE id ='" . self::db_escape($db,$id). "'";

      $result = mysqli_query($db, $sql);
      return $result;
    }

    public static function delete($table_name, $id) {
      global $db;

      $sql = "DELETE FROM {$table_name} ";
      $sql .= "WHERE id = '". self::db_escape($db, $id) ."' ";
      $sql .= "LIMIT 1";

      $result = mysqli_query($db, $sql);

      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        self::db_disconnect();
        exit;
      }
    }

    // public $db = self::db_connect();
 }
 ?>
