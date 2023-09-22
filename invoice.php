<?php
 require "db-connection.php";
 require "function.php";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>invoice</title>
<link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <script defer src="main.js"></script>
</head>
<body>
<section>
<nav class="bg-dark p-3">
<a href="dashboard.php" class="bi bi-arrow-left-circle fs-2 text-light"></a>

</nav>
</section>
<br>
<?php echo __get_invoices__($db_connect); ?>
</body>
</html>