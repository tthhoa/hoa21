  <?php

  global $post;

 if($the_query->have_posts()):while($the_query->have_posts()):$the_query->the_post();

   $meta =(string)get_post_meta( get_the_ID(),'formfile',true );
    $metauser =(string)get_post_meta( get_the_ID(),'userpost',true );
   //http://localhost/shop/wp-content/uploads/server/php/files/images.jpg
 //  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");

            
//echo  $attr['shortdes'];

  ?>

	<div class="show-post-defaul">
<span><?php echo $metauser; ?></span>
             <h1><?php the_title(); ?></h1>     
          
                <div class="thumbnail"> <?php echo the_post_thumbnail();  ?></div>

               <p class="ze_content" postid="<?php echo get_the_ID(); ?>"><?php $str =get_the_content(); if(strlen($str)<=$attr['shortdes']){ echo substr($str,0,$attr['shortdes']); }else{ echo substr($str,0,$attr['shortdes'])."... "; ?>
               <a href="javascript: void(0)" onclick="showdesc(<?php echo get_the_ID();  ?>)"> More
               </a>
               <?php } ?></p>
            <div class="showfull" postidfull="<?php echo get_the_ID(); ?>"><?php echo $str;   ?>
                <a href="javascript: void(0)" onclick="showSortDesc(<?php echo get_the_ID();  ?>)"> Less
               </a>
            
            </div>
            <div class="content_show_post">
           

           </div>
           <?php if($meta): ?>
            <?php 
              $post_id = get_the_ID();
              $meta =explode(",",$meta);
              $default_types = wp_get_video_extensions();
              $defaults_atts = array(
                  'src'      => '',
                  'poster'   => '',
                  'loop'     => '',
                  'autoplay' => '',
                  'preload'  => 'metadata',
                  'width'    => 640,
                  'height'   => 360,
                );
              foreach ( $default_types as $type ) {
                  $defaults_atts[$type] = '';
                }
           ?>
             <div class="image_gallery">
               <div class="image_gallery_container">
                  <ul>
                    <?php foreach($meta as $k=>$key): ?>
                      <?php 
                        $src=plugins_url().'/application/uploadmaster/server/php/files/'.$key;
                        $info = new SplFileInfo($key);
                        $mini =$info->getExtension();
                        $arr=array('png','jpg','img');
                        $arrv=array('mp4','avi','3gp');
                       ?>
                      <?php if(in_array($mini,$arr)): ?>
                           <li class="item">
                              <div class="image_container"> 
                                 <a class="prettyPopup" href="<?php echo $src ?>" rel="prettyPopup[rel-<?php echo $post_id?>]">
                                    <img class="" src="<?php echo $src ?>" width="183" height="183" alt="" title="" />
                                 </a>
                              </div>
                           </li>
                        <?php elseif(in_array($mini,$arrv)): ?> 
                           <li class="item">
                              <div class="video_container"   style="width: 183px; height: 183px;position:relative;overflow: hidden"> 
                                <a class="prettyPopup prettyvideo" href="#h2s-video-<?php echo $post_id?>-<?php echo $k?>" rel="prettyPopup[rel-<?php echo $post_id?>]">
                                  <div class="mejs-overlay-button"></div>
                                </a>
                                <div class="h2s-video" id="h2s-video-<?php echo $post_id?>-<?php echo $k?>">
                                  <?php 
                                    $attr = array('src'=>$src);
                                    $atts = shortcode_atts( $defaults_atts, $attr, 'video' );
                                    array_unshift( $default_types, 'src' );
                                    $fileurl = '';
                                    $source = ''; 
                                    foreach ( $default_types as $fallback ) {
                                      if ( ! empty( $atts[ $fallback ] ) ) {
                                        if ( empty( $fileurl ) ) {
                                          $fileurl = $atts[ $fallback ];
                                        }
                                        $type = wp_check_filetype( $atts[ $fallback ], wp_get_mime_types() );
                                        $url = add_query_arg( '_', $instance, $atts[ $fallback ] );
                                        $source = sprintf( '<source type="%s" src="%s" />', $type['type'], esc_url( $url ) );
                                      }
                                    }
                                   ?>
                                  <!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
                                  <video class="h2s-video" id="video-<?php echo $post_id?>-<?php echo $k?>" preload="metadata" controls="controls">
                                   <?php echo $source; ?>
                                 </video>
                               </div>
                             </div>
                           </li>
                       <?php endif; ?>

                 <?php endforeach; ?>
                </ul>
         </div> 
       </div>
   <?php endif; ?>
   <style>
   .showfull{
    display: none;
   }
   
   </style>
   		<script type="text/javascript" charset="utf-8">
  			 jQuery(document).ready(function(){
               jQuery(".prettyPopup").prettyPhoto({overlay_gallery: false,theme: 'pp_default'});
          });
          
          function showdesc(id)
          {
      
           
            $("[postid='"+id+"']").css('display','none');
            $("[postidfull='"+id+"']").css('display','block');
            
          }
          function showSortDesc(id)
          {
      
           
            $("[postid='"+id+"']").css('display','block');
            $("[postidfull='"+id+"']").css('display','none');
            
          }
			</script>
    </div>
 <?php endwhile; endif;   ?>  
 <style type="text/css">
 .prettyvideo{ background-color: rgba(77, 72, 72, 0.24);position: absolute;width: 100%;height:100%}
 .video_container{overflow: hidden;position: relative;}
 .video_container video {
    width: 220px;
    height: 218px;
    right: -10px;
    position: absolute;
    top: 0px;
}
a.prettyvideo{z-index: 100};
 </style>
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