<?php 

class custom_meta_box_product {

   var $info=array(

        array(

            'type'          =>'text',

            'description'   =>'Add video youtobe',

            'id'            =>'addvideo',

        ),

        
        

    );

 

    function __construct() {
        
        add_action('add_meta_boxes', array($this, 'add_meta_box_more_info'));
       

        add_action('save_post', array($this, 'save_custom_meta_box_info_TT_chap_ze'  ));
        add_action('save_post', array($this, 'save_custom_meta_box_info_truyenchu_chap_ze'  ));

       

    }

 

    function add_meta_box_more_info(){

        add_meta_box("info", 'Info', array($this, 'show_system_truyentranh'), 'TT-chap_ze', 'normal', 'low', array('gia tri 1', 'gia tri 2'));
        add_meta_box("info2", 'Info2', array($this, 'show_system_truyenchu'), 'truyen-chu-chap_ze', 'normal', 'low', array('gia tri 1', 'gia tri 2'));
         add_meta_box("info3", 'Info3', array($this, 'show_system_linkchap'), 'truyenchu_ze', 'normal', 'low', array('gia tri 1', 'gia tri 2'));


    }
        function show_system_linkchap($post, $box)
    {        

        // L?y thông tin các meta c?a post và hi?n th? lên các input

        $postselech = get_post_meta($post->ID, 'postselech', true);
      //  $note = get_post_meta($post->ID, 'note', true);
      //  $color = get_post_meta($post->ID, 'color', true);
        echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
        global $post;
        $arge=array(
        'post_type'=>'truyen-chu-chap_ze',
        'posts_per_page'=>'-1',
        'meta_key'  => 'postselech',
        'meta_value'=>$post->ID,
        'orderby' => 'date',
      // 'order'   => 'ASC',
        );
        $the_query = new WP_Query($arge);
      
         echo "<div>";
      //   echo '<pre>';
        // print_r($post);
      //   echo '</pre>';
        if($the_query->have_posts()):
        while($the_query->have_posts()): $the_query->the_post();?>
        <h4> <?php echo get_the_title($post->ID);  ?> <samp><?php edit_post_link('Edit '.$post->ID);?></samp></h4>
      <?php  endwhile;
        
        endif;
        echo "</div>";


    }

    function show_system_truyentranh($post, $box)
    {        

        // L?y thông tin các meta c?a post và hi?n th? lên các input

        $postselech = get_post_meta($post->ID, 'postselech', true);

        $note = get_post_meta($post->ID, 'note', true);

        $color = get_post_meta($post->ID, 'color', true);

 

        //  Input Ki?m Tra S? Ki?n Add, Update

        echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
        global $post;
        $arge=array(
        'post_type'=>'truyentranh_ze',
        );
        $the_query = new WP_Query($arge);
       echo "<select name='postselech' id='postselech' class='postform'>";
         echo "<option value=''>Show All </option>";
         
        if($the_query->have_posts()):
        while($the_query->have_posts()): $the_query->the_post();?>
         <option value='<?php echo $post->ID; ?>' <?php if($postselech==get_the_ID($post->ID)){ echo 'selected="selected"';}; ?> ><?php echo get_the_title($post->ID) ?> </option>
      <?php  endwhile;
        
        endif;
        echo "</select>";


    }
     function show_system_truyenchu($post, $box)

    {        

 

        // L?y thông tin các meta c?a post và hi?n th? lên các input

        $postselech = get_post_meta($post->ID, 'postselech', true);

        $note = get_post_meta($post->ID, 'note', true);

       

        $color = get_post_meta($post->ID, 'color', true);

 

        //  Input Ki?m Tra S? Ki?n Add, Update

        echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
        global $post;
        $arge=array(
        'post_type'=>'truyenchu_ze',
        'posts_per_page'=>'500',
        );
        $the_query = new WP_Query($arge);
       echo "<select name='postselech' id='postselech' class='postform'>";
         echo "<option value=''>Show All </option>";
         
        if($the_query->have_posts()):
        while($the_query->have_posts()): $the_query->the_post();?>
         <option value='<?php echo $post->ID; ?>' <?php if($postselech==get_the_ID($post->ID)){ echo 'selected="selected"';}; ?> ><?php echo get_the_title($post->ID) ?> </option>
      <?php  endwhile;
        
        endif;
        echo "</select>";


    }

 

    // V?i hàm này m?c d?nh là post_id

    function save_custom_meta_box_info_TT_chap_ze($post_id)

    {

        // Ki?m tra có ph?i s? ki?n insert/update post

        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))){

            return $post_id;

        }

 

        // Ki?m tra có ph?i save t? d?ng không, n?u ph?i thì không x? lý

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){

            return $post_id;

        }
        // Ki?m tra quy?n

        if (!current_user_can('edit_post', $post_id)) {

            return $post_id;

        }

          
         $old_box =get_post_meta($post_id,'postselech',true);
         $new_box =$_POST['postselech'];
         if($new_box && $new_box != $old_box)
          {
           update_post_meta($post_id,'postselech',$new_box);
           }

    } 
     function save_custom_meta_box_info_truyenchu_chap_ze($post_id)

    {

        // Ki?m tra có ph?i s? ki?n insert/update post

        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))){

            return $post_id;

        }

 

        // Ki?m tra có ph?i save t? d?ng không, n?u ph?i thì không x? lý

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){

            return $post_id;

        }
        // Ki?m tra quy?n

        if (!current_user_can('edit_post', $post_id)) {

            return $post_id;

        }

          
         $old_box =get_post_meta($post_id,'postselech',true);
         $new_box =$_POST['postselech'];
         if($new_box && $new_box != $old_box)
          {
           update_post_meta($post_id,'postselech',$new_box);
           }

    }   

}