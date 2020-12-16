 <?php


   global $post;





   $meta = get_post_meta( get_the_ID() );


 // $term = the_terms($post->id,'portfolio_tag',',');





  echo "<pre>";


 // print_r($part) ;


   echo '</pre>';


   ?>


  <div class="ze_list_items">


               <a class="ze_titles" href="<?php the_permalink(); ?>"> <h1><?php the_title(); ?></h1></a>


               <div class="data"><p>author by:<?php the_author(); ?> </p> <samp>date: <?php echo get_the_date(); ?> 


               <p>Category: <?php the_terms($post->id,'portfolio_tag','',',','.'); ?></p></samp></div>       


               <a class="ze_thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?> </a>


               <p class="ze_content"><?php $str =get_the_content(); if(strlen($str)<=300){ echo substr($str,0,300); }else{ echo substr($str,0,300); ?>
               <a href="<?php the_permalink(); ?>"> Readmore..</a>
               <?php } ?></p>


               <div class="BI_readmore"><a href="<?php the_permalink(); ?>"> Read more</a></div>


           <div class="BI_share_box">


           


          <?php $link= get_the_permalink();


           ?>


           </div>


            </div>


        