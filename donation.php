<!DOCTYPE HTML>
<html>
<?php global $page;
$page = 'Donations'; ?>
<?php include 'header.html' ?>
<body id="pageBody">

<div id="divBoxed" class="container">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>
<?php include 'menu.html' ?>

    <div class="contentArea">

        <div class="divPanel notop page-content">

            <div class="breadcrumbs"> <a href="index.php">Home</a> &nbsp;/&nbsp; <span><?php echo $page?></span> </div>

            <div class="row-fluid">

			<!--Edit Sidebar Content here-->
                <div class="span3">
					<div>
                 <h3>Donate online</h3>
				 <p><a target="_blank" href="https://www.paypal.com/us/webapps/mpp/search-cause?charityId=75871&s=3"><img src="images/paypaldonate2.png" height="20" width="20"/></a></p>
				 <hr>

        <h3>Seattle Foundation</h3>
		<p><a target="_blank" href="https://secureform.cloud.clickandpledge.com/18045/1/?WID=62821"><img src="images/seattledonate.png" height="10" width="10"/></a></p>
          <a target="_blank" href="http://www.seattlefoundation.org/npos/Pages/KentFoodBankandEmergencyServices.aspx"><img src="images/seattlefoundation.png" class="img-polaroid" alt=""/></a>

			<!--<h3>Another Section</h3>
                 <p>Lorem Ipsum is simply dummy text of the printing and <a href="#">typesetting industry</a>.</p>
				 <p> Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.</p> -->


					</div>
					 <br>

					 <!-- images of help -->
		               	<h3>Help Feed Families</h3>
           <div id="myCarousel" class="carousel slide"><hr>
              <div class="carousel-inner">

				<div class="item active">
                <img src="images/client_images/feed1.jpg" class="img-polaroid" alt="feed one out of 1000">
                </div>

                <div class="item">
                <img src="images/client_images/feed2.jpg" class="img-polaroid" alt="feed children">
                </div>

                <div class="item">
                <img src="images/client_images/feed3.jpg" class="img-polaroid" alt="I'm the only one">
                </div>

              </div>

           <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
           <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
           </div>

		    <!-- end images of help -->

			<p><a class="btn btn-large" href="sponsorship.php"style="margin:5px 0px 15px;">Apply as Sponsor of Kent Food Bank</a></p>
          </div>

				<!--/End Sidebar Content -->

            	<!--Edit Main Content Area here-->
                <div class="span6" id="divMain">

                    <div>
					<h3>Clothing Bank</h3>
					<p >Accepts donations on M, T, W and F from 9 am – 2 pm of gently used men’s, women’s,
					children’s clothing along with small household items at</p>
					<p style="text-align: center; font-size: 25px;"><em>515 W. Harrison Street, Suite 107</em></p>
					<img src="images/client_images/location.jpg" alt="Kent Food Bank location"/>
					<hr>
					</div>

					<!-- amazom smile -->
					<div>
					<a target="_blank" href="http://smile.amazon.com/ch/91-0881434"><img src="images/amazon.gif" height=100% width=100%/></a>

					<ul>
						<br>
                        <li> Amazon donates 0.5% of the price of your eligible AmazonSmile purchases to the charitable organization of your choice.</li>
						<br>
                        <li> AmazonSmile is the same Amazon you know. Same products, same prices, same service. </li>
						<br>
                        <li> Support your charitable organization by starting your shopping at </li>
                    </ul>
					<h3><a target="_blank" href="http://smile.amazon.com/ch/91-0881434">smile.amazon.com</a></h3>
					</div>
					<!-- end amazon smile -->


				</div>
                <!--Edit Sidebar Content here-->
				<script>
function printPage(id)
{
   var html="<html><body><img src='images/client_images/top10.png' alt='Top 10 needed items' >";
   html+= document.getElementById(id).innerHTML;

   html+="</body></html>";

   var printWin = window.open('','','left=0,top=0,width=350,height=500,toolbar=0,scrollbars=1,status  =0');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
}
</script>
<div class="span3">



                 <img src="images/client_images/top10.png" alt="Top 10 needed items" >
				 <div class="border">
				<div id="block1">
						<p> We mostly need the following foods:</p>
						<?php include 'http://batchz.greenrivertech.net/Includes/topitems.php' ?>
                    <!--<ul>
                        <li> Soup – condensed and ready to eat </li>
                        <li> Canned vegetables </li>
                        <li> Canned tomato products </li>
                        <li> Canned fruit </li>
                        <li> Canned proteins – SPAM, tuna, chicken  </li>
                        <li> Ready to eat meals –chili, Chef Boyardee </li>
                        <li> Canned or bagged beans </li>
                        <li> Toiletries </li>
                        <li> Diapers and Formula </li>
                        <li> Office supplies –paper, pens, garbage bags </li>
                    </ul>-->
					</div>
				<div class="lead">
					<input class="btn btn-info btn-transparent" type="button" value="Print Items" name="printMe" onclick="printPage('block1');"></input>
					 </div>
					</div>




               <!-- <div class="span3">

                 <img src="images/client_images/top10.png" alt="Top 10 needed items" >

					<div class="border">
						<p> We mostly need the following foods:</p>
                    <ul>
                        <li> Soup – condensed and ready to eat </li>
                        <li> Canned vegetables </li>
                        <li> Canned tomato products </li>
                        <li> Canned fruit </li>
                        <li> Canned proteins – SPAM, tuna, chicken  </li>
                        <li> Ready to eat meals –chili, Chef Boyardee </li>
                        <li> Canned or bagged beans </li>
                        <li> Toiletries </li>
                        <li> Diapers and Formula </li>
                        <li> Office supplies –paper, pens, garbage bags </li>
                    </ul></div> -->
                <!-- Start Side Categories -->


            <!-- Edit Carousel -->
			  <br> <br> <br>

		   	<div style="border: solid;">
					<a target="_blank" href="http://www.fredmeyer.com/communityrewards"><img src="images/frd.png"/></a>
					<br>
					<br>
					<p style="text-align: center; margin: 5px;">Sign up for the Community Rewards program by linking your Fred Meyer Rewards Card to Kent Food Bank at:</p>
					<p style="text-align: center; margin: 5px;"><a target="_blank" href="http://www.fredmeyer.com/communityrewards">www.fredmeyer.com/<br>communityrewards</a></p>
					<p style="text-align: center; margin: 5px;">You can search for us by name,</p>
					<p style="text-align: center; margin: 5px;"><strong><em>Kent Food Bank or by our NPO # 83698</em></strong></p>
					</div>
	        <!-- /End Carousel -->

				<!--/End Sidebar Content -->
				<!--/End Main Content Area here-->
								</div>
</div>


            <?php include 'footer.html' ?>






</body>
</html>