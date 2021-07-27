<?php    
    include "./conn.php";
    if (isset($_POST['newGuestForm'])) {
        echo ' <form action="" id="add-guest">
                <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" placeholder="Enter Fullname" id="fullname" required>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="number" class="form-control" placeholder="Enter Phone Number" id="phone" required>

                            </div>
                        </div>
                    </div>
                    <!-- SECOND ROWS  -->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="email">Email Address (optional)</label>
                                <input type="email" class="form-control" placeholder="Enter Email Address" id="email">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="gender">Select Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- THIRD ROWS  -->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="address">Enter Guest Address</label>
                                <input type="text" placeholder="Enter Address" class="form-control" id="address" required>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="dob">Enter Guest Date of Birth</label>
                                <input type="date" class="form-control" id="dob" placeholder="Enter Customer Date of Birth" required>
                            </div>
                        </div>
                    </div>

                    <!-- FOURTH ROWS  -->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="state">Guest State of Origin</label>
                                <select onchange="toggleLGA(this);" name="state" id="state" class="form-control" required>
                            <option value="" class="form-control" selected="selected">- Select -</option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="AkwaIbom">AkwaIbom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="FCT">FCT</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamafara</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                            <label class="control-label">LGA of Origin</label>
                            <select
                            name="lga"
                            id="lga"
                            class="form-control select-lga"
                            required
                            >
                            <option value="">Select State first</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="show-status text-center" id="show-add-guest-status"></div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="btn-add-guest">Add Guest</button>
                    </div>
            </form>';
    }
    

    // RETURN REGISTER USER ID 
    function userFullname($id)
            {
                global $conn;
                $fullnameQuery = $conn->query("SELECT * FROM users WHERE id=$id");
                if (!$fullnameQuery) {
                    die(error("FAILED TO GET USER DETAILS"));
                }else{
                    $row = mysqli_fetch_assoc($fullnameQuery);
                    return $row['fullname'];
                }
            }
    // END REGISTER USER ID 
    
    // ALL GUEST LIST 
    if (isset($_POST['showGuestList'])) {
        
        echo '<table class="table table-bordered">
        <thead>
            <tr>
                <th>S/N </th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Register By</th>
                <th>State</th>
                <th>LGA</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
           
        </thead>
        <tbody>';
   
  
        
        $gLQuery = $conn->query("SELECT * FROM guest ORDER BY status DESC"); 

        if (!$gLQuery) {
            die("Unable to get guest at the moment");
        }else{
            if (mysqli_num_rows($gLQuery) < 1 ) {
                echo success("NO GUEST AVAILABLE ON THE SYSTEM AT THE MOMEBT");
            }else{
                $sn = 1;
                while ($row = mysqli_fetch_assoc($gLQuery)) {
                    extract($row);
                    $address = ucwords($address);
                    $fullname = ($fullname);
                    $rFullname = userFullname($userid);
                    echo " <tr>
                    <td>$sn </td>
                    <td>$fullname</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$dob</td>
                    <td>$rFullname</td>
                    <td>$state</td>
                    <td>$lga</td>
                    <td>$address</td>
                    <td>$status</td>
                </tr>";
                $sn++;
                }

            }
        }
        echo ' </tbody>
        </table>';
        
    }