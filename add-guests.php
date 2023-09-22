<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add guests</title>
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
<div class="col-md-2">
<br>
<br>
<a href="guests.php" class="bi bi-arrow-left-circle-fill text-secondary fs-1"></a>
</div>
<div class="col-lg-8">
<!-- <div class="modal-dialog"> -->
<!-- <div class="modal-content"> -->
<div class="modal-body">
<span class="bi bi-plus-circle fs-2 offset-11"></span>
<div class="modal-header bg-dark text-light">
Register New Guests
</div>
<form action="add-guests.php" method="post" autocomplete="off" class="shadow p-4">
<div class="form-group">
<div class="container">
<div class="row">
<div class="col-md-6">
<input type="text" name="name" class="form-control" placeholder="Guest name">
<br>
<br>
<input type="tel" name="phone" class="form-control" placeholder="Phone number">
<br>
<br>
<input type="text" name="address" class="form-control" placeholder="Home address">
<br>
<br>
<input type="text" name="whom-to-see" class="form-control" placeholder="Whom to see">
<br>
<br>
</div>
<div class="col-md-6">
<input type="text" name="email" class="form-control" placeholder="Email address">
<br>
<br>
<select type="text" name="sex" class="form-control form-select" placeholder="Gender">
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Others">Others</option>
 </select>
<br>
<br>
<input type="text" name="visit-purpose" class="form-control" placeholder="Purpose of visit">
<br>
<br>
<input type="text" name="arrival-time" class="form-control" placeholder="Arrival time">
<br>

<input type="submit" name="submit" class="btn btn-primary w-100" value="Save">

</div>
</div>
</div>
</div>
</form>
</div>
<br>
<?php
require "function.php";
$add_guests = addGuest($db_connect);
?>
</div>
<br>

<div class="col-md-2"></div>
<!-- </div> -->
</div>
</div>
    
</body>
</html>