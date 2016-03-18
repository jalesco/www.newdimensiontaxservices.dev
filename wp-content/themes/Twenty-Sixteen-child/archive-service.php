<?php
/*
Template Name: Archive Services
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<!--Display custom post types as page begin-->
			<?php $args = array(
		 	'post_type'=>'service',
		 	'orderby'=>'title',
		 	'order'=>'ASC',
		 	'showposts'=>'300'
		 	); 
			$service = new WP_Query($args);	

			?>
			<!--End of display custom post types-->

			<?php
			// Start the Loop.
			while ( $service->have_posts() ) : $service->the_post();

				?>

				<p class = "service-list">
					<!--<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> within href, make the link the link of the custom post type-->
					<h1> <?php the_title(); ?> </h1>

					<?php
					

					if($service_descrip = get_post_meta(get_the_ID(), 'Description',true)) {
						echo '<br>'.$service_descrip;
		    		} //end if for displaying service description

		    		if($service_price = get_post_meta(get_the_ID(), 'Price',true)) { //will display the "Price" post meta that has already been saved to database
						echo '$'.$service_price;
					}
		    		?>

			    </p>			

		<?php

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
