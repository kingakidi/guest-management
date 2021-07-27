<?php include "./view/header.php"; 
      include "./view/navbar.php"; 
      ?>
<html>
  
  <body>
   

    <div class="container">
      <div class="row">
        <div class="col-md-3">
        <?php  
          include "./view/sidebar.php"; 
        ?>
        </div>
        <div class="col-md-9">
          <div class="show-main" id="show-main" >
          
            <?php
                // MANAGE ROUTES 
                if (isset($_GET['p'])) {
                  $p = $_GET['p'];
                  include "./view/$p.php";
                }
            ?>
           
          </div>
        </div>
      </div>
    </div>

  <?php
      include "./view/footer.php";
  ?>
   