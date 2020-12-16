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

        add_action('save_post', array($this, 'save_custom_meta_box_info'  ));

       

    }

 

    function add_meta_box_more_info(){

        add_meta_box("info", 'Info', array($this, 'show_system'), 'TT-chap_ze', 'normal', 'low', array('gia tri 1', 'gia tri 2'));

    }

    

 

    function show_system($post, $box)

    {        

 

        // L?y thông tin các meta c?a post và hi?n th? lên các input

        $link_upload_source = get_post_meta($post->ID, 'link-upload-source', true);

        $note = get_post_meta($post->ID, 'note', true);

       

        $color = get_post_meta($post->ID, 'color', true);

 

        //  Input Ki?m Tra S? Ki?n Add, Update

        echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

 

        foreach($this->info as $meta)

        {

            $meta_post= get_post_meta($post->ID,$meta['id'],true);

          

             switch($meta['type'])

             {

                 case 'text':

                { 

                    

                    echo '<span>'.$meta['description'].'</span></br>';

                    echo '
                    
                    <input size="30" type="'.$meta['type'].'" id="'.$meta['id'].'" name="'.$meta['id'].'" value="'.$meta_post.'" /></br>';

                    break;

                }

                case 'textarea':

                {

                    echo '<span>'.$meta['description'].'</span></br>';

                    echo '<textarea name="note" id="note" cols="60" rows="4">'.$meta_post.'</textarea>';

                    break;   

                }

            }

        }

    }

 

    // V?i hàm này m?c d?nh là post_id

    function save_custom_meta_box_info($post_id)

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

          foreach ($this->info as $meta)
            {
                $old_box =get_post_meta($post_id,$meta['id'],true);
             $new_box =$_POST[$meta['id']];
             if($new_box && $new_box != $old_box)
              {
               update_post_meta($post_id,$meta['id'],$new_box);

                }
          }

       

        }    

}