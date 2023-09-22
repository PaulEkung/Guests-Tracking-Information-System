<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hosts</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <script src="main.js"></script>
   
</head>
<body>
<main id="swup" class="transition-fade">
<nav class="navbar navbar-expand bg-secondary text-light fixed-top">
&nbsp;&nbsp;&nbsp;
<a href="dashboard.php" class="bi bi-arrow-left-circle-fill text-light fs-1"></a>

</nav>
<br>
<br>
<br>
<section class="recent-guests bg-light">
<div class="container p-3">
<span class="fs-1">Total Registered Hosts</span>
<span class="bi bi-plus-circle-fill fs-2 offset-6">
<a href="add-hosts.php" class="fs-4 text-decoration-none">Add Host</a>
</span>

</div>
<br>
        <table class='table table-bordered p-4 table-condensed table-lg text-center table-responsive alert alert-secondary'>
        <tr>
        <th class="p-3">Host Id</th>
        <th class="p-3">Host Name</th>
        <th class="p-3">Email Address</th>
        <th class="p-3">Phone Number</th>
        <th class="p-3">Registered Date</th>
        <th class="p-3">Action</th>
        </tr>
        
       <?php
        require "function.php";
       $guests = hosts($db_connect);
       ?>
        
        </table>


</section>
<!-- <br>
<form action="guests-full-info.php" autocomplete="off" class="fixed-bottom mb-3 position-absolute">
<div class="container">
<div class="row">
<div class="col-sm-8 offset-0 m-0">
<input type="search" class="form-control w-50" placeholder="Enter guest ID to search guest" name="id">

</div>
<div class="col-sm-3">
<button type="submit" name="submit" class="offset-0 btn btn" style="margin-left:-28.7rem; margin-top:-1.2rem"><i class="bi bi-arrow-right-circle-fill fs-1"></i></button>

</div>
<div class="col-sm-2"></div>
</div>
</div>

</form> -->

<script src="bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="bootstrap-5.1.3/dist/js/bootstrap.min.js"></script>
</main>
</body>
</html>