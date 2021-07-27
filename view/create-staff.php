<div class="container mt-4">
    <form  class="form staff-form" id="staff-form">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="fullname">Enter Fullname</label>
                    <input type="text" class="form-control text-capitalize" id="fullname" placeholder="Enter Fullname">
                </div>
            </div>
            <div class="col-sm">
                <label for="email">Enter Email Address </label>
                <input type="email" class="form-control email text-lowercase" id="email" placeholder="Enter Email Address">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="phone">Enter Phone Number</label>
                    <input type="number" class="form-control" placeholder="Enter Phone Number" id="phone">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="gender">Select Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="" selected disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="address">Enter Address</label>
                    <input type="text" class="form-control text-capitalize" placeholder="Enter Address" id="address">
                </div>
            </div>
        </div>
        <div class="show-status text-center" id="show-status"></div>
        <div class="form-group text-right">

            <button class="btn-staff btn btn-primary" id="btn-staff" type="submit"> Submit</button>
        </div>
    </form>
</div>