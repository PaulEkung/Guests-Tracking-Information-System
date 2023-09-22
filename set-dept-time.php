<?php require_once "db-connection.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add departure</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body class="bg-secondary">

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<br>
<br>
<br>
<br>
<br>
<div class="container">
<div class="row">
<div class="col-sm-4">
<?php echo "
<a href='guests-full-info.php?id=$id' class='bi bi-arrow-left-circle text-light fs-1'></a>
";
?>
</div>
<div class="col-sm-4">
<div class="modal-body">
<form action="set-dept-time.php" method="post" autocomplete="off">
<div class="form-group shadow p-5 bg-light">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="text" class="form-control" name="departure-time" placeholder="Add departure time">
<br>
<input type="submit" name="add" value="Save" class="btn btn-success w-50">
</div>
</form>
</div>
</div>
</div>
</div>
<div class="col-sm-4"></div>
</div>
</div>

<?php
if(isset($_POST["add"]))
{
    $dept_time = $_POST["departure-time"];
    $dept_id = $_POST['id'];
    if(empty($dept_time))
    {
        echo "<script type='text/javascript'>
        window.alert('Please fill in the departure input field')
        </script>";
    }else{
        $result = $db_connect->query("UPDATE `guests` SET departure_time = '$dept_time' WHERE `guests`.id = '$dept_id'");
        if($result == true)
        {
           header("Location:guests-full-info.php?id=$dept_id");
        }
    }
}
?>


    
</body>
</html>