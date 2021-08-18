<?php
session_start();
if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
	//include_once  $_SERVER['DOCUMENT_ROOT'].'/fund/ajax/lib.php';
        require 'lib.php';
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	$object = new CRUD();
 	$object->CheckAdminAuth($username,$password);

} else {
	header('location:./admin_login.php');
}
?>
