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
      <div class="m-auto" >
        <a class="btn btn-primary text-right" href="./admin/login.php"> Login</a>
      
      </div>
      

      <h1 class="text-center"> Student Menagment System </h1>


      <form method="POST">

      <table class="table table-bordered">
      <tr>
      <td class="text-center"> Student Information </td>
      </tr>

      <tr>
      <td> <label for="choose"> Choonse Class</label> </td>
      <td> 
      <select id="choose" name="choose">
      <option value=" "> Seclect </option>
      <option value="1st ">1st </option>
      <option value="2nd ">2nd </option>
      <option value="3rd ">3rd </option>
      <option value="4th ">4th </option>
      <option value="5th ">5th </option>
      
      </select>
      
      </td>
      </tr>

      <tr>
      <td> <lable for="roll"> Roll</lable> </td>
      <td> <input type="text" name="roll" pattern="[0-9]{6}">  </td>
      </tr>

      <tr>
      <td > <input  type="submit" value=" Show Info" Name="show_input" > </td>
      </tr>
      
      </table>
      </form>


      



      <div class="row">


        <?php 
        require_once'./admin/dbcon.php';
          if(isset($_POST['show_input'])){

            $choose= $_POST['choose'];
            $roll= $_POST['roll'];


            

          $result=mysqli_query($link, "SELECT * FROM `student_info` WHERE `class`= '$choose' and `roll`='$roll' ");

          if(mysqli_num_rows($result)==1){

            $row= mysqli_fetch_assoc($result);

            ?>

<div class="col-md-6 col-md-offset-2">
         

         <table class="table table-bordered">
           <tr>
               <td rowspan="4">
                <img src="admin/student-image/<?= $row['photo'];?>">
                </td>
               <td> Name</td>
               <td><?= $row['name'];?></td>
           
           </tr>

           <tr>
               
               <td> Roll</td>
               <td> <?= $row['roll'];?></td>
           
           </tr>

           <tr>
               
               <td> Class</td>
               <td> <?= $row['class'];?></td>
           
           </tr>
           <tr>
               
               <td> City</td>
               <td> <?= $row['city'];?></td>
           
           </tr>
          
         
         </table>
     
     </div>


            <?php

          }else{
            echo "DATA NOT FOUND";
          }




            
          }
        
        
        ?>

      
      
      </div>
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