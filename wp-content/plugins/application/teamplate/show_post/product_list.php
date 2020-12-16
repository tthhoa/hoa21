 <div class="product_list_ze">
  <?php

  global $post;

 if($the_query->have_posts()):while($the_query->have_posts()):$the_query->the_post();
    $str =get_the_excerpt();
    $total = wp_count_comments($post->ID);
   $meta = get_post_meta( get_the_ID() );
 //  $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full"); ?>

	 <div class="aluminium">
         <div class="img-p" > 
         
          <?php echo the_post_thumbnail('full');  ?>
          <div class="js_hover_prd">
          <a href="javascript:void(0);" class="js_like"><i class="fa fa-heart"></i></a>
          <a href="<?php the_permalink(); ?>"><i class="fa fa-search"></i></a>          
          </div>
          
          </div>
         
            <div class="frame">
                <div class="frame-p-1">
                    <h1><a class="ze_titles" href="<?php the_permalink(); ?>" > <?php the_title(); ?></a></h1>
                   <div class="chat">               
                        <span><?php echo $total->total_comments; ?></span>
                        <p class="star-y"></p>
                    </div>
                </div>
                <div class="frame-p-2">
                    <p>
                        <?php  echo substr($str,0,180).'[...]';  ?>
                    </p>
                    <a href="<?php the_permalink(); ?>"> CHECK IT NOW >></a>  
                </div>
            </div>
        </div>   

         

 <?php endwhile;  endif;   ?>  

  </div>

<div class="paged_link">
 <?php   
   $big=999999; 
  // wp_link_pages( $defaults );


$args = array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),   		
	'format'             => '?paged=%#%',
	'total'              => $the_query->max_num_pages,
	'current'            =>  max( 1, get_query_var('paged') ),
	'show_all'           => False,
	'end_size'           => 1,
	'mid_size'           => 2,
	'prev_next'          => True,
	'prev_text'          => __(' Previous'),
	'next_text'          => __('Next '),
	'type'               => 'plain',
	'add_args'           => False,
	'add_fragment'       => '',
	'before_page_number' => '',
	'after_page_number'  => ''
);
//echo paginate_links($args); 


echo paginate_links($args) ;
//previous_posts_link( ' << preview  ');              

//next_posts_link('  next >>', $the_query->max_num_pages ); 
?>  
 </div>