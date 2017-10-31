<?php
get_header();
?>
	<!--Header image-->
<div id="headerImage">
	<img src="<?= header_image(); ?>" alt="header">
</div>
<!--Image description-->
<div id="imageText">
	BILDTEXT
</div>
<div id="content">
  	<div id="latestNews">
	<h1>SENASTE NYTT</h1>
	<?php
		$i = 0;
		while ($i<2) :
		   	the_post();?>
		   	<article class="latestNews">
		   		<div class="latestNewsImage">
		   		<?php the_post_thumbnail('thumbnail'); ?>
		   		</div>
		   		<h4 class="date"><?php the_time("Y-m-d"); ?></h4>
		   		<h2><?php the_title(); ?></h2>
				<?php the_excerpt(45)+"..."; ?>
			</article>
			<?php 
			if ($i==0) {
				print "<hr>";
			}
			$i++;
	   endwhile;
	?>
</div>
</div>
<?php
get_footer();
?>