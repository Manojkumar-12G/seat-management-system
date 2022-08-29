
<div class="container-fluid sbutton">
  <a href="index.php" class="btn  btn-lg bhome">Seat Home Page</a>
  <a href="../employee/index.php" class="btn btn-dark btn-lg ">Employee Module</a>
  <!-- <a href="seat.php?source=add_seat" class="btn btn-primary btn-lg ml-2">Add Seat</a> -->
</div>



<!-- for better validations see php form validation in w3schools -->

<!-- receving get request -->
<?php
if(isset($_GET['s_id'])){
  //sleep(5);
  $edit_seat_id=$_GET['s_id'];

  $query="SELECT * from seats where seat_id=$edit_seat_id";
  $seat_query=mysqli_query($connection,$query);
  if(!$seat_query){
    die("Query Failed".mysqli_error($connection));
  }
  while($row=mysqli_fetch_assoc($seat_query)){
    $seat_id=$row['seat_id'];
    $seat_no=$row['seat_no'];
    $seat_floor=$row['seat_floor'];
    $seat_building=$row['seat_building'];
    $seat_type=$row['seat_type'];
    $wifi_enabled=$row['wifi_enabled'];
    $employee=$row['employee'];
  }


}

 ?>





<?php
  if(isset($_POST['update_seat'])){
   sleep(6);
    //$seat_no=$_POST['seat_no'];
    $edited_seat_floor=$_POST['seat_floor'];
    $seat_building=$_POST['seat_building'];
    $seat_type=$_POST['seat_type'];
    $wifi_enabled=$_POST['wifi_enabled'];
    $employee=$_POST['employee'];


   //below comments are not required
    // if($_POST['seat_floor']!==''){
    //   $edited_seat_floor=$_POST['seat_floor'];
    // }else{
    //   $edited_seat_floor=$seat_floor;
    //     echo "hello";
    // }


     if(!empty($seat_building)&& !empty($seat_floor)&& !empty($seat_type) && !empty($wifi_enabled)){

            //updating
            $query="update seats set seat_no='{$seat_no}', ";
            $query.="seat_floor='{$edited_seat_floor}', ";
            $query.="seat_building='{$seat_building}', ";
            $query.="seat_type='{$seat_type}', ";
            $query.="wifi_enabled='{$wifi_enabled}', ";
            $query.="employee='{$employee}' ";
            $query.="where seat_id={$edit_seat_id}";

            $update_seat=mysqli_query($connection,$query);
            if(!$update_seat){
               die("Query Failed".mysqli_error($connection));
            }


                if(isset($seat_id)){
                  //echo "hello";
                  $seat_no_query= "SELECT CONCAT(seat_building,seat_id) AS Seat_No FROM seats WHERE seat_id={$seat_id} ";
                  $get_seat_no=mysqli_query($connection,$seat_no_query);

                  if(!$get_seat_no){
                     die("Query Failed".mysqli_error($connection));
                  }


                  $row=mysqli_fetch_assoc($get_seat_no);
                 $seat_no=$row['Seat_No'];

                  $seat_query="UPDATE seats SET seat_no='{$seat_no}'  WHERE seat_id={$seat_id}";
                  $update_seat_no=mysqli_query($connection,$seat_query);
                }
          }
    // header("Location:index.php");
  }



 ?>










 <div class="row addrow ade" >

     <div class="col-md-6 m-auto card adc">
       <section>
         <div class="container-fluid text-center first">
           <h1>Update Seat</h1>
         </div>
       </section>
    <div class="sent-message">Details are updated sucessfully. Thank you!</div>

<form action="" class="update-form"  id="update_form" method="post" enctype="multipart/form-data">
  <div class="container">


    <div class="form-group">
             <label for="">Seat No</label>
              <input type="text" class="form-control" name="seat_no" value='<?php echo $seat_no ?>' disabled>
    </div>
    <div class="form-group">
       <label for="main_menu">Seat Building</label>
        <!-- <input type="text" class="form-control" name="seat_building" value='<?php //echo $seat_building ?>'> -->
        <select class="custom-select" name="seat_building" id="main_menu">
          <option value="<?php echo $seat_building ?>" readonly><?php echo $seat_building ?></option>
          <option value="MTP">MTP</option>
          <option value="EGL">EGL</option>
          <option value="FTP">FTP</option>
        </select>
        <div class="validate-building valid">Please select the building</div>

    </div>
    <div class="form-group">
             <label for="sub_menu">Seat Floor</label>
              <!-- <option value="<?php echo $seat_floor ?>"><?php echo $seat_floor ?></option> -->
              <!-- <input type="text" class="form-control" name="seat_floor" value='<?php //echo $seat_floor; ?>'  readonly><small>To edit floor select below drop down by selecting a respective building</small></input> -->
              <select class="custom-select" name="seat_floor" id="sub_menu">
                <option value="<?php echo $seat_floor ?>"><?php echo $seat_floor ?></option>
              </select>
              <div class="validate-floor valid">floor should be a number</div>

    </div>

    <div class="form-group">
       <label for="type">Seat Type</label>
        <!-- <input type="text" class="form-control" name="seat_type" value='<?php //echo $seat_type ?>'> -->
        <select class='custom-select' name="seat_type" id="type">
          <option value="<?php echo $seat_type ?>"><?php echo $seat_type ?></option>
          <?php
           if($seat_type=='cabin'){
             echo "<option value='open'>open</option>";
           }else{
             echo "<option value='cabin'>cabin</option>";
           }

           ?>
        </select>
        <div class="validate-type valid">Please select the seat type</div>
    </div>

    <div class="form-group">
       <label for="wifi">Wifi Enabled</label>
        <!-- <input type="text" class="form-control" name="wifi_enabled" value='<?php //echo $wifi_enabled ?>'> -->
        <select class='custom-select' name="wifi_enabled" id="wifi">
          <option value="<?php echo $wifi_enabled ?>"><?php echo $wifi_enabled ?></option>
          <!-- <option value="">Select</option> -->
          <?php
           if($wifi_enabled=='yes'){
             echo "<option value='no'>no</option>";
           }else{
             echo "<option value='yes'>yes</option>";
           }

           ?>

        </select>
        <div class="validate-wifi valid">Please select yes or no</div>
    </div>
    <div class="form-group">
       <label for="">Employee</label>
        <input type="text" class="form-control" name="employee" value='<?php echo $employee ?>' readonly>
    </div>

       <div class="row">
          <div class="form-group col-6">
                <input class="btn btn-primary btn-block" type="submit" name="update_seat" value="Update Seat">
          </div>
          <div class="form-group col-6">
            <a href="index.php" class="btn btn-dark btn-block">Cancel</a>
          </div>
      </div>

  </div>

</form>
  </div>
</div>
