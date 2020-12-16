  <?php

  global $post;

 if($the_query->have_posts()):while($the_query->have_posts()):$the_query->the_post();

   $meta =(string)get_post_meta( get_the_ID(),'formfile',true );
    $metauser =(string)get_post_meta( get_the_ID(),'userpost',true );
   //http://localhost/shop/wp-content/uploads/server/php/files/images.jpg
 //  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

            
 

  ?>

	<div class="show-post-defaul">
<span><?php echo $metauser; ?></span>
             <h1><?php the_title(); ?></h1>     
          
                <div class="thumbnail"> <?php echo the_post_thumbnail();  ?></div>

               <p class="ze_content"><?php echo get_the_content(); ?></p>
  
            <div class="content_show_post">
           
            	<ul class="gallery clearfix">
            <?php
         
       if($meta){
                $meta =explode(",",$meta);
                foreach($meta as $key)
                {
                     $src=plugins_url().'/application/uploadmaster/server/php/files/'.$key;
                    $info = new SplFileInfo($key);
                    $mini =$info->getExtension();
                    $arr=array('png','jpg','img');
                    $arrv=array('mp4','avi','3gp');
                    if(in_array($mini,$arr))
                    {
                    $url='	<li><a href="'.$src.'" rel="prettyPhoto[gallery2]"><img src="'.$src.'" width="60" height="60" alt="" /></a></li>'; 
                    echo  $img = apply_filters('the_content',$url);  
                   }if(in_array($mini,$arrv))
                   {
                     $url='[video width="366" height="360" src="'.$src.'"][/video]';
                   echo '<li><a href="#inline_demo3" rel="prettyPhoto[inline]">';
                echo    $img = apply_filters('the_content',$url);
                echo '</a></li>';
                   echo '<div id="inline_demo3" style="display:none;"><div> tu';
                            
                   
                   echo  $img = apply_filters('the_content',$url); 
                    echo '</div></div>';
                   }      
                }
            }  
            ?>
            </ul>
           </div>
           		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
			

			
			});
			</script>
    </div>

         

 <?php endwhile; endif;   ?>  
<div class="td_next_page">    
<?php
$big = 999999999; // need an unlikely integer
$paginate= array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $the_query->max_num_pages,
    'prev_text'          => __('Previous'),
	'next_text'          => __('Next'),
);

echo "<a href='".get_pagenum_link()."'>First</a>";
echo paginate_links($paginate);
echo "<a href='".get_pagenum_link($the_query->max_num_pages)."'>Last</a>";
 ?>
 </div>       