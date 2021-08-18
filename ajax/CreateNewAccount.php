<?php
if (isset($_POST['staff_id'])) {
    require("lib.php");

    $staff_id = $_POST['staff_id'];



    $object = new CRUD();

    $object->CreateNewAccount($staff_id);
}
?>