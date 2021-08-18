<?php

    require './lib.php';

    $id = $_POST['id'];
    $staff_id = $_POST['staff_id'];
    $password1 = $_POST['password1'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $mobile_number = $_POST['mobile_number'];
    $is_active = $_POST['is_active'];

    $object = new CRUD();

    echo $is_active;
   echo  $object->UpdateStaff($staff_id,$password1,$first_name,$last_name,$email_address,$mobile_number, $is_active, $id);
