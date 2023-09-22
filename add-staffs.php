<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Staffs</title>
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
<a href="staffs.php" class="bi bi-arrow-left-circle-fill text-secondary fs-1"></a>
</div>
<div class="col-md-4">
<!-- <div class="modal-dialog"> -->
<!-- <div class="modal-content"> -->
<div class="modal-body">
<span class="bi bi-plus-circle fs-2 offset-11"></span>
<div class="modal-header bg-dark text-light">
Register New Staffs
</div>
<form action="add-staffs.php" method="post" autocomplete="off" class="shadow p-4">
<div class="form-group">
<input type="text" name="staffId" class="form-control" placeholder="Staff Id">
<br>
<input type="text" name="staffName" class="form-control" placeholder="Staff's Name">
<br>
<select type="text" name="gender" class="form-control form-select" placeholder="Gender">
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Others">Others</option>
 </select>
<br>
<input type="text" name="typeOFEmployment" class="form-control" placeholder="Type Of Employment">
<br>

<input type="submit" name="add" class="btn btn-primary w-100" value="Save">
</div>

</div>
<?php
require "function.php";
$add_staffs = __add_staffs_($db_connect);
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