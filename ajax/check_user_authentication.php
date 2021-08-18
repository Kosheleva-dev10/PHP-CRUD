<?php 
session_start(); 
?>
<?php
if(isset($_POST['staff_id']) && $_POST['staff_id'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
	require 'lib.php';
	$staff_id = trim($_POST['staff_id']);
	$password = trim($_POST['password']);

	$object = new CRUD();
 	$object->CheckUserAuth($staff_id,$password);

} else {
	header('location:./user_login.php');
}
?>
