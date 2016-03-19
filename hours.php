<!DOCTYPE HTML>
<html>
<?php global $page; $page = 'Hours'; ?>
<?php include 'header.html' ?>

<body id="pageBody">

<div id="divBoxed" class="container">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>

 <?php include 'menu.html' ?>

    <div class="contentArea">

        <div class="divPanel notop page-content">

            <div class="row-fluid">
            <!--Edit Main Content Area here-->
                <div class="span6">
                          <h1 id="hours"><i class="icon-time"></i> Hours of Operation </h1>
					<hr>
                     <!--<iframe src="https://calendar.google.com/calendar/embed?src=81bpf1eaelfausrs1vvt7agbrg%40group.calendar.google.com&ctz=America/Los_Angeles" style="border: 0" width="1000" height="600" frameborder="0" scrolling="no"></iframe>-->
                <iframe src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=81bpf1eaelfausrs1vvt7agbrg%40group.calendar.google.com&amp;color=%23853104&amp;ctz=America%2FLos_Angeles" style="border-width:0" width=100% height="300" frameborder="0" scrolling="no"></iframe>
				     	<p class="warning">Food Distribution (Clients may visit twice a month for food service)</p>
				<iframe src="https://calendar.google.com/calendar/embed?title=Kent%20Distribution%20Hours&amp;mode=AGENDA&amp;height=250&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=3kojil5t5sckp4gtqlg1o9e5gs%40group.calendar.google.com&ctz=America/Los_Angeles" style="border-width:0" width=100%  height="300" frameborder="0" scrolling="no"></iframe>
				<!-- Beginning of parking hint -->
				<div class="row-fluid">
				
				<div class="span6">Please park in legal designated parking spots to avoid tickets and towing!
								HomeStreet Bank and Key Bank are private lots.
								Parking in their lots could result in your vehicle being towed at your own expense.</div>
				<div class="span6"><img src="images/client_images/parking.png" alt="parking"></div>
				</div>
				<!-- End of parking hint -->
				</div>
				<!--/End Sidebar Content -->

            	<!--Edit Main Content Area here-->
                <div class="span6" id="events">

                    <h1><i class="icon-flag"></i> Annual Events</h1>
					<hr>
                    <p class= "annEvents">
           <div class="small"> <div class="text short">
		   <h3>February – Annual Meeting</h3>
           <p>A meeting open to the public to approve the annual operating budget.
           The previous year’s successes and challenges are discussed.</p>
           </div><a class="read-more">Show More</a></div>
 			
			<div class="small">
 			<div class="text short">
 			<h3>March – Scouting For Food Drive</h3>
 			<p>Scouts go out on one weekend (in March), place hangers on the doors of their neighbors,
            and come back later (usually the next week) to pick up the food and take it to the Kent Food Bank. </p>
            </div><a class="read-more">Show More</a>
            </div>


			<div class="small">
			 <div class="text short">
			 <h3 >May – NALC Stamp Out Hunger National Food Drive</h3>
			 <p>Every second Saturday in May, letter carriers in more than 10,000 cities and towns across
            America collect the goodness and compassion of their postal customers, who participate
            in the NALC Stamp Out Hunger National Food Drive — the largest one-day food drive in the nation</p>

            </div><a class="read-more">Show More</a>
            </div>

			 <div class="small">
			 <div class="text short">
			 <h3 id="summer">Summer – Volunteer Picnic</h3><p>
            To show our appreciation for all the hard work and dedication our volunteers have given,
            we hold a picnic in their honor. </p>
            </div><a class="read-more">Show More</a>
            </div>

            <div class="small">
            <div class="text short">
            <h3 id="oct">October – Fundraising Breakfast</h3><p>
            The fundraising breakfast is <strong>Kent Food Bank’s largest fundraiser of the year.</strong>
            40 tables of 8 enjoy a program, breakfast, entertainment, and a raffle. If interested
            in donating a raffle item, sponsoring the event or attending, please contact <a href="mailto: kentfoodbank@gmail.com">kentfoodbank@gmail.com</a> anytime throughout the year. </p>
            <img src="images/client_images/breakfast.png" alt="fundraising"></a>
			</div><a class="read-more">Show More</a>
            </div>

 			<div class="small">
 			<div class="text short">
 			<h3 id="nov">November – Torklift Central Turkey Drive</h3>
            <p>In 2011, the Kent Food Bank lost the majority of their funding for
            the holiday season, leaving many households scrambling to find ways to
            feed their families. This deeply impacted the community and Torklift Central
            responded by organizing the 1st Annual Kent Turkey Challenge. Since then, donations
            to the Kent Food Bank from the Annual Kent Turkey Challenge total thousands of dollars
            for turkey purchase and thousands of pounds of non - perishable food, feeding thousands
            of families that would otherwise go without a Thanksgiving meal. </p>
            </div><a  class="read-more">Show More</a>
            </div>

			 <div class="small">
			 <div class="text short">
			 <h3 id="dec">December – Holiday Food and Toy distribution</h3>
            <p>Kent Food Bank distributes self select holiday food boxes in addition to the regular December distributions.
            Kent Food Bank partners with the Toys for Joy program and distributes toys to children 12 and under. </p>
            </div><a class="read-more">Show More</a>
            </div>

				</div>

				
            </div>



  <?php include 'footer.html' ?>
  <script>
$(document).ready(function(){
    $(".read-more").click(function(){
        var $elem = $(this).parent().find(".text");
        if($elem.hasClass("short"))
        {
            $elem.removeClass("short").addClass("full");
			$(this).text('Show less');
        }
        else
        {
            $elem.removeClass("full").addClass("short");
			$(this).text('Show more');
        }
    });
});
</script>
</body>
</html>