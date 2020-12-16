<?php
//add_filter('login_redirect', 'wpse125952_redirect_to_request', 10, 3);
function showPhongXT($atts,$content=null)
{
    $html ='';
   $args =array(
    'post_type'     =>'ql_phong_ze',
    'post_pre_page' =>'-1',
    );
    global $post;
    
    $the_query = new WP_Query( $args );

// The Loop
    if ( $the_query->have_posts() ) {
        $html .='<div class="listpost">';
        $sv=0;
    	while ( $the_query->have_posts() ) {
    		$the_query->the_post();
            $post_id=$post->ID;
    		 $terms = wp_get_post_terms( $post_id, 'day_phong_cat' );
             $termsloai = wp_get_post_terms( $post_id, 'loai_phong_cat' );
              $args2 = array(
            	'post_type' => 'ql_hop_dong_ze',
            	'meta_query' => array(
            		array(
            			'key' => 'ze_so_phong',
            			'value' => $post_id,
            		)
            	)
             );
           
               $postslist = get_posts( $args2 );
               
          $sv=array();
            foreach($postslist as $val)
            {
                $args3 = array(
            	'post_type' => 'ql_sv_ze',
            	'meta_query' => array(
            		array(
            			'key' => 'ma_hd',
            			'value' => $val->ID,
            		)
            	)
                );
                 $postslist_sv = get_posts( $args3 );
                 if($postslist_sv)
                 {
                    $sv[]=$postslist_sv;
                 }
                 
                
            }
           
             $html .= '<div class="postitems">';
             $html .= '<div class="posttitle"> <span class="pp"> ' . get_the_title() . ' ('.count($sv).'/8)</span>';
            
                    foreach($terms as $key)
                    {
            $html  .=  '<span class="dayp">'.$key ->name.'</span>';
                    }
                     foreach($termsloai as $lkey)
                    {
            $html  .=  '<span class="loaip">'.$lkey ->name.'</span>';
                    }
            
           $html  .='</div><div class="listsv">';
           
    
            
            if($sv){
             
                foreach ($sv as $key =>$val)
                {
                 $sv++;
                $termslop = wp_get_post_terms($val[0]->ID, 'lop_hoc_cat');
                $svNgaySinh=get_post_meta($val[0]->ID,'ngay_sinh',true);
                  
                        $html .='<div class="postsv"> <span class="namesv">'.$val[0]->post_title.'</span> <span class="naysinh">'.$svNgaySinh.'</span>';
                              
                                foreach($termslop as $lop)
                                {
                        $html  .=  '<span class="lop">'.$lop ->name.'</span>';
                                }
                        $html .='</div>';
                    
                }
            }
             $html .='</div></div>';
    	}
        
        $html .='</div>';
    
    } else {
    	// no posts found
    }
   
     


    return $html;      

}

function showFormGuestsReviews($atts,$content=null)
{
    $html='';
   
   $current_user =wp_get_current_user();
    $us_id=  get_current_user_id( );
      
    $html .='
<form id="formcommet" class="" action="javascript:void(0)" method="post">
<div class="formrow td_name">
<label> Name</label>';
$html .='<h4>'.$current_user->display_name.'</h4>';
$html .='<input type="hidden" name="userpost" id="userpost" value="'.$current_user->display_name.'" /></div>';
$html .='<div class="formrow td_title">
<label> Title</label>
<input type="text" name="zetitle" id="zetitle" />
</div>
<div class="formrow td_comment">
<label> Comment</label>
<textarea name="zecomment" id="zecomment"></textarea>
</div>
<div id="formfile">
</div>
<input id="fileupload" type="file" name="files[]" data-url="'.plugins_url().'/application/uploadmaster/server/php/" multiple>
<input title="Send" type="submit" class="subform" value="send"/>
</form>


';
if($us_id)
{
    $html .="
    <style>
.loginreview{
    display: none;
}

</style>
";
}else{
        $html .="
    <style>
.formshowreview{
    display: none;
}

</style>
";
    
}

   
    return $html;      
}

//************************************************************************/

//  add short code 

//***********************************************************************/



add_shortcode('showPhongXT','showPhongXT');

add_shortcode('showFormGuestsReviews','showFormGuestsReviews');

//add_shortcode('show_list_category','show_list_category');

//add_shortcode('show_icon_img','show_icon_img');

//add_shortcode('google_maps','google_maps');

