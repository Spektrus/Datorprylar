<script>
	/* ACCORDION JQUERY MENY */
	jQuery(document).ready(function($) {
		$('.product-categories').accordion({
		    collapsible: true,
		    active: false,
		    heightStyle: "content", // height fix
		    animate: false
		});
		$('.current-cat-parent a').click(); // open correct category
	});
	jQuery(document).ready(function($) {
		$('.product-categories').accordion({
		    collapsible: true,
		    animate: true,
		    heightStyle: "content"
		});
	});
 </script>

<div id="sidebar">
	<ul>
	<?php dynamic_sidebar( 'Produktkategorier' ); ?>
	</ul>
</div>

