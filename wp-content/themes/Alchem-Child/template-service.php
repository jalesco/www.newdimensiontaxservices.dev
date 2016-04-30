<?php
/**
 * The template for displaying all single posts.
 * Template Name: Service Template
 * @package alchem
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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
 <div class="post-wrap">
            <div class="container">
                <div class="post-inner row <?php echo alchem_get_content_class($sidebar);?>">
                        <div class="col-main">
             


<?php echo do_shortcode('[...]'); ?>


<!--Display custom post types as page begin-->
            <?php $args = array(
            'post_type'=> 'service',
            'orderby'=> 'title',
            'order'=>'ASC',
            'showposts'=>'300'
            ); 
            $service = new WP_Query($args); 

            ?>
            <!--End of display custom post types-->



            <?php while ( $service->have_posts() ) : $service->the_post(); ?>           

                <!--List the service custom posts -->
                <ul class = "service-list">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <!-- within href, make the link the link of the custom post type -->
                     <!--<h1> <?php the_title(); ?> </h1>-->
                    <?php
                    
                    //display custom field if there is a description entered
                    if($service_descrip = get_post_meta(get_the_ID(), 'Description',true)) {
                        echo '<br>'.$service_descrip;
                    } //end if for displaying service description

                    //display custom field, "Price", if there is a price entered
                    if($service_price = get_post_meta(get_the_ID(), 'Price',true)) { //will display the "Price" post meta that has already been saved to database
                        echo '$'.$service_price;
                    }
                    ?>


                </ul>           

        <?php

            // End the loop.
            endwhile;



                        </div>
                        <?php if( $sidebar == 'left' || $sidebar == 'both'  ): ?>
       <div class="col-aside-left">
                        <aside class="blog-side left text-left">
                            <div class="widget-area">
                            <?php get_sidebar('postleft');?>
                            </div>
                        </aside>
                    </div>
            <?php endif; ?>
            <?php if( $sidebar == 'right' || $sidebar == 'both'  ): ?>        
                    <div class="col-aside-right">
                        <div class="widget-area">
                           <?php get_sidebar('postright');?>
                            </div>
                    </div>
             <?php endif; ?>
                    </div>
                </div>
            </div>
      </article>
<?php get_footer(); ?>