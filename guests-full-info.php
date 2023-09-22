<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Full info</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body>
<!-- <br> -->
<?php
require "db-connection.php";
if(isset($_POST["submit"]))
{
     $id = $_POST["id"];

    $sql = "SELECT * FROM `guests` WHERE `guests`.id ='$id'";
    $result = mysqli_query($db_connect, $sql);
    if($result == true){

        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $sex = $row['sex'];
        $address = $row['address'];
        $visit_purpose = $row['visit_purpose'];
        $whom_to_see = $row['whom_to_see'];
        $arrival_time = $row['arrival_time'];
        $departure_time = $row['departure_time'];
        $date = $row['date'];
       if($departure_time == "")
       {
           $departure_time = "Unknown " ."&nbsp;&nbsp;&nbsp;". " <a href='set-dept-time.php?id=$id' class='bi bi-plus-circle text-dark fs-2'></a> ";
       }else{
           $departure_time = $row["departure_time"];
       }



    echo "<table class='text-center table-bordered alert alert-secondary table'>" . //'table-striped' class can also be added.

    "<thead>" . 
    "<br>" .
    " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='guests.php' class='bi bi-arrow-left-circle offset-0 text-secondary fs-1'></a> " .
    "<span class='offset-4 position-absolute'>Registered On : $date</span>".
    "<form action='update-guest-info.php' method='post' class=''>
    <input type='hidden' name='id' value=' ".$row['id']." '>
    &nbsp;<input type='submit' name='update' value='Update record' 
    class='btn btn-warning fw-semibold offset-10' style='margin-top:'>
    </form>" . "<br><br>" .
    "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Name</th>" .
    "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Email</th>" .
    "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Phone</th>" .
    "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Sex</th>" .
    "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Address</th>" .
    "</thead>" .
    "<tbody>" .
    "<tr>" .
    "<td class='p-3 bg-light' style='border: 2px solid white'>" .
    "" . $name . "".
    "</td>" .
    "<td class='p-3 bg-light' style='border: 2px solid white'>" .
    "" . $email . "" .
    "</td>" .
    "<td class='bg-light p-3' style='border: 2px solid white'>" .
    "". $phone. "" .
    "</td>" .
    "<td class=' p-3 bg-light' style='border: 2px solid white'>" .
    "" . $sex . "" .
    "</td>" .
    "<td class='p-3 bg-light' style='border: 2px solid white'>"  .
    "" . $address .
    "</td>" .
    "</tr>" .
    "</tbody>" .
    "<thead>" .
    "<tbody>" .
    "<th class='p-2 alert alert-secondary' style='border: 2px solid white'>Visiting Purpose</th>" .
    "<th class='p-2  alert alert-secondary' style='border: 2px solid white'>Whom to see</th>" .
    "<th class='p-2  alert alert-secondary' style='border: 2px solid white'>Arrival Time <span class='fw-lighter'></span></th>" .
    "<th class='p-2 alert alert-secondary' style='border: 2px solid white'>Departure Time</th>" .
    "<th class='bg-dark p-3 bg-gradient text-warning' style='border: 4px solid white'>Actions</th>" .
    "</thead>" .
    "<tr>" .
    "<td class='p-5 bg-light' style='border: 4px solid white'>" .
    "" . $visit_purpose . "" .
    "</td>" .
    "<td class='p-5 w-25 bg-light' style='border: 4px solid white'>" .
    "" . $whom_to_see . "" .
    "</td>" .
    "<td class=' p-5 bg-light' style='border: 4px solid white'>" .
    "" . $arrival_time. "".
    "</td>" .
    "<td class='p-5 bg-light' style='border: 4px solid white'>" .
    "<b class='text-danger'>" . $departure_time . "</b>" .

    "</td>" .
    "<td class='bg-light p-4' style='border: 4px solid white'>" .
    "<a href='#delete' data-bs-toggle='modal' class='bi bi-trash-fill text-danger fs-3'></a>" .
    "</td>" .
    "</tr>" .
    "</tbody>" .

    "</table>"; 

    
    }
   
  }
  elseif(isset($_GET["id"]))
  {
      $id= $_GET["id"];
      $sql = "SELECT * FROM `guests` WHERE `guests`.id ='$id'";
      $result = mysqli_query($db_connect, $sql);
      if($result == true){
  
          $row = mysqli_fetch_assoc($result);
  
          $id = $row['id'];
          $name = $row['name'];
          $email = $row['email'];
          $phone = $row['phone'];
          $sex = $row['sex'];
          $address = $row['address'];
          $visit_purpose = $row['visit_purpose'];
          $whom_to_see = $row['whom_to_see'];
          $arrival_time = $row['arrival_time'];
          $departure_time = $row['departure_time'];
          $date = $row['date'];
         if($departure_time == "")
         {
             $departure_time = "Unknown " ."&nbsp;&nbsp;&nbsp;". " <a href='set-dept-time.php?id=$id' class='bi bi-plus-circle text-dark fs-2'></a> ";
         }else{
             $departure_time = $row["departure_time"];
         }
  
  
  
      echo "<table class='text-center table-bordered alert alert-secondary table'>" . //'table-striped' class can also be added.
  
      "<thead>" . 
      "<br>" .
      " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='guests.php' class='bi bi-arrow-left-circle offset-0 text-secondary fs-1'></a> " .
      "<span class='offset-4 position-absolute'>Registered On : $date</span>".
      "<form action='update-guest-info.php' method='post' class='offset-0'>
      <input type='hidden' name='id' value=' ".$row['id']." '>
      &nbsp;<input type='submit' name='update' value='Update record' 
      class='btn btn-warning fw-semibold offset-10' style='margin-top:'>
      </form>" . "<br><br>" .
      "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Name</th>" .
      "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Email</th>" .
      "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Phone</th>" .
      "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Sex</th>" .
      "<th class='alert alert-secondary p-3' style='border: 2px solid white'>Address</th>" .
      "</thead>" .
      "<tbody>" .
      "<tr>" .
      "<td class='p-3 bg-light' style='border: 2px solid white'>" .
      "" . $name . "".
      "</td>" .
      "<td class='p-3 bg-light' style='border: 2px solid white'>" .
      "" . $email . "" .
      "</td>" .
      "<td class='bg-light p-3' style='border: 2px solid white'>" .
      "". $phone. "" .
      "</td>" .
      "<td class=' p-3 bg-light' style='border: 2px solid white'>" .
      "" . $sex . "" .
      "</td>" .
      "<td class='p-3 bg-light' style='border: 2px solid white'>"  .
      "" . $address .
      "</td>" .
      "</tr>" .
      "</tbody>" .
      "<thead>" .
      "<tbody>" .
      "<th class='p-2 alert alert-secondary' style='border: 2px solid white'>Visiting Purpose</th>" .
      "<th class='p-2  alert alert-secondary' style='border: 2px solid white'>Whom to see</th>" .
      "<th class='p-2  alert alert-secondary' style='border: 2px solid white'>Arrival Time <span class='fw-lighter'></span></th>" .
      "<th class='p-2 alert alert-secondary' style='border: 2px solid white'>Departure Time</th>" .
      "<th class='bg-dark p-3 bg-gradient text-warning' style='border: 4px solid white'>Actions</th>" .
      "</thead>" .
      "<tr>" .
      "<td class='p-5 bg-light' style='border: 4px solid white'>" .
      "" . $visit_purpose . "" .
      "</td>" .
      "<td class='p-5 w-25 bg-light' style='border: 4px solid white'>" .
      "" . $whom_to_see . "" .
      "</td>" .
      "<td class=' p-5 bg-light' style='border: 4px solid white'>" .
      "" . $arrival_time. "".
      "</td>" .
      "<td class='p-5 bg-light' style='border: 4px solid white'>" .
      "<b class='text-danger'>" . $departure_time . "</b>" .
  
      "</td>" .
      "<td class='bg-light p-4' style='border: 4px solid white'>" .
      "<a href='#delete' data-bs-toggle='modal' class='bi bi-trash-fill text-danger fs-3'></a>" .
      "</td>" .
      "</tr>" .
      "</tbody>" .
  
      "</table>"; 
  
      
      }
  }


?>

<div class="container">
<div class="row">
<div class="modal fade" role="dialog" id="delete">
<div class="container">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<form action="set-dept-time.php" method="post" autocomplete="off">
<div class="form-group shadow p-5 bg-light">
<p class="fs-6 lead fw-bold">Are you sure to delete this record?</p>
<a href="#" class="bi bi-x-circle fs-2 offset-2 text-danger" data-bs-dismiss="modal"></a>
<?php 

print("<a href='delete-guests-info.php?delete_id=$id' class='bi bi-check-circle fs-2 text-success offset-4'></a>");

?>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="col-sm-4"></div>
</div>
</div>
</div>
</div>
</div>


<script src="bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="bootstrap-5.1.3/dist/js/bootstrap.min.js"></script> 
</body>
</html>