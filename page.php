<?php
	get_header();
	get_sidebar();
?>

<div id="content">
		<?php
		if ( have_posts() ) :
		   while ( have_posts() ) :
		      the_post(); ?>
		  	  <h3 id="page-title"><?php the_title(); ?></h3><?php
		      the_content();
		   endwhile;
		endif;
		?>
</div>
<?php
	get_footer(); 
?>