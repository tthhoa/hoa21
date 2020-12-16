<?php 

    class custom_post

{

    function __construct()
    {

         add_action('init',array($this,'getCreate_product'));

    }

    function getCreate_product()
    {
      $this->create_product();  
       $this->create_product2();
        $this->create_product3();


    }
// stast product Quản Lý Phòng
    function create_product(){

        $label= array(

            'name' 				=> _x( 'Quản Lý Phòng', 'Post Type General Name' ),

            'singular_name' 		=> _x('Quản Lý Phòng','Post Type singlas Name'),

            'add_new' 				=> __('Add New'),

            'all_items' 			=> __('All Quản Lý Phòng'),

            'add_new_item' 			=> __('Add New Quản Lý Phòng'),

            'edit_item' 			=> __('Edit Quản Lý Phòng'),

            'new_item' 				=> __('New Quản Lý Phòng'),

            'view_item' 			=> __('View Quản Lý Phòng'),

            'search_items' 			=> __('Search Quản Lý Phòng'),

            'not_found' 			=> __('No Quản Lý Phòng Found'),

            'not_found_in_trash' 	=> __('No Quản Lý Phòng Found in Trash'), 

            'parent_item_colon' 	=> __('Parent Item:'),

        );

        $args = array(

	       'labels' 			=> $label,

            'public' 			=> true,

            'show_ui' 			=> true,

            'capability_type' 	=> 'post',

            //'taxonomies'        => array( 'Quản Lý Phòng_cate', ),

            'hierarchical' 		=> false,

            'rewrite' 			=> array('slug' => 'ql-phong', 'with_front' => true),

            'query_var' 		=> true,

            'show_in_nav_menus' => true,

            'supports' 			=> array('title', 'editor'),

       

        );

        register_post_type('ql_phong_ze',$args);

       /// custom taxomony cac

        $labelcat = array(

                 'name' => _x('Dãy Phòng','Name Cat'),

                  'singular' =>__('Dãy Phòng'),

                  'menu_name' => __('Dãy Phòng'),

                  'search_items' =>'Search Dãy Phòng' ,

                  'all_items' =>'All Dãy Phòng' ,

                  'parent_item' => 'Parent Dãy Phòng' ,

                  'parent_item_colon' => __( 'Parent Quản Lý Phòng:' ),

                  'edit_item' => __( 'Edit Dãy Phòng' ),

                  'update_item' => __( 'Update Quản Lý Phòng cate' ),

                  'add_new_item' => __( 'Add new Dãy Phòng' ),

                  'new_item_name' => __( 'New Dãy Phòng ' ),
        );

         $argscat = array(

            // Hierarchical taxonomy (like categories)

            'labels'          => $labelcat,

            'rewrite'         => array(

                              'slug' => 'day-phong', // This controls the base slug that will display before each term

                              'with_front' => true, // Don't display the category base before "/Quản Lý Phòng/"

                              'hierarchical' => false, // This will allow URL's like "/Quản Lý Phòng/boston/cambridge/"

                             ),

            'hierarchical'               => true,

             'public'                     => true,

             'show_ui'                    => true,

             'show_admin_column'          => true,

             'show_in_nav_menus'          => true,

           //  'show_tagcloud'              => true,

             'query_var'                  => true,

          );

          register_taxonomy('day_phong_cat', array('ql_phong_ze'), $argscat);
            $labelcat2 = array(

                 'name' => _x('Loãi Phòng','Name Cat'),

                  'singular' =>__('Loãi Phòng'),

                  'menu_name' => __('Loãi Phòng'),

                  'search_items' =>'Search Loãi Phòng' ,

                  'all_items' =>'All Loãi Phòng' ,

                  'parent_item' => 'Parent Loãi Phòng' ,

                  'parent_item_colon' => __( 'Parent Loãi phong:' ),

                  'edit_item' => __( 'Edit Loãi Phòng' ),

                  'update_item' => __( 'Update Loãi Phòng' ),

                  'add_new_item' => __( 'Add new Loãi Phòng' ),

                  'new_item_name' => __( 'New Loãi Phòng ' ),
        );

         $argscat2 = array(

            // Hierarchical taxonomy (like categories)

            'labels'          => $labelcat2,

            'rewrite'         => array(

                              'slug' => 'loai-phong', // This controls the base slug that will display before each term

                              'with_front' => true, // Don't display the category base before "/Quản Lý Phòng/"

                              'hierarchical' => false, // This will allow URL's like "/Quản Lý Phòng/boston/cambridge/"

                             ),

            'hierarchical'               => true,

             'public'                     => true,

             'show_ui'                    => true,

             'show_admin_column'          => true,

             'show_in_nav_menus'          => true,

           //  'show_tagcloud'              => true,

             'query_var'                  => true,

          );

          register_taxonomy('loai_phong_cat', array('ql_phong_ze'), $argscat2);

        // tag taxonomy

          $labeltag = array(

                 'name' => 'Tag Truyen',

                  'singular' => 'pfl_singular tag',

                  'menu_name' => 'Tag Truyen',

                  'search_items' =>'Search Quản Lý Phòng' ,

                  'all_items' =>'All Quản Lý Phòng tag' ,

                  'parent_item' => 'Parent Quản Lý Phòng' ,

                  'parent_item_colon' => __( 'Parent Quản Lý Phòng:' ),

                  'edit_item' => __( 'Edit Quản Lý Phòng' ),

                  'update_item' => __( 'Update Quản Lý Phòng' ),

                  'add_new_item' => __( 'Add New tag' ),

                  'new_item_name' => __( 'New tag Name' ),

                  

        );

         $argtag = array(

            // Hierarchical taxonomy (like categories)

            'labels'          => $labeltag,

            'hierarchical'    => true,

            'rewrite'         => array(

                              'slug' => 'Quản Lý Phòng tag', // This controls the base slug that will display before each term

                              'with_front' => false, // Don't display the category base before "/Quản Lý Phòng/"

                              'hierarchical' => true // This will allow URL's like "/Quản Lý Phòng/boston/cambridge/"

                             ),

             'hierarchical'               => false,

             'public'                     => true,

             'show_ui'                    => true,

             'show_admin_column'          => true,

             'show_in_nav_menus'          => true,

             'show_tagcloud'              => true,

          );

         //  register_taxonomy('truyentranh_tag', 'truyentranh_ze', $argtag);

       

   }
   function create_product2(){

        $label= array(

            'name' 				=> _x( 'Quản Lý SV', 'Post Type General Name' ),

            'singular_name' 		=> _x('Quản Lý SV','Post Type singlas Name'),

            'add_new' 				=> __('Add New'),

            'all_items' 			=> __('All Quản Lý SV'),

            'add_new_item' 			=> __('Add New Quản Lý SV'),

            'edit_item' 			=> __('Edit Quản Lý SV'),

            'new_item' 				=> __('New Quản Lý SV'),

            'view_item' 			=> __('View Quản Lý SV'),

            'search_items' 			=> __('Search Quản Lý SV'),

            'not_found' 			=> __('No Quản Lý SV Found'),

            'not_found_in_trash' 	=> __('No Quản Lý SV Found in Trash'), 

            'parent_item_colon' 	=> __('Parent Item:'),

        );

        $args = array(

	       'labels' 			=> $label,

            'public' 			=> true,

            'show_ui' 			=> true,

            'capability_type' 	=> 'post',

            //'taxonomies'        => array( 'Quản Lý Phòng_cate', ),

            'hierarchical' 		=> false,

            'rewrite' 			=> array('slug' => 'ql-SV', 'with_front' => true),

            'query_var' 		=> true,

            'show_in_nav_menus' => true,

            'supports' 			=> array('title', 'thumbnail'),

       

        );

        register_post_type('ql_sv_ze',$args);

       /// custom taxomony cac

        $labelcat = array(

                 'name' => _x('Khoa','Name Cat'),

                  'singular' =>__('Khoa'),

                  'menu_name' => __('Khoa'),

                  'search_items' =>'Search Khoa' ,

                  'all_items' =>'All Khoa' ,

                  'parent_item' => 'Parent Khoa' ,

                  'parent_item_colon' => __( 'Parent Quản Lý Khoa:' ),

                  'edit_item' => __( 'Edit Khoa' ),

                  'update_item' => __( 'Update Quản Lý Khoa cate' ),

                  'add_new_item' => __( 'Add new Dãy Khoa' ),

                  'new_item_name' => __( 'New Dãy Khoa ' ),
        );

         $argscat = array(

            // Hierarchical taxonomy (like categories)

            'labels'          => $labelcat,

            'rewrite'         => array(

                              'slug' => 'khoa', // This controls the base slug that will display before each term

                              'with_front' => true, // Don't display the category base before "/Quản Lý Phòng/"

                              'hierarchical' => false, // This will allow URL's like "/Quản Lý Phòng/boston/cambridge/"

                             ),

            'hierarchical'               => true,

             'public'                     => true,

             'show_ui'                    => true,

             'show_admin_column'          => true,

             'show_in_nav_menus'          => true,

           //  'show_tagcloud'              => true,

             'query_var'                  => true,

          );

          register_taxonomy('khoa_cat', array('ql_sv_ze'), $argscat);
            $labelcat2 = array(

                 'name' => _x('Khóa Học','Name Cat'),

                  'singular' =>__('Khóa Học'),

                  'menu_name' => __('Khóa Học'),

                  'search_items' =>'Search Khóa' ,

                  'all_items' =>'All Khóa' ,

                  'parent_item' => 'Parent Khóa' ,

                  'parent_item_colon' => __( 'Parent Khóa:' ),

                  'edit_item' => __( 'Edit Khóa' ),

                  'update_item' => __( 'Update Khóa' ),

                  'add_new_item' => __( 'Add new Khóa' ),

                  'new_item_name' => __( 'New Khóa ' ),
        );

         $argscat2 = array(

            // Hierarchical taxonomy (like categories)

            'labels'          => $labelcat2,

            'rewrite'         => array(

                              'slug' => 'khoa-hoc', // This controls the base slug that will display before each term

                              'with_front' => true, // Don't display the category base before "/Quản Lý Phòng/"

                              'hierarchical' => false, // This will allow URL's like "/Quản Lý Phòng/boston/cambridge/"

                             ),

            'hierarchical'               => true,

             'public'                     => true,

             'show_ui'                    => true,

             'show_admin_column'          => true,

             'show_in_nav_menus'          => true,

           //  'show_tagcloud'              => true,

             'query_var'                  => true,

          );

          register_taxonomy('khoa_hoc_cat', array('ql_sv_ze'), $argscat2);
                    $labelcat3 = array(

                 'name' => _x('Lớp Học','Name Cat'),

                  'singular' =>__('Lớp Học'),

                  'menu_name' => __('Lớp Học'),

                  'search_items' =>'Search Lớp' ,

                  'all_items' =>'All Lớp' ,

                  'parent_item' => 'Parent Lớp' ,

                  'parent_item_colon' => __( 'Parent Lớp:' ),

                  'edit_item' => __( 'Edit Lớp' ),

                  'update_item' => __( 'Update Lớp' ),

                  'add_new_item' => __( 'Add new Lớp' ),

                  'new_item_name' => __( 'New Lớp ' ),
        );

         $argscat3 = array(

            // Hierarchical taxonomy (like categories)

            'labels'          => $labelcat3,

            'rewrite'         => array(

                              'slug' => 'lop-hoc', // This controls the base slug that will display before each term

                              'with_front' => true, // Don't display the category base before "/Quản Lý Phòng/"

                              'hierarchical' => false, // This will allow URL's like "/Quản Lý Phòng/boston/cambridge/"

                             ),

            'hierarchical'               => true,

             'public'                     => true,

             'show_ui'                    => true,

             'show_admin_column'          => true,

             'show_in_nav_menus'          => true,

           //  'show_tagcloud'              => true,

             'query_var'                  => true,

          );

          register_taxonomy('lop_hoc_cat', array('ql_sv_ze'), $argscat3);

        // tag taxonomy

          $labeltag = array(

                 'name' => 'Tag Truyen',

                  'singular' => 'pfl_singular tag',

                  'menu_name' => 'Tag Truyen',

                  'search_items' =>'Search Quản Lý Phòng' ,

                  'all_items' =>'All Quản Lý Phòng tag' ,

                  'parent_item' => 'Parent Quản Lý Phòng' ,

                  'parent_item_colon' => __( 'Parent Quản Lý Phòng:' ),

                  'edit_item' => __( 'Edit Quản Lý Phòng' ),

                  'update_item' => __( 'Update Quản Lý Phòng' ),

                  'add_new_item' => __( 'Add New tag' ),

                  'new_item_name' => __( 'New tag Name' ),

                  

        );

         $argtag = array(

            // Hierarchical taxonomy (like categories)

            'labels'          => $labeltag,

            'hierarchical'    => true,

            'rewrite'         => array(

                              'slug' => 'Quản Lý Phòng tag', // This controls the base slug that will display before each term

                              'with_front' => false, // Don't display the category base before "/Quản Lý Phòng/"

                              'hierarchical' => true // This will allow URL's like "/Quản Lý Phòng/boston/cambridge/"

                             ),

             'hierarchical'               => false,

             'public'                     => true,

             'show_ui'                    => true,

             'show_admin_column'          => true,

             'show_in_nav_menus'          => true,

             'show_tagcloud'              => true,

          );

         //  register_taxonomy('truyentranh_tag', 'truyentranh_ze', $argtag);

       

   }
    function create_product3(){

        $label= array(

            'name' 				=> _x( 'Quản Lý Hợp Đồng', 'Post Type General Name' ),

            'singular_name' 		=> _x('Quản Lý Hợp Đồng','Post Type singlas Name'),

            'add_new' 				=> __('Add New'),

            'all_items' 			=> __('All Quản Lý Hợp Đồng'),

            'add_new_item' 			=> __('Add New Quản Lý Hợp Đồng'),

            'edit_item' 			=> __('Edit Quản Lý Hợp Đồng'),

            'new_item' 				=> __('New Quản Lý Hợp Đồng'),

            'view_item' 			=> __('View Quản Lý Hợp Đồng'),

            'search_items' 			=> __('Search Quản Lý Hợp Đồng'),

            'not_found' 			=> __('No Quản Lý Hợp Đồng Found'),

            'not_found_in_trash' 	=> __('No Quản Lý Hợp Đồng Found in Trash'), 

            'parent_item_colon' 	=> __('Parent Item:'),

        );

        $args = array(

	       'labels' 			=> $label,

            'public' 			=> true,

            'show_ui' 			=> true,

            'capability_type' 	=> 'post',

            //'taxonomies'        => array( 'Quản Lý Phòng_cate', ),

            'hierarchical' 		=> false,

            'rewrite' 			=> array('slug' => 'ql-hop-dong', 'with_front' => true),

            'query_var' 		=> true,

            'show_in_nav_menus' => true,

            'supports' 			=> array('title', 'editor'),

       

        );

        register_post_type('ql_hop_dong_ze',$args);


   }

 

}

    

