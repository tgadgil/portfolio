<?php
//Gurmanprit Dhaliwal


require '../db/db.php';

$errors = [];
$missing = [];

    if (isset($_POST['send']))
    {
        $expected = ['fname','lname', 'email', 'phone', 'bname', 'sponsor'];
        $required = ['fname','lname', 'email', 'phone', 'sponsor' ];
        $to = 'Gurmanprit Dhaliwal <batchzdummyemail@gmail.com>';
        $subject = 'Sponsorship Form BATCHZ team';
        $headers = [];
        $headers[] = 'From: FoodBankWebsite@gmail.com';
        $headers[] = 'Cc: another@example.com';
        $headers[] = 'Content-type: text/plain; charset=utf-8';
        $authorized = '-fdavid@example.com';
        require 'Includes/process_mail.php';
        if ($mailSent)
        {
			//Prevent SQL Interjection
        $fname = mysqli_real_escape_string($cnxn, $fname);
        $lname = mysqli_real_escape_string($cnxn, $lname);
        $email = mysqli_real_escape_string($cnxn, $email);
        $phone = mysqli_real_escape_string($cnxn, $phone);
		$sponsor = mysqli_real_escape_string($cnxn, $sponsor);
		$bname = mysqli_real_escape_string($cnxn, $bname);

		
        //Write to Database
        $sql = "INSERT INTO sponsors (firstname, lastname, level, email, phone, business)
                VALUES ('$fname', '$lname', '$sponsor', '$email', '$phone', '$bname' )";
        $result = @mysqli_query($cnxn, $sql);
         if(!$result)
         {
            echo "<p>Error: " . mysqli_error($cnxn) . "</p>";
         }
            header('Location: sponsorthanks.php');
            exit;
        }
    }
?>
 <!DOCTYPE HTML>
<html>
<?php global $page; $page = 'Sponsorship'; ?>
<?php include 'header.html' ?>

<body id="pageBody">

<div id="divBoxed" class="container">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>
	<?php include 'menu.html' ?>
    <div class="contentArea">
    <div class="divPanel notop page-content">
	<div class="border">

            <!--<div class="breadcrumbs">-->
            <!--    <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Volunteer</span>-->
            <!--</div>-->
            	
            <!--<div class="row-fluid">-->
            <!--    <div class="span8" id="divMain">-->

                    
					<h1>Sponsorship Form</h1>
					<p>We are excited this year to provide you with a number of different options to support the Kent Food Bank Annual Breakfast with your monetary donations. We have two different payment options, a one-time sponsorship payment or monthly installments. Both options will make a direct difference for families in need. Your generosity is greatly appreciated! THANK YOU!!! </p>
					<br>
		<?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
        <p class="warning">Sorry, your sponsorship form couldn't be sent.</p>
        <?php elseif ($errors || $missing) : ?>
        <p class="warning">Please fix the item(s) indicated</p>
        <?php endif; ?>
            <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
            <p>
              <label for="fname">* First Name:
              <?php if ($missing && in_array('fname', $missing)) : ?>
                  <span class="warning">Please enter your First Name</span>
              <?php endif; ?>
              </label>
              <input type="text" name="fname" id="fname"
                  <?php
                  if ($errors || $missing)
                  {
                      echo 'value="' . htmlentities($fname) . '"';
                  }
                  ?>
            </p>
            <p>
              <label for="lname">* Last Name:
              <?php if ($missing && in_array('lname', $missing)) : ?>
                  <span class="warning">Please enter your First Name</span>
              <?php endif; ?>
              </label>
              <input type="text" name="lname" id="lname"
                  <?php
                  if ($errors || $missing)
                  {
                      echo 'value="' . htmlentities($lname) . '"';
                  }
                  ?>
            </p>
            <p>
              <label for="email">* Email:
                  <?php if ($missing && in_array('email', $missing)) : ?>
                      <span class="warning">Please enter your email address</span>
                  <?php elseif (isset($errors['email'])) : ?>
                      <span class="warning">Invalid email address</span>
                  <?php endif; ?>
              </label>
              <input type="email" name="email" id="email"
                  <?php
                  if ($errors || $missing)
                  {
                      echo 'value="' . htmlentities($email) . '"';
                  }
                  ?>
                  >
            </p>
            <!--Phone Number-->
  <p>
    <label for="phone">* Phone Number:
    <?php if ($missing && in_array('phone', $missing)) : ?>
        <span class="warning">Please enter a phone number: </span>
    <?php endif; ?>
    </label>
    <input type="text" name="phone" id="phone"
        <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($phone) . '"';
        }
        ?>
		<?php
		$justNums = preg_replace("/[^0-9]/", '', $phone);
		//eliminate leading 1 if its there
		if (strlen($justNums) == 11) $justNums = preg_replace("/^1/", '',$justNums);
		
		// Validate phone $justNums
		if (!(strlen($justNums) == 10) && (strlen($justNums) > 0))
		{
		echo '<p >Please enter a valid 10 digit phone number.</p>';
		$isValid = false;
		}

		?>
	>
  </p>
   <p>
              <label for="bname"> Business Name:
              <?php if ($missing && in_array('bname', $missing)) : ?>
                  <span class="warning">Please enter your business name</span>
              <?php endif; ?>
              </label>
              <input type="text" name="bname" id="lname"
                  <?php
                  if ($errors || $missing)
                  {
                      echo 'value="' . htmlentities($bname) . '"';
                  }
                  ?>
            </p>
            <p>
                <label>* Sponosorship Level:</label>
                <?php if($missing && in_array('sponsor', $missing)) : ?>
                    <span class="warning">You forgot to select a sponsorship level</span>
                    <?php endif; ?>
                    <br>
                      <?php
                      $sponsor = array(" Gold - $3000 or $250 a month for a year", " Silver - $1500 or $125 a month for a year", " Bronze - $1000 or $85 a month for a year");
                      foreach ($sponsor as $aSpon)
                      {
                        echo "<input type = 'radio' name ='sponsor' value=$aSpon";
                        
                        //checked to see if this is the selected color
                        if($aSpon == $sponsor){
                          echo "checked";
                          
                        }
                        echo ">$aSpon<br>";
                      }
					  
                      ?>
            </p>
            <p>
              <input class="btn btn-info" type="submit" name="send" id="send" value="Send Form">
            </p>
        </form>

</div>
<!--End Contact form-->

		<?php include 'footer.html' ?>
    </body>
</html>