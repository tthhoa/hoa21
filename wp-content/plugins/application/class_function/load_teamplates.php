<?php 



class load_templates

{

    private $post_type_app;

    static function init()

    {

        add_filter( 'template_include', array(__CLASS__,'load_file_template_single'));

        add_filter( 'template_include', array(__CLASS__,'load_file_template_page'));

    }

    function __construct()

    {

        $this->post_type_app= "portfolio_ze";

    }



 static   function load_file_template_single( $template) 

    {

        // Post ID

       // $post_type = $this->post_type_app;

        $post_id = get_the_ID();

    

        // For all other CPT

        if ( get_post_type( $post_id ) != 'portfolio_ze' ) {

            return $template;

        }

        $part_single = URL_TEAMPLATE.'/teamplate/post_themes/single.php';

        

        // Else use custom template

        if ( is_single()) 

        {

           if(!file_exists($part_single))

             {

                   return  $template;

             }

            return $part_single;

         }
         return $template;

        

    }

 static    function load_file_template_page( $template ) 

    {

        // Post ID

        $post_id = get_the_ID();
        if ( get_post_type( $post_id ) != 'product_ze' or get_post_type( $post_id ) != 'videos' ) {

            return $template;

        }
    //print_r($template);

        // For all other CPT

        $part_page = URL_TEAMPLATE.'/teamplate/post_themes/archive.php';

        // Else use custom template
         if (is_archive()) 
        {
           if(!file_exists($part_page))
             {

                   return  $template;

             }

            return $part_page;

         }return $template;
         
      
    }



}



?>