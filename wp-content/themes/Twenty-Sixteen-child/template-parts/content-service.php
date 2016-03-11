<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			//Another way to output the custom field (using CPT UI)
			//get_the_ID() is a function that will return the post ID of the particular post we are in
			//'Price' is the name of the custom field
			//the boolean refers to whether it is a single or repeating field. If true, it is a single field
			$service_price = get_post_meta(get_the_ID(), 'Price',true); //will display the "Price" post meta that has already been saved to database
			echo '$'.$service_price.'<br>';

			if($service_descrip = get_post_meta(get_the_ID(), 'Description',true)) {
				echo $service_descrip;
		    }


			the_content(); //Refers to the content of the site

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>

		


	</div><!-- .entry-content -->

	<footer class="entry-footer">
			<?php 
			//This allows us to customize the display of the custom taxonomy
			//The class that we assasign will allow us to customize how it looks in CSS
			echo get_the_term_list( $post->ID, 'preparer', '<div class="service_items">', '<br> ', '</div>' ) 
			?>

		<?php twentysixteen_entry_meta(); 
			//the_taxonomies(); //outputs the custom taxonomies
		?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
