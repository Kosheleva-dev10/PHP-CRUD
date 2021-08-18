<?php
if (isset($_POST['id']) && isset($_POST['id']) != "") {
    require 'lib.php';
    $announcement_id = $_POST['id'];

    $object = new CRUD();
    $object->DeleteAnnouncement($announcement_id);
}
?>