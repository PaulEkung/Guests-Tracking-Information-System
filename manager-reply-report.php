<?php require "db-connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body class="alert alert-light">
<br>
<br>
<div class="container">
<div class="row">
<div class="col-sm-4">
<br>
<a href="manager-dashboard.php" class="bi bi-arrow-left-circle fs-1 text-secondary offset-2"></a>
</div>
<div class="col-sm-4">
<br>
<div class="header alert alert-primary text-center">

<i class="bi bi-chat-right-dots-fill fs-4"></i> <span class="lead"> <b>Reply report from service manager </b></span>
</div>
<form action="manager-reply-report.php" method="post" class="shadow p-4 rounded-3">
<?php
if(isset($_POST["submit"]))
{
    $id = $_POST["id"];

} 
?>
<br>
<div class="form-checked-content">
<input type="hidden" name="id" value="<?php echo $id ?>">
<textarea type="text" name="msg" class="form-check-input-placeholder form-control textarea" id="message" cols="30" rows="10" placeholder="Write reply" autofocus></textarea>
</div>
<br>
<button type="submit" name="invoice" class="btn btn-primary w-25 offset-4"> <i class="bi bi-send-fill"></i> send</button>
</form>
<?php
 require 'function.php';
 $add_reports = __invoice__($db_connect);
?>
</div>
<div class="col-sm-4"></div>
</div>
</div>
    
</body>
</html>