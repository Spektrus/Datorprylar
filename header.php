<!DOCTYPE html>
<html>
<head>
	<title> <?php bloginfo("name"); ?></title>
	<meta charset="utf-8" />
	<meta name="author" content="Mathias Beckius" />
	<meta name="description" content="<?= bloginfo("description")?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="<?= bloginfo("stylesheet_url") ?>" type="text/css" rel="stylesheet" />
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>
	<!--Wrapper-->
	<div id="wrapper">
		<!--Wrapper without footer-->
		<div id="content-wrapper">
			<!--Header-->
			<header>
				<!--Logo-->
				<div id="logo">
				<?php the_custom_logo(); ?>
				</div>
				<!--Menu-->
				<nav>
				<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
					<?php wp_nav_menu(); ?>
				</nav>
			</header>