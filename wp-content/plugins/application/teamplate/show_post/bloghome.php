  <div class="row">
  <?php

  global $post;
 if($the_query->have_posts()):while($the_query->have_posts()):$the_query->the_post();

    $meta = get_post_meta( get_the_ID() ); $stt=$stt+1;
 //  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
    ?>
           
            <div class="col-sm-6">
                <h3><span class="red-text"><?php echo the_title();?></span></h3>
                <p><?php $str =get_the_content(); echo substr($str,0,200).'[...]'; ?>                 
                 <a class="read-more" href="<?php the_permalink(); ?>">Read more</a></p>            
            </div>
 <?php  endwhile; endif;   ?>  
</div>
     

          

     