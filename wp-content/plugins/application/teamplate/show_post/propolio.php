   
<script src="<?php echo plugins_url();?>/application/js/jquery.prettyPhoto.js " type="text/javascript"></script>
<script src="<?php echo plugins_url();?>/application/css/prettyPhoto.css " type="text/javascript"></script>

<ul>
  <?php
  global $post;
  if($the_query->have_posts()):while($the_query->have_posts()):$the_query->the_post();
   $meta = get_post_meta( get_the_ID() );
  $term = the_terms($post->id,'portfolio_tag');
 // echo "<pre>";
 // print_r($term) ;
 // echo '</pre>';
   $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>
	       <div> 
           <h1><?php $catid =  wp_get_post_terms($post->ID, 'slideshow', array("fields" => "all"));
           
            ?></h1>  
                               
                 <li>    <a class="ze_thumbnail" rel="prettyPhoto[gallery<?php echo $catid[0]->term_id; ?>]"  href='<?php echo $imgsrc[0];  ?>'> 
                     <?php echo the_post_thumbnail();  ?> </a>
                    </li>
                 
            </div>
              
           
         
<?php endwhile;

    endif;
 ?>            
      </ul>    
        
  <script type="text/javascript" charset="utf-8">
		jQuery(document).ready(function(){
				jQuery("area[rel^='prettyPhoto']").prettyPhoto();
				jQuery(".gallery:first a[rel^='prettyPhoto']").prettyPhoto
                    ({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false, show_title: false});
                jQuery(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto
                    ({animation_speed:'normal',slideshow:10000, hideflash: true,show_title: false});
				});
		
	</script>