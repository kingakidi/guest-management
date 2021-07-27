<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Account</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class="container login-main">
      <div class="login-container p-3">
        <form action="" class="form-login" id="verify-form">
            <h4 class="text-center text-primary">Activate Account</h4>
            <hr>
            
                <div class="form-group">
                    <label for="email">Enter Email Address</label>
                    <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter Email Address"
                    required
                    />
                </div>
                <div class="form-group">
                    <label for="dob">Enter Date of Birth</label>
                    <input type="date" class="form-control" id="dob" required>
                </div>
                <div class="show-status text-center" id="show-status"></div>
                <div class="form-group text-right">
                    <button class="btn btn-primary" id="btn-verify" >Verify</button>
                </div>
                </form>
            <div class="verify-container" id="verify-container"> </div>
           

        
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="./js/functions.js"></script>
    <script src="./js/activate.js"></script>
</body>
</html>