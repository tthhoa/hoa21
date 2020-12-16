<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<div class="ze_list_items gallery">
<?php if(have_posts() ): while ( have_posts() ) : the_post();
     $str =get_the_excerpt();
    $total = wp_count_comments($post->ID);
   $meta = get_post_meta( get_the_ID() );
?>

        <article class="ze_archive product_list_ze" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="aluminium">
                <div class="row">
                <div class="img-p col-md-3 col-sm-3">  <?php echo the_post_thumbnail('full');  ?></div>
                <div class="frame col-md-9 col-sm-9">
                    <div class="frame-p-1">
                        <h1><a class="ze_titles" href="<?php the_permalink(); ?>" > <?php the_title(); ?></a></h1>
                       
                    </div>
                    <div class="frame-p-2">
                        <p>
                            <?php  echo substr($str,0,180).'[...]';  ?>
                        </p>
                        <a href="<?php the_permalink(); ?>"> CHECK IT NOW >></a>  
                    </div>
                </div>
            </div>
        </div> 
        </article><!-- #post-## -->					
        					
<?php
					endwhile;
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;


?>
</div>
<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();



?>
