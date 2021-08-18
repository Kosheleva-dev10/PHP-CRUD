<?php
if (isset($_POST['id']) && isset($_POST['id']) != "") {
    require 'lib.php';
    $user_id = $_POST['id'];

    $object = new CRUD();
    $object->DeleteStaff($user_id);
}
?>