<?php
/*
Plugin Name: ze_program_application
Plugin URI: http://wordpress.org/plugins
Description: blog list items post
Author: ze
Version: 1
Author URI: http://ma.tt/
*/
//shortcode::[post_items numble_post="3" post_type="portfolio_ze" cat="null" taxonomy="portfolio_cate" term="6" file='video' ]



define('URL_TEAMPLATE',dirname(__FILE__));



define('PART_TEAMPLATE',WP_PLUGIN_URL.'/application');



define( 'POSTTYPE_META_PATH', plugin_dir_path( __FILE__ ));

add_filter('widget_text', 'do_shortcode');

class application



{

   static function init()

    {
        self::getpost_items();
        self::getShotcode();
        self::custom_post_type();
        // self::load_Stype();
        self::load_template();
        
        self::getVc_composer();
        
        // self::getListUser();
        add_action('wp_enqueue_scripts',array(__CLASS__,'load_Stype'));
        add_action('wp_enqueue_scripts',array(__CLASS__,'load_script'));
        add_action( 'wp_ajax_my_action', array(__CLASS__,'my_action_callback') );
        add_action( 'wp_ajax_nopriv_my_action', array(__CLASS__,'my_action_callback') );
        
         add_shortcode( 'cmb-edit-form', array( __CLASS__, 'do_frontend_form' ) );
         add_filter( 'cmb_meta_boxes', array( __CLASS__, 'cmb_metaboxes' ) );

    }

 static function cmb_metaboxes( array $meta_boxes ) {

        /**

         * Metabox for the "Memorials" front-end submission form

         */

        $meta_boxes['edit_files_metabox'] = array(

            'id'         => 'edit-files',

            'title'      => __( 'Upload files / Embed media / Add links', 'cmb' ),

            'pages'      => array( 'Files' ), // Post type

            'context'    => 'normal',

            'priority'   => 'high',

            'show_names' => true, // Show field names on the left

            'fields'     => array(

                array(

                    'name'       => __( 'Title', 'cmb' ),

                    'desc'       => __( 'Add title for files, links and/or media', 'cmb' ),

                    'id'         => $this->prefix . 'title',

                    'type'       => 'text',

                ),

                array(

                    'name'       => __( 'Description', 'cmb' ),

                    'desc'       => __( 'Add a description of files, links and/or media', 'cmb' ),

                    'id'         => $this->prefix . 'description',

                    'type'       => 'textarea',

                ),

                array(

                    'name'     => __( 'Project stage', 'cmb' ),

                    'desc'     => __( 'Assign to stage of project', 'cmb' ),

                    'id'       => $this->prefix . 'category',

                    'show_option_none' => true,

                    'type'     => 'taxonomy_select',

                    'taxonomy' => 'stages', // Taxonomy Slug

                ),
                array(
                    'name' =>  __( 'Post date', 'cmb' ),
                    'desc' => __( 'Date files posted.', 'cmb' ),
                    'id' => $this->prefix . 'post_date',
                    'type' => 'text_date'
                ),

                array(

                    'name' => __( 'Link to website', 'cmb' ),

                    'desc' => __( 'Add url to website.  eg. http://www.google.co.uk', 'cmb' ),

                    'id'   => $this->prefix . 'url',

                    'type' => 'text_url',

                    'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols

                    // 'repeatable' => true,

                ),

               array(

                    'name' => __( 'Upload files', 'cmb' ),

                    'desc' => __( 'Upload file(s)', 'cmb' ),

                    'id'   => $this->prefix . 'file_list',

                    'type' => 'file_list',

                ),

              array(

                'name' => __( 'oEmbed', 'cmb' ),

                'desc' => __( 'Enter a youtube, twitter, or instagram URL to embed. Supported services are listed at http://codex.wordpress.org/Embeds.', 'cmb' ),

                'id'   => $this->prefix . 'embed',

                'type' => 'oembed',

             ), 

            ),

        );

        return $meta_boxes;

}





static   function getpost_items()

    {  

        require_once('class_function/list_post_cat.php'); 

        new list_post_cat();       

     // application::load_ajax();



    }

static    function vc_templates()

    {

        require('class_function/vc_templates/vc_posts_grid.php');

    }

static    function getShotcode()

    {

        require('class_function/shortcode/shortcode.php');

    }

static    function getVc_composer()

    {

        require('class_function/shortcode/vc_composer.php');

    }

static    function getListUser()

    {  

        require_once('class_function/list_user.php'); 

        new list_user();       

    }

    // loat ajax  



static   function load_ajax()

    {

    }

static   function custom_post_type()

    {



        // show custom post end custom taxonomy        



        require_once('class_function/custom_post_type/custom_post.php');

         new custom_post();

        require_once('class_function/custom_post_type/meta_box.php');

        require_once('class_function/custom_post_type/meta_box_product.php');

        new custom_meta_box_product();

    }



 



static   function load_template()



   {



     require('class_function/load_teamplates.php');



        load_templates::init();



   }

 static function my_action_callback() {
	global $post; // this is how you get access to the database

	$getKhoa = $_POST['khoa'];
    $getLoai = $_POST['loai'];
    $getPostType = $_POST['post_type'];
   
    $my_post = array(
    'post_type'     =>$getPostType,
    'tax_query' => array(
		array(
			'taxonomy' => $getLoai,
			'field'    => 'term_id',
			'terms'    => $getKhoa,
		),
	),
   
);

$the_query = new WP_Query( $my_post );
echo '<option value=""> Không Có</option>';
// The Loop
if ( $the_query->have_posts() ) {

	while ( $the_query->have_posts() ) {
		$the_query->the_post();
	
        echo '<option value="'.$post->ID.'">' . get_the_title() . '</option>';
	}

} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();       
    

	wp_die(); // this is required to terminate immediately and return a proper response
}





}

//============================================= end function =================================



//============================================= application ===========================

application::init();

 function jsformt()
{
    
?>

<script>
(function($) {
    $('#ze_khoa').change(function(){
        var khoa=$('#ze_khoa').val();
        
         var url_admin = '<?php echo admin_url('admin-ajax.php')?>';
      var data = {
			'action': 'my_action',
			'khoa': khoa,
            'loai': 'khoa_cat',
            'post_type': 'ql_sv_ze',
		};
        $.post(url_admin, data, function(response){
              if (response) {
                $('#ze_ho_ten option').remove();
                $('#ze_ho_ten').html(response);
               }

        });   
        
    });
    $('#ze_khoa_hoc').change(function(){
        var khoa_hoc=$('#ze_khoa_hoc').val();
        
         var url_admin = '<?php echo admin_url('admin-ajax.php')?>';
      var data = {
			'action': 'my_action',
			'khoa': khoa_hoc,
            'loai': 'khoa_hoc_cat',
            'post_type': 'ql_sv_ze',
		};
        $.post(url_admin, data, function(response){
              if (response) {
                $('#ze_ho_ten option').remove();
                $('#ze_ho_ten').html(response);
               }

        });   
        
    });
    $('#ze_lop').change(function(){
      var ze_lop=$('#ze_lop').val(); 
      var url_admin = '<?php echo admin_url('admin-ajax.php')?>';
      var data = {
			'action': 'my_action',
			'khoa': ze_lop,
            'loai': 'lop_hoc_cat',
            'post_type': 'ql_sv_ze',
		};
        $.post(url_admin, data, function(response){
              if (response) {
                $('#ze_ho_ten option').remove();
                $('#ze_ho_ten').html(response);
               }

        });   
        
    });
    $('#ze_loai_phong').change(function(){
      var ze_loai_phong=$('#ze_loai_phong').val(); 
      var url_admin = '<?php echo admin_url('admin-ajax.php')?>';
      var data = {
			'action': 'my_action',
			'khoa': ze_loai_phong,
            'loai': 'loai_phong_cat',
            'post_type': 'ql_phong_ze',
		};
        $.post(url_admin, data, function(response){
              if (response) {
                $('#ze_so_phong option').remove();
                $('#ze_so_phong').html(response);
               }

        });   
        
    });
    $('#ze_day_phong').change(function(){
      var ze_day_phong=$('#ze_day_phong').val(); 
      var url_admin = '<?php echo admin_url('admin-ajax.php')?>';
      var data = {
			'action': 'my_action',
			'khoa': ze_day_phong,
            'loai': 'day_phong_cat',
            'post_type': 'ql_phong_ze',
		};
        $.post(url_admin, data, function(response){
              if (response) {
                $('#ze_so_phong option').remove();
                $('#ze_so_phong').html(response);
               }

        });   
        
    });
})(jQuery);
</script><?php

}
