<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Hosts</title>
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
<a href="hosts.php" class="bi bi-arrow-left-circle-fill text-secondary fs-1"></a>
</div>
<div class="col-md-4">
<!-- <div class="modal-dialog"> -->
<!-- <div class="modal-content"> -->
<div class="modal-body">
<span class="bi bi-plus-circle fs-2 offset-11"></span>
<div class="modal-header bg-dark text-light">
Add New Hosts
</div>
<form action="add-hosts.php" method="post" autocomplete="off" class="shadow p-4">
<div class="form-group">
<input type="text" name="hostId" class="form-control" placeholder="Host Id">
<br>
<input type="text" name="hostName" class="form-control" placeholder="Host's Name">
<br>
<input type="email" name="email" class="form-control" placeholder="Host Email">
<br>
<input type="number" name="phone" class="form-control" placeholder="Phone Number">
<br>

<input type="submit" name="add-host" class="btn btn-primary w-100" value="Save">
</div>

</div>
<?php
require "function.php";
$add_staffs = __add_hosts_($db_connect);
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