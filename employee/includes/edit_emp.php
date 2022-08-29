
<div class="container-fluid sbutton">
  <a href="index.php" class="btn  btn-lg btn-info">Employee Home Page</a>
  <a href="../seat/index.php" class="btn btn-dark btn-lg ">Seat Module</a>
  <!-- <a href="seat.php?source=add_seat" class="btn btn-primary btn-lg ml-2">Add Seat</a> -->
</div>





<!-- for better validations see php form validation in w3schools -->
<?php
if(isset($_GET['e_id'])){
  sleep(6);
  $edit_emp_id=$_GET['e_id'];

  $query="select * from employee where emp_id={$edit_emp_id}";
  $emp_query=mysqli_query($connection,$query);
  if(!$emp_query){
    die("Query Failed".mysqli_error($connection));
  }
  while($row=mysqli_fetch_assoc($emp_query)){
    $emp_id=$row['emp_id'];
    $emp_name=$row['emp_name'];
    $emp_email=$row['emp_email'];
    $manager=$row['manager'];
}


if(isset($_POST['update_emp'])){
  $emp_name=$_POST['emp_name'];
  $emp_email=$_POST['emp_email'];
  $manager=$_POST['manager'];
  //echo $emp_name;
  if(!empty($emp_name)&& !empty($emp_email)){
      $query="update  employee set ";
      $query.="emp_name='{$emp_name}', ";
      $query.="manager='{$manager}', ";
      $query.="emp_email='{$emp_email}' ";
      $query.="where emp_id={$edit_emp_id}";

      $update_emp=mysqli_query($connection,$query);
        if(!$update_emp){
           die("Query Failed".mysqli_error($connection));
        }
        //header("Location:./index.php");

    }
    // else{
    //   echo "<script type='text/javascript'> alert('Fields should not be empty'); </script>";
    // }
 }
}
 ?>
 <div class="row addrow ade " >

  <div class="col-md-6 m-auto card adc">

     <section>
       <div class="container-fluid text-center first">
         <h1>Edit Employee</h1>
       </div>
     </section>
     <div class="sent-message">Your message has been sent. Thank you!</div>




<form action="" class="update-form" method="post" enctype="multipart/form-data">
  <div class="container">


    <div class="form-group">
             <label for="emp_name">Employee Name</label>
              <input type="text" class="form-control" name="emp_name" id="emp_name" value='<?php echo $emp_name ?>'>
              <div class="validate-name valid">Name should be least 3 chars and maximum 28 chars</div>
    </div>
    <div class="form-group">
            <label for="manager">Manager</label>
            <select class="custom-select" name="manager" id="manager">
              <option value="<?php echo $manager ?>"><?php echo $manager ?></option>
              <option value="">Select Yes or No</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>

            <div class="validate-manager valid">Please select yes or no</div>
    </div>
    <div class="form-group">
       <label for="emp_email">Email</label>
        <input type="email" id="emp_email" class="form-control" name="emp_email" value='<?php echo $emp_email ?>'>
        <div class="validate-email valid">Please enter a valid email</div>
    </div>

       <div class="row">


          <div class="form-group col-6">
                <input class="btn btn-primary btn-block" type="submit" name="update_emp" value="Update Employee">
          </div>
          <div class="form-group col-6">
            <a href="index.php" class="btn btn-dark btn-block">Cancel</a>
          </div>

        </div>

  </div>

</form>

</div>
</div>
