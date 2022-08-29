<?php include "includes/emp_header.php"; ?>

    <div class="wrap">


        <!-- Navigation -->
   <?php //include "includes/emp_navigation.php" ;?>



            <!-- <div class="container-fluid " style="margin-top:50px;"> -->


                      <?php

        if(isset($_GET['source'])){
          $source=$_GET['source'];
        }else{
          $source='';
        }

        switch($source){
          case 'add_emp': include "includes/add_emp.php";
          break;

          case 'edit_emp': include "includes/edit_emp.php";
          break;

          default: include "includes/view_all_emp.php";
          break;
        }

                      ?>
                    </div>

          <!-- </div> -->
            <!-- /.container-fluid -->

    <?php include "includes/emp_footer.php" ;?>
