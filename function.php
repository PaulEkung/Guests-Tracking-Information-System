<?php
require_once 'db-connection.php';

function __empty_change_pwd_inputs__($recent_pwd, $new_pwd, $confirm_new_pwd)
{
    $result;
   if(empty($recent_pwd) || empty($new_pwd) || empty($confirm_new_pwd))
   {
       $result = true;

   }else{
       $result = false;
   }
   return $result;
}

function __check_match_pwd($oldPass, $recent_pwd)
{
    $result;
    if($recent_pwd !== $oldPass)
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function __wrong_confirm_pwd($new_pwd, $confirm_new_pwd)
{
    $result;
    if($new_pwd !== $confirm_new_pwd)
    {
        $result = true;

    }
    else{
        $result = false;
    }
    return $result;
}

function updatePwd($db_connect, $new_pwd)
{
   
    $sql = $db_connect->query("UPDATE `administrator` SET pwd = '$new_pwd' WHERE id = '1'");
    if($sql == true)
    {
        echo "<div class='text-center alert alert-success offset-0 w-100'>Password updated successfully</div>";
        exit();
    }
}

function __empty_change_pwd_inputs_2($recent_pwd, $new_pwd, $confirm_new_pwd)
{
    $result;
   if(empty($recent_pwd) || empty($new_pwd) || empty($confirm_new_pwd))
   {
       $result = true;

   }else{
       $result = false;
   }
   return $result;
}

function __check_match_pwd_2($oldPass, $recent_pwd)
{
    $result;
    if($recent_pwd !== $oldPass)
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function __wrong_confirm_pwd_2($new_pwd, $confirm_new_pwd)
{
    $result;
    if($new_pwd !== $confirm_new_pwd)
    {
        $result = true;

    }
    else{
        $result = false;
    }
    return $result;
}

function updatePwd_2($db_connect, $new_pwd)
{
   
    $sql = $db_connect->query("UPDATE `manager` SET password = '$new_pwd' WHERE id = '1'");
    if($sql == true)
    {
        echo "<div class='text-center alert alert-success offset-0 w-100'>Password updated successfully</div>";
        exit();
    }
}


function adminLogin($db_connect)
{
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$pwd = $_POST["password"];
if(empty($pwd))
{
define('error_1', "<div class='alert alert-danger offset-0 shadow text-center'>Please provide login pin.</div>", false);
echo error_1;

}else{
$sql = "SELECT pwd FROM `administrator` WHERE pwd = ?;";
$stmt = mysqli_stmt_init($db_connect);
if(!mysqli_stmt_prepare($stmt, $sql))
{
die(mysqli_error($db_connect));
}else{
mysqli_stmt_bind_param($stmt, "s", $pwd);
mysqli_stmt_execute($stmt);
$fetch_result = mysqli_stmt_get_result($stmt);
if($row = mysqli_fetch_array($fetch_result))
{
    if($pwd !== $row['pwd'])
    {
        define("error_2", "<div class='alert alert-danger offset-0 shadow text-center'>Incorrect login pin provided </div>", false);
    echo error_2;
    }else
    {
        $_SESSION['password'] = $row["pwd"];
        $_SESSION['session_admin_id'] = $row["id"];
        header("Location: dashboard.php");
    }
}else{
    define("error_3", "<div class='alert alert-danger offset-0 shadow text-center'>Incorrect login pin provided</div>", false);
    echo error_3;
}
}
}
}
}

function addGuest($db_connect){
if(isset($_POST["submit"]))
{
$guest_name = $_POST["name"];
$guest_email = $_POST["email"];
$guest_phone = $_POST["phone"];
$guest_sex = $_POST["sex"];
$guest_address = $_POST["address"];
$visit_purpose = $_POST["visit-purpose"];
$whom_to_see = $_POST["whom-to-see"];
$arrival_time = $_POST["arrival-time"];
// $departure_time = $_POST["departure-time"];

if(empty($guest_name) || empty($guest_email) || empty($guest_phone) || empty($guest_sex) || empty($guest_address) || empty($visit_purpose) || empty($whom_to_see) || empty($arrival_time))
{
$alert[] = "<span class='text-center alert alert-danger offset-1 w-25'>Please fill in all required fields</span>";

}else if(!filter_var($guest_email, FILTER_VALIDATE_EMAIL))
{
$alert[] = "<span class='text-center alert alert-danger offset-1 w-25'>Invalid email address format</span>";

}else if(strlen($guest_phone) <> 11 || !is_numeric($guest_phone)){
$alert[] = "<span class='text-center alert alert-danger offset-1 w-25'>Invalid mobile number</span>";
}else{
$result = mysqli_query($db_connect, "INSERT INTO `guests` (name, email, phone, sex, address, visit_purpose, whom_to_see, arrival_time) VALUES ('$guest_name', '$guest_email', '$guest_phone', '$guest_sex', '$guest_address', '$visit_purpose', '$whom_to_see', '$arrival_time')");
if($result === true)
{
    $alert[] = "<span class='text-center alert alert-success offset-1 w-50'>Guest registration successful</span>";
}
}
foreach($alert as $alerts)
{

echo $alerts;
}

}
}

function guests($db_connect)
{
$sql = $db_connect->query("SELECT * FROM `guests`");
if($sql == true){
while($row = mysqli_fetch_assoc($sql))
{
$id = $row['id'];
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$sex = $row['sex'];
$purpose = $row['visit_purpose'];
?>
<tr>
<td><?php echo $id ?></td>
<td><?php echo $name ?></td>
<td><?php echo $email ?></td>
<td><?php echo $phone ?></td>
<td><?php echo $sex ?></td>
<td><?php echo $purpose ?></td>
<td>
<form action="guests-full-info.php" method="post">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit" value="View all" name="submit" class="btn btn-primary">
</form>
</td>
</tr>

<?php
}
}else{
echo "<div class='text-center alert alert-warning offset-3 w-50'>No information currently avaliable</div>";
}
}


function hosts($db_connect)
{
$sql = $db_connect->query("SELECT * FROM `hosts`");
if($sql == true){
while($row = mysqli_fetch_assoc($sql))
{
$host_id = $row['host_id'];
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$rd = $row['date'];

?>
<tr>
<td><?php echo $host_id ?></td>
<td><?php echo $name ?></td>
<td><?php echo $email ?></td>
<td><?php echo $phone ?></td>
<td><?php echo $rd ?></td>
<td>
<form action="update-host-info.php" method="post">
<input type="hidden" name="id" value="<?php echo $host_id ?>">
<input type="submit" value="Update" name="submit" class="btn btn-primary">
&nbsp;&nbsp;&nbsp;
<?php 
echo "
<a href='delete-guests-info.php?hostId=$host_id' class='bi bi-trash-fill text-danger fs-3'></a>
";
?>
</form>

</td>
</tr>

<?php
}
}else{
echo "<div class='text-center alert alert-warning offset-3 w-50'>No information currently avaliable</div>";
}
}

function contact($db_connect)
{
if(isset($_POST["send"]))
{
$s_id = $_POST['id'];
$to = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$headers = "From: pauldrums32@gmail.com";
if(mail($to, $subject, $message, $headers)){

$query = $db_connect->query("INSERT INTO `outbox`(reciever, subject, message, Status) VALUES ('$to', '$subject', '$message', 'Sent')");
if($query == true)
{
    header("Location: sentbox.php?Sent");
}

}else{
$sql = $db_connect->query("INSERT INTO `outbox`(reciever, subject, message, Status) VALUES ('$to', '$subject', '$message', 'Failed')");
header("Location: outbox.php?Failed");
}


}
}

function __manager_login__($db_connect)
{
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$pwd = $_POST["password"];
if(empty($pwd))
{
define('__error_1', "<div class='alert alert-danger offset-0 shadow text-center'>Please provide login pin.</div>", false);
echo __error_1;

}else{
$sql = "SELECT password FROM `manager` WHERE password = ?;";
$stmt = mysqli_stmt_init($db_connect);
if(!mysqli_stmt_prepare($stmt, $sql))
{
die(mysqli_error($db_connect));
}else{
mysqli_stmt_bind_param($stmt, "s", $pwd);
mysqli_stmt_execute($stmt);
$fetch_result = mysqli_stmt_get_result($stmt);
if($row = mysqli_fetch_array($fetch_result))
{
    if($pwd !== $row['password'])
    {
        define("__error_2", "<div class='alert alert-danger offset-0 shadow text-center'>Incorrect login pin provided </div>", false);
    echo __error_2;
    }else
    {
        $_SESSION['pwd'] = $row["password"];
        $_SESSION['session_manager_id'] = $row["id"];
        header("Location: manager-dashboard.php");
    }
}else{
    define("__error_3", "<div class='alert alert-danger offset-0 shadow text-center'>Incorrect login pin provided</div>", false);
    echo __error_3;
}
}
}
}
}

function __reports__($db_connect)
{
    $_query = mysqli_query($db_connect, "SELECT * FROM `reports`");
    if($_query == true)
    {
        while($__row = mysqli_fetch_assoc($_query))
        {
            $_id_ = $__row['report_id'];
            $_msg_ = $__row['report_msg'];
            $_date_ = $__row['date'];
            if(empty($_msg_)){
            echo "<div class='text-center alert alert-warning offset-0 w-50'>No report avaliable</div>";
            }else{
            echo "
            <tr>
            <td class='bg-light'> $_id_ </td>
            <td class='bg-light'>$_msg_</td>
            <td class='bg-light'>$_date_</td>
            <td>

            <a href='delete-guests-info.php?reportId=$_id_' class='text-danger alert-secondary border-0'>
            <i class='bi bi-trash-fill fs-4'></i>
            </a>

            </td>
            </tr>
            ";
        }
    }

}
}

function __reports__2($db_connect)
{
    $_query_ = mysqli_query($db_connect, "SELECT * FROM `reports`");
    if($_query_ == true)
    {
        while($__row_ = mysqli_fetch_assoc($_query_))
        {
            $_id_ = $__row_['report_id'];
            $_msg_ = $__row_['report_msg'];
            $_date_ = $__row_['date'];
            if(empty($_msg_)){
            echo "<div class='text-center alert alert-warning offset-0 w-50'>No report avaliable</div>";
            }else{
            echo "
            <tr>
            <td class='bg-light'> $_id_ </td>
            <td class='bg-light'>$_msg_</td>
            <td class='bg-light'>$_date_</td>
            <td>

        <form action='manager-reply-report.php' method='post'>
        <input type='hidden' name='id' value='$_id_'>
        <input type='submit' name='submit' value='Reply' class='btn btn-primary'>
        </form>
            </td>
            </tr>
            ";
        }
    }

}
}

function __count_reports__($db_connect)
{
    $sql = $db_connect->query("SELECT count(*) FROM `reports`");
    if($sql == true){
        $counter = mysqli_fetch_array($sql);
        echo $counter[0];
    }
}

function __count_invoices__($db_connect)
{
    $sql = $db_connect->query("SELECT count(*) FROM `invoice`");
    if($sql == true){
        $counter = mysqli_fetch_array($sql);
        echo $counter[0];
    }
}

function __add_report__($db_connect)
{
    if(isset($_POST["report"])){

    $_message_ = $_POST["message"];

    switch($_message_){

        case "":
        define("__error_empty__", "<div class='alert alert-danger offset-0 shadow text-center w-100 offset-0'>Please fill in the text area </div>", false);
        echo __error_empty__;
        break;
        default:

        $__add_report__ = $db_connect->query("INSERT INTO `reports` (report_msg) VALUE('$_message_')");
        if($__add_report__ == true)
        {
            header("Location: reports.php?report+sent+succesfully");
        }else{
            define("__error_empty_", "<div class='alert alert-danger offset-0 shadow text-center w-100 offset-0'>Failed to send report </div>", false);
            echo __error_empty_;
        }

            }
        }
    }

    function __invoice__($db_connect)
    {
        if(isset($_POST["invoice"])){

            $_invoice_id = $_POST["id"];
            $_invoice_msg = $_POST["msg"];

            if(empty($_invoice_msg)){

        define("__err_empty__", "<div class='alert alert-danger offset-0 shadow text-center w-100 offset-0'>Please fill in the text area </div>", false);
        echo __err_empty__;
        }else{       

        $__reply__ = $db_connect->query("INSERT INTO `invoice` (invoice_msg, invoice_id) VALUES ('$_invoice_msg', '$_invoice_id')");
        if($__reply__ == true)
        {
            define("__success__", "<div class='alert alert-success offset-0 shadow text-center w-100 offset-0'>Reply sent successfully</div>", false);
            echo __success__;

        }else{
            define("__err_empty_", "<div class='alert alert-danger offset-0 shadow text-center w-100 offset-0'>Failed to send reply </div>", false);
            echo __err_empty_;

        }  } } }

        function __get_invoices__($db_connect)
        {
        $_joint_query = $db_connect->query("SELECT re.*, inv.* FROM `reports`re, `invoice`inv WHERE re.report_id = inv.invoice_id");
        if($_joint_query == true){
            while($row = mysqli_fetch_assoc($_joint_query))
            {
                $_report_msg = $row["report_msg"];
                $_report_id = $row["report_id"];
                $_invoice_msg = $row["invoice_msg"];
                $_invoice_id = $row["invoice_id"];
                $_invoice_date = $row["invoice_date"];

                if($_invoice_msg == ""){

                    echo "<div class='text-center alert alert-warning offset-0 w-50'>No invoice avaliable</div>";
                }else{

                echo "<div class='container w-50'>
                <p class='lead alert alert-secondary'>
                
                $_report_msg <span class='offset-5 fw-bold fs-6'>Report Id : $_report_id</span>
                </p>
            
                <i class='bi bi-arrow-down-circle fs-2'></i>
                <i class='bi bi-arrow-up-circle fs-2 offset-10'></i>
                <br>
                <br>
                <span class='fs-4 alert alert-primary'>
                $_invoice_msg <span class='offset-5 fw-bold fs-6'>Invoice Id : $_invoice_id</span>
                </span>
                <br>
                </div>
                <br>
                <br>
                ";
                
            }
        }
            }else{
                echo "<div class='text-center alert alert-warning offset-0 w-50'>No invoice avaliable</div>";
            }
        }

        function _staffs_($db_connect)
        {
            $sql = "SELECT * FROM `staffs`";
            $result = mysqli_query($db_connect, $sql);
            if($result == true){
        
                while($row = mysqli_fetch_assoc($result))
                {
        
                $staff_id = $row['staff_id'];
                $name = $row['staff_name'];
                $Sex = $row['Sex'];
                $TOE = $row['TOE'];
                
                echo "
                
                <tr>
                <td class='bg-light p-3'>$staff_id </td>
                <td class='bg-light p-3'>$name</td>
                <td class='bg-light p-3'>$Sex</td>
                <td class='bg-light p-3'>$TOE</td>
                
                <td>
               
                <a href='delete-guests-info.php?staffId=$staff_id' class='bi bi-trash-fill text-danger fs-3'></a>
                
                </td> 
                </tr>
                ";
        
                } } } 

        function __add_staffs_($db_connect)
        {
            if(isset($_POST["add"]))
            {
                $staffId = $_POST["staffId"];
                $staffName = $_POST["staffName"];
                $gender = $_POST["gender"];
                $typeOfEmployment = $_POST["typeOFEmployment"];
                
                if(empty($staffId) || empty($staffName) || empty($gender) || empty($typeOfEmployment))
                {
                    echo "<div class='text-center alert alert-danger offset-0 w-100'>Please fill in all input fields</div>";
                }else if(!empty($staffId) || !empty($staffName) || !empty($gender) || !empty($typeOfEmployment))
                {
                    $query_data = $db_connect->query("INSERT INTO `staffs` (staff_id, staff_name, TOE, Sex) VALUES ('$staffId', '$staffName', '$typeOfEmployment', '$gender')");
                    if($query_data == true)
                    {
                        echo "<div class='text-center alert alert-success offset-0 w-100'>Staff record added successfully</div>";
                    }else{
                        echo "<div class='text-center alert alert-danger offset-0 w-50'>Failed to handle request</div>";
                    } } } }


            function __add_hosts_($db_connect)
             {
            if(isset($_POST["add-host"]))
            {
                $hostId = $_POST["hostId"];
                $hostName = $_POST["hostName"];
                $hostEmail = $_POST["email"];
                $phoneNumber = $_POST["phone"];
                
                if(empty($hostId) || empty($hostName) || empty($hostEmail) || empty($phoneNumber))
                {
                    echo "<div class='text-center alert alert-danger offset-0 w-100'>Please fill in all input fields</div>";
                }else if(!empty($hostId) || !empty($shostName) || !empty($hostEmail) || !empty($phoneNumber))
                {
                    $query_data = $db_connect->query("INSERT INTO `hosts` (host_id, name, email, phone) VALUES ('$hostId', '$hostName', '$hostEmail', '$phoneNumber')");
                    if($query_data == true)
                    {
                        echo "<div class='text-center alert alert-success offset-0 w-100'>Host record added successfully</div>";
                    }else{
                        echo "<div class='text-center alert alert-danger offset-0 w-100'>Failed to handle request</div>";
                    }
                }
            }
        
        }





