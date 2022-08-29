


<?php include "seat_header.php" ?>
  <div class="container-fluid sbutton">
    <a href="index.php" class="btn  btn-lg bhome">Seat Home Page</a>
    <a href="../employee/index.php" class="btn btn-dark btn-lg ">Employee Module</a>
    <!-- <a href="seat.php?source=add_seat" class="btn btn-primary btn-lg ml-2">Add Seat</a> -->
  </div>

<div class="row addrow"  >

<div class="col-md-4 m-auto card">
  <section>
    <div class="container-fluid text-center first">
      <h1>Tag Employee</h1>
    </div>
  </section>


<form class="" action="" method="post" enctype="multipart/form-data">


<div class="container">

    <div class="form-group">


        <!-- <input type="text" class="form-control" name="employee"> -->

              <label for="">Employee</label>
              <select class="custom-select" name="emp">
                <option value=''>Select Employee</option>

                 <?php
                  $query="SELECT * FROM employee where manager='no' ";
                  $select_query=mysqli_query($connection,$query);
                  if(!$select_query){
                     die("Query Failed".mysqli_error($connection));
                  }
                   while($row=mysqli_fetch_assoc($select_query)){

                     $emp_name=$row['emp_name'];
                     $manager=$row['manager'];

                     //pulling emp_seat_name from seats to avoid duplicate values in seats to test for a condition

                     $emp_seat_query="SELECT * from seats";
                     $seat_query=mysqli_query($connection,$emp_seat_query);
                     while($seat_row=mysqli_fetch_assoc($seat_query)){
                       $seat_emp=$seat_row['employee'];
                       if($seat_emp==$emp_name){
                         goto label1;
                       }
                     }
                     // if($manager=='no')
                     echo "<option value='{$emp_name}'>{$emp_name}</option>";
                     label1:
                   }
                  ?>
        </select>


      <p class="text-center">or</p>


             <!-- Manager tagging -->
              <label for="">Manager</label>
            <select class="custom-select" name="manager">
              <option value="">Select manager</option>
              <?php
              $mquery="SELECT * FROM employee where manager='yes'";

              $mselect_query=mysqli_query($connection,$mquery);
              if(!$mselect_query){
                 die("Query Failed".mysqli_error($connection));
              }
              //managers list
               while($row=mysqli_fetch_assoc($mselect_query)){
                $memp_name=$row['emp_name'];



                  //query to not assign same building to manager 8:00pm
                  if(isset($_GET['id'])){
                    $the_seat_id=$_GET['id'];
                  }
                  $b_query="SELECT seat_building as comp_building,seat_type FROM seats where seat_id={$the_seat_id} ";
                  $sid_query=mysqli_query($connection,$b_query);
                  confirm($sid_query);
                  $sid_row=mysqli_fetch_assoc($sid_query);
                 $sid_building=$sid_row['comp_building'];
                 //$sid_type=$sid_row['seat_type'];



                $seatemp_query="SELECT seat_building,seat_type from seats where employee='{$memp_name}' ";
                $semp_query=mysqli_query($connection,$seatemp_query);
                confirm($semp_query);//checking for error through functions page

                while($semp_building=mysqli_fetch_assoc($semp_query)){
                        $semp_build=$semp_building['seat_building'];
                        $semp_seat_type=$semp_building['seat_type'];
                  if(!empty($semp_build)||$semp_build!=''){
                    if($sid_building===$semp_build||$semp_seat_type==='cabin'){
                      goto label2;
                    }
                  }
                }











                   //query to not assign more than 3 seats
                   /*The below code  not required it gets satisfied on above condition*/

              //   $cmanager_seat_query="SELECT * from seats where employee='{$memp_name}' ";
              //   $seat_query=mysqli_query($connection,$cmanager_seat_query);
              //   $mcount=mysqli_num_rows($seat_query);
              //   if($mcount>=3){
              //     goto label2;
              //   }
              //
                echo "<option value='{$memp_name}'>{$memp_name}</option>";
                label2:
              }

              ?>
            </select>


    </div>

    <div class="form-group">
          <input class="btn btn-primary btn-block" type="submit" name="tag_emp" value="Tag Employee ">
    </div>
</div>
</form>
</div>
</div>

<?php
if(isset($_POST['tag_emp'])){

     if(!empty($_POST['emp'])){
      $tag_emp=$_POST['emp'];

 echo $tag_emp."hello";
  if(isset($_GET['id'])){

    $seat_id=$_GET['id'];
    $query="UPDATE seats SET employee='{$tag_emp}' WHERE seat_id={$seat_id}";
    $tag_emp_query=mysqli_query($connection,$query);
    if(!$tag_emp_query){
       die("Query Failed".mysqli_error($connection));
    }
  }

}else if(isset($_POST['manager'])){

  $mtag_emp=$_POST['manager'];
  //echo $mtag_emp;
  if(isset($_GET['id'])){
    $seat_id=$_GET['id'];
    $query="UPDATE seats SET employee='{$mtag_emp}' WHERE seat_id={$seat_id}";
    $tag_emp_query=mysqli_query($connection,$query);
    if(!$tag_emp_query){
       die("Query Failed".mysqli_error($connection));
    }
  }
}
  //header("Location:index.php");
}

?>
<?php  //echo $_POST['manager'];  ?>


<?php include "seat_footer.php" ?>
