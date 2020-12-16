<?php
if ( file_exists( dirname( __FILE__ ) . '/metabox/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/metabox/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/metabox/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/metabox/init.php';
}
//add_action( 'cmb2_init', 'ze_tinhtrang');
//add_action( 'cmb2_init', 'ze_tacgia');
add_action( 'cmb2_init', 'ze_sodukt');
add_action( 'cmb2_init', 'ze_hopdong');
add_action( 'cmb2_init', 'ze_thongtinphong');
add_action( 'cmb2_init', 'ze_thoi_gian');

add_action( 'cmb2_init', 'layout_sidebar' );
function cmb2_get_post_options( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'post',
        'numberposts' => 10,
    ) );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
        }
    }

    return $post_options;
}

/**
 * Gets 5 posts for your_post_type and displays them as options
 * @return array An array of options that matches the CMB2 options array
 */
function cmb2_get_your_post_type_post_options() {
    return cmb2_get_post_options( array( 'post_type' => 'truyenchu_ze', 'numberposts' => 5 ) );
}
function hotensv()
{
    $args =array(
    'post_type'     =>'ql_sv_ze',
    'post_pre_page' =>'-1',
    );
    global $post;
    $result =array();
    $the_query = new WP_Query( $args );

// The Loop
    if ( $the_query->have_posts() ) {
    
    	while ( $the_query->have_posts() ) {
    		$the_query->the_post();
    		$result[$post->ID]= '<li>' . get_the_title() . '</li>';
    	}
    
    } else {
    	// no posts found
    }
    return $result;
/* Restore original Post Data */

}
function phongsv()
{
    $args =array(
    'post_type'     =>'ql_phong_ze',
    'post_pre_page' =>'-1',
    );
    global $post;
    $result =array();
    $the_query = new WP_Query( $args );

// The Loop
    if ( $the_query->have_posts() ) {
    
    	while ( $the_query->have_posts() ) {
    		$the_query->the_post();
    		$result[$post->ID]= '<li>' . get_the_title() . '</li>';
    	}
    
    } else {
    	// no posts found
    }
    return $result;
/* Restore original Post Data */

}
function lopsv($taxsonomies)
{
 
    $result =array();
    $terms=get_terms($taxsonomies);
    foreach($terms as $val)
    {
        $result[$val->term_id] =$val->name;
        
    }
    
   
    return $result;

}
function ze_sodukt()
{
     $meta_boxes =new_cmb2_box( array(
        'id' => 'ze_tk',
        'title' => 'Phi Ban Đầu :',
        'object_types' => array('ql_hop_dong_ze'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true // Show field names on the left
         )
    );
    $meta_boxes->add_field( array(
        'name'       => __( ' So Dư TK (VND):', 'cmb2' ),
        'desc'       => __( ' ', 'cmb2' ),
        'id'         => 'so_du',
        'type'       => 'text',
    ) );
  
}
function ze_thoi_gian()
{
     $meta_boxes =new_cmb2_box( array(
        'id' => 'ze_thoigian',
        'title' => 'Thời Gian Thuê Phòng',
        'object_types' => array('ql_hop_dong_ze'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true // Show field names on the left
         )
    );
    $meta_boxes->add_field( array(
        'name'       => __( ' Bắt Đầu Từ', 'cmb2' ),
        'desc'       => __( ' ', 'cmb2' ),
        'id'         => 'date_start',
        'type'       => 'text_date',
    ) );
    $meta_boxes->add_field( array(
        'name'       => __( ' Ngày Hết Hạn', 'cmb2' ),
        'desc'       => __( ' ', 'cmb2' ),
        'id'         => 'date_end',
        'type'       => 'text_date',
    ) );
    
      
}

function run_when_post_published($post)
{
  
    if($post->post_type=="ql_hop_dong_ze")
    {       $post_data  = array (
                  'post_title'     => $_POST['ze_ho_ten2'],
                   'post_status'   => 'publish',
                   'post_type'      =>'ql_sv_ze',
                  'post_status'    => 'publish' ,
                  'post_author'    => 1,
                 
                );
                 

        	$post_id = wp_insert_post( $post_data, true );
            
            wp_set_post_terms( $post_id, $_POST['ze_khoa'], 'khoa_cat' ); 
            wp_set_post_terms( $post_id, $_POST['ze_khoa_hoc'], 'khoa_hoc_cat' ); 
            wp_set_post_terms( $post_id, $_POST['ze_lop'], 'lop_hoc_cat' ); 
            update_post_meta( $post_id, 'masv', $_POST['post_title'] );
            update_post_meta($post_id, 'ma_hd', $_POST['post_ID'] );
         
    }
}

add_action('pending_to_publish', 'run_when_post_published', 10 , 1);
function ze_hopdong()
{
     $meta_boxes =new_cmb2_box( array(
        'id' => 'ze_infomanga',
        'title' => 'Thông Tin Sinh Viên',
        'object_types' => array('ql_hop_dong_ze'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true // Show field names on the left
         )
    );
    $meta_boxes->add_field( array(
        'name'             => __( ' Chọn KHoa :', 'cmb2' ),
        'desc'             => __( 'Chọn Khoa Trong Trường', 'cmb2' ),
        'id'               =>  'ze_khoa',
        'type'             => 'select',
        'row_classes'       =>'class-khoa',
        'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('khoa_cat'),
    ) );
     $meta_boxes->add_field( array(
        'name'             => __( ' Chọn Khóa Học :', 'cmb2' ),
        'desc'             => __( 'Chọn Khóa Học', 'cmb2' ),
        'id'               =>  'ze_khoa_hoc',
        'type'             => 'select',
        'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('khoa_hoc_cat'),
    ) );
    $meta_boxes->add_field( array(
        'name'             => __( ' Chọn Lớp :', 'cmb2' ),
        'desc'             => __( 'Chọn Lớp', 'cmb2' ),
        'id'               =>  'ze_lop',
        'type'             => 'select',
         'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('lop_hoc_cat'),
    ) );
    $meta_boxes->add_field( array(
        'name'             => __( 'Họ Tên', 'cmb2' ),
        'desc'             => __( 'Họ tên đầy đủ của sinh viên', 'cmb2' ),
        'id'               => 'ze_ho_ten',
        'type'             => 'text',

    ) );
   
    
    
}

function ze_thongtinphong()
{
     $prefix = 'ze_';
     $meta_boxes =new_cmb2_box( array(
        'id' => 'ze_thongtinphong',
        'title' => 'Thông Tin Phòng :',
        'object_types' => array('ql_hop_dong_ze'), // post type
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true, // Show field names on the left
     ));
      $meta_boxes->add_field( array(
        'name'             => __( ' Loãi Phòng :', 'cmb2' ),
        'desc'             => __( ' Loãi Phòng Thuê ', 'cmb2' ),
        'id'               =>  'ze_loai_phong',
        'type'             => 'select',
        'row_classes'       =>'class-khoa',
        'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('loai_phong_cat'),
    ) );
     $meta_boxes->add_field( array(
        'name'             => __( ' Dãy Phòng :', 'cmb2' ),
        'desc'             => __( ' Dãy Phòng Thuê ', 'cmb2' ),
        'id'               =>  'ze_day_phong',
        'type'             => 'select',
        'row_classes'       =>'class-khoa',
        'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('day_phong_cat'),
    ) );
    $meta_boxes->add_field( array(
        'name'             => __( ' Số Phòng :', 'cmb2' ),
        'desc'             => __( '  Phòng Thuê ', 'cmb2' ),
        'id'               =>  'ze_so_phong',
        'type'             => 'select',
        'row_classes'       =>'class-khoa',
        'default'           => '',
        'show_option_none' => true,
        'options' => phongsv(),
    ) );
    
     
     


}
/**
 * Hook in and register a metabox to handle a theme options page
 */
 
function layout_sidebar()
{   $prefix = 'ze_';
    $meta_boxes =new_cmb2_box( array(
        'id' => 'layout_sidebar',
        'title' => 'Thông Tin',
        'object_types' => array('ql_sv_ze'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true // Show field names on the left
         )
    );
    $meta_boxes->add_field( array(
    'name' => 'Ma Sinh Viên:',
    'type' => 'text',
    'id'   => 'masv'
    ) );
      $meta_boxes->add_field( array(
        'name'       => __( ' Sinh Ngày:', 'cmb2' ),
        'desc'       => __( ' ', 'cmb2' ),
        'id'         => 'ngay_sinh',
        'type'       => 'text_date',
    ) );
    $meta_boxes->add_field( array(
        'name'       => __( 'Ma HD:', 'cmb2' ),
        'desc'       => __( ' ', 'cmb2' ),
        'id'         => 'ma_hd',
        'type'       => 'text',
    ) );
   
};
add_action('admin_footer', 'jsformt');
function getUsername()
{
    $user = wp_get_current_user();
  // $name = $user->user_login;
   
    $name = $user->user_lastname .  " " . $user->user_firstname;
  
    return $name;
}

function wds_frontend_form_register($id) {
    $cmb = new_cmb2_box( array(
        'id'           => 'front-end-post-form',
        'object_types' => array('ql_hop_dong_ze'),
        'hookup'       => false,
        'save_fields'  => false,
    ) );
    $cmb->add_field( array(
        'name'             => __( ' Loãi Phòng :', 'cmb2' ),
        'desc'             => __( ' Loãi Phòng Thuê ', 'cmb2' ),
        'id'               =>  'ze_loai_phong',
        'type'             => 'select',
        'row_classes'       =>'class-khoa',
        'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('loai_phong_cat'),
    ) );
     $cmb->add_field( array(
        'name'             => __( ' Dãy Phòng :', 'cmb2' ),
        'desc'             => __( ' Dãy Phòng Thuê ', 'cmb2' ),
        'id'               =>  'ze_day_phong',
        'type'             => 'select',
        'row_classes'       =>'class-khoa',
        'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('day_phong_cat'),
    ) );
    $cmb->add_field( array(
        'name'             => __( ' Số Phòng :', 'cmb2' ),
        'desc'             => __( '  Phòng Thuê ', 'cmb2' ),
        'id'               =>  'ze_so_phong',
        'type'             => 'select',
        'row_classes'       =>'class-khoa',
        'default'           => '',
        'show_option_none' => true,
        'options' => phongsv(),
    ) );
    $cmb->add_field( array(
    'name' => 'Thông Tin Sinh Viên:',
    'desc' => 'Nổi dung Thông tin Sinh viên ',
    'type' => 'title',
    'id'   => 'wiki_test_title'
    ) );
    $cmb->add_field( array(
        'name'             => __( ' Chọn KHoa :', 'cmb2' ),
        'desc'             => __( 'Chọn Khoa Trong Trường', 'cmb2' ),
        'id'               =>  'ze_khoa',
        'type'             => 'select',
        'row_classes'       =>'class-khoa',
        'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('khoa_cat'),
    ) );
     $cmb->add_field( array(
        'name'             => __( ' Chọn Khóa Học :', 'cmb2' ),
        'desc'             => __( 'Chọn Khóa Học', 'cmb2' ),
        'id'               =>  'ze_khoa_hoc',
        'type'             => 'select',
        'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('khoa_hoc_cat'),
    ) );
    $cmb->add_field( array(
        'name'             => __( ' Chọn Lớp :', 'cmb2' ),
        'desc'             => __( 'Chọn Lớp', 'cmb2' ),
        'id'               =>  'ze_lop',
        'type'             => 'select',
         'default'           => '',
        'show_option_none' => true,
        'options' => lopsv('lop_hoc_cat'),
    ) );
    
    $cmb->add_field( array(
        'name'             => __( 'Họ Tên', 'cmb2' ),
        'desc'             => __( 'Họ tên đầy đủ của sinh viên', 'cmb2' ),
        'id'               => 'ze_ho_ten',
        'type'    => 'text',
        'default' =>getUsername(),
    ) );


}
add_action( 'cmb2_init', 'wds_frontend_form_register' );
/**
 * Gets the front-end-post-form cmb instance
 *
 * @return CMB2 object
 */
function wds_frontend_cmb2_get() {
	// Use ID of metabox in wds_frontend_form_register
	$metabox_id = 'front-end-post-form';
	// Post/object ID is not applicable since we're using this form for submission
	$object_id  = 'fake-oject-id';
	// Get CMB2 metabox object
	return cmb2_get_metabox( $metabox_id, $object_id );
}
/**
 * Handle the cmb-frontend-form shortcode
 *
 * @param  array  $atts Array of shortcode attributes
 * @return string       Form html
 */
function wds_do_frontend_form_submission_shortcode( $atts = array() ) {
	// Get CMB2 metabox object
	$cmb = wds_frontend_cmb2_get();
	// Get $cmb object_types
	$post_types = $cmb->prop( 'object_types' );
	// Current user
	$user_id = get_current_user_id();
	// Parse attributes
   
	$atts = shortcode_atts( array(
		'post_author' => $user_id ? $user_id : 1, // Current user, or admin
		'post_status' => 'pending',
		'post_type'   => reset( $post_types ), // Only use first object_type in array
	), $atts, 'cmb-frontend-form' );
	/*
	 * Let's add these attributes as hidden fields to our cmb form
	 * so that they will be passed through to our form submission
	 */
   
    echo "<hr>";
	foreach ( $atts as $key => $value ) {
		$cmb->add_hidden_field( array(
			'field_args'  => array(
				'id'    => "atts[$key]",
				'type'  => 'hidden',
				'default' => $value,
			),
		) );
	}
	// Initiate our output variable
	$output = '';
	// Get any submission errors
//	if ( ( $error = $cmb->prop( 'submission_error' ) ) && is_wp_error( $error ) ) {
		// If there was an error with the submission, add it to our ouput.
//		$output .= '<h3>' . sprintf( __( 'There was an error in the submission: %s', 'wds-post-submit' ), '<strong>'. $error->get_error_message() .'</strong>' ) . '</h3>';
//	}
	// If the post was submitted successfully, notify the user.
	if ( isset( $_GET['post_submitted'] ) && ( $post = get_post( absint( $_GET['post_submitted'] ) ) ) ) {
		// Get submitter's name
		$name = get_post_meta( $post->ID, 'submitted_author_name', 1 );
		$name = $name ? ' '. $name : '';
		// Add notice of submission to our output
		$output .= '<h3>' . sprintf( __( 'Bạn Đã Gửi Đăng Ký ở Ký Túc. Đơn Đăng Ký Đang chờ Xét Duyệt  .', 'wds-post-submit' ), esc_html( $name ) ) . '</h3>';
	}
	// Get our form
	$output .= cmb2_get_metabox_form( $cmb, 'fake-oject-id', array( 'save_button' => __( 'Đăng Ký', 'wds-post-submit' ) ) );
	return $output;
}
add_shortcode( 'cmb-frontend-form', 'wds_do_frontend_form_submission_shortcode' );
/**
 * Handles form submission on save. Redirects if save is successful, otherwise sets an error message as a cmb property
 *
 * @return void
 */
function wds_handle_frontend_new_post_form_submission() {
	// If no form submission, bail
	if ( empty( $_POST ) || ! isset( $_POST['submit-cmb'], $_POST['object_id'] ) ) {
		return false;
	}
     $user = wp_get_current_user();
   $name = $user->user_login;
	// Get CMB2 metabox object
	$cmb = wds_frontend_cmb2_get();
	$post_data = array();
	// Get our shortcode attributes and set them as our initial post_data args
  //   print_r($_POST);
	if ( isset( $_POST['atts'] ) ) {
		foreach ( (array) $_POST['atts'] as $key => $value ) {
			$post_data[ $key ] = sanitize_text_field( $value );
		}
		unset( $_POST['atts'] );
	}

	/**
     * 	// Check security nonce
	if ( ! isset( $_POST[ $cmb->nonce() ] ) || ! wp_verify_nonce( $_POST[ $cmb->nonce() ], $cmb->nonce() ) ) {
		return $cmb->prop( 'submission_error', new WP_Error( 'security_fail', __( 'Security check failed.' ) ) );
	}
	// Check title submitted
	if ( empty( $_POST['submitted_post_title'] ) ) {
		return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'New post requires a title.' ) ) );
	}
	// And that the title is not the default title
	if ( $cmb->get_field( 'submitted_post_title' )->default() == $_POST['submitted_post_title'] ) {
		return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'Please enter a new title.' ) ) );
	}
	 * Fetch sanitized values
	 */
     
	$sanitized_values = $cmb->get_sanitized_values( $_POST );

	$post_data['post_title']   = $name;
	unset( $sanitized_values['submitted_post_title'] );
	$post_data['post_content'] = ' ';
	unset( $sanitized_values['submitted_post_content'] );
    
	// Create the new post
	$new_submission_id = wp_insert_post( $post_data, true );
    
	// If we hit a snag, update the user
	if ( is_wp_error( $new_submission_id ) ) {
		return $cmb->prop( 'submission_error', $new_submission_id );
	}

	unset( $post_data['post_type'] );
	unset( $post_data['post_status'] );
	
	foreach ( $sanitized_values as $key => $value ) {
		if ( is_array( $value ) ) {
			$value = array_filter( $value );
			if( ! empty( $value ) ) {
				update_post_meta( $new_submission_id, $key, $value );
			}
		} else {
			update_post_meta( $new_submission_id, $key, $value );
		}
	}

	wp_redirect( esc_url_raw( add_query_arg( 'post_submitted', $new_submission_id ) ) );
	exit;
}
add_action( 'cmb2_after_init', 'wds_handle_frontend_new_post_form_submission' );