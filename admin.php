<?php global $page;
$page = 'Admin'; 

session_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
	// Need the functions:
	require ('Includes/loginFunctions.php');
	redirect_user();	
}
?>
<!--Include Logout button and message-->
<?php require ('Includes/loggedIn.php');?>
<!--End of Logged in page-->

<!DOCTYPE HTML> <html>
<?php global $page; $page = 'Admin'; ?>
<?php include 'header.html' ?>
<body id="pageBody">
<body>
<div id="divBoxed" class="container">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;"></div>
 <?php include 'menu.html' ?>
    <div class="contentArea">
	<div class="divPanel notop page-content">

<br/>

 <a class="btn btn-info"  href="/sponsordata.php">View Sponsors </a>
<br/>
<br/>
<a class="btn btn-info" href="/list_records.php">Update Top Items</a>
<br/>
<br/>
<a class="btn btn-info" href="/volData.php">Join us and volunteer!</a>
<br/>
<br/>
<!--Include Footer-->
<?php include 'footer.html' ?>
</div>
</div>
</div>

</body>
</html>