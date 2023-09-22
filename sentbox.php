<?php require 'db-connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sent Mails</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>
<body>
<a href="dashboard.php" class="btn btn bi bi-arrow-left-circle text-dark fs-1"></a>
<span class="offset-5 fs-2">Sent Messages <i class="bi bi-envelope-check"></i></span>
<br>

<table class='table table-bordered p-5 table-condensed table-lg text-center table-responsive alert alert-secondary'>
        <tr>
        <th class="p-3">Sentbox Id</th>
        <th class="p-3">Reciever</th>
        <th class="p-3">Subject</th>
        <th class="p-3">Message</th>
        <th class="p-3">Status</th>
        <th class="p-3 bg-dark text-warning">Action</th>
        </tr>
       <?php
       
       function outbox($db_connect)
       {
           $sql = $db_connect->query("SELECT * FROM `outbox` WHERE Status = 'Sent'");
           if($sql == true){
               while($row = mysqli_fetch_assoc($sql))
               {
                   $id = $row['id'];
                   $name = $row['reciever'];
                   $email = $row['subject'];
                   $phone = $row['message'];
                   $status = $row['Status'];
                   if($status == "Failed"){
                    $status = "<span class='text-danger bi bi-x-circle-fill fs-2'></span>";
                    $action = "<form action='guests-full-info.php' method='post'>
                    <input type='hidden' name='id' value='<?php echo $id ?>'>
                    <button type='submit' name='resend' class='text-dark bg-light fs-2' style='border:none'><i class='bi bi-arrow-repeat'></i></button>
                    </form>";

                   }else{
                    $status = "<span class='text-success bi bi-check-circle fs-2'></span>"; 
                    $action = "";
                   }
                   ?>
                   <tr>
                   <td class="p-4 bg-light"><?php echo $id ?></td>
                   <td class="p-4 bg-light"><?php echo $name ?></td>
                   <td class="p-4 bg-light"><?php echo $email ?></td>
                   <td class="p-4 bg-light"><?php echo $phone ?></td>
                   <td class="p-3 bg-light"><?php echo $status ?></td>
                   <td class="p-3 bg-light">
                   <?php
                    echo $action;
                    echo "
                   <a href='delete-guests-info.php?sentboxId=$id' class='bi bi-trash-fill text-danger fs-3'></a>
                   ";
                   ?>
                   </td> 
                   </tr>
       
                   <?php
               }
            }else{
               echo "<div class='text-center alert alert-warning offset-0 w-50'>No outbox message avaliable</div>";
           }
       }
       
       echo outbox($db_connect);

       ?>
        </table>


    
</body>
</html>