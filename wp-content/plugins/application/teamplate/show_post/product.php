



<script>
(function(){
    $('.ze_titles').hover(function(){
        
     $(this).find('.js_titl').stop().fadeIn();  
        
    },function(){
        
         $(this).find('.js_titl').stop().fadeOut();  
    });
    
    
})(jQuery)


</script>

<div class="row" >
  <?php

  global $post;

 if($the_query->have_posts()):while($the_query->have_posts()):$the_query->the_post();
//
   $meta = get_post_meta( get_the_ID() );
  //$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
    <div class="jf_product col-md-4 itemid_<?php echo $post->ID;?>">
         <a class="ze_titles" href="<?php the_permalink(); ?>" >                 
                <div class="js_thumb"><?php echo the_post_thumbnail('full'); ?></div>
                
                <div class="js_titl"><?php the_title(); ?></div>
               
               
                </a>
        
        
    </div>
 <?php endwhile; endif;   ?>  

     
</div>
          
<?php
next_posts_link( 'Older Entries', $the_query->max_num_pages );
previous_posts_link( 'Newer Entries' );
 ?>
     