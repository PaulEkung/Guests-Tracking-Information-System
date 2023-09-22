<?php
 session_start();
 require_once "db-connection.php";
 require "function.php";
 if(!isset($_SESSION["pwd"]))
{
    header("Location: manager-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager-Dashboard</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
     <style type="text/css" media="all">

.sidenav{
    height: 30%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
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
        color: black;
        top: 0;
        right: 0;
        font-size: 36px;
        margin-left: 0px;
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
<span class="closebtn  p-2 w-100 bi bi-x-circle" onclick="closeNav()"></span>
<!-- <a href="#">Admin Feedback</a> -->
<ol>
<li class="text-light">
<a href="manager-update-pwd.php" class=''> 
<span class='bi bi-key-fill text-warning fs-2'></span> Change Pasword</a>
    </li>

   
</ol>
</div>
</div>
</div>
</div>

<script type="text/javascript">
function openNav(){
document.getElementById("mySidenav").style.width ="350px";

}
function closeNav(){
document.getElementById("mySidenav").style.width ="0";
}
</script>

    <section>
    <nav class="bg-secondary p-3">
    <a href="#logout" data-bs-toggle="modal" class="bi bi-arrow-left-circle text-light fs-1"></a>
    <span class="container text-center text-light fs-1 offset-5">
    
    Dashboard
    <a href="#" class="bi bi-list offset-4 text-light" onclick="openNav()" style="font-size:1.9rem;cursor:pointer">
    </a>
    
    </span>
    </nav>
    </section>
    <br>
    <span class="p-3 fs-1">Total Reports : <?php echo __count_reports__($db_connect); ?> </span>
    <br>
    <br>
    <table class='table table-bordered p-5 table-condensed table-lg text-center table-responsive alert alert-secondary'>
        <tr>
        <th class="p-3">Report Id</th>
        <th class="p-3">Message</th>
        <th class="p-3">Date</th>
        <th class="p-3">Action</th>
        </tr>
        <?php 
        
        $__reports__ = __reports__2($db_connect);
        ?>
        </table>

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
<p class="fs-6 lead fw-bold text-center ">You're about to logout from this session!</p>
<br>
<a href="#" class="bi bi-x-circle fs-2 offset-3 text-danger" data-bs-dismiss="modal"></a>
<?php 

print("<a href='manager-logout.php' class='bi bi-check-circle fs-2 text-success offset-4'></a>");

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