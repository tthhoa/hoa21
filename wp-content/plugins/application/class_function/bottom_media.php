<?php
class bottom_media
{
    function __construct()
    {
         add_action('media_buttons', array($this,'add_media_link' ));
         add_action('admin_init', array($this,'buttom_link'));
    }
    function add_media_link(){
      echo  '<a href="#" id="insert-my-media" class="button">Add my media</a>';
    }
    function buttom_link(){
        ob_start(); ?>
        <script>
            jQuery(function($) {
                $(document).ready(function(){
                        $('#insert-my-media').click(open_media_window);
                    });
             
                function open_media_window() {
                    if (this.window === undefined) {
                        this.window = wp.media({
                                title: 'Insert a media',
                                library: {type: 'image'},
                                multiple: false,
                                button: {text: 'Insert'}
                            });
                var self = this; // Needed to retrieve our variable in the anonymous function below
                this.window.on('select', function() {
                        var first = self.window.state().get('selection').first().toJSON();
                        wp.media.editor.insert('[myshortcode id="' + first.id + '"]');
                    });
                    }
                 
                    this.window.open();
                    return false;
                }
            });
        
        </script>
        
        <?php
        $ret= ob_get_contents();
        ob_end_clean();
        return $ret;
    }
    
}
