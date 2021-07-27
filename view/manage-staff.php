<div class="container mt-4">
    <table class="table-bordered table">
        <tr>
            <th>S/N</th>
            <th>Fullname</th>
            <th>Email </th>
            <th>Phone</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php
            // GET ALL STAFFS 
            $staffQuery = $conn->query("SELECT * FROM users WHERE usertype= 'staff'");
            if (!$staffQuery) {
                die(error(" FAILED TO RETRIEVE STAFFS DETAILS "));
            }else{
                if (mysqli_num_rows($staffQuery) < 1) {
                   echo error("NO STAFF ACCOUNT ON THE SYSTEM");
                }else{
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($staffQuery)) {
                        extract($row);
                        $fullname = ucwords($fullname);
                        $gender = ucwords($gender);
                        $address = ucwords($gender);
                       
                        echo "<tr>
                                <td>$sn</td>
                                <td>$fullname</td>
                                <td>$email </td>
                                <td>$phone</td>
                                <td>$dob</td>
                                <td>$gender</td>
                                <td>$address</td>
                                <td >
                                    <select name='staff-action' id='staff-action' class=''>
                                        <option value='' selected> Select Action</option>
                                        <option value='disabled'>Disabled Account</option>
                                        <option value='admin'>Make Admin</option>
                                        <option value='delete'>Delete</option>
                                    </select>
                                </td>
                            </tr>";
                            $sn++;
                    }
                }
            }
        ?>
    </table>
</div>

