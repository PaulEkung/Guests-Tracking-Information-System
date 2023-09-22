<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="bootstrap-5.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstap-5.1.3/dist/css/bootstrap.css">
     <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
    <script src="main.js"></script>
    
    <style>
    *{
        padding: 0;
        margin:0;
        box-sizing: border-box;
        user-select: none;
        /* font-family:sans-serif; */
    }

    nav ul{
        height: 100%;
        width: 100%;
    }
    
    ul li{
        padding: 1.2rem;
        list-style: none;
        
    }

    ul li a{
        text-decoration:none;
        color: #fff;
        border-left:3px solid transparent;
        display: block;
        padding-left: 25px;
        width:100%;
        transition: 0.3s ease;
    }
    ul li a:hover{
        color: cyan;
        border-left-color: cyan;
        /* height: 50px; */
        transition: 0.3s ease;
        background: dodgerblue;
        padding:20px;
        color:white;
    }
    .sidebar{
        position: relative;
        left:0;
        height: 100%;
    }
    </style>
</body>
<div class="col-md-3 bg-dark text-light p-3 position-sticky" style="z-index:100">
<section>

<div class="container sidebar">
<h2 class="bi bi-person-lines-fill p-4">&nbsp; Dashboard</h2> 
<ul>
<li> <a href="guests.php">Manage Guests</a> </li>
<hr>
<li class=""><a href="staffs.php">Manage Staffs</a></li>
<hr>
<li><a href="hosts.php">Manage Hosts</a> </li>
<hr>
<li><a href="invoice.php"> Notifications </a></li>
<hr>
<li><a href="sentbox.php"> Sentbox</a></li>
<hr>
<li><a href="reports.php"> Reports </a></li>
<hr>
<li><a href="outbox.php">Outbox Messages</a> </li>
<hr>
<li><a href="?contact">Contact Guests</a> </li>
<hr>
<li>
<a href="#" onclick="openSideNav()">More</a>

</li>
</ul>
</div>
</div>
</section>
</html>