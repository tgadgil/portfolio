<?php   
session_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
	// Need the functions:
	require ('Includes/loginFunctions.php');
	redirect_user();	
}
    //Connect to DB
    require '../db/db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volunteer Data</title>

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
    <h2>Volunteers</h2>
	<?php
    $sql = "SELECT * FROM volunteer ORDER BY volunteer_id DESC";
       $result = mysqli_query($cnxn, $sql)
            or die ("Error executing query: $sql");
            echo '<table id="example" class="display" cellspacing="0" width="100%">';
        echo '<thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email </th>
                <th>Phone Number</th>
                <th>Available</th>
				<th>Interest</th>
                <th>Application Type</th>
				<th>Reason</th>
            </tr>
        </thead>
		
        
';
        while ($row = mysqli_fetch_array($result))
        {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $avail = $row['availibility'];
            $activ = $row['interest'];
            $formApp = $row['type'];
            $comments = $row['comments'];
            echo "<tr>
			<td>$fname</td>
			<td>$lname</td>
			<td>$email</td>
			<td>$phone</td>
			<td>$avail</td>
			<td>$activ</td>
			<td> $formApp</td>
			<td> $comments</td>
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