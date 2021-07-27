<?php
    include "./functions.php";
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Method Not Allowed', true, 405);
        echo "GET method requests are not accepted for this resource";
        header("location: ../");
    }
    if (isset($_POST['loginRequest'])) {
        //    EXTRACT AND CLEAN 
        extract($_POST);
        $username = clean($username);
        $password = clean($password);
        if (!empty($username) AND !empty($password)) {
            // BRINGS USER DATA FROM DATA BASE 
            $uCQuery = $conn->query("SELECT * FROM users WHERE email = '$username'");
            if (!$uCQuery) {
                die(error("Unable to verify user account"));
            }else{
                if (mysqli_num_rows($uCQuery) < 1) {
                    echo error("Email Does not exit on our system");
                }else{
                    // COMPARE THE PASSWORD 
                    $row = mysqli_fetch_assoc($uCQuery);
                    $db_password = $row['password'];
                    
                    if (password_verify($password, $db_password)) {
                        // SET THE SESSIONS 
                        $_SESSION['userType'] = $row['usertype'];
                        $_SESSION['userid'] = $row['id'];
                        $_SESSION['fullname'] = $row['fullname'];

                        echo success("Login Successfully");
                        
                    }else{
                        echo error("INVALID PASSWORD");
                    }
                }
            }
        }else{
            echo error("All field(s) required");
        }
    }
    if (isset($_POST['staffRegister'])) {
        extract($_POST);
        $fullname = clean($fullname);
        $email = clean($email);
        $dob = clean($dob);
        $phone = clean($email);
        $address = clean($address);
        $gender = clean($gender);
        // CHECK IF EMAIL OR PHONE NUMBER ALREADY EXIST 
        $cUQuery = $conn->query("SELECT * FROM users WHERE email = '$email' OR phone = '$phone'");
        if (!$cUQuery) {
            die(error("UNABLE TO VERIFY STAFF DETAILS ".$conn->error));
        }else{
            if (mysqli_num_rows($cUQuery) > 0 ) {
                echo error("Staff of the same details already exist");
            }else{
                // INSERT USER INTO THE DB 
                $iQuery = $conn->query("INSERT INTO `users`(`email`, `fullname`, `gender`, `dob`, `phone`, `address`, `usertype`) 
                VALUES ('$email', '$fullname', '$gender', '$dob', '$phone', '$address', 'staff')");
                if (!$iQuery) {
                    die(error(" UNABLE TO CREATE STAFF ACCOUNT AT THE MOMENT "));
                }else{
                    echo success("Staff Account Created Successfully");
                }
            }
        }

    }

    if (isset($_POST['activateForm'])) {
        extract($_POST);
        $email = clean($email);
        $dob = clean($dob);
      
        //  GET THE DETAILS FROM DB 
        $cUQuery = $conn->query("SELECT * FROM `users` WHERE email = '$email' AND dob = '$dob'");
        if (!$cUQuery) {
            die(" UNABLE TO VERIFY ACCOUNT");
        }else{
            if (mysqli_num_rows($cUQuery) > 0) {
                echo '<form action="" class="add-password" id="add-password">
                        <div class="form-group">
                        <label for="password">Enter Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" id="password" required>
                    </div>
                    <div class="text-center" id="show-password-status"></div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                    </div> 
                    </form>';
            }else{
                echo "Accoount not found";
            }
        }
    }

    // ADD PASSWORD 
    if (isset($_POST['addPasswordRequest'])) {
       extract($_POST);
       $email = clean($email);
       $password = password_hash(mysqli_real_escape_string($conn, $password), PASSWORD_DEFAULT);

       $pQuery = $conn->query("UPDATE users SET password = '$password' WHERE email = '$email'");
       
        if (!$pQuery) {
            die("UNABLE TO SET PASSWORD");
        }else{
            echo success("Account Activated Successfully <a href='index.php'>Click here to login</a>");
        }
    }

    // ADD GUEST 
    if (isset($_POST['addGuestDetails'])) {
        extract($_POST);
        //     [fullname] => kiakdkjdj
        // [phone] => 98098989
        // [gender] => male
        // [dob] => 0887-09-09
        // [state] => Gombe
        // [lga] => Nafada
        // [address] => how are you 
        // [addGuestDetails] => true
            

        $fullname = clean($fullname);
        $phone = clean($phone);
        $gender = clean($phone);
        $dob = clean($dob);
        $state = clean($state);
        $lga = clean($lga);
        $address = clean($address);
        $email = clean($email);

        // CHECK FOR EMPTY 
        if (!empty($fullname) AND !empty($phone) AND !empty($gender) AND !empty($dob) AND !empty($state) AND !empty($lga) AND !empty($address)) {
           $cGQuery = $conn->query("SELECT * FROM `guest` WHERE phone = '$phone' OR email ='$email'");
           if (!$cGQuery) {
               die(error("Unable to verify guest details"));
           }else{
               // CHECK IF PHONE NUMBER ALREADY EXIST 
               if (mysqli_num_rows($cGQuery) > 0) {
                   echo error("Guest with same details already exist Check mail or Phone number");
               }else{
                   $lgUserid = $_SESSION['userid'];
                    // ADD IF NOT EXIST
                    $aGQuery = $conn->query("INSERT INTO `guest`( `email`, `phone`, `fullname`, `gender`, `dob`, `state`, `lga`, `address`, `userid`) 
                    VALUES ('$email', '$phone', '$fullname', '$gender', '$dob', '$state', '$lga', '$address', $lgUserid)");

                    if (!$aGQuery) {
                        die(error("Unable to register guest at the moment "));
                    }else{
                        echo success("Guest Registered Successfully");
                    }
               }
               
           }
        }else{
            echo error("All fields required");
        }
        
         

    }
    
    if (isset($_POST['submitRequest'])) {
        extract($_POST);
        $phone = clean($phone);

        $request = clean($requestMsg);
        print_r($_POST);
    }
    ?>
   

   