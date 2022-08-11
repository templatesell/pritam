<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pritam
 */
$GLOBALS['pritam_theme_options'] = pritam_get_options_value();
global $pritam_theme_options;
$search_header = absint($pritam_theme_options['pritam_enable_search']);
?>
<?php 
$header_image = esc_url(get_header_image());
$header_class = ($header_image == "") ? '' : 'header-image';
?>
<header class="<?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
	<div class="container">
		<div id="TopBar" class="top-bar">
			<div class="menu-btn">
                <a href="#" title="">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </a>
            </div><!--menu-btn end-->
			<nav>
				<div class="desktop-menu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container' => 'ul',
							'menu_class'      => ''
						));
					?>
				</div>
				<div class="side-menu">
					<a href="#" data-focus="#TopBar .menu-btn a" title="" class="close-sidemenu"><i class="la la-close"></i></a>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container' => 'ul',
							'menu_class'      => 'navigation'
						));
					?>
				</div><!--side-menu end-->
			</nav><!--navigation end-->
			<div class="rt-subs">
				<a class="subscribe-btn" href="#" title=""><i class="la la-envelope-o"></i> Subscribe</a>
				<?php if( 1 == $search_header ){ ?>
				<a class="search-btn" href="#" title="">
					<i class="la la-search"></i>
				</a>
				<?php } ?>
			</div><!--rt-subs end-->
			<div class="clearfix"></div>
		</div>
		<div class="bottom-header brb"> 
			<div class="container">
				<div class="logo">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
					<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<?php
				else :
					?>
					<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<?php
				endif;
				$pritam_description = get_bloginfo( 'description', 'display' );
				if ( $pritam_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $pritam_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
				</div><!-- logo end-->
			</div>
		</div><!--bottom-header end-->
	</div>
</header><!--HEADER END-->

<div class="search-page">
	<form>
		<div class="container">
			<div class="form-field">
				<?php echo get_search_form(); ?>
			</div>
		</div>
	</form>
	<a href="#" data-focus="#TopBar .search-btn" class="close-search"><i class="la la-close"></i></a>
</div><!--SEARCH PAGE END-->

