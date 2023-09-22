<?php require_once "db-connection.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Page</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
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
<?php 
if(isset($_POST["submit"]))
{
    $update_id = $_POST['id'];
    $result = $db_connect->query("SELECT * FROM `hosts` WHERE `hosts`.host_id = '$update_id'");
    if($result == true)
    {
        $row = mysqli_fetch_assoc($result);
        $host_id = $row["host_id"];
        $host_name = $row["name"];
        $host_phone = $row["phone"];
        $host_email = $row["email"];
       

    }
}
echo "
<a href='hosts.php' class='bi bi-arrow-left-circle-fill text-secondary fs-1'></a>
";
?>
</div>
<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<span class="bi bi-pencil-square fs-2 offset-11"></span>
<div class="modal-header bg-dark text-light">
Update Hosts Information 
</div>
<form action="update-host-info.php" method="post" autocomplete="off" class="shadow p-4">
<div class="form-group">
<input type="text" name="id" class="form-control" value="<?php echo $host_id ?>" placeholder="Host Id">
<br>
<br>
<input type="text" name="name" class="form-control" value="<?php echo $host_name ?>" placeholder="Host Name">
<br>
<br>
<input type="email" name="email" class="form-control" value="<?php echo $host_email ?>" placeholder="Email Address">
<br>
<br>
<input type="number" name="phone" class="form-control" value="<?php echo $host_phone ?>" placeholder="Phone Number">
<br>
<br>
<input type="submit" name="update" class="btn btn-secondary w-50">
<br>
<br>
</div>

</form>
</div>
<div class="col-md-4"></div>
</div>
</div>
<br>

<?php
 if(isset($_POST["update"]))
 {
     $update_id = $_POST['id'];
     $id = $_POST["id"];
     $name = $_POST["name"];
     $email = $_POST["email"];
     $phone = $_POST["phone"];
    

         $result = mysqli_query($db_connect, "UPDATE `hosts` SET `host_id` ='$id', `name` ='$name', `email` ='$email', `phone` ='$phone' WHERE  host_id = '$update_id'");
         if($result === true)
         {
            header("Location: hosts.php?Update+successfull");
         }
     }

?>
</div>
<br>

<div class="col-md-2"></div>
<!-- </div> -->
</div>
</div>
    
</body>
</html>