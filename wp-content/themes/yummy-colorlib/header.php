<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php wp_title(); ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/core-img/favicon.ico">

	
	<?php wp_head(); ?>

</head>

<body class="bg-pattern">
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

	<?php //get_sidebar('fixed'); ?>

    <!-- ****** Top Header Area Start ****** -->
    <?php /* <div class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!--  Login Register Area -->
                <div class="col-7 col-sm-6">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area d-flex">
                            <div class="login">
                                <a href="register.html">Sing in</a>
                            </div>
                            <div class="register">
                                <a href="register.html">Sing up</a>
                            </div>
                        </div>
                        <!-- Search Button Area -->
                        <div class="search_button">
                            <a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <!-- Search Form -->
                        <div class="search-hidden-form">
                            <form action="#" method="get">
                                <input type="search" name="search" id="search-anything" placeholder="Search Anything...">
                                <input type="submit" value="" class="d-none">
                                <span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> */ ?>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                         <a href="<?php echo site_url(); ?>" class="yummy-logo">Merry Christmas</a>
                    </div>
					 <div class="text-center">
                         <span class="yummy-slogan"><?php bloginfo('description'); ?></span>
                    </div>
                </div>
            </div>

			
			<?php get_sidebar('menu'); ?>
			
            
        </div>
    </header>
    <!-- ****** Header Area End ****** -->