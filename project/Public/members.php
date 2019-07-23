<?php #include_once('header.php'); 
  include '../Private/initialise.php';
  include SHARED_PATH.'/header.php';
?>

    <h3 class="box-title">Members</h3>  
  

<?php 

            $q="SELECT * FROM users";
            $r = mysqli_query($db,$q);
                                    
            // $statement = $db->prepare($sql);
            // $statement->execute();
            // $users = $statement->fetchAll(PDO::FETCH_OBJ);

            if($r->num_rows>0){
                
                echo "
                <table id='example2' class='table table-bordered table-hover' border='1'>

             <tr> 
               <th>Id</th>
               <th>User Name</th>
               <th>Email Address</th>
               <th>Action</th>

             </tr>";

                while($row=$r->fetch_assoc()){

                            $userid = $row['id'];
                            $username = $row['username'];
                            $email = $row['email'];

                             echo'<tr>
                             <td>'.$userid.'</td>
                             <td>'.$username.'</td>
                             <td>'.$email.'</td>
                             <td><a href="edit.php?id='.$userid.'"><button class="btn btn-info">Edit</button></a>
                             <a onclick="return confirm(\'Are you sure you want to delete this entry?\')" href="delete.php?id='.$userid.'">
                             <button class="btn btn-danger">delete</button></a>
                             </td>                   
                             </tr>';

                        }
        echo"</table>";

        }

  ?>
  <a href='create.php'><button class='btn btn-info'>Create a user</button></a>

    <script type="text/javascript">

  // function onDelete(){
  //   return confirm('Are you sure you want to delete this entry?');
  // }

  // </script>

<?php include SHARED_PATH.'/footer.php'; ?>
