<!-- for selceted check box query -->
<?php //$value='manoj'; ?>
<?php
//if($value=="true"){

if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $emp_value_id){
      $bulk_options=$_POST['bulk_options'];
      switch($bulk_options){
        case 'delete':
                $d_query="DELETE from employee where emp_id={$emp_value_id}";
                $delete_query=mysqli_query($connection,$d_query);
                if(!$delete_query){
                  die("Query Failed".mysqli_error($connection));
                }
                // echo $bulk_options;
                // echo $emp_value_id;
                // echo "hello"."\n";
                break;
        // case 'edit':
        //         header("Location:emp.php?source=edit_emp&e_id={$emp_value_id}");
        case 'yes':
                $r_query="UPDATE employee SET manager='yes' where  emp_id={$emp_value_id}";
                $r_query=mysqli_query($connection,$r_query);
                if(!$r_query){
                  die("Query Failed".mysqli_error($connection));
                }
                break;
        case 'no':
                $r_query="UPDATE employee SET manager='no' where  emp_id={$emp_value_id}";
                $r_query=mysqli_query($connection,$r_query);
                if(!$r_query){
                  die("Query Failed".mysqli_error($connection));
                }
                break;

      }
    }
  }
//}else{

  //$value='man';
  //  echo $value;
//}
 ?>

<form class="" action="" method="post"   enctype="multipart/form-data">

<!-- for check boxes selecting externally -->
 <section>
   <div class="row">

        <div class="col-4 " >
            <select class="form-control" name="bulk_options" id="">
              <option value="">Select Options</option>
              <option value="delete">Delete</option>
              <option value="yes">Manager(YES)</option>
              <option value="no">Manager(No)</option>
              <!-- <option value="edit">Edit</option> -->
              <!-- <option value="clone">Clone</option> -->
            </select>
        </div>

        <div class="col-2">
           <input class="btn btn-success btn-block" type="submit" name="submit"   value="Apply">
        </div>
  </div>
</section>


<div class="table-responsive">
 <table class="table table-bordered table-hover">
   <thead>
     <th><input type="checkbox" id="selectAllBoxes" name="" value=""></th>
     <th>Id</th>
     <th>Name</th>
     <th>Manager</th>
     <th>Email</th>
     <th>Edit</th>
     <th>Delete</th>
   </thead>
   <tbody>
       <!-- pagination -->
       <?php
       $per_page=5;
       $emp_query_count="select * from employee";
       $find_count=mysqli_query($connection,$emp_query_count);
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
       $query="SELECT * from employee  LIMIT $page_1,$per_page";
       $emp_query=mysqli_query($connection,$query);
       if(!$emp_query){
         die("Query Failed".mysqli_error($connection));
       }
       while($row=mysqli_fetch_assoc($emp_query)){
         $emp_id=$row['emp_id'];
         $emp_name=$row['emp_name'];
         $manager=$row['manager'];
         $emp_email=$row['emp_email'];


echo "<tr>";
echo "<td><input type='checkbox' class='checkBoxes'   name='checkBoxArray[]' value='{$emp_id}'></td>";//here
echo "<td>{$emp_id}</td>";
echo "<td>{$emp_name}</td>";
echo "<td>{$manager}</td>";
echo "<td>{$emp_email}</td>";
echo  "<td><a class='badge badge-secondary' href='emp.php?source=edit_emp&e_id={$emp_id}'>Edit</a></td>";
echo  "<td><a class='badge badge-danger' onClick=\"javascript: return confirm('Are you sure you want to delete');\"  href='emp.php?delete={$emp_id}'>Delete</a></td>";



        echo "</tr>" ;
       }
      ?>

   </tbody>
 </table>

</div>

</form>


<div class="">


    <ul  class="pager">

      <?php
      for($i=1;$i<=$count;$i++){
           if($i==$page){
     echo  "<li><a class='active_link'  href='index.php?page={$i}'>$i</a></li>";
           }else{
          echo  "<li><a href='index.php?page={$i}'>$i</a></li>";
        }
      }
       ?>
    </ul>

</div>








<?php
if(isset($_GET['delete'])){
  $delete_emp_id=$_GET['delete'];
  $query="delete from employee where emp_id={$delete_emp_id}";
  $delete_query=mysqli_query($connection,$query);
  header("Location:index.php");
}
 ?>
 <!-- <script>
 function myFunction() {
  let  text="Are you sure want to apply";
   if (confirm(text) == true) {
       <?php //$value="true"; ?>
     } else {
       console.log("hii");
       <?php //echo json_encode('hello manoj where are you'); ;?>;
     }
}
 </script> -->
