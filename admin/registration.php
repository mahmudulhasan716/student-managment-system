<?php

require_once'./dbcon.php';



if(isset($_POST['registration'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $cpassword= $_POST['cpassword'];
    $photo= explode( '.', $_FILES['photo']['name']);
    $photo= end($photo);
    $photo_name=$username.'.'.$photo;
    $input_error=array();

    



    if(empty($name)){
        $input_error['nmae']='this name is requrid';
    }
    if(empty($email)){
        $input_error['email']='this email is requrid';
    }
    if(empty($username)){
        $input_error['username']='this username is requrid';
    }
    if(empty($cpassword)){
        $input_error['cpassword']='this Confirm password is requrid';
    }
    if(empty($name)){
        $input_error['nmae']='this name is requrid';
    }

    if(count($input_error)==0){
        $emil_chack= mysqli_query($link,"SELECT * FROM `users` WHERE `email`='$email';");

        if(mysqli_num_rows($emil_chack)==0){
            $usename_chack= mysqli_query($link, "SELECT * FROM `users` WHERE `username`='$username';");
            if(mysqli_num_rows($usename_chack)==0){

                if(strlen($username) > 7){
                    if(strlen($password) > 7){

                        if($password==$cpassword){
                            $password=md5($password);

                            $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";

                            $result= mysqli_query($link,$query);

                            if($result){
                                $_SESSION['data_insert_success']= "Data Insert Success";
                                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name );
                                header('location: registration.php');
                            }else{
                                $_SESSION['data_insert_error']= "Data Insert Error";
                            }


                        }
                        else{
                            $pass_error="password not match";
                           
                        }
                    }else{
                        $password_l= "password needs more then 8 characters ";
                       
                    }

                }else {
                    $username_l= "Username needs more then 8 characters ";
                  
                }
            }else{
                $username_error= "This username already exists ";
            }



        } else{
            $email_error= "this email adress already exists";
            }


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
    <link rel="stylesheet" href="../style.css">

    <title>Registration form</title>

  </head>
  <body>

    <div class="container">
       <h2> registration Form </h2>
       
       

       <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';}?>
      
       <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert--warning">'.$_SESSION['data_insert_error'].'</div>';}  ?>


       <div class="row">
            <div class="col-md-12">

            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal mt-2">
            <div class="form-group ">
            <label for="name" class="control-lable col-sm-1">Name: </label>
             <input  type="text" name="name" id="name" placeholder="Enter Your Name" >
             <label class="error"> <?php if(isset($input_error['nmae'])){echo $input_error['nmae'];}?> </label>
            
             </div>
      

       <div class="form-group mt-3">
       <label for="email" class="control-lable col-sm-1">email: </label>
       <input  type="email" name="email" id="email" placeholder="Enter Your email" >
       <label class="error"> <?php if(isset($input_error['email'])){echo $input_error['email'];}?> </label>
       <label class="error"> <?php if(isset( $email_error)){echo  $email_error;}?> </label>
            
            
           </div>

       


       <div class="form-group mt-3">
       <label for="username" class="control-lable col-sm-1">Username: </label>
       <input  type="text" name="username" id="username" placeholder="Enter Your Username" >
       <label class="error"> <?php if(isset($input_error['username'])){echo $input_error['username'];}?> </label> 
       <label class="error"> <?php if(isset($username_error)){echo $username_error;}?> </label>
       <label class="error"> <?php if(isset($username_l)){echo$username_l;}?> </label>
       
       
            
            
             </div>

    

       <div class="form-group mt-3">
       <label for="password" class="control-lable col-sm-1">Password: </label>
       <input  type="password" name="password" id="password" placeholder="Enter Your Password">
       <label class="error"> <?php if(isset($input_error['password'])){echo $input_error['password'];}?> </label>
       <label class="error"> <?php if(isset($pass_error)){echo $pass_error;}?> </label>
       <label class="error"> <?php if(isset($password_l)){echo $password_l;}?> </label>
            
            
             </div>


       

       <div class="form-group mt-3">
       <label for="cpassword" class="control-lable col-sm-1">Confirm Your Password: </label>
       <input  type="Password" name="cpassword" id="cpassword" placeholder="Confirm Your Password" >
       <label class="error"> <?php if(isset($input_error['cpassword'])){echo $input_error['cpassword'];}?> </label>
       
            
            
             </div>

     

       <div class="form-group mt-3">
       <label for="photo" class="control-lable col-sm-1">Photo: </label>
       <input  type="file" name="photo" id="photo" placeholder="ulpoad Your photo" >
            
             </div>

      

       <div class="form-group mt-3">
       <div>
       <input type="submit" value="Registration" name="registration" class="btn btn-primary mt-2">
       </div>
            
             </div>

    


       </form>


       <div class="mt-3">
       <p> If you have an account, then please login</p>
       </div>



            


            </div>
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





       <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal mt-2">

       <div class="form-group">
       
       </form>

       <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal mt-2">

       <div class="form-group">
       
       </form>



       <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal mt-2">

       <div class="form-group">
       
       </form>


       <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal mt-2">

       <div class="form-group">
     
       </form>


       <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal mt-2">

       <div class="form-group">
    
       </form>



       <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal mt-2">

       
        </form>
       


      
