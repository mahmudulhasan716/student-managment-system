<h3> User Profile</h3>



<?php

$session_user= $_SESSION['user_login'];

$user_data= mysqli_query($link, "SELECT * FROM `users` WHERE `username`='$session_user' ");

$user_row= mysqli_fetch_assoc($user_data);



?>




<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">

            <thead>
                <tr>
                    <td> User Id</td>
                    <td> <?php echo $user_row['id']  ?> </td>
                
                 </tr>

                 <tr>
                    <td> Name</td>
                    <td> <?php echo $user_row['name']  ?> </td>
                
                 </tr>

                 <tr>
                    <td>User name</td>
                    <td> <?php echo $user_row['username']  ?> </td>
                
                 </tr>

                 <tr>
                    <td> Email</td>
                    <td> <?php echo $user_row['email']  ?> </td>
                
                 </tr>

                 <tr>
                    <td>Status</td>
                    <td> <?php echo $user_row['status']  ?> </td>
                
                 </tr>



            </thead>

        </table>
    </div>


    <div class="col-md-6">

    <a>
    <img class="img-fluid" src="images/<?php echo $user_row['photo']  ?>" >
    
    </a>

    <?php

    if(isset($_POST['upload'])){
      $photo= explode( '.', $_FILES['photo']['name']);
      $photo= end($photo);
      $photo_name=$session_user.'.'.$photo;

     $upload= mysqli_query($link, "UPDATE `users` SET `photo`='$photo_name' WHERE `username`='$session_user'");
     if($upload){
        move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
     }
    }
    
    
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
     <label for="photo" class="mt-3"> Upload </label>
     <input type="file" name="photo" required id="photo" class="form-control mt-2">
     <input type="submit"  name="upload" class="btn btn-primary mt-2"> 
    
    </form>
    
    </div>

</div>