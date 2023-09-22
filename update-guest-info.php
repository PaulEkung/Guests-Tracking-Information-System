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
if(isset($_POST["update"]))
{
    $id = $_POST['id'];
    $result = $db_connect->query("SELECT * FROM `guests` WHERE guests.id = '$id'");
    if($result == true)
    {
        $row = mysqli_fetch_assoc($result);
        $guest_name = $row["name"];
        $guest_email = $row["email"];
        $guest_phone = $row["phone"];
        $guest_sex = $row["sex"];
        $guest_address = $row["address"];
        $visit_purpose = $row["visit_purpose"];
        $whom_to_see = $row["whom_to_see"];
        $arrival_time = $row["arrival_time"];
        $departure_time = $row["departure_time"];

    }
}
echo "
<a href='guests-full-info.php?id=$id' class='bi bi-arrow-left-circle-fill text-secondary fs-1'></a>
";
?>
</div>
<div class="col-lg-8">
<!-- <div class="modal-dialog"> -->
<!-- <div class="modal-content"> -->
<div class="modal-body">
<span class="bi bi-pencil-square fs-2 offset-11"></span>
<div class="modal-header bg-dark text-light">
Update Guest Information 
</div>
<form action="update-guest-info.php" method="post" autocomplete="off" class="shadow p-4">
<div class="form-group">
<div class="container">
<div class="row">
<div class="col-md-6">
<input type="text" name="name" class="form-control" value="<?php echo $guest_name ?>" placeholder="Guest name">
<br>
<br>
<input type="tel" name="phone" class="form-control" value="<?php echo $guest_phone ?>" placeholder="Phone number">
<br>
<br>
<input type="text" name="address" class="form-control" value="<?php echo $guest_address ?>" placeholder="Home address">
<br>
<br>
<input type="text" name="whom-to-see" class="form-control" value="<?php echo $whom_to_see ?>" placeholder="Whom to see">
<br>
<br>
<input type="text" name="dept-time" class="form-control" value="<?php echo $departure_time ?>" placeholder="Departure time">
<br>
<br>
</div>
<!-- Next row -->
<div class="col-md-6">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="text" name="email" class="form-control" value="<?php echo $guest_email?>" placeholder="Email address">
<br>
<br>
<select type="text" name="sex" class="form-control form-select" value="<?php echo $guest_sex ?>" placeholder="Gender">
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Others">Others</option>
 </select>
<br>
<br>
<input type="text" name="visit-purpose" value="<?php echo $visit_purpose ?>" class="form-control" placeholder="Purpose of visit">
<br>
<br>
<input type="text" name="arrival-time" value="<?php echo $arrival_time ?>" class="form-control" placeholder="Arrival time">
<br>
<br>
<input type="submit" name="change" class="btn btn-primary w-100 offset-0" value="Save">
</div>
</div>
</div>
</div>
</form>
</div>
<br>
<?php
 if(isset($_POST["change"]))
 {
     $update_id = $_POST["id"];
     $guest_name = $_POST["name"];
     $guest_email = $_POST["email"];
     $guest_phone = $_POST["phone"];
     $guest_sex = $_POST["sex"];
     $guest_address = $_POST["address"];
     $visit_purpose = $_POST["visit-purpose"];
     $whom_to_see = $_POST["whom-to-see"];
     $arrival_time = $_POST["arrival-time"];
     $departure_time = $_POST["dept-time"];

         $result = mysqli_query($db_connect, "UPDATE `guests` SET `name` ='$guest_name', `email` ='$guest_email', `phone` ='$guest_phone', `sex` ='$guest_sex', `address` ='$guest_address', `visit_purpose` ='$visit_purpose', `whom_to_see` ='$whom_to_see', `arrival_time` = '$arrival_time', departure_time ='$departure_time' WHERE `guests`.`id` = '$update_id'");
         if($result === true)
         {
            header("Location: guests-full-info.php?id=$update_id");
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