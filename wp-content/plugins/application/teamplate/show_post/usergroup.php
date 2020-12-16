  <?php

  global $post;

 if($the_query->have_posts()):while($the_query->have_posts()):$the_query->the_post();

 $meta = get_post_meta( get_the_ID() ); 
 //  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	<div class="show-post-defaul row">

            <div class="col-md-1">
                <div class="thumbnail"> <?php echo the_post_thumbnail();  ?>
                </div>
            </div>
               <div class="col-md-3">
                
               <a class="ze_titles" href="<?php the_permalink(); ?>" > <h1><?php the_title(); ?></h1></a>
               </div>
                <div class="col-md-3">
               <p><?php echo $meta['Department']['0']; ?></p>
               </div>
                <div class="col-md-2">
               <p><?php echo $meta['Phone']['0']; ?></p>
               </div>
                <div class="col-md-3">
               <p><?php echo $meta['Email']['0']; ?></p>
              </div>
              

    </div>

         

 <?php endwhile; endif;   ?>  

     

          

     