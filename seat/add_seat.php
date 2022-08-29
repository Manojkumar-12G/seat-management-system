



<?php //$connection=mysqli_connect('localhost','root','','emp_seat'); ?>

<div class="container-fluid sbutton">
  <a href="index.php" class="btn  btn-lg bhome">Seat Home Page</a>
  <a href="../employee/index.php" class="btn btn-dark btn-lg ">Employee Module</a>
  <!-- <a href="seat.php?source=add_seat" class="btn btn-primary btn-lg ml-2">Add Seat</a> -->
</div>










<!-- for better validations see php form validation in w3schools -->
<?php
  if(isset($_POST['create_seat'])){
    sleep(4);
    //echo $_POST['create_seat'];

    //$seat_no=$_POST['seat_no'];
    $seat_floor=$_POST['seat_floor'];
    $seat_building=$_POST['seat_building'];
    $seat_type=$_POST['seat_type'];
    $wifi_enabled=$_POST['wifi_enabled'];
    //$employee=$_POST['employee'];

    //validating
    if(!empty($seat_floor)&& !empty($seat_building)&& !empty($seat_type) && !empty($wifi_enabled)){

        $query="insert into  seats(seat_floor,seat_building,seat_type,wifi_enabled) ";
        $query.="values('{$seat_floor}','{$seat_building}','{$seat_type}','{$wifi_enabled}') ";

        $create_seat=mysqli_query($connection,$query);
        if(!$create_seat){
           die("Query Failed".mysqli_error($connection));
        }


          //fetching seat_id which inserted recently, for concatenating seat_building,seat_id
            $add_seat_id=mysqli_insert_id($connection);
            if(isset($add_seat_id)){
              //echo "hello";
              $seat_no_query= "SELECT CONCAT(seat_building,seat_id) AS Seat_No FROM seats WHERE seat_id={$add_seat_id} ";
              $get_seat_no=mysqli_query($connection,$seat_no_query);

              if(!$get_seat_no){
                 die("Query Failed".mysqli_error($connection));
              }


              $row=mysqli_fetch_assoc($get_seat_no);
             $seat_no=$row['Seat_No'];

              $seat_query="UPDATE seats SET seat_no='{$seat_no}'  WHERE seat_id={$add_seat_id}";
              $create_seat_no=mysqli_query($connection,$seat_query);




            }


    //header("Location:index.php");
      }
    //   else{
    //    echo "<script type='text/javascript'> alert('Fields should not be empty'); </script>";
    // }
}

 ?>

 <div class="row addrow ade" >

     <div class="col-md-6 m-auto card adc">
     <section>
       <div class="container-fluid text-center first">
         <h1>Add Seat</h1>
       </div>
     </section>



 <div class="sent-message">Details are added sucessfully. Thank you!</div>

<form action="seat.php?source=add_seat" class="add-form" method="post" enctype="multipart/form-data">
  <div class="container">


    <!-- <div class="form-group">
             <label for="">Seat No</label>
              <input type="text" class="form-control" name="seat_no">
    </div> -->
    <div class="form-group">
       <label for="main_menu">Seat Building</label>
        <!-- <input type="text" class="form-control" name="seat_building"> -->
        <select class="custom-select" name="seat_building" id="main_menu">
          <option value="">Select Building</option>
          <option value="MTP">MTP</option>
          <option value="EGL">EGL</option>
          <option value="FTP">FTP</option>
        </select>

        <div class="validate-building valid">Please select the building</div>
    </div>
    <div class="form-group">
       <label for="sub_menu">Seat Floor</label>
        <!-- <input type="text" class="form-control" name="seat_floor"> -->
        <!-- javascript is used here -->
        <select class="custom-select" name="seat_floor" id="sub_menu">
              <option value="">Select</option>
        </select>
        <div class="validate-floor valid">floor should be a number</div>
    </div>

    <div class="form-group">
       <label for="type">Seat Type</label>
        <!-- <input type="text" class="form-control" name="seat_type"> -->
        <select class='custom-select' name="seat_type" id="type" readonly>
          <option value="">Select</option>
          <option value="cabin">Cabin</option>
          <option value="open">Open</option>
        </select>
        <div class="validate-type valid">Please select the seat type</div>
    </div>

    <div class="form-group">
       <label for="wifi">Wifi Enabled</label>
        <!-- <input type="text" class="form-control" name="wifi_enabled"> -->
        <select class='custom-select' name="wifi_enabled" id="wifi">
          <option value="">Select</option>
          <option value="yes">YES</option>
          <option value="no">NO</option>
        </select>
        <div class="validate-wifi valid">Please select yes or no</div>
    </div>
    <!-- <div class="form-group">
       <label for="">Employee</label>
        <input type="text" class="form-control" name="employee" disabled>
    </div> -->
     <div class="row" >

        <div class="form-group col-6">
              <input class="btn btn-primary btn-block" type="submit" name="create_seat" value="Add Seat">
        </div>
        <div class="form-group col-6">
          <a href="index.php" class="btn btn-dark btn-block">Cancel</a>
        </div>

      </div>

  </div>

</form>
  </div>
    </div>
