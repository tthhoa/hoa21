<?php
/*
Plugin Name: ADDCHAP_thegioididong
Plugin URI: http://wordpress.org/plugins
Description: blog list items post
Author: ze
Version: 1
Author URI: http://ma.tt/

*/
//soung:https://gist.github.com/jmoz/2996220
//http://www.w3schools.com/xsl/xpath_syntax.asp
require_once('simple_html_dom.php');
define('URL_TEAMPLATE',plugin_dir_path(__FILE__));
define('URL_FOlDER_CSV',plugin_dir_path(__FILE__).'CSV');
$class_rss= new upload_rss();
class upload_rss
{
    public $data=array();
     public $data_link=array();
    static function getIntance()
   {
     $obj = new inset_autopost_link;
     return $obj;
     
   }
   function __construct()
   {
        add_shortcode('getLink',array($this,'getLink'));
        add_shortcode('show_truyen',array($this,'show_system_truyen'));
        //add_action('admin_menu',array($this,'formBackEnd'));
        add_action( 'admin_menu',array($this, 'formBackEnd') );
   }
   function getLink()
   {

    if(isset($_POST['submitrss']) && !empty($_POST['rss_link'])){
        global $wpdb;	 	 
        $results = $wpdb->get_results("SELECT * FROM wp_post where post_type='ql_sv_ze'");
        echo '<pre>'; print_r($results); echo '</pre>';	 	 

     //   upload_rss::createCSV();
   }

    
      
         unset($_POST['submitrss']);
         unset($_POST['rss_link']);
    

   }
   function loadSite($link,$info)
   {
   // $site='https://www.thegioididong.com'.$link;
    
// $link='https://www.matbao.net/Gioi-thieu-Mat-Bao-Mobile.aspx';
            // C?u h́nh cho CURL
//            echo $info.''. $site.'<br/>';
 $html = file_get_html($link);
//  $html->find();

           // $html = str_get_html($curt); //full HTML of website
            $dom_title='div[class=rowtop] h1';
            $dom_img='aside[class=picture] img';
            $dom_price='aside[class=price_sale] strong';
            $dom_tableparameter='aside[class=tableparameter]';
            $dom_characteristics='aside[class=characteristics] img';
            $dom_breadcrunb='li[class=brand]';
            $dom_short0='ul[class=parameter]';
            $dom_short1='ul[class=parameter]';
            $dom_short2='ul[class=parameter]';
            $dom_short3='ul[class=parameter]';
            $dom_short4='ul[class=parameter]';
            $dom_short5='ul[class=parameter]';
                if($html)
                {
                    
                    $e_title=$html->find($dom_title,0);
                    $e_imager=$html->find($dom_img,0)->src;
                    $e_price=$html->find($dom_price,0);
                    $e_tableparameter=$html->find($dom_tableparameter,0);
                    $e_breadcrumb=$html->find($dom_breadcrunb,0)->plaintext;
                   $e_characteristics=$html->find($dom_characteristics,0);
                   $e_short0=$html->find($dom_short0,0)->children(0)->plaintext;
                   $e_short1=$html->find($dom_short1,0)->children(1)->plaintext;
                   $e_short2=$html->find($dom_short2,0)->children(2)->plaintext;
                   $e_short3=$html->find($dom_short3,0)->children(3)->plaintext;
                   $e_short4=$html->find($dom_short4,0)->children(6)->plaintext;
                   $e_short5=$html->find($dom_short5,0)->children(7)->plaintext;
                    $resuts['title']=$e_title->plaintext;
                    $resuts['img']=$e_imager;
                    $resuts['price']=$e_price->plaintext;
                    $resuts['catchap']=$e_breadcrumb;
                   $resuts['shortDec']=$e_short0.'</br>'.$e_short1.'</br>'.$e_short2.'</br>'.$e_short3.'</br>'.$e_short4.'</br>'.$e_short5;
                    $resuts['tableparameter']=$e_tableparameter->outertext;
                    $resuts['manage_stock']='no';
                    
                    
                    $resuts['error']=' ';
                  //  return $resuts;
                  //echo $html->find('a');
                //  var_dump($resuts);
              upload_rss:: insetChap($resuts);
                    $html->clear();
                    unset($html);
                }else
                {
                    return('Die link : <br/>' );
                    $resuts['error']='<h1>Die link3 :</h1>';
                }      
   }
   
   function insetChap($resuts)
   {
  $this->data[]=$resuts;
 
    
   }
   function createCSV()
   {
    $data = $this->data;
 

    $path = URL_TEAMPLATE.'data.csv'; 
    $fileNew = URL_TEAMPLATE.'CSV/data-1.csv';
    echo  $path;
    if (file_exists($path))  //'File t?n t?i';
    {
        copy($path,$fileNew);
        
        ob_start();
    
          header('Content-Type: application/excel; charset=utf-8');
          header('Content-Disposition: attachment; filename=data.csv');
          header('Content-Transfer-Encoding: binary');
          iconv_set_encoding("internal_encoding", "UTF-8");
          iconv_set_encoding("output_encoding", "UTF-8");
          $file = fopen($fileNew,"w");
          fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
          fputs($file, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
          foreach($data as $val){
               fputcsv($file, array_values($val), ';', ' ');
     
              // fputcsv($file,array($val['MaSV'],$val['title'],$val['ngaysinh'],$val['lop'],$val['khoa'],$val['khoahoc'],$val['svMaSP']));
            }
             fclose($file);
              ob_end_clean();
      }else
      {
        echo 'Khong File  t?n t?i';
      }
      echo 'END';       
   }
    
    function show_system_truyen()
    {        

      
    }
    function getMaxId()
    {
        global $wpdb;
        $myrows = $wpdb->get_var( 
                    	"
                    	SELECT  ID
                    	FROM $wpdb->posts
                    	order by ID desc	
                    	"
                    );
        //$myrows=$myrows+1;
        return($myrows);
       // echo $myrows;
        
    }
    function getPostInfo($post_id=null,$info_chap=null)
    {
      // $old_box =get_post_meta($post_id,'postselech',true);
         $new_box =$info_chap;
       //  if($new_box && $new_box != $old_box)
      //    {
          update_post_meta($post_id,'postselech',$new_box);
        //  }
       echo $old_box =get_post_meta($post_id,'postselech',true);
    }

   function formBackEnd()
   {
    add_menu_page( 'custom menu title', 'Thống Kê báo cáo', 'manage_options','chaptruyenpage',array($this,'showForm'), '',6);
    //require_once('formUpload.php');
   }
   function showForm()
   {   
      global $wpdb, $post;
      $arge_sv=array(
      'post_type'=>'ql_sv_ze',
      'post_pre_page'=>-1
      );
      $sv=array();
      echo '<table><tr><td>MaSV</td><td>Name</td><td>Ngay Sinh</td><td>Lop</td><td>Khoa</td><td>khoa hoc</td><td>PHong</td></tr>';
        $the_sv= new WP_Query($arge_sv);
        if($the_sv->have_posts())
        {
          
            while($the_sv->have_posts())
            {
                $the_sv->the_post();
                  $svID= $post->ID;
                  $svNgaySinh=get_post_meta($svID,'ngay_sinh',true);
                  $svMasv    =get_post_meta($svID,'masv',true);
                  $svMaHDd=get_post_meta($svID,'ma_hd',true);
                  if(!empty($svMaHDd))
                  {
                    $svMaSP=get_post_meta($svMaHDd,'ze_so_phong',true);
                  }
                  
                  
              
                
                $termslop = wp_get_post_terms($svID, 'lop_hoc_cat');
                $termskhoa = wp_get_post_terms($svID, 'khoa_cat');
                $termskhoahoc = wp_get_post_terms($svID, 'khoa_hoc_cat');
                $sv['MaSV']=$svMasv;
                $sv['title']=get_the_title();
                $sv['ngaysinh']=$svNgaySinh;
                $sv['lop']=$termslop[0]->name;
                $sv['khoa']=$termskhoa[0]->name;
                $sv['khoahoc']=$termskhoahoc[0]->name;
               
                if($svMaHDd){
                $sv['svMaSP']=get_the_title($svMaSP);
                }else{
                   $sv['svMaSP']='';
                }
                echo '<tr>';
                echo '<td>' .$sv['MaSV']. ' </td><td><div class="posttitle"> <span class="pp"> ' . $sv['title'] . ' </td><td>'.$sv['ngaysinh'].'</td><td>'.$sv['lop'].'</td><td>'.$sv['khoa'].'</td><td>'.$sv['khoahoc'].'</td><td>'.$sv['svMaSP'].'</td></span>';               
                echo '</tr>';
                 upload_rss::insetChap($sv);
            }
        }
       upload_rss::createCSV();
        

   }
    
}