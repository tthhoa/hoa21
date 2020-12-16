<?php



//[post_items numble_post="2" post_type="portfolio_ze" taxonomy="portfolio_tag" term='27']



 class list_post_cat



 {   



    function __construct()



    {



         add_shortcode('post_items',array(__CLASS__,'post_items'));



         add_action( 'wp_enqueue_scripts', array(__CLASS__,'script_blog_items') );



    }



 static   function script_blog_items()



    {



        wp_enqueue_style('blog_items_stype',WP_PLUGIN_URL.'/application/css/stype_item.css');



        



    }



 static   function post_items($attr)



        {



            



            if(!isset($attr['numble_post']) || empty($attr['numble_post']))



            {



                $attr['numble_post']=1;



            }



            if(!isset($attr['post_type']) || empty($attr['post_type']))



            {



                $attr['post_type']= 'post';



            }



            if(!isset($attr['cat']) || empty($attr['cat']))



            {



                $attr['cat']= null;



            }



             if(!isset($attr['taxonomy']) || empty($attr['taxonomy']))



            {



                $tex =null;



            }else{



                $tex = array(



                	       array(



                            	'taxonomy' => $attr['taxonomy'],



                            	'terms'    => $attr['term'],



                            	),



                             );



            }



            if(!isset($attr['file']) || empty($attr['file']))



            {



                $attr['file']= 'default';



            }

  if(!isset($attr['shortdes']) || empty($attr['shortdes']))



            {



                $attr['shortdes']= '300';



            }

          



            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;



            $att = array(



                'posts_per_page'=> $attr['numble_post'],



                'post_type' => $attr['post_type'],



                'paged'     => $paged,



                'cat'       => $attr['cat'],        



                'tax_query' => $tex,



            );

   	       $part=URL_TEAMPLATE.'/teamplate/show_post/'.$attr['file'].'.php';

            $the_query =new WP_Query($att);



        	  ob_start();



           ?>



             <div class="ze_list_items gallery">



             <?php require($part);?>



          </div>      



        <?php

wp_reset_postdata(); 



         

?>

 

     

<?php

         $list_post = ob_get_contents(); //L?y toàn b? n?i dung phía trên b? vào bi?n $list_post d? return



         



                ob_end_clean();



         



                return $list_post;  



            



    }



 }



























