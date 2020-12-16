<?php
class list_user
{ 
   static private $term_id;
   
    function __construct()
    {
        add_shortcode('listuser',array(__CLASS__,'listusers'));
    }
    function getGroup()
    {   
        
         global $wpdb;
        $attr=$wpdb->get_var('SELECT term_taxonomy_id FROM `wp_term_taxonomy` where term_id ='.self::$term_id);
        
        return $attr;
    }
    function getObject()
    {   
         global $wpdb;
         $id_oblect =self::getGroup();
        $attr=$wpdb->get_results('SELECT object_id FROM `wp_term_relationships` where term_taxonomy_id ='.$id_oblect);
        return $attr;
    }
 
    function listusers($att)
    {
      $taxonomy = 'product_cat';
    $terms = get_terms($taxonomy); // Get all terms of a taxonomy
    
 echo '<pre>';
print_r ($terms);
 echo '<pre>';
        ob_start();
      
        wp_reset_postdata();
        $list_post = ob_get_contents();
        ob_end_clean();
        return $list_post;  
        
    }
}