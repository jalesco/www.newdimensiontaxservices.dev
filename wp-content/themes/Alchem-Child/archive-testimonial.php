<?php
/*
Template Name: Archive Testimonials
 */

get_header(); 
$sidebar                 = esc_attr(alchem_option('blog_single_sidebar','none'));
$page_title_bg_parallax  = esc_attr(alchem_option('page_title_bg_parallax','no'));
$page_title_align        = esc_attr(alchem_option('page_title_align','left'));
$single_display_title_bar = esc_attr(alchem_option('single_display_title_bar','yes'));

$title_bar_css_class = '';
if($page_title_bg_parallax=="yes")
$title_bar_css_class = 'parallax-scrolling';
?>

<?php if( $single_display_title_bar == 'yes' ):?>
<section class="page-title-bar title-<?php echo $page_title_align;?> no-subtitle <?php echo $title_bar_css_class;?>">
            <div class="container">
                <hgroup class="page-title text-light">
                    <h1><?php the_title();?></h1>
                </hgroup>
                <?php //alchem_get_breadcrumb(array("before"=>"<div class='breadcrumb-nav text-light'>","after"=>"</div>","show_browse"=>false,"separator"=>''));?>    
                <div class="clearfix"></div>            
            </div>
        </section>
        <?php endif;?>   

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>



			<!--Display custom post types as page begin-->
			<?php $args = array(
		 	'post_type'=> 'testimonial',
		 	'orderby'=> 'title',
		 	'order'=>'ASC',
		 	'showposts'=>'300'
		 	); 
			$testimonials = new WP_Query($args);	

			?>
			<!--End of display custom post types-->



			<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>			

				<!--List the service custom posts -->
				<ul class = "testimonial-list">
					<!--<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> within href, make the link the link of the custom post type -->
					 <!--<h2> <?php the_title(); ?> </h2>-->
				<li>
					<?php
					
					//display custom field if there is a description entered

					/*
					if($service_descrip = get_post_meta(get_the_ID(), 'Description',true)) {
						echo '<br>'.$service_descrip;
		    		} //end if for displaying service description

		    		//display custom field, "Price", if there is a price entered
		    		if($service_price = get_post_meta(get_the_ID(), 'Price',true)) { //will display the "Price" post meta that has already been saved to database
						echo '$'.$service_price;
					}
					*/
					

						//THis is how to output using advanced custom fields plug-in
						the_field('testimonial_description');

					?> 
				</li>


			    </ul>			

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

