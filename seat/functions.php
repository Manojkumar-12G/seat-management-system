<?php
function confirm($result){
  global $connection;
  if(!$result){
    die("Query Failed".mysqli_error($connection));
  }
}


 ?>
