<?php 
include '../Private/initialise.php';
include SHARED_PATH.'/header.php'; 

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
$r = mysqli_query($db,$sql);
//$statement = $db->prepare($sql);
// if ($statement->execute([':id' => $id])){
// 	header("Location: /project/members.php");
// 	//success
// }else {
//     echo '<div class ="alert alert-danger"> error</div>';
//   }

if ($r){
	echo '<div class ="alert alert-success"> deleted sucessfully</div>';
	// header("Location: /project/members.php");
	redirect_to(url_for('members.php'));
	//success
}else {
    echo '<div class ="alert alert-danger"> error: '.mysqli_error($db).'</div>';
  }

	include SHARED_PATH.'/footer.php'; ?>