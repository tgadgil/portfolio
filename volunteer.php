<?php
//Trupti Gadgil

require '../db/db.php';
$errors = [];
$missing = [];
//if form is submitted, and the following is filled out, then send email.
if (isset($_POST['send']))
{
    $expected = ['fname', 'lname', 'email', 'phone', 'avail', 'activ', 'appType', 'comments'];
    $required = ['fname', 'lname', 'email', 'phone', 'avail', 'comments'];
    $to = 'Kent Food Bank <batchzdummyemail@gmail.com>';
    $subject = 'Feedback from online form';
    $headers = [];
    $headers[] = 'From: FoodBankWebsite@gmail.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = '-ftgadgil@mail.greenriver.edu';
    require './Includes/process_mail.php';
	//send email
    if ($mailSent)
    {
			//Prevent SQL Interjection
        $fname = mysqli_real_escape_string($cnxn, $fname);
        $lname = mysqli_real_escape_string($cnxn, $lname);
        $email = mysqli_real_escape_string($cnxn, $email);
        $phone = mysqli_real_escape_string($cnxn, $phone);
		$avail = mysqli_real_escape_string($cnxn, $avail);
		$activ = mysqli_real_escape_string($cnxn, $activ);
		$formApp = mysqli_real_escape_string($cnxn, $formApp);
		$comments = mysqli_real_escape_string($cnxn, $comments);

		
        //Write to Database
        $sql = "INSERT INTO volunteer (firstname, lastname, email, phone, type, interest, comments, availability)
                VALUES ('$fname', '$lname', '$email', '$phone', '$formApp', '$activ', '$comments', '$avail')";
        $result = @mysqli_query($cnxn, $sql);
         if(!$result)
         {
            echo "<p>Error: " . mysqli_error($cnxn) . "</p>";
         }
			header('Location:thanks_vol.php');
			exit;
    }
}
?>
<!DOCTYPE HTML>
<html>
<?php global $page; $page = 'Volunteer'; ?>
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
            <!--<div class="breadcrumbs">-->
            <!--    <a href="index.php">Home</a> &nbsp;/&nbsp; <span>Volunteer</span>-->
            <!--</div>-->
            	
            <!--<div class="row-fluid">-->
            <!--    <div class="span8" id="divMain">-->

                    <h1>Volunteer</h1>
                   	<h3 style="color:#FF6633;"></h3>
					<hr>
			<!--Start Volunteer form -->
<!--validate errors-->
<?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
<p class="warning">Sorry, your form could not be sent.</p>
<!--If required items are left blank bring back fix the items error-->
<?php elseif ($errors || $missing) : ?>
<p class="warning">Please fix the item(s) indicated</p>
<?php endif; ?>
<form method="post" action="<? echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<!--Name-->	
  <p>
    <label for="fname">* First Name:
    <?php if ($missing && in_array('fname', $missing)) : ?>
        <span class="warning">Please enter your name</span>
    <?php endif; ?>
    </label>
    <input type="text" name="fname" placeholder="First Name" id="fname"
        <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($fname) . '"';
        }
        ?>
        >
  </p>
  <p>
              <label for="lname">* Last Name:
              <?php if ($missing && in_array('lname', $missing)) : ?>
                  <span class="warning">Please enter your Last Name</span>
              <?php endif; ?>
              </label>
              <input type="text" name="lname" placeholder="Last Name" id="lname"
                  <?php
                  if ($errors || $missing)
                  {
                      echo 'value="' . htmlentities($lname) . '"';
                  }
                  ?>
            </p>
<!--Email-->
  <p>
    <label for="email">* Email:
        <?php if ($missing && in_array('email', $missing)) : ?>
            <span class="warning">Please enter your email address</span>
        <?php elseif (isset($errors['email'])) : ?>
            <span class="warning">Invalid email address</span>
        <?php endif; ?>
    </label>
    <input type="email" name="email" placeholder="xxxxx@xxxxx.xxx" id="email"
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
    <input type="text" name="phone" placeholder="(xxx)xxx-xxxx" id="phone"
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
<!--Availability-->
  <p>
    <label for="avail">When are available to volunteer?:
    <?php if ($missing && in_array('avail', $missing)) : ?>
        <span class="warning">Please enter your availability: </span>
    <?php endif; ?>
    </label>
    <input type="text" name="avail" placeholder="Example: Monday, Tuesday, Wednesday..." id="avail"
        <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($avail) . '"';
        }
        ?>
	>
  </p>
<!--Activity-->
<p>
	<label for="activ">Please select volunteer activities you are interested in: </label>
  <p class= "activCheckbox">
    <input type="checkbox" name="activ" value="clothing" <?php if (isset($_POST['activ']) && ($_POST['activ'] == "clothing"))
	{
		echo "checked";
	} ?>/>Clothing<br/>
	<input type="checkbox" name="activ" value="office" <?php if (isset($_POST['activ']) && ($_POST['activ'] == "office"))
	{
		echo "checked";
	} ?>/>Office<br/>
	<input type="checkbox" name="activ" value="food" <?php if (isset($_POST['activ']) && ($_POST['activ'] == "food"))
	{
		echo "checked";
	} ?>/>Food<br/>
  
	<?php
	// validating the check boxes
	$activ = $_POST['activ'];
	if (isset($_POST['activ'])){
		if ($_POST['activ'] == "clothing"){
		echo $activ;
		}
		if ($_POST['activ'] == "office"){
		echo $activ;
		}
		if ($_POST['activ'] == "food"){
		echo $activ;
		}
	}
	?>
	</p>
</p>

<!--Application Type-->
	<p>
	<label for="appType">Please choose an Application Type: </label>
	<p class= "activCheckbox">
	<select name="formApp">
	  <option value="">Select...</option>
	  <option value="gr">Individual</option>
	  <option value="gr">Group</option>
	  <option value="org">Organization</option>
	  <option value="sch">School</option>
	  <option value="crt">Community service</option>
	</select>
	</p>
<div id= 'serviceType' class='hidden'>
	<?php echo "I am participating in Court Ordered Community Service."; ?><br>
	<input type="radio" name="crtBtn" value="yes" id="rbY"> Yes
	<input type="radio" name="crtBtn" value="no" id="rbN"> No
</div>
<div id= 'crimes' class='hidden'>
	<?php echo "I have committed theft, fraud, assault, or a crime against children."; ?><br>
	<input type="radio" name="crimeButton" value="yes" id="rbY"> Yes
	<p id = "crimesY" class='hidden'>We appreciate your application, but you are uneligible to volunteer at this time.</p>
	<input type="radio" name="crimeButton" value="no" id="rbN"> No<br>
</div>
<div id= 'crimesN' class='hidden'>
	<?php echo "Can you lift over 40 lbs?"; ?> <br>
	<input type="radio" name="lift" value="yes"> Yes
	<input type="radio" name="lift" value="no"> No
</div>

	</p>
<!--Comments-->
  <p>
    <label for="comments">* Why are you interested in volunteering at the Kent Food Bank?:
        <?php if ($missing && in_array('comments', $missing)) : ?>
            <span class="warning">You forgot to add any comments</span>
        <?php endif; ?>
    </label>
      <textarea name="comments" placeholder="Why do you want to donate your time to the Kent Food Bank?" id="comments"><?php
          if ($errors || $missing)
          {
              echo htmlentities($comments);
          }
          ?></textarea>
  </p>
  <p>
    <input class="btn btn-info" type="submit" name="send" id="send" value="Submit">
  </p>
</form>			 
</div>
<!--End Contact form-->

		<?php include 'footer.html' ?>
<script src="http://code.jquery.com/jquery.js"></script>
        <script>
			//if community service is selected, ask if court ordered
		$('select[name="formApp"]').change(function(){
	    if ($(this).val() == "crt"){
        $('#serviceType').removeClass('hidden');
		} else $('#serviceType, #crimes, #crimesY, #crimesN').addClass('hidden');
		});
		$("input[name=crtBtn]:radio").change(function(){
			if ($(this).val() == "yes"){
					$('#crimes').removeClass('hidden')
			} else $('#crimes, #crimesY, #crimesN').addClass('hidden');
		});
		$("input[name=crimeButton]:radio").change(function(){
			if ($(this).val() == "yes"){
					$('#crimesY').removeClass('hidden')
			}
			else if ($(this).val() == "no"){
				$('#crimesN').removeClass('hidden')
			}
		});
		</script>	
</body>
</html>
