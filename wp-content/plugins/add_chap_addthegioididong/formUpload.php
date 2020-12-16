<div class="wrap">

    <div id="icon-options-general" class="icon32"><br />
    </div>
    <h2>Theme</h2>
    <div class="formrss">
     <form name="addchap" action="" method="post">
        First name:
        <input type="text" name="rss_link" class="regular-text" size="30" value="https://www.thegioididong.com/dtdd-samsung" />
        <br/>
        info:<?php  echo do_shortcode('[show_truyen]'); ?> 
        <br/>
        <label>product cat:</label> 
        <input type="text" name="catchap" value="" /><br/>
        <?php  
/**
 * no default values. using these as examples
$taxonomies = array( 
    'truyenchu_cat'
);

$args = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'hide_empty'       =>false,
 
); 

$terms = get_terms($taxonomies, $args);
foreach($terms as $valu)
{
    echo $valu ->name.'<input type="checkbox" name="catchap[]" value="'.$valu->term_id.'" /><br/>';
   
    
};
*
* 
**/
 ?>
    <input type="submit" name="submitrss" value="submit" />
    </form>
    </div>
    <div>
     <?php echo do_shortcode('[getLink]'); ?>
    <?php //echo do_shortcode('[feed]'); ?>
    </div>
    <div class="showchaps"><?php // do_shortcode('[truyenchu]');
     ?></div>
</div>