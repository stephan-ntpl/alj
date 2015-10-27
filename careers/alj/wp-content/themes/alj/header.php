<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage alj
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		echo esc_html( ' | ' . sprintf( __( 'Page %s', 'alj' ), max( $paged, $page ) ) );

	?></title>
<link href="<?php bloginfo('template_url'); ?>/assets/vendors/jqueryui/jquery-ui.min.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/vendors/font-awesome/font-awesome.min.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/vendors/jquery.mmenu/css/jquery.mmenu.all.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/vendors/royalslider/royalslider.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/vendors/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/vendors/chosen/chosen.min.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/vendors/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/vendors/animate.css/animate.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/fonts/alj-icons/styles.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/css/c-bootstrap.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/css/main.min.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/assets/css/custom.css" rel="stylesheet">
<!-- favicon -->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon.ico" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-57x57.png"> 
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-60x60.png"> 
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-72x72.png"> 
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_url'); ?>/assets/img/favicon/android-icon-192x192.png"> 
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-32x32.png"> 
<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-96x96.png"> 
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/manifest.json"> 
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/assets/img/favicon/ms-icon-144x144.png"> 
<meta name="theme-color" content="#51859A">
<?php
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script>
    jQuery(document).ready(function(){
    jQuery("#logout-url").hide();
    });
</script>
</head>

<body>
		<nav id="site-nav">
			<ul>
				<li class="title"><h2>Menu</h2></li>
				<li><a href="#" class="btn-switch active" data-section="working"><span>Working in the Middle East</span></a></li>
				<li><a href="#" class="btn-switch" data-section="living"><span>Living in the Middle East<span></a></li>
				<li><a href="#" class="btn-switch" data-section="about"><span>Who Are Abdul Latif Jameel</span></a></li>
				<li class="title"><h2>Downloads</h2></li>
				<li><a href="http://google.com/">Employee Handbook</a></li>
				<li><a href="http://apple.com/">Corporate Brochure</a></li>
				<?php if (is_user_logged_in()) { ?>
						<a class="alj-logout" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
				<?php } else { ?>
				<li class="login-nav" >
					<span>Login</span>
					<ul id="alj-login">
						<li class="title">
							<h2>Login</h2>
						</li>
						<li id="logout-url"><a class="alj-logout" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></li>
						<li class="login-form">
							 <form id="login" action="login" method="post">
								
								<p class="status"></p>
								<input id="username" type="text" name="username" placeholder="Username" /><br>
								<input id="password" type="password" name="password" placeholder="Password"/>
								<button class="submit_button" type="submit" name="submit">Login</button>
								<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
								
							</form>
							
						</li>
						<li class="login-nav">
							<span class="no-style">Forgot Password?</span>
							<ul>
								<li class="title">
									<h2>Forgot Password</h2>
								</li>
								<li class="login-form">
									<form id="forgot_password" class="ajax-auth" action="wp-login.php?action=lostpassword" method="post">    
										<p class="status"></p>  
										<?php wp_nonce_field('ajax-forgot-nonce', 'forgotsecurity'); ?>  
										<input id="user_login" type="text" class="required" name="user_login" placeholder="Username">
										 <button class="submit_button" type="submit">Send</button> 
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<?php } ?>
				<li class="main-site">
					<a href="http://alj.com/">www.alj.com</a>
				</li>
			</ul>
		</nav>
		
		<div id="site-wrapper" class="working">
			<!-- Background -->
			<div id="topBackground" class="fixFixed">
				<div class="media-space image-background vh_height100">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/media/2.jpg" alt="">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/brand/illum.svg" id="illum" alt="">
				</div>
			</div>
			<header id="site_header" class="site-header vh_height100 fixFixed">
				<a href="#site-nav" class="menu-trigger">
					<i class="alj-hamburger"></i>
					<i class="alj-menu-icon"></i>
				</a>
				<a href="/" class="logo-white">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/brand/logo.svg" id="logo_white" alt="Abdul Latif Jameel">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/brand/logo.svg" id="logo_normal" alt="Abdul Latif Jameel">
				</a>
				<div class="hidden-switch">
					<div class="btn-section current" data-section="working"><span>Working in the Middle East<span></div>
					<a href="" class="btn-section next" data-section="living"><span>Living in the Middle East</span></a>
					<a href="" class="btn-section previous" data-section="about"><span>Who Are Abdul Latif Jameel</span></a>
				</div>
				<div class="head-buttons">
					<a href="#" class="btn-switch active" data-section="working"><span>Working in the Middle East</span></a>
					<a href="#" class="btn-switch" data-section="living"><span>Living in the Middle East</span></a>
					<a href="#" class="btn-switch" data-section="about"><span>Who Are Abdul Latif Jameel</span></a>
				</div>
				
				<a href="#" class="button-down">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/icons/scroll-down.gif" alt="">
				</a>
			</header>