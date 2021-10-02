
<h3> Add New Student</h3>


<?php
if(isset($_POST['add-student'])){
   $name= $_POST['name'];
   $roll= $_POST['roll'];
   $class= $_POST['class'];
   $city= $_POST['city'];
   $pcontact= $_POST['p-contact'];
   $picture= $_FILES['picture']['name'];

   $picture= explode('.', $_FILES['picture']['name']);
   $pic_ex=end($picture);
   $picture_name= $roll.'.'.$pic_ex;

   
  

   $qurey= "INSERT INTO `student_info`( `name`, `roll`, `class`, `city`, `p-contact`, `photo` ) VALUES('$name','$roll','$class','$city',' $pcontact','$picture_name')";

   $result= mysqli_query($link,$qurey);
   if($result){
       $sucess=" Data inset sucess";
       move_uploaded_file($_FILES['picture']['tmp_name'],'student-image/'.$picture_name);
   }else{
       $error="failed";
   }
}

?>

<div class="row">

 <?php if(isset($sucess)){echo '<p class="alert alert-success">'.'$sucess'.'</p>';} ?>
 <?php if(isset($error)){echo '<p class="alert alert-danger">'.'$error'.'</p>';} ?>

</div>


<div class="row">
    <div class="col">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group ">
                <label for="name"> Student name</label>
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required> 
            </div>

            <div class="form-group mt-2">
                <label for="roll"> Student Roll</label>
                <input type="text" name="roll" placeholder="Student Roll" id="roll" class="form-control" pattern="[0-9]{6}"required> 
            </div>

            <div class="form-group mt-2">
                <label for="class"> Student class</label>
                <select id="class" class="form-control" name="class" required>
                  <option value=""> select</option>
                  <option value="1st"> one</option>
                  <option value="2nd"> Two</option>
                  <option value="3rd"> Three</option>
                  <option value="4th"> Four</option>
                  <option value="5th"> Five</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <label for="city"> Student City	</label>
                <input type="text" name="city" placeholder="Student City" id="city" class="form-control" required> 
            </div>

            <div class="form-group mt-2">
                <label for="p-contact"> Student P-contact</label>
                <input type="text" name="p-contact" placeholder="Student p-contacte" id="p-contact" class="form-control" pattern="01[0-9]{10}" required> 
            </div>

            <div class="form-group mt-2">
                <label for="picture"> Student Photo</label>
                <input type="file" name="picture" placeholder="Student Photo" id="picture" class="form-control" required> 
            </div>


            <div class="form-group mt-2">
                <input type="Submit" value="add-student"  name="add-student" class="btn btn-primary" > 
            </div> 
        </form>

    </div>

</div>