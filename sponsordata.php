<?php global $page;
$page = 'sponsorDB'; 
session_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
include 'header.html';
	// Need the functions:
	require ('includes/loginFunctions.php');
	redirect_user();	

}
?>

<?php
/* Gurmanprit Dhaliwal
 * http://gdhaliwal.greenrivertech.net/it305/students.php
 * Display the students in the GRCC database
 */
if (!isset($_SESSION['username']))
    header("Location: login.php");

 //Connect to the database (my root directory is two level up)
 //from my 305 directory
require '../db/db.php';
 ?>
 
 <!DOCTYPE hmtl>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sponsorship Data</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css"
          rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <h2>Sponsorships</h2>
  <script src="http://code.jquery.com/jquery.js"></script>
  
    <?php
    //define select query
    $sql = "SELECT * FROM sponsors ORDER BY sponsor_id DESC;";
    
    //send query to the databse
    $result = mysqli_query($cnxn, $sql)
            or die ("Error executing query: $sql");
            echo '<table id="example" class="display" cellspacing="0" width="100%">';
        echo '<thead>
            <tr>
                <th>Sponsor ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Level</th>
                <th>Email</th>
				<th>Phone</th>
                <th>Business</th>
            </tr>
        </thead>';
		
    //process the rows
    while($row = @mysqli_fetch_assoc($result))
          {
            $sponsor = $row['sponsor_id'];
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $level = $row['level'];
            $email = $row['email'];
            $phone = $row['phone'];
            $bname = $row['business'];
            
            
            echo "<tr>
			<td>$sponsor</td>
			<td>$fname</td>
			<td>$lname</td>
			<td>$level</td>
			<td>$email</td>
			<td>$phone</td>
			<td>$bname</td>
			</tr>";
          }
           echo '</tbody>
    </table>';
	echo '<a class="btn" href="admin.php"> Back to admin page </a>'
   ?>
	
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $('#example').DataTable();
</script>
</body>
</html>