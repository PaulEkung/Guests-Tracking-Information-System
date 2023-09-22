<?php require "db-connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
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
<a href="dashboard.php" class="bi bi-arrow-left-circle fs-1 text-secondary offset-2"></a>
</div>
<div class="col-sm-4">
<br>
<div class="header alert alert-primary text-center">
<?php
 if(isset($_POST["submit"]))
{
    $s_id = $_POST["id"];
    $query = "SELECT * FROM `guests` WHERE id = '$s_id'";
    $result = mysqli_query($db_connect, $query);
    if($result == true)
    {
        $row = mysqli_fetch_assoc($result);
        $r_email = $row["email"];
        
    }
}
 ?>
<i class="bi bi-envelope-fill fs-4"></i> <span class="lead">Send an email to your guest <b><?php echo $row['email'] ?> </b></span>
</div>
<form action="contact-guests.php" method="post" class="shadow p-4 rounded-3">

<br>
<div class="form-checked-content">
<input type="hidden" name="id" value="<?php echo $s_id ?>">
<input type="email" name="email" id="email"  value="<?php echo $row['email'] ?>" class="form-control">
<br>
<input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" autofocus>
<br>
<textarea name="message" class="form-check-input-placeholder form-control textarea" id="message" cols="30" rows="10" placeholder="Message" autofocus></textarea>
</div>
<br>
<button type="submit" name="send" class="btn btn-primary w-25 offset-4"> <i class="bi bi-send-fill"></i> send</button>
</form>
</div>
<div class="col-sm-4"></div>
</div>
</div>
<?php
 require 'function.php';
 $contact = contact($db_connect);
 

?>
    
</body>
</html>