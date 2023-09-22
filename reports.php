<?php
 require_once "db-connection.php";
 require "function.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">

</head>
<body>
    <section>
    <nav class="bg-secondary p-3">
    <a href="dashboard.php" class="bi bi-arrow-left-circle text-light fs-1"></a>
    <span class="container text-center text-light fs-1 offset-4">
    
    Manage Your Reports
    </span>
    
    </nav>
    </section>
    <br>
    <span class="p-3 fs-1">Total Reports : <?php echo __count_reports__($db_connect); ?>
<a href="add-reports.php" class="fs-4 text-decoration-none">
<span class="bi bi-plus-circle-fill fs-2 offset-6"> Add Reports
</a>
    
     </span>
    <br>
    <br>
    <table class='table table-bordered p-5 table-condensed table-lg text-center table-responsive alert alert-secondary'>
        <tr>
        <th class="p-4">Report Id</th>
        <th class="p-4">Message</th>
        <th class="p-4">Date</th>
        <th class="p-4 bg-secondary text-light">Action</th>
        </tr>
        <?php 
        
        $__reports__ = __reports__($db_connect);
        ?>
        </table>
</body>
</html>