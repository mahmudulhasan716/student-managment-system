<h3> All User</h3>




<table id="example" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th> ID</th>
          <th> Name</th>
          <th> Email</th>
          <th> Usernam</th>
          <th> Photo</th>
          
        </tr>
      </thead>
      <tbody>

            <?php 
                
                

              $db_sinfo= mysqli_query($link,"SELECT * FROM `users`");

              while($row=mysqli_fetch_assoc($db_sinfo)){ ?>
               
             


        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo ucwords($row['name'])  ;?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><img src="images/<?php  echo $row['photo']; ?>" class="img-fluid"> </td>
          
        </tr>
        
        <?php } ?>
      </tbody>

    </table>