<?php
//************************************************************************/
//  vcShowTruyenMoi
//***********************************************************************/
function vcShowNewChapters() {
   vc_map(array(
  		"name" => __("Show Chaps new"),
        "base" => "showNewChapters",
        "class" => "",
        "category" => __('TruenOne'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name Title"),
              "param_name" => "addtitle",
              "value" => "",
              "description" => __("show title  main")
          ),
           array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Number Title"),
              "param_name" => "shownumber",
              "value" => "",
              "description" => __("show title  main")
          ),
          
          array(
                "type" => "dropdown",
                "heading" => __( "Post Chap", "__x__" ),
                'admin_label' => true,
                "param_name" => "posttype",
                "value" => array(
                  'Truyen chu'=>'truyenchu_ze',
                  'Chapter' =>'truyen-chu-chap_ze',
                ),
           //     "std"         => $defaults['posttype'],
                "description" => __("Choose a Content Block from the drop down list.", "__x__")
            ),
          
        )   
    ));
}
//************************************************************************/
//  vcShowTruyenMoi
//***********************************************************************/
function vcShowTruyenMoi() {
   vc_map(array(
  		"name" => __("Show Truyen Moi"),
        "base" => "showTruyenMoi",
        "class" => "",
        "category" => __('TruenOne'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name Title"),
              "param_name" => "addtitle",
              "value" => "",
              "description" => __("show title  main")
          ),
           array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Number Title"),
              "param_name" => "shownumber",
              "value" => "",
              "description" => __("show title  main")
          ),
          
          array(
                "type" => "dropdown",
                "heading" => __( "Post Chap", "__x__" ),
                'admin_label' => true,
                "param_name" => "posttype",
                "value" => array(
                  'Truyen chu'=>'truyenchu_ze',
                  'Chapter' =>'truyen-chu-chap_ze',
                ),
           //     "std"         => $defaults['posttype'],
                "description" => __("Choose a Content Block from the drop down list.", "__x__")
            ),
          
        )   
    ));
}

//************************************************************************/
//  vcShowGalery
//***********************************************************************/
function vcShowGalery() {
   vc_map(array(
  		"name" => __("Show galery"),
        "base" => "showGalery",
        "class" => "",
        "category" => __('TruenOne'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name Title"),
              "param_name" => "addtitle",
              "value" => "",
              "description" => __("show title  main")
          ),
           array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Show Future"),
              "param_name" => "feature",
              "value" => "",
              "description" => __("Show Future")
          ),
           array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("show number post"),
              "param_name" => "number",
              "value" => "",
              "description" => __("show number page")
          ),
          array(
                "type" => "dropdown",
                "heading" => __( "Post Chap", "__x__" ),
                'admin_label' => true,
                "param_name" => "posttype",
                "value" => array(
                  'Truyen Tranh'=>'tt-chap_ze',
                  'Truyen Chu' =>'truyen-chu-chap_ze',
                ),
                "std"         => $defaults['posttype'],
                "description" => __("Choose a Content Block from the drop down list.", "__x__")
            ),
          
        )   
    ));
}


//************************************************************************/
//  vcShowIcom
//***********************************************************************/
function vcShowIcom() {
    vc_map(array(
  		"name" => __("Show Icon"),
        "base" => "ShowIcon",
        "class" => "",
        "category" => __('TruenOne'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name Title"),
              "param_name" => "addtitle",
              "value" => "",
              "description" => __("show title  main")
          ),
           array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Show Future"),
              "param_name" => "feature",
              "value" => "",
              "description" => __("Show Future")
          ),
           array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("show number post"),
              "param_name" => "number",
              "value" => "",
              "description" => __("show number page")
          ),
          array(
                "type" => "dropdown",
                "heading" => __( "Post Chap", "__x__" ),
                'admin_label' => true,
                "param_name" => "posttype",
                "value" => array(
                  'Truyen Tranh'=>'tt-chap_ze',
                  'Truyen Chu' =>'truyen-chu-chap_ze', 
                ),
                "std"         => $defaults['posttype'],
                "description" => __("Choose a Content Block from the drop down list.", "__x__")
            ),
          
        )   
    ));
    
}


//************************************************************************/
//  Breadcrumb
//***********************************************************************/
function vcBreadcrumb() {
    vc_map(array(
  		"name" => __("Show Breadcrumb"),
        "base" => "breadcrumb",
        "class" => "",
        "category" => __('Joomfashion theme'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name Title"),
              "param_name" => "addtitle",
              "value" => "",
              "description" => __("show title  main")
          ),
        )
    ));
}

//******************************************************************************************************/
//  vcTitlePage
//******************************************************************************************************/

function vcTitlePage( $content=null)
{
	vc_map( array(
   		"name" => __("Show Title"),
        "base" => "title_page",
        "class" => "",
        "category" => __('Joomfashion theme'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name Title"),
              "param_name" => "addtitle",
              "value" => "",
              "description" => __("show title  main")
          ),
           array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name Title channer"),
              "param_name" => "addtitlechanner",
              "value" => "",
              "description" => __("show title  channer")
          ),
           array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name fist Title channer"),
              "param_name" => "addfisttitlechanner",
              "value" => "",
              "description" => __("show fist title  channer")
          ),
           array(
              "type" => "colorpicker",
              "holder" => "",
              "class" => "",
              "heading" => __("Coler Citle"),
              "param_name" => "addcoler",
              "value" => "#ecce1f",
              "description" => __("chose coler title")
          ),
          array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content"),
              "param_name" => "content",
              "value" => __(""),
              "description" => __("Subtitle content")
          )  
         
   
        )
   	));
    
 }
//******************************************************************************************************/
//  vcShowListCategory
//******************************************************************************************************/
function vcShowListCategory( $content=null)
{
	vc_map( array(
   		"name" => __("Show list category"),
        "base" => "show_list_category",
        "class" => "",
        "category" => __('Joomfashion theme'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Name post type"),
              "param_name" => "listcat",
              "value" => "",
              "description" => __("show list category on  main")
          ),
         
   
        )
   	));
 }

//******************************************************************************************************/
// vcShowIconImg
//******************************************************************************************************/
function vcShowIconImg( $content=null)
{
	vc_map( array(
   		"name" => __("Show Icon images"),
        "base" => "show_icon_img",
        "class" => "",
        "category" => __('Joomfashion theme'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("class main"),
              "param_name" => "class_main",
              "value" => "",
              "description" => __("Add class on div main icom")
          ),
          array(
              "type" => "attach_image",
              "holder" => "",
              "class" => "",
              "heading" => __("Icon 1"),
              "param_name" => "icon1",
              "value" => "",
              "description" => __("Add icon 1")
          ),
          array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Link 1"),
              "param_name" => "link1",
              "value" => "",
              "description" => __("Add link 1 ")
          ),
          array (
              "type" => 'textfield',
              "holder" => "",
              "class" => "",
              "heading" => __("class 1"),
              "param_name" => "class1",
              "value" => "",
              "description" => __("Add class 1 ")  
          ),
          array(
              "type" => "attach_image",
              "holder" => "",
              "class" => "",
              "heading" => __("Icon 2"),
              "param_name" => "icon2",
              "value" => "",
              "description" => __("Add icon 2")
          ),
          array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Link 2"),
              "param_name" => "link2",
              "value" => "",
              "description" => __("Add link 2 ")
          ),
          array (
              "type" => 'textfield',
              "holder" => "",
              "class" => "",
              "heading" => __("class 2"),
              "param_name" => "class2",
              "value" => "",
              "description" => __("Add class 2 ")  
          ),
          array(
              "type" => "attach_image",
              "holder" => "",
              "class" => "",
              "heading" => __("Icon 3"),
              "param_name" => "icon3",
              "value" => "",
              "description" => __("Add icon 3")
          ),
          array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Link 3"),
              "param_name" => "link3",
              "value" => "",
              "description" => __("Add link 3 ")
          ),
          array (
              "type" => 'textfield',
              "holder" => "",
              "class" => "",
              "heading" => __("class 3"),
              "param_name" => "class3",
              "value" => "",
              "description" => __("Add class 3 ")  
          ),
          array(
              "type" => "attach_image",
              "holder" => "",
              "class" => "",
              "heading" => __("Icon 4"),
              "param_name" => "icon4",
              "value" => "",
              "description" => __("Add icon 4")
          ),
          array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("Link 4"),
              "param_name" => "link4",
              "value" => "",
              "description" => __("Add link 4 ")
          ),
          array (
              "type" => 'textfield',
              "holder" => "",
              "class" => "",
              "heading" => __("class 4"),
              "param_name" => "class4",
              "value" => "",
              "description" => __("Add class 4 ")  
          ),
          array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content"),
              "param_name" => "content",
              "value" => __(""),
              "description" => __("Subtitle content")
          )   
        )
   	));
 }




 //******************************************************************************************************/
// google maps
//******************************************************************************************************/
function vcGoogleMap()
{
	vc_map( array(
   		"name" => __("Google maps"),
        "base" => "google_maps",
        "class" => "",
        "category" => __('Joomfashion theme'),
        "params" => array(          
	       array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Address"),
              "param_name" => "address",
              "value" => "",
              "description" => __("Add address maps")
          ),
          array(
              "type" => "attach_image",
              "holder" => "",
              "class" => "",
              "heading" => __("icon"),
              "param_name" => "icon",
              "value" => "",
              "description" => __("Add icon maps")
          ),
          array(
              "type" => "textfield",
              "holder" => "",
              "class" => "",
              "heading" => __("zoom"),
              "param_name" => "zoom",
              "value" => "",
              "description" => __("Add zoom maps")
          ),
          array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content"),
              "param_name" => "content",
              "value" => __(""),
              "description" => __("Subtitle content")
          ),
          
        )
   	));
 }
 //************************************************************************/
 //  add short code vc composer
 //***********************************************************************/
add_action( 'vc_before_init', 'vcShowGalery' );
add_action( 'vc_before_init', 'vcShowTruyenMoi' );
add_action( 'vc_before_init', 'vcShowNewChapters' );
 //add_action( 'vc_before_init', 'vcShowPostGalery' );
 add_action( 'vc_before_init', 'vcShowIcom' );
// add_action( 'vc_before_init', 'vcTruyenF' );
// add_action( 'vc_before_init', 'vcWarranty' );
 add_action( 'vc_before_init', 'vcBreadcrumb' );
 //add_action( 'vc_before_init', 'vcTitlePage' );
// add_action( 'vc_before_init', 'vcShowListCategory' );
// add_action( 'vc_before_init', 'vcShowIconImg' );
// add_action( 'vc_before_init', 'vcGoogleMap' );
 
 
 