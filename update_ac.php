<?php global $page;
$page = 'update';
session_start();
if (!isset($_SESSION['username']))
    header("Location: login.php");
include 'header.html' ?>

<body>
<div id="divBoxed" class="container">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;"></div>
 <?php include 'menu.html' ?>
    <div class="contentArea">
	<div class="divPanel notop page-content">

<br/>


<?php
require '../db/db.php';
// update data in mysql database 
$name = $_POST['name'];
$id =  $_POST['id'];
$sql="UPDATE `top_items` SET `item_name`= '".$name."' WHERE item_id='".$id."'" or die ("this stuffed up");
$result = @mysqli_query($cnxn, $sql);

// if successfully updated. 
if($result){
echo "Successful";
echo "<br />";
echo '<a href="list_records.php"> Go Back to List of Items </a>';
echo "<br />";
echo '<a href="admin.php"> Go Back to Admin Page </a>';

}
else {
echo "ERROR";
}


?>



<?php include 'footer.html' ?>
</div>
</div>
</div>

</body>
</html>