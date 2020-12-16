<?php
// code show rel="prettyPhoto[portfolio]"
class prettyphoto
{
    static function show()
    {
        add_action( 'wp_enqueue_scripts', array(__CLASS__,'script_blog_items'));
    }
     function script_blog_items()
    {
       // wp_enqueue_style ('blog_items_stype',WP_PLUGIN_URL.'/blog_items/css/stype_item.css');
       wp_enqueue_script('prettyphoto',PART_TEAMPLATE.'/js/jquery.prettyPhoto.js');
        wp_enqueue_script('script_prettyphoto',PART_TEAMPLATE.'/js/script.js');
         wp_enqueue_style('script_prettyphoto',PART_TEAMPLATE.'/css/prettyPhoto.css');
        
    }
}

