<?php
session_start();

require_once'./dbcon.php';
if(!isset ($_SESSION['user_login'])){
    header('location: login.php');
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Student Menagment System</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"> </script> 
    
    
    <script src="./js/script.js"> </script>

  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      
        
        
      </ul>
      <form class="d-flex">
      <a class="btn btn-primary ms-2" href="index.php?page=dashbord"> Welcome</a>
      <a class="btn btn-primary ms-2" href="index.php?page=registration">Add User</a>
      <a class="btn btn-primary ms-2" href="index.php?page=user-profile"> profile</a>
      <a class="btn btn-primary ms-2" href="logout.php"> Log Out</a>

        
        
      </form>
    </div>
  </div>
</nav>


<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-md-3">
      <ul class="list-group">
        <li  aria-current="true"> <a href="index.php?page=dashbord " class="list-group-item active"> Dashbord</a></li>
        <li ><a href="index.php?page=add-student" class="list-group-item "> Add Student</a></li>
        <li ><a href="index.php?page=all-student" class="list-group-item "> All Student</a></li>
        <li ><a href="index.php?page=all-user" class="list-group-item"> ALL User</a></li>
       
      </ul>

    </div>

    <div class="col-md-9">
        <div class="content">
         <?php 

        

        if(isset($_GET['page'])){
          $page= $_GET['page'].'.'.'php';

        } else{
          $page="dashbord.php";

        }

        if(file_exists($page)){
          require_once $page;

        } else{
          echo 'file not found';
        }

        
         ?>
        </div>

    </div>

  </div>


 




</div>
  













  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>