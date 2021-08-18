<?php
if (isset($_POST['id']) && isset($_POST['id']) != "") {
    require 'lib.php';
    $staff_id = $_POST['id'];

    $object = new CRUD();

    echo $object->GetStaffDetails($staff_id);
}
?>