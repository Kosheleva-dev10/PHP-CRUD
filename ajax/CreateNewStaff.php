<?php
if (isset($_POST['staff_id']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email_address']) && isset($_POST['mobile_number'])) {

    $staff_id = $_POST['staff_id'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $mobile_number = $_POST['mobile_number'];

    require  "lib.php";

    $object = new CRUD();

    $object->CreateNewStaff($staff_id,$password,$first_name,$last_name,$email_address,$mobile_number);
}
?>