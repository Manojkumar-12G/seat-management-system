<?php include "seat_header.php" ?>

<?php
if(isset($_GET['id'])){
  $seat_id=$_GET['id'];
  $query="UPDATE seats SET employee='' WHERE seat_id={$seat_id}";
  $untag_emp_query=mysqli_query($connection,$query);
  if(!$untag_emp_query){
     die("Query Failed".mysqli_error($connection));
  }
  header("Location:index.php");
}

 ?>



<?php include "seat_footer.php" ?>
