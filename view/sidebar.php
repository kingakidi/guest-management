<div class="list-group list-group-flush mt-3" id="navbarNavDropdown">
            <a href="index.php" class="list-group-item active">
              <i class="fas fa-tachometer-alt"></i>Dashboard
            </a>
            
            <a
              href="?p=create-guest"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Guest
            </a>
           <?php
            if (isset($_SESSION['usertype']) === "admin") {
              echo ' <a
              href="?p=create-staff"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Create Staff
            </a>
            <a
              href="?p=manage-staff"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Manage Staff
            </a>';
            }
           ?>
            <a
              href="./logout.php"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Logout
            </a>
          
           
          </div>