<?php  
  class User extends Database {
    private $_table = 'Active Users';
    // Add new user
    // Log in
    // Log out
    // Check log in

    //I will avoid the __construct method because your code doesn't look like you can explain the existance and work of magic methods

    public static function check_log_in() {
      if (isset($_SESSION['username'])) {
        return true;
      } else {
        return false;
      }
    }

    public static function log_out () {
      unset($_SESSION['username']);
      redirect_to(url_for('login.php'));
    }

    public function log_in(array $data) {
      global $db;
      if (empty($data['username'])) {
        array_push($errors, "Username is required");
      }
      if (empty($data['password'])) {
        array_push($errors, "Password is required");
      }
    
      if (count($errors) == 0) {
        $username = $data['username'];
        $password = md5($data['password']);
        $query = "SELECT * FROM `users` WHERE `username`='";
        $query .= parent::db_escape($db, $username);
        $query .= "' AND `password`='";
        $query .= parent::db_escape($db, $passowrd);
        $query .= "'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
          array_push($errors, "Wrong username/password combination");
        }
      }
    }

    public function delete($id) {
      if ($r){
        echo '<div class ="alert alert-success"> deleted sucessfully</div>';
        // header("Location: /project/members.php");
        redirect_to(url_for('members.php'));
        //success
      } else {
          echo '<div class ="alert alert-danger"> error: '.mysqli_error($db).'</div>';
        }
    }


  }
  

?>