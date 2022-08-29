<?php
//updating type
 //  $ue_query="SELECT * from employee where manager='yes' ";
 //  $uem_query=mysqli_query($connection,$ue_query);
 //  confirm($uem_query);
 //  while($u_query=mysqli_fetch_assoc($uem_query)){
 //    $u_manager=$u_query['emp_name'];
 //
 //    $uc_query="SELECT * from seats where employee='$u_manager' ";
 //    $ucs_query=mysqli_query($connection,$uc_query);
 //    confirm($ucs_query);
 //    //global $u_count;
 //    $u_count=mysqli_num_rows($ucs_query);
 //
 //    //echo $u_count;
 //    if($u_count>1){
 //       $type_query="SELECT seat_id from seats where employee='{$u_manager}' ";
 //       $typem_query=mysqli_query($connection,$type_query);
 //       confirm($typem_query);
 //       $t_count=mysqli_num_rows($typem_query);
 //       while($type_row=mysqli_fetch_assoc($typem_query)){
 //             $id=$type_row['seat_id'];
 //          //$c_manager=$type_row['employee'];
 //          //global $u_count;
 //          // echo "heloo manoj";
 //          // echo $t_count;
 //          if($t_count===1){
 //            // echo "  continuer  ";
 //            goto label1;
 //
 //          }
 //
 //          $update_seat="UPDATE seats SET seat_type='open' where seat_id= {$id}";
 //          $type_seat=mysqli_query($connection,$update_seat);
 //          confirm($type_seat);
 //          label1:
 //          $t_count=$t_count-1;
 //
 //       }
 //    }
 //  }
 //
 // ?>



//20-12-2021 adding new condition
if($manager==='yes'){

//   $ue_query="SELECT * from employee where manager='yes' ";
//   $uem_query=mysqli_query($connection,$ue_query);
//    confirm($uem_query);
//   while($u_query=mysqli_fetch_assoc($uem_query)){
//      $u_manager=$u_query['emp_name'];
//
//
//         $cm_query="select * from seats where employee='{$u_manager}' ";
//         $cm_query=mysqli_query($connection,$cm_query);
//         confirm($cm_query);
//        $ma_count=mysqli_num_rows($cm_query);
//        if($ma_count>1){
//            while($ma_row=mysqli_fetch_assoc($cm_query)){
//                  if($ma_count==1){
//                    echo "<td>cabin  </td>";
//                  }
//                  // }else{
//                  //   echo "<td>open  </td>";
//                  // }
//                  echo "<td>open  </td>";
//                  $ma_count=$ma_count-1;
//            }
//        }
//
// }
//echo "<td>{$seat_type} </td>";
}else{
 //echo "<td>{$seat_type}</td>";
 // echo "<td>open</td>";
  }
<?php
//21-12-2021 2:14pm
// if($ma_count>2){
//   echo "<td>open</td>";
// }else
//{
  // echo "<td>open</td>";
//}
 ?>








<?php
// if(isset($_POST['tag_emp'])){
//   $mtag_emp=$_POST['manager'];
// //  echo $tag_emp;
//   if(isset($_GET['id'])){
//     $seat_id=$_GET['id'];
//     $query="UPDATE seats SET employee='{$mtag_emp}' WHERE seat_id={$seat_id}";
//     $tag_emp_query=mysqli_query($connection,$query);
//     if(!$tag_emp_query){
//        die("Query Failed".mysqli_error($connection));
//     }
//   }
//   header("Location:index.php");
//}

?>

<!-- <script type="text/javascript">

function checkManager() {
        if (document.getElementById('cm').checked) {
           document.getElementById('cmanager').style.display = 'block';
        } else {
           document.getElementById('cmanager').style.display = 'none';
        }
    }

function checkEmployee() {
      if (document.getElementById('ce').checked) {
         document.getElementById('cemployee').style.display = 'block';
      } else {
         document.getElementById('cemployee').style.display = 'none';
      }
  }

</script> -->

<!-- <script type="text/javascript">
function checkManager() {
    if(document.getElementById("cm").checked){
      document.getElementById("cmanager").style.visibility='visible';
    }else {
      document.getElementById("cmanager").style.visibility='hidden';
    }

 }

 if(document.getElementById("myCheck").checked == true){   document.getElementById("checkbox").style.display='block';
 }else{
   document.getElementById("checkbox").style.display='none';
 }


</script> -->



<!-- radio buttons -->
            <!-- <input type="radio" name="data1" id="cm" onclick="checkManager()" value="">
            <label for="cm">Manager</label>

            <input type="radio" name="data1" id="ce" onclick="checkEmployee()" value="">
            <label for="ce">Employee</label> -->



<div class="" id="cmanager" ></div>


<div class="" id="cemployee"></div>
