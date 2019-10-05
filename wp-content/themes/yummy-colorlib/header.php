<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    

    <!-- Favicon -->
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/core-img/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57"   href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60"   href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72"   href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76"   href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_url'); ?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_url'); ?>/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">


	
	<?php wp_head(); ?>

</head>

<body class="bg-pattern">
    <!-- Preloader Start -->
<?php /*     <div id="preloader">
        <div class="yummy-load"></div>
    </div> */?>

	<?php //get_sidebar('fixed'); ?>

    <!-- ****** Top Header Area Start ****** -->
      <div class="top_header_area">
        <div class="container">
            <div class="row">
                 
                <!--  Login Register Area -->
                <div class="col-12 col-sm-12">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area d-flex">
                            <div class="login">
                                <a href="register.html">Privacy Policy</a>
                            </div>
                            <div class="register">
                                <a href="register.html">Contact Us</a>
                            </div>
                        </div>
                        <!-- Search Button Area -->
							
					<form role="search" method="get" class="search-form" action="<?php echo site_url(); ?>" style="margin-left: 3%;">
		
						<div class=" bg-light rounded rounded-pill shadow-sm ">
							<div class="input-group">
							  <input name="s" type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
							  <div class="input-group-append">
								<button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
							  </div>
							</div>
						  </div>
					</form>
				
								
						
                       
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                         <a href="<?php echo site_url(); ?>" class="yummy-logo"><?php bloginfo('title'); ?></a>
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