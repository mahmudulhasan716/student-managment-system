<?php

require_once'./dbcon.php';

session_start();
if(isset ($_SESSION['user_login'])){
    header('location: index.php');
}



if(isset($_POST['login'])){
  $username= $_POST['username'];
  $password= $_POST['password'];


  $username_check= mysqli_query($link,"SELECT * FROM `users` WHERE `username`='$username'");
  if(mysqli_num_rows($username_check)>0){
   
    $row= mysqli_fetch_assoc($username_check);
    if($row['password']== md5($password)){
      if($row['status']=='active'){

        $_SESSION['user_login']= $username;
       
        header('location: index.php');
      }else{
        $status_inactive= "your status is Inactive! please connect with author";
      }
    }else{
      $wrong_password= " This password is wrong";
    }

    
  }else{
    $Username_not_found="this username not found";
  }

}





?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Student Menagment System</title>

  </head>
  <body>

    <div class="container">
    <h2 class="text-center">  Student Menagment System</h2>

    <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
    <h3 class="text-center"> Admin Login</h3>
    
    <form action="login.php" method="POST">

    <input type="text" placeholder="usename" name="username" required class="form-control" value="<?php if(isset($username)){echo $username;} ?>">
    <input type="password" placeholder="password" name="password" required class="form-control">
    <div>

    <input type="submit" value="login" name="login" class="btn btn-info">
    
    </div>
    
    
    </form>


    </div>


    
    </div>
    <?php
    if(isset($Username_not_found)){
      echo '<div class=" alert alert-danger col-md-3 mt-4">'.$Username_not_found. ' </div>';
    }

    ?>

<?php
    if(isset($wrong_password)){
      echo '<div class=" alert alert-danger col-md-3 mt-4">'.$wrong_password. ' </div>';
    }

    ?>

<?php
    if(isset($status_inactive)){
      echo '<div class=" alert alert-danger col-md-3 mt-4">'.$status_inactive. ' </div>';
    }

    ?>

    
    
    </div>
















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>