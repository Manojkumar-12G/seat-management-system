<?php include "seat_header.php" ?>


  <section style="background: azure;">
    <div class="container-fluid text-center first">
      <h1>Welcome to Seat Module</h1>
    </div>
    <hr>
  </section>



  <div class="container-fluid sbutton">
    <a href="../index.php" class="btn  btn-lg bhome">Home Page</a>
    <a href="../employee/index.php" class="btn btn-dark btn-lg ">Employee Module</a>
    <a href="seat.php?source=add_seat" class="btn btn-primary btn-lg ml-2">Add Seat</a>
  </div>

<hr>
<?php include "view_all_seats.php" ?>




<?php include "seat_footer.php" ?>
