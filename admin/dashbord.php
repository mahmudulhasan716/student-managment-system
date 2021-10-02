<h3> Dashbord Statistics Overview </h3>
<?php 

$count_student=mysqli_query($link, " SELECT * FROM `student_info`");
$total_student= mysqli_num_rows($count_student);

$count_users=mysqli_query($link, " SELECT * FROM `users`");
$total_users= mysqli_num_rows($count_users);


?>

<div class="row ">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body ">
        <h5 class="card-title">All Student</h5>
        <p class="card-text "><?= $total_student ?></p>
        <a href="index.php?page=all-student" class="btn btn-secondary"> View All Student</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body ">
        <h5 class="card-title">All Useer</h5>
        <p class="card-text "><?= $total_users ?></p>
        <a href="index.php?page=all-user" class="btn btn-secondary"> View All user</a>
      </div>
    </div>
  </div>

 


  <h3> New student</h3>

    <table id="example" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th> ID</th>
          <th> Name</th>
          <th> Roll</th>
          <th> class</th>
          <th> City</th>
          <th> Contact</th>
          <th> Photo</th>
        </tr>
      </thead>

      
      <tbody>

             <?php 
                
                

              $db_sinfo= mysqli_query($link,"SELECT * FROM `student_info`");

              while($row=mysqli_fetch_assoc($db_sinfo)){ ?>
               
             


        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo ucwords($row['name'])  ;?></td>
          <td><?php echo $row['roll']; ?></td>
          <td><?php echo $row['class']; ?></td>
          <td><?php echo  ucwords($row['city']);?></td>
          <td><?php echo $row['p-contact']; ?></td>
          <td><img src="student-image/<?php  echo $row['photo']; ?>" class="img-fluid"> </td>
        </tr>
        
        <?php } ?>
      </tbody>

    </table>

</div>