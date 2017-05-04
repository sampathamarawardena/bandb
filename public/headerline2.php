<!DOCTYPE html>
<html>
<body>
<!--header-->
<div class="navigation">
	<div class="container-fluid">
		<nav class="pull">
			<ul>
				<li><a  href="index.php">Home</a></li>
				<li><a  href="about.php">About Us</a></li>
				<li><a  href="terms.php">Terms</a></li>
				<li><a  href="privacy.php">Privacy</a></li>
				<li><a  href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</div>
</div>

<div class="header">
	<div class="container">
		<!--logo-->
		<div class="logo">
			<h1><a href="index.php">Bed and Breakfast</a></h1>
		</div>

		<!--//logo-->
		<div class="top-nav">
			<ul class="right-icons">
				<li><span ><i class="glyphicon glyphicon-phone"> </i>+9471 0737023</span></li>
				<li><a  href="login.php"><i class="glyphicon glyphicon-user"> </i>My Account</a></li>
				<li><a  href="public/logout.php"><i class="glyphicon glyphicon-registration-mark "> </i>Logout</a></li>
				<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a></li>

			</ul>
			<div class="nav-icon">
				<div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
					<a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> </a>
				</div>
			</div>
			<div class="clearfix"> </div>
			<!---pop-up-box---->

			<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
			<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
			<!---//pop-up-box---->
			<div id="small-dialog" class="mfp-hide">
				<!----- tabs-box ---->
				<div class="sap_tabs">
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						<ul class="resp-tabs-list">
							<li class="resp-tab-item " aria-controls="tab_item-2" role="tab"><span>For Rent</span></li>
							<div class="clearfix"></div>
						</ul>
						<div class="resp-tabs-container">
							<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>All Homes</h2>
							<div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
								<div class="facts">
									<div class="login">
										<input type="text" value="Search Address, City or Zip" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address, Neighborhood, City or Zip';}">
										<input type="submit" value="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion
								width: 'auto', //auto or any width like 600px
								fit: true   // 100% fit in a container
							});
						});
					</script>
				</div>
			</div>
			<script>
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});

				});
			</script>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!--//-->
</body>
</html>