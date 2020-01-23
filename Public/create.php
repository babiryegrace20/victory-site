 <?php   
  include '../Private/initialise.php';
  include SHARED_PATH.'/header.php';

 $message = '';
 if (isset($_POST['username']) && isset($_POST['email']) ) {
 	$username = $_POST['username'];
 	$email = $_POST['email'];
  $defaultpass = md5('pass');

  if($username!="" && $email != ""){

     	$sql = "INSERT INTO users(username,email, password)VALUES('$username', '$email', '$defaultpass')";
     	//$statement = $db->prepare($sql);
      $p = mysqli_query($db, $sql);

     	// if ($statement->execute([':username' => $username, ':email' => $email])) {
     	// 	$message = '<div class ="alert alert-success"> data inserted sucessfully</div>';
      //   header("Location: /project/members.php");
      //   //success
     	// }  else {
      //   $message = '<div class ="alert alert-danger"> error'.mysql_error($db).'</div>';
      // }

          if ($p) {
            $message = '<div class ="alert alert-success"> data inserted sucessfully</div>';
            // header("Location: /project/members.php");
            redirect_to(url_for('members.php'));
            //success
          }  else {
            $message = '<div class ="alert alert-danger"> error'.mysqli_error($db).'</div>';
          }
      } else {
        echo '<div class ="alert alert-danger"> Please insert both username and email!</div>';
      }

 }
?>

 <div class ="container"> 
   <div class = "card mt-5">
    <div class= "card-header">
      <h2>Create a user</h2>
      </div>
      <div class="card-body">
        	<?php echo $message; ?>
          <!-- Where is the action of this form? This is slopy code even if it submits TO ITSELF, specify it -->
        <form method ="post" action="create.php"> 
         <div class ="form-group">
          <label for="name">Name</label>
          <input type="text" name="username" id="username" class="form-control">
          </div>
          <div class ="form-group">
           <label for="name">Email</label>
          <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
           <button type="submit" class="btn btn-info">Create a person</button>
           </div>
</form>
</div>
</div>
</div>
<?php include SHARED_PATH.'/footer.php'; ?>