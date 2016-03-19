<?php
session_start(); // Access the existing session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['username'])) {

	// Need the functions:
	require ('Includes/loginFunctions.php');
	redirect_user();	
	
} else { // Cancel the session:

	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';

?>
<!DOCTYPE html>
<html>
<?php global $page; $page = 'Login'; ?>
<?php include 'header.html' ?>

<body id="pageBody">

<div id="divBoxed" class="container">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>
	<?php include 'menu.html' ?>
    <div class="contentArea">
    <div class="divPanel notop page-content">
	<div class="border">
    <div class="row-fluid">
	<div class="span12">

<!--Display logged out message:-->
 <div class="box">
    <div class="login">
 <h1>You are now successfully logged out!</h1>
 <h3>Please close your browser.</h3>

 </div>
</div>
 </body>
<?php include ('footer.html'); ?>
</html>