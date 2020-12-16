<?php
class load_ajax
{
     function __construct()
    {
       add_action('wp_ajax_sb_test_ajax',  array(__CLASS__,'show_ajax'));
       add_action('wp_ajax_nopriv_sb_test_ajax', array(__CLASS__,'show_respost'));
       add_action('wp_head',  array(__CLASS__,'sb_add_javascript_admin_footer'));
      // add_action('admin_footer',  array(__CLASS__,'sb_add_javascript_admin_footer'));
    }
     function sb_add_javascript_admin_footer() { ?>
        <script>
        (function($){
            var data = {
                'action': 'sb_test_ajax',
                'number': 6
            };
             
            // Ke tu phien ban 2.8 thi ajaxurl luong duoc khai bao trong header va tro toi admin-ajax.php
            var ajaxurl= '<?php echo admin_url('admin-ajax.php'); ?>';
            $.post(ajaxurl, data, function(response){
                alert('Du lieu duoc tra ve tu server: ' + response);
            });
        })(jQuery);
        </script> <?php
    }

    function show_ajax() {
        require('teamplate/show_post/default.php');
        
        die();
    }
}