
<h3> Update Student</h3>


<?php
$id= base64_decode($_GET['id']);

$db_data= mysqli_query($link,"SELECT * FROM `student_info` WHERE `id`='$id'");

$db_row= mysqli_fetch_assoc($db_data);


if(isset($_POST['update-student'])){
    $name= $_POST['name'];
    $roll= $_POST['roll'];
    $class= $_POST['class'];
    $city= $_POST['city'];
    $pcontact= $_POST['p-contact'];

    $qurey="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`p-contact`='$pcontact' WHERE `id`='$id'";
    $result= mysqli_query($link,$qurey);

    if($result){
        header('location:index.php?page=all-student');
    }

}

?>




<div class="row">
    <div class="col">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group ">
                <label for="name"> Student name</label>
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="" value="<?=$db_row['name']?>"> 
            </div>

            <div class="form-group mt-2">
                <label for="roll"> Student Roll</label>
                <input type="text" name="roll" placeholder="Student Roll" id="roll" class="form-control" pattern="[0-9]{6}"required value="<?=$db_row['roll']?>"> 
            </div>

            <div class="form-group mt-2">
                <label for="class"> Student class</label>
                <select id="class" class="form-control" name="class" required value="<?=$db_row['class']?>">
                  <option value=""> select</option>
                  <option  <?php echo $db_row['class']=='1st'?'selected=""':''; ?> value="1st"> one</option>
                  <option  <?php echo $db_row['class']=='2nd'?'selected=""':''; ?> value="2nd"> Two</option>
                  <option  <?php echo $db_row['class']=='3rd'?'selected=""':''; ?> value="3rd"> Three</option>
                  <option  <?php echo $db_row['class']=='4th'?'selected=""':''; ?> value="4th"> Four</option>
                  <option  <?php echo $db_row['class']=='5th'?'selected=""':''; ?> value="5th"> Five</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <label for="city"> Student City	</label>
                <input type="text" name="city" placeholder="Student City" id="city" class="form-control" required value="<?=$db_row['city']?>"> 
            </div>

            <div class="form-group mt-2">
                <label for="p-contact"> Student P-contact</label>
                <input type="text" name="p-contact" placeholder="Student p-contacte" value="<?=$db_row['p-contact']?>" id="p-contact" class="form-control" pattern="01[0-9]{9}" required > 
            </div>

            


            <div class="form-group mt-2">
                <input type="Submit" value="Update-student"  name="update-student" class="btn btn-primary" > 
            </div> 
        </form>

    </div>

</div>