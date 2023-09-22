<?php 
require_once "db-connection.php";

if(isset($_GET["delete_id"])){
    $id = $_GET["delete_id"];
    $result = mysqli_query($db_connect, "DELETE FROM `guests` WHERE `guests`.id = '$id'");
    if($result == true){
        header("Location: dashboard.php?deleted+successfully");
    }
}

if(isset($_GET["id"])){
    $_id_ = $_GET["id"];
    $result = mysqli_query($db_connect, "DELETE FROM `outbox` WHERE `outbox`.id = '$_id_'");
    if($result == true){
        header("Location: outbox.php?deleted+successfully");
    }
}

if(isset($_GET["sentboxId"])){
    $_sentbox_id = $_GET["sentboxId"];
    $result = mysqli_query($db_connect, "DELETE FROM `outbox` WHERE `outbox`.id = '$_sentbox_id'");
    if($result == true){
        header("Location: sentbox.php?deleted+successfully");
    }
}

if(isset($_GET["reportId"]))
{
    $_delete_id = $_GET["reportId"];
    $delete_query = $db_connect->query("DELETE FROM `reports` WHERE id = '$_delete_id'");
    if($delete_query == true)
    {
        header("Location: reports.php?report+deleted+success");
    }
}

if(isset($_GET["staffId"]))
{
    $_staff_id = $_GET["staffId"];
    $delete_query = $db_connect->query("DELETE FROM `staffs` WHERE staff_id = '$_staff_id'");
    if($delete_query == true)
    {
        header("Location: staffs.php?report+deleted+success");
    }
}

if(isset($_GET["hostId"]))
{
    $_host_id = $_GET["hostId"];
    $delete_query = $db_connect->query("DELETE FROM `hosts` WHERE host_id = '$_host_id'");
    if($delete_query == true)
    {
        header("Location: hosts.php?report+deleted+success");
    }
}



