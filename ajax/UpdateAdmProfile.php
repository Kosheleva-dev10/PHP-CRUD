<?php

    require './lib.php';

    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $mobile_number = $_POST['mobile_number'];
    $password1 = $_POST['password1'];

    $object = new CRUD();

    //echo $id;
    $object->UpdateAdmProfile($first_name,$last_name,$email_address,$mobile_number, $password1, $id);
