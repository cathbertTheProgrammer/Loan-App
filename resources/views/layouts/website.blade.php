<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="UTF-8">

		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Kamulll Group</title>

		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180"  href="{{asset('assets/website/images/favicon/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/website/images/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/website/images/favicon/favicon-16x16.png')}}">



		<!-- Custom Css -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/custom/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/website/css/responsive/responsive.css')}}">
		<!-- Theme-Color css -->
		<link rel="stylesheet" id="jssDefault" href="{{asset('assets/website/css/custom/color.css')}}" >
       


		<!-- Fixing Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/html5shiv.js"></script>
		<![endif]-->
			

	</head>
	<body class="home">

		<div class="page_wrapper">

		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

	
		<!-- ==================== Style Switcher ==================== -->



        <!-- Header ___________________________________ -->

        <header class="p_color_bg">
        	<div class="container">
        		<div class="row">
	        		<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 header_left">
	        			<ul>
	        				<li><i class="fa fa-map-marker s_color" aria-hidden="true"></i><a href="#">PLOT 1, KALABO COURT , RHODESPARK, LUSAKA, ZAMBIA</a></li>
	        				<li><i class="fa fa-phone s_color" aria-hidden="true"></i><a href="#">Contact Us! (260) 765675740, 
                              (260) 957713086 </a></li>
	        				<li><i class="fa fa-clock-o s_color" aria-hidden="true"></i><a href="#"> Mon to Sat : 8.00 - 18.00</a></li>
	        			</ul>
	        		</div> <!-- End of .header_left -->
	        		</div> <!-- End of .header_right -->
        		</div>  <!-- End of .row -->
        	</div> <!-- End of .container -->
        </header> <!-- End of header -->




        <!-- Menu -->

        <div class="main_menu">
        	<div class="container">
        		<div class="logo float_left">
        			<a href="/"><img  src="{{asset('assets/website/images/logo/KAMULLL02_header.png')}}"  alt="logo" class="img-responsive"></a>
        		</div> <!-- End of .logo -->

        		<nav class="navbar navbar-default float_left">
				   <!-- Brand and toggle get grouped for better mobile display -->
				   <div class="navbar-header">
				     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
				       <span class="sr-only">Toggle navigation</span>
				       <span class="icon-bar"></span>
				       <span class="icon-bar"></span>
				       <span class="icon-bar"></span>
				     </button>
				   </div>
				   <!-- Collect the nav links, forms, and other content for toggling -->
				   <div class="collapse navbar-collapse float_left" id="navbar-collapse-1">
				     <ul class="nav navbar-nav">
				       <li><a href="/">Home</a></li>
				       <li class="dropdown"><a href="/about">About Us</a></li>
				       </li>
				       <li class="dropdown"><a href="#">Services</a>
				       		<ul class="sub-menu fix">
				       			
				       			<li><a href="/services/accounting-tax">Accounting & Tax Services Advisory</a></li>
				       			<li><a href="/services/immigration"> Immigration Services</a></li>
				       			<li><a href="/services/customs-and-clearing">Customs and Clearing Services</a></li>
				       			<li><a href="/services/cash-advance-and-loan">Cash Advance and Loan Services</a></li>
				       			
				       		</ul> 
				       </li>
					   <li><a href="{{ route('client.serviceRequest') }}" >Service Request</a></li>
				       
				       <li><a href="/contact">Contact</a></li>
						<li><a href="{{ route('login') }}" >Apply for Loan</a></li>
				     </ul>
				   </div><!-- /.navbar-collapse -->
				</nav>

				<div class="nav_right_area float_right">
					<div class="search_option float_left">
						<a href="{{ route('login') }}"  type="button" class="btn btn-primary btn-small">Sign in</a>
						<a  href="{{ route('register') }}" type="button" class="btn btn-success btn-sm">Sign up</a>
					</div>

				   
				   <div class="clear_fix"></div>
				</div> <!-- End of .nav_right_area -->
			<div class="clear_fix"></div>
        	</div> <!-- End of .container -->
        </div> <!-- End of .main_menu -->



     {{-- content comes here --}}
        {{ $slot }}



   		<!-- Footer ____________________________ -->

   		<footer>
   			<div class="overlay">
   				<div class="main_footer">
   					<div class="container">
   						<div class="row">
   							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer_logo">
   								<a href="index.html"><img src="{{asset('assets/website/images/logo/KAMULLL02_footer1.png')}}" alt="logo"></a>
   								<p>We provide expert consulting and financial advice to both individuals and businesses. With over 25 years of experience we will ensure that you are always getting the guidance from the top people in the entire finance industry.</p>
   								<ul class="social_icon">
			        				<li><a href="#" class="tran3s" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			        				<li><a href="#" class="tran3s" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			        				<li><a href="#" class="tran3s" title="Goolge-Plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
			        				<li><a href="#" class="tran3s" title="Skype"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
			        			</ul>
   							</div> <!-- End of .footer_logo -->

   							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 quick_links">
   								<div class="theme_title">
									<h4>Quick Links</h4>
								</div>

								<ul class="float_left">
									<li><a href="index.html" class="tran3s">Home</a></li>
									<li><a href="about.html" class="tran3s">About Us</a></li>
									<li><a href="service.html" class="tran3s">Services</a></li>
									<li><a href="#" class="tran3s">Testimonals</a></li>
									<li><a href="#" class="tran3s">Pricing</a></li>
									<li><a href="blog-default.html" class="tran3s">News</a></li>
									<li><a href="shop.html" class="tran3s">Shop</a></li>
									<li><a href="contact.html" class="tran3s">Contact us</a></li>
								</ul>
									<div class="clear_fix"></div>
   							</div> <!-- End of .quick_links -->

   							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 recent_news_footer">
   								<div class="theme_title">
									<h4>Recent News</h4>
								</div>

								<div class="single_news_footer">
									<div class="img_holder float_left">
										<img src="{{asset('assets/website/images/home/10.jpg')}}" alt="images">
										<div class="opacity tran3s">
											<div class="icon">
												<span><a href="blog-details.html" class="border_round p_color_bg"><i class="fa fa-chain s_color" aria-hidden="true"></i></a></span>
											</div> <!-- End of .icon -->
										</div> <!-- End of .opacity -->
									</div> <!-- End of .img_holder -->

									<div class="post float_left">
										<h6><a href="blog-details.html">Finance and legal work throughout the project.</a></h6>
										<p><a href="blog-details.html" class="tran3s"><i class="fa fa-clock-o" aria-hidden="true"></i> March 02, 2016</a></p>
									</div>
									<div class="clear_fix"></div>
								</div> <!-- End of .single_news_footer -->

								<div class="single_news_footer">
									<div class="img_holder float_left">
										<img src="{{asset('assets/website/images/home/11.jpg')}}" alt="images">
										<div class="opacity tran3s">
											<div class="icon">
												<span><a href="blog-details.html" class="border_round p_color_bg"><i class="fa fa-chain s_color" aria-hidden="true"></i></a></span>
											</div> <!-- End of .icon -->
										</div> <!-- End of .opacity -->
									</div> <!-- End of .img_holder -->

									<div class="post float_left">
										<h6><a href="blog-details.html">Our operations world neutral since 2010</a></h6>
										<p><a href="blog-details.html" class="tran3s"><i class="fa fa-clock-o" aria-hidden="true"></i> March 06, 2016</a></p>
									</div>
									<div class="clear_fix"></div>
								</div> <!-- End of .single_news_footer -->

								<div class="single_news_footer">
									<div class="img_holder float_left">
										<img src="{{asset('assets/website/images/home/12.jpg')}}" alt="images">
										<div class="opacity tran3s">
											<div class="icon">
												<span><a href="blog-details.html" class="border_round p_color_bg"><i class="fa fa-chain s_color" aria-hidden="true"></i></a></span>
											</div> <!-- End of .icon -->
										</div> <!-- End of .opacity -->
									</div> <!-- End of .img_holder -->

									<div class="post float_left">
										<h6><a href="blog-details.html">Way To The Global Stock Market</a></h6>
										<p><a href="blog-details.html" class="tran3s"><i class="fa fa-clock-o" aria-hidden="true"></i> March 11, 2016</a></p>
									</div>
									<div class="clear_fix"></div>
								</div> <!-- End of .single_news_footer -->

   							</div> <!-- End of .recent_news_footer -->


   							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer_contact">
   								<div class="theme_title">
									<h4>Contact</h4>
								</div>
								<p><span class="ficon flaticon-map"></span> PLOT 1, KALABO COURT  <br>, RHODESPARK, LUSAKA, ZAMBIA</p>
								<p><span class="ficon flaticon-phone"></span> <a href="#">(260) 765675740, (260) 957713086</a></p>
								<p><span class="ficon flaticon-messagetwo"></span> <a href="#">info@kamulllgroup.co.zm</a></p>
								<p><span class="ficon flaticon-clock"></span> Week Days   : 07:30 – 19:00 <br> Sunday         : Holiday</p>
   							</div> <!-- End of .footer_contact -->
   						</div> <!-- End of .row -->
   					</div> <!-- End of .container -->
   				</div> <!-- End of .main_footer -->

   				<div class="bottom_footer">
   					<div class="container">
   						<p class="float_left font_fix">&copy; 2024 Kamulll group of Companies Maintained by <a href="http://possfc.com" target="_blank">Possibility Frontier Consultancy</a></p>
   						<ul class="float_right">
   							<li><a href="#" class="tran3s" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			        		<li><a href="#" class="tran3s" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			        		<li><a href="#" class="tran3s" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			        		<li><a href="#" class="tran3s" title="Goolge-Plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
   						</ul>
   						<div class="clear_fix"></div>
   					</div>
   				</div> <!-- End of .bottom_footer -->
   			</div> <!-- End of .overlay -->
   		</footer>


			<!-- Scroll Top Button -->
			<button class="scroll-top tran3s s_color_bg border_round">
				<span class="ficon flaticon-up-arrow"></span>
			</button>


		<!-- Js File_________________________________ -->

		<!-- j Query -->
		<script type="text/javascript" src="{{ asset('assets/website/js/jquery-2.1.4.js') }}" ></script>
		<!-- Bootstrap JS -->
		<script type="text/javascript" src="{{ asset('assets/website/js/bootstrap/bootstrap.min.js') }}"></script>

		<!-- _________ vendor js __________ -->

		<!-- Google map js -->
		<script src="http://maps.google.com/maps/api/js"></script> <!-- Gmap Helper -->
		<script src="{{ asset('assets/website/js/gmap.js') }}"></script>
		<!-- revolution -->
		<script src="{{ asset('assets/website/vendor/revolution/jquery.themepunch.tools.min.js') }}"></script>
		<script src="{{ asset('assets/website/vendor/revolution/jquery.themepunch.revolution.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/website/vendor/revolution/revolution.extension.slideanims.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/website/vendor/revolution/revolution.extension.layeranimation.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/website/vendor/revolution/revolution.extension.navigation.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/website/vendor/revolution/revolution.extension.kenburn.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/website/vendor/revolution/revolution.extension.actions.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/website/vendor/revolution/revolution.extension.parallax.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/website/vendor/revolution/revolution.extension.migration.min.js') }}"></script>
		<!-- Language Stitcher -->
		<script type="text/javascript" src="{{ asset('assets/website/vendor/language-switcher/jquery.polyglot.language.switcher.js') }}"></script>
		<!-- Fancybox js -->
		<script type="text/javascript" src="{{ asset('assets/website/vendor/fancy-box/jquery.fancybox.pack.js') }}"></script>
		<!-- ui js -->
		<script type="text/javascript" src="{{ asset('assets/website/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
		<!-- owl.carousel -->
		<script type="text/javascript" src="{{ asset('assets/website/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
		<!-- js count to -->
		<script type="text/javascript" src="{{ asset('assets/website/vendor/jquery.appear.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/website/vendor/jquery.countTo.js') }}"></script>
		<!-- Style-switcher  -->
	    <script type="text/javascript"  src="{{ asset('assets/website/vendor/jQuery.style.switcher.min.js') }}"></script>
	    {{-- <script type="text/javascript" src="../../../cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js" src="{{ asset('assets/website/js/jquery-2.1.4.js') }}"></script> --}}

		<!-- Theme js _________ -->
		
		<script type="text/javascript" src="{{ asset('assets/website/js/theme.js') }}"></script>
		<script src="{{ asset('assets/website/js/map-script.js') }}"></script>

		</div>  <!-- End of .page_wrapper -->

	</body>

<!-- Mirrored from st.ourhtmldemo.com/template/consult-press/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Jun 2024 09:07:42 GMT -->
</html>