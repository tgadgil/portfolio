<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['name', 'email', 'comments'];
    $required = ['name', 'email', 'comments'];
    $to = 'Tina Ostrander <TOstrander@greenriver.edu>';
    $subject = 'Message from Food Bank Website ( BATCHZ Team )';
    $headers = [];
    $headers[] = 'From: FoodBankWebsite@gmail.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = '-fdavid@example.com';
    require 'Includes/process_mail.php';
    if ($mailSent) {
        header('Location: thanks.php');
        exit;
    }
}
?>
<!DOCTYPE HTML>
<html>
<?php global $page;
$page = 'Contact'; 
include 'header.html' ?>

<body>

<div id="divBoxed" class="container">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;"></div>
 <?php include 'menu.html' ?>
    <div class="contentArea">
	<div class="divPanel notop page-content"><div class="border"><div class="row-fluid">
    
		<div class="span8">

<h1>Contact Our Team</h1>
<p> Let us know if you have any questions or comments. </p>
<?php if ($_POST && ($suspect || isset($errors['mailfail']))) : ?>
<p class="warning">Sorry, your mail couldn't be sent.</p>
<?php elseif ($errors || $missing) : ?>
<p class="warning">Please fix the item(s) indicated</p>
<?php endif; ?>
<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
  <p>
    <label for="name">*Name:
    <?php if ($missing && in_array('name', $missing)) : ?>
        <span class="warning">Please enter your name</span>
    <?php endif; ?>
    </label>
    <input type="text" name="name" id="name"
        <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($name) . '"';
        }
        ?>
        >
  </p>
  <p>
    <label for="email">*Email:
        <?php if ($missing && in_array('email', $missing)) : ?>
            <span class="warning">Please enter your email address</span>
        <?php elseif (isset($errors['email'])) : ?>
            <span class="warning">Invalid email address</span>
        <?php endif; ?>
    </label>
    <input type="email" name="email" id="email"
        <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($email) . '"';
        }
        ?>
        >
  </p>
  <p>
    <label for="comments">*Comments:
        <?php if ($missing && in_array('comments', $missing)) : ?>
            <span class="warning">You forgot to add any comments</span>
        <?php endif; ?>
    </label>
      <textarea name="comments" id="comments"><?php
          if ($errors || $missing) {
              echo htmlentities($comments);
          }
          ?></textarea>
  </p>
  <p>
    <input class="btn btn-info" type="submit" name="send" id="send" value="Send Message">
	</br>
	</br>
	
  </p>
</form>


</p>
</div>
<!-- IMAGE --> 
 <div class="span4">
	<div class="box"><img src="images/client_images/feed4.jpg" alt= "Quote"></div>	
		
	</div>
 
 <!-- END OF IMAGE -->
</div>	
		
<?php include 'footer.html' ?>
</div>
</div>
</div>
</body>
</html>