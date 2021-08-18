<?php
session_start();

if (isset($_SESSION['sess_user_id']) && isset($_SESSION['sess_user_id']) != "") {
    require 'lib.php';
    $admin_id = $_SESSION['sess_user_id'];
    $object = new CRUD();

    echo $object->GetAdminDetails($admin_id);
}
?>