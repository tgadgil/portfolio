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

//Turn on error reporting

   // ini_set('display_errors', 1);

   // error_reporting(E_ALL);

    require '../db/db.php';

//Define the SELECT query

    $sql = "SELECT * FROM `top_items`";

    //Send the query to the database

    $result = @mysqli_query($cnxn, $sql);

?>

<div class="contentArea">
            <div class="divPanel notop page-content">
              
               <div class="row-fluid">				
					                 
            	<!--Edit Main Content Area here-->
                <div class="span12" id="divMain">

<table >

<tr>

<td>

<table >

<tr>

<td colspan="4"><strong>List items from database </strong> </td>

</tr>



<tr>

<td align="center"><strong>Item </strong></td>

<td align="center"><strong>Update</strong></td>

</tr>



<?php



while($row = mysqli_fetch_assoc($result)){

?>



<tr>

    

<td><? $name = $row['item_name'];

		echo $name; ?></td>





<td align="center"><a href="update.php? id=<? $id = $row['item_id'];

		echo $id;?>">update</a></td>

</tr>



<?php

}

?>



</table>

</td>

</tr>

</table>
<br>
<a class="btn btn-info" href="admin.php">Back to Admin Page</a>
				</div>
			   </div>
			</div>
</div>
<?php include 'footer.html' ?>
</div>
</div>
</div>

</body>
</html>
