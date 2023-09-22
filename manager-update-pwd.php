<?php 
require 'db-connection.php';
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <script src="main.js"></script>
</head>
<body>
<br>
<br>

<div class="container">
<div class="row">
<!-- <div class="modal fade" role="dialog" id="add-guests"> -->
<div class="col-md-4">
<br>
<br>
<a href="manager-dashboard.php" class="bi bi-arrow-left-circle-fill text-secondary fs-1"></a>
</div>
<div class="col-md-4">
<!-- <div class="modal-dialog"> -->
<!-- <div class="modal-content"> -->
<br>
<br>
<div class="modal-body">
<div class="modal-header bg-dark text-light">
Change Your Password
</div>
<form action="manager-update-pwd.php" method="post" autocomplete="off" class="shadow p-4">
<div class="form-group">
<input type="password" name="recent-pwd" class="form-control" placeholder="Enter old password">
<br>
<input type="password" name="new-pwd" class="form-control" placeholder="Enter new password">
<br>
<input type="password" name="confirm-pwd" class="form-control" placeholder="Confirm new password">
<br>

<input type="submit" name="update-pwd" class="btn btn-primary w-100" value="Update Password">
</div>

</div>
<?php

if(isset($_POST["update-pwd"]))
{
    $sql = $db_connect->query("SELECT password FROM `manager`");
    if($sql !== false)
    {
        $row = mysqli_fetch_assoc($sql);
        $oldPass = $row["password"];
    }

    $recent_pwd = $_POST["recent-pwd"];
    $new_pwd = $_POST["new-pwd"];
    $confirm_new_pwd = $_POST["confirm-pwd"];
   if(__empty_change_pwd_inputs_2($recent_pwd, $new_pwd, $confirm_new_pwd) !== false)
   {
    echo "<div class='text-center alert alert-danger offset-0 w-100'>Please fill in all input fields</div>";

    exit();
   }

   if(__check_match_pwd_2($oldPass, $recent_pwd) !== false)
   {
    echo "<div class='text-center alert alert-danger offset-0 w-100'>The recent pasword did not match the database password</div>";

    exit();
   }if(__wrong_confirm_pwd_2($new_pwd, $confirm_new_pwd) !== false)
   {
    echo "<div class='text-center alert alert-danger offset-0 w-100'>The confirm password did not match the new password</div>";

    exit();
   }

   updatePwd_2($db_connect, $new_pwd);

   
}
?>
</form>
<br>
<br>

<div class="col-md-4"></div>
<!-- </div> -->
</div>
</div>
    
</body>
</html>