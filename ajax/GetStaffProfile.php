<?php

session_start();

if (isset($_SESSION['sess_staff_id']) && isset($_SESSION['sess_staff_id']) != "") {
    require 'lib.php';
    $staff_id = $_SESSION['sess_staff_id'];

    $object = new CRUD();

    echo $object->GetStaffProfile($staff_id);
}
?>