<?php
if (isset($_POST['valid_from']) && isset($_POST['valid_to']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['status'])) {
    require("lib.php");

    $valid_from_date = $_POST['valid_from'];
    $valid_to_date = $_POST['valid_to'];
    $ann_title = $_POST['title'];
    $ann_content = $_POST['content'];
    $announcement_status = $_POST['status'];


    $object = new CRUD();

    echo $object->CreateNewAnnouncement($valid_from_date,$valid_to_date,$ann_title,$ann_content,$announcement_status);
}
?>