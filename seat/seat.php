<?php include "seat_header.php"; ?>

    <div class="wrap">






            <!-- <div class="container-fluid seatContainer"> -->


                      <?php

        if(isset($_GET['source'])){
          $source=$_GET['source'];
        }else{
          $source='';
        }

        switch($source){
          case 'add_seat': include "add_seat.php";
          break;

          case 'edit_seat': include "edit_seat.php";
          break;

          default: include "view_all_seats.php";
          break;
        }

                      ?>
                    </div>

          <!-- </div> -->
            <!-- /.container-fluid -->

    <?php include "seat_footer.php" ;?>
