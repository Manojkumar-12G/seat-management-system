


<?php
if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $seat_value_id){
      $bulk_options=$_POST['bulk_options'];
      switch($bulk_options){
        case 'delete':
                $d_query="DELETE from seats where seat_id={$seat_value_id}";
                $delete_query=mysqli_query($connection,$d_query);
                if(!$delete_query){
                  die("Query Failed".mysqli_error($connection));
                break;
                }
              }
            }
          }

 ?>

 <form class="apply-form" action="" method="post"   enctype="multipart/form-data">

 <!-- for check boxes selecting externally -->
  <section>
    <div class="row">

         <div class="col-4 " >
             <select class="form-control" name="bulk_options" id="">
               <option value="">Select Options</option>
               <option value="delete">Delete</option>
               <!-- <option value="edit">Edit</option> -->
               <!-- <option value="clone">Clone</option> -->
             </select>
         </div>

         <div class="col-2">
            <input class="btn btn-success btn-block" type="submit" name="submit"  id="apply" value="Apply">
         </div>
   </div>
 </section>




<div class="table-responsive">
 <table class="table table-bordered table-hover">
   <thead>
     <th><input type="checkbox" id="selectAllBoxes" name="" value=""></th>
     <th>Id</th>
     <th>Seat_No</th>
     <th>Building</th>
     <th>Floor</th>
     <th>Wifi enabled</th>
     <th>Employee - Manager(Yes/No)</th>
     <th>Type</th>
     <th>Tag/Untag</th>
     <th>Edit</th>
   </thead>
   <tbody>
       <!-- pagination -->
       <?php
       $per_page=10;
       $seat_query_count="select * from seats";
       $find_count=mysqli_query($connection,$seat_query_count);
       $count=mysqli_num_rows($find_count);
       $count=ceil($count/$per_page);

             if(isset($_GET['page'])){
                $page=$_GET['page'];
              }else{
                $page="";
              }

             if($page==""||$page==1){
               $page_1=0;
             }else{
               $page_1=($page*$per_page)-$per_page;
             }

      ?>

     <?php
       $query="SELECT * from seats  LIMIT $page_1,$per_page";
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


echo "<tr>";
echo "<td><input type='checkbox' class='checkBoxes'   name='checkBoxArray[]' value='{$seat_id}'></td>";//here
echo "<td>{$seat_id}</td>";
echo "<td>{$seat_no}</td>";
echo "<td>{$seat_building}</td>";
echo "<td>{$seat_floor}</td>";
//echo "<td>{$seat_type}</td>";
echo "<td>{$wifi_enabled}</td>";
//echo "<td>{$employee}</td>";

           //condition to link employee with employee column in seat when deleted
           $emp_query= "SELECT * FROM employee" ;
           $num=0;
           $select_emp_query=mysqli_query($connection,$emp_query);
           if(!$select_emp_query){
             die("Query Failed".mysqli_error($connection));
           }
           while($row=mysqli_fetch_assoc($select_emp_query)){
             $emp_name=$row['emp_name'];
             //$manager=$row['manager'];
             if($emp_name===$employee){
               $num=$num+1;
             }
           }



           if($num>0){
             $m_query="select * from employee where emp_name='{$employee}'";
             $m_select_query=mysqli_query($connection,$m_query);
             $row=mysqli_fetch_assoc($m_select_query);
             $manager=$row['manager'];
             echo "<td>{$employee} - {$manager} </td>";

           }else{
             $employee='';
             echo "<td>{$employee}</td>";
            // echo "<td>{$seat_type}</td>";
            // echo "<td>open </td>";
           }




  echo "<td>{$seat_type}</td>";


//tagging and untagging condition
if(empty($employee)){
echo  "<td><a class='badge badge-success' href='tag.php?id={$seat_id}'>Tag</a></td>";
}else{
echo  "<td><a class='badge badge-danger' onClick=\"javascript: return confirm('Are you sure you want to untag');\"  href='untag.php?id={$seat_id}'>Untag</a></td>";
}


echo  "<td><a class='badge badge-info' href='seat.php?source=edit_seat&s_id={$seat_id}'>Edit</a></td>";
// echo  "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\"  href='emp.php?delete={$emp_id}'>Delete</a></td>";



        echo "</tr>" ;
       }
      ?>

   </tbody>
 </table>

</div>

</form>

<!-- pagination -->
<div class="">
    <ul  class="pagination">

      <?php
      for($i=1;$i<=$count;$i++){
           if($i==$page){
     echo  "<li class='page-item'><a class='page-link active_link'  href='index.php?page={$i}'>$i</a></li>";
           }else{
          echo  "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>$i</a></li>";
        }
      }
       ?>
    </ul>
</div>

<?php
// if(isset($_GET['delete'])){
//   $delete_emp_id=$_GET['delete'];
//   $query="delete from employee where emp_id={$delete_emp_id}";
//   $delete_query=mysqli_query($connection,$query);
//   header("Location:index.php");
// }
 ?>
