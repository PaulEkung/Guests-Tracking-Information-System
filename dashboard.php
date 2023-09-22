<?php 
session_start();
require "db-connection.php";
require "function.php";
if(!isset($_SESSION["password"]))
{
    header("Location: admin-login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <script defer src="main.js"></script>
    
         <style type="text/css" media="all">

    *{
        padding: 0;
        margin:0;
        box-sizing: border-box;
        user-select: none;
        /* font-family:sans-serif; */
    }


.sidenav{
    height: 30%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    background: rgba(0, 3, 32, 0.753);
    overflow-x: hidden;
    padding-top: 90px;
    transition: 0.3s;

    }


    .sidenav a{
        
    display: block;
    padding: 10px 8px 10px 40px;
    text-decoration: none;
    font-size: 22px;
    transition: 0.3s;
    color: aliceblue;
    font-family: 'Courier New', Courier, monospace;;
    /* font-weight: bold; */
    text-transform: capitalize;
    font-weight: 700;

    }

    .sidenav a:hover{
        background-color: rgba(4, 48, 56, 0.781);
        color:gold;
        transition: 0.1s;
        transform: scale(1.1);
        font-weight: 500;
    }

    .sidenav .closebtn{
        position: absolute;
        /* color: black; */
        top: 0;
        right: 0;
        font-size: 36px;
        margin-left: 5rem;
        cursor: pointer;
        color: aliceblue;
    }

    
    </style>

</head>
<body>

 <div class="container">
<div class="row">
<div class="container">

    <div id="mySidenav" class="sidenav">
    <span class="closebtn bg-primary p-2 w-100 bi bi-x-circle" onclick="closeSideNav()"></span>
    <!-- <a href="#">Admin Feedback</a> -->
    <ol>
    <li class="text-light">
    <a href="admin_change_pwd.php" class=''> 
    <span class='bi bi-key-fill text-warning fs-3'></span> Change Pasword</a>
        </li>
    
        <li class="text-light"><a href="#"> 
        <span class='bi bi-book fs-4 text-warning'></span> About</a></li>
    </ol>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
function openSideNav(){
document.getElementById("mySidenav").style.width ="350px";

}
function closeSideNav(){
    document.getElementById("mySidenav").style.width ="0";
}
</script>

<!-- <div class="container m-0"> -->
<main id="swup" class="transition-fade">
<div class="row m-0">
<?php require "sidebar.php" ?>
<div class="col-md-9">

<div id="instructor" class="p-3 bg-secondary">
<!-- <div class="container"> -->
<h2 class="text-center text-white">
Service Manager
</h2>
<a href="#logout" data-bs-toggle="modal" class="offset-10 bi bi-lock-fill text-light text-decoration-none fs-5 p-2 rounded-2" style="border:2px solid #fff">Logout</a>
<p class="lead text-center text-white mb-4 ">
Track and easily manage your guests information
</p>
<div class="row g-3">

<div class="col-md-6 col-lg-3">
    <div class="card bg-light">
        <div class="card-body text-center">
            <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
            class="rounded-circle mb-3" alt=""> -->
<img src="Nac_images/62f379723539a7.98217037.jpg" class="rounded-circle w-50 " alt="">
<i class="bi bi-people-fill fs-1"></i>
<h4 class="card-title mb-3">Guests</h4>
<p class="card-text">
 <?php
 $sql = $db_connect->query("SELECT count(*) FROM `guests`");
 if($sql == true){

     if($guests_count = mysqli_fetch_array($sql))
    {
        echo "<span class='fs-3 fw-bold text-secondary'>$guests_count[0] </span>";
    }
 }
 ?>
</p>
<!-- <a href="" class="btn btn-dark text-light mx-1">follow</a> -->

        </div>
    </div>
</div>

<div class="col-md-6 col-lg-3">
        <div class="card bg-light">
            <div class="card-body text-center">
                <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                YOU CAN ALSO USE "WOMEN"(portraits/women/13.jpg)
                class="rounded-circle mb-3" alt=""> -->
<img src="Nac_images/631651a76a3748.29221817.jpg" style="" class="rounded-circle w-50" alt="">
<i class="bi bi-person-circle fs-1"></i>
<h4 class="card-title mb-3 ">Staffs</h4>
<p class="card-text">
<?php
        $sql = $db_connect->query("SELECT count(*) FROM `staffs`");
        if($sql == true){

         if($staff_count = mysqli_fetch_array($sql))
        {
        echo "<span class='fs-3 fw-bold text-secondary'>$staff_count[0] </span>";
        }
    }
    ?>
</p>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
                <div class="card-body text-center">
                    <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                    YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                    class="rounded-circle mb-3" alt=""> -->
    <img src="Nac_images/62f379b074cff9.87921147.jpg" style="" class="rounded-circle w-50" alt="">
    <i class="bi bi-envelope-paper fs-1"></i>
    <h4 class="card-title mb-3">Notifications</h4>
    <p class="card-text">
    <span class="text-secondary fw-bold fs-3">
     <?php 
     echo __count_invoices__($db_connect);
      ?>
      </span>
    </p>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                        YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                        class="rounded-circle mb-3" alt=""> -->
        <img src="Nac_images/62f379c2a01d96.94473229.jpg" style="" class="rounded-circle w-50" alt="">
        <i class="bi bi-people-fill fs-1"></i>
        <h4 class="card-title mb-3">Hosts</h4>
        <p class="card-text">
        <?php
        $sql = $db_connect->query("SELECT count(*) FROM `hosts`");
        if($sql == true){

         if($hosts_count = mysqli_fetch_array($sql))
        {
        echo "<span class='fs-3 fw-bold text-secondary'>$hosts_count[0] </span>";
        }
    }
    ?>
        </p>

                    </div>
                </div>
            </div> 

        <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                        YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                        class="rounded-circle mb-3" alt=""> -->
        <img src="Nac_images/62f379c2a01d96.94473229.jpg" style="" class="rounded-circle w-50" alt="">
        <i class="bi bi-reply-all-fill fs-1"></i>
        <h4 class="card-title mb-3">Outbox</h4>
        <p class="card-text">
        <?php
        $sql = $db_connect->query("SELECT count(*) FROM `outbox` WHERE Status = 'Failed'");
        if($sql == true){

         if($outbox_count = mysqli_fetch_array($sql))
        {
        echo "<span class='fs-3 fw-bold text-secondary'>$outbox_count[0] </span>";
        }
    }
     ?>
        </p>

                    </div>
                </div>
            </div> 

        <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                        YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                        class="rounded-circle mb-3" alt=""> -->
        <img src="Nac_images/62f379c2a01d96.94473229.jpg" style="" class="rounded-circle w-50" alt="">
        <i class="bi bi-check-circle fs-1"></i>
        <h4 class="card-title mb-3">Sent Mails</h4>
        <p class="card-text">
        <?php
        $sql = $db_connect->query("SELECT count(*) FROM `outbox` WHERE Status = 'Sent'");
        if($sql == true){

         if($sent_count = mysqli_fetch_array($sql))
        {
        echo "<span class='fs-3 fw-bold text-secondary'>$sent_count[0] </span>";
        }
    }
     ?>
        </p>

                    </div>
                </div>
            </div> 

        <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                        YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                        class="rounded-circle mb-3" alt=""> -->
        <img src="Nac_images/62f379c2a01d96.94473229.jpg" style="" class="rounded-circle w-50" alt="">
        <i class="bi bi-send-fill fs-1"></i>
        <h4 class="card-title mb-3">Reports</h4>
        <p class="card-text">
        <span class="text-secondary fw-bold fs-3">
            <?php echo __count_reports__($db_connect); ?>
        </span>
        </p>
        

                    </div>
                </div>
            </div> 

        <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <!-- <img src="https://randomuser.me/api/portraits/men/11.jpg"
                        YOU CAN ALSO USE "WOMEN"(portraits/women/11.jpg)
                        class="rounded-circle mb-3" alt=""> -->
        <img src="Nac_images/62f379c2a01d96.94473229.jpg" style="" class="rounded-circle w-50" alt="">
        <i class="bi bi-question-diamond-fill fs-1"></i>
        <h4 class="card-title mb-3">Help</h4>
        <p class="card-text">
            
        </p>
        <a href="https://www.microfinancebank.com" class="btn btn-primary text-light mx-1">Go Help</a>

                    </div>
                </div>
            </div> 

</div>
</div>
<br>
<section class="recent-guests bg-light">
<div class="container p-3">
<h2>Recently Added Guests</h2>
<span class="position-absolute offset-6" style='margin-top:-3.5rem' id="demo">
<?php
if(isset($_GET["contact"]))
{
 echo "
    <form action='contact-guests.php' method='post' autocomplete='off'>
    <button type='button' class='btn btn position-absolute fs-4' name='cancel' style='margin-left:-3rem;margin-top:-0.5rem' onclick='hide()'> <i class='bi bi-x-circle text-danger'></i></button>
    <input type='search' name='id' class='form-control' placeholder='Enter guest ID'>
    <button type='submit' class='btn btn btn-sm position-absolute' style='margin-top:-3.2rem;margin-left:14rem' name='submit'> <i class='bi bi-arrow-right-circle fs-2'> </i></button>
    </form>
";
}

?>
</span>
<script type="text/javascript">
function hide()
{
    document.getElementById("demo").style.display ="none";
}
</script>
</div>
        <table class='table table-bordered p-5 table-condensed table-lg text-center table-responsive alert alert-secondary'>
        <tr>
        <th class="p-3">Guest Id</th>
        <th class="p-3">Guest Name</th>
        <th class="p-3">Email Address</th>
        <th class="p-3">Phone Number</th>
        <th class="p-3 bg-secondary text-light">Action</th>
        </tr>
       <?php
       
       function recentGuests($db_connect)
       {
           $sql = $db_connect->query("SELECT * FROM `guests` WHERE `id` > (SELECT count(*) FROM `guests`) - 3");
           if($sql == true){
               while($row = mysqli_fetch_assoc($sql))
               {
                   $id = $row['id'];
                   $name = $row['name'];
                   $email = $row['email'];
                   $phone = $row['phone'];
                   ?>
                   <tr>
                   <td class="bg-light"><?php echo $id ?></td>
                   <td class="bg-light"><?php echo $name ?></td>
                   <td class="bg-light"><?php echo $email ?></td>
                   <td class="bg-light"><?php echo $phone ?></td>
                   <td>
                   <form action="guests-full-info.php" method="post">
                   <input type="hidden" name="id" value="<?php echo $id ?>">
                   <input type="submit" name="submit" value="View all" class="btn btn-primary">
                   </form>
                   </td> 
                   </tr>
       
                   <?php
               }
            }else{
               echo "<div class='text-center alert alert-warning offset-0 w-50'>No recently added guest</div>";
           }
       }
       
       echo recentGuests($db_connect);

       ?>
        </table>


</section>
</div>

</div>
<!-- </div> -->
<!-- </div> -->
    
       </main>

<div class="container">
<div class="row">
<div class="modal fade" role="dialog" id="logout">
<div class="container">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<form action="dashboard.php" method="post" autocomplete="off">
<div class="form-group shadow p-3 bg-light">
<p class="fs-6 lead fw-bold text-center ">Are you sure you want to logout?</p>
<br>
<a href="#" class="bi bi-x-circle fs-2 offset-3 text-danger" data-bs-dismiss="modal"></a>
<?php 

print("<a href='admin-logout.php' class='bi bi-check-circle fs-2 text-success offset-4'></a>");

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