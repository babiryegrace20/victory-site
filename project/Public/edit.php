<?php 
  include '../Private/initialise.php';
  include SHARED_PATH.'/header.php'; 

$id = $_GET['id'];

 if (isset($_POST['name']) && isset($_POST['email']) ) {
 	$name = $_POST['name'];
 	$email = $_POST['email'];
 	$sql = "UPDATE users SET username='$name', email='$email' WHERE id='$id'";
 	//$statement = $db->prepare($sql);
  $q = mysqli_query($db, $sql);
  
 	//   if ($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
  //   $message = '<div class ="alert alert-success"> data inserted sucessfully</div>';
  //   header("Location: /project/members.php");
  //   //success
  // }  else {
  //   $message = '<div class ="alert alert-danger"> error</div>';
  // }

  if ($q) {
    $message = '<div class ="alert alert-success"> data inserted sucessfully</div>';
    header("Location: /project/members.php");
    //success
  }  else {
    $message = '<div class ="alert alert-danger"> error'.mysqli_error($db).'</div>';
  }

 }

$sql = "SELECT * FROM users WHERE id=$id";
$p = mysqli_query($db, $sql);

// $statement = $db->prepare($sql);
// $statement->execute([':id' => $id]);
// $user = $statement->fetch(PDO::FETCH_OBJ); 

//   $userid = $user->id;
//   $username = $user->username;
//   $email = $user->email;

if($p->num_rows>0){
  while($row=$p->fetch_assoc()){
    $userid = $row['id'];
    $username = $row['username'];
    $email = $row['email'];

?>

 <div class ="container"> 
   <div class = "card mt-5">
    <div class= "card-header">
      <h2>Update a user</h2>
      </div>
      <div class="card-body">
        <?php if(!empty($message)): ?>

        	<?= $message; ?>

        <?php endif; ?>
        <form method ="post">
         <div class ="form-group">
          <label for="name">Name</label>
          <input value= "<?php echo $username; ?>" type="text" name="name" id="name" class="form-control">
          </div>
          <div class ="form-group">
           <label for="name">Email</label>
          <input type="email" value="<?php echo $email; ?>" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
           <button type="submit" class="btn btn-info">Update a user</button>
           </div>

           </form></div></div></div>

  <?php 
  }
}
include_once('footer.php'); ?>