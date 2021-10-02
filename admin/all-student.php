<h3> All students</h3>




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
          <th>Action</th>
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
          <td>
          <a href="index.php?page=update_student&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-warning"> Edit</a>
          <a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger"> Delete</a>
          
          
          </td>
        </tr>
        
        <?php } ?>
      </tbody>

    </table>