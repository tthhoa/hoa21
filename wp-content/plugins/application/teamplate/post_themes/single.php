
<?php get_header();?>
<div class="col-md-8">
<?php

while(have_posts() ) : the_post();
 ?>



	

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="single-entry-title"><?php the_title(); ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>            
		</div>
        <div class="jfc-video"> <input type="button" value="Back" onclick="history.back(-1)" style="background: red;" /> 
            <ul class="no-list-style">
                <li><a rel="nofollow" target="_blank" href="http://www.facebook.com/pages/Northstar-Motor-Group/271551188196"><span class="facebook"></span></a></li>
                <li><a rel="nofollow" target="_blank" href="http://twitter.com/NorthstarMoto"><span class="twitter"></span></a></li>
                <li><a rel="nofollow" target="_blank" href="https://plus.google.com/106539406319734062456/posts"><span class="google"></span></a></li>
            </ul>
        </div>
        <div class="content-excerpt"> <?php the_excerpt() ?></div>

    </div>
	


<?php endwhile ?>

 </div><!-- .post -->
	

	
	



<?php get_sidebar() ?>

<?php get_footer() ?>

