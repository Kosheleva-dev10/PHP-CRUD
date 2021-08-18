<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-simple-slider-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$slides 			= thz_akg('slides',$atts,null);
$slider_layout		= thz_akg('slider',$atts,null);
$slider_animation	= thz_akg('sa',$atts,null);
$slick_data			= thz_slick_data($slider_layout,$slider_animation);
$slidesToShow		= thz_akg('show',$slider_layout,1);
$multiple			= '';
$slidescount		= count($slides);
$activate_slider	= ' thz-slick-inactive';

if( $slidescount > 1 ){
	$activate_slider = ' thz-slick-active thz-slick-initiating';
	$multiple	= $slidesToShow > 1 ? ' thz-slick-show-multiple' :'';	
}

$slider_classes = 'thz-slick-slider'.$activate_slider;
$holder_classes = $css_class.'thz-shc thz-slick-holder'.$multiple.$animation_class.$cpx_class.$res_class;
?>
<div id="<?php echo esc_attr($id_out)?>" class="<?php echo thz_sanitize_class($holder_classes) ?>"<?php echo thz_sanitize_data($animation_data.$cpx_data); ?>>
  <div class="<?php echo thz_sanitize_class($slider_classes) ?>"<?php echo thz_sanitize_data($slick_data)?>>
    <?php foreach ($slides as $item) { 

		$content	= thz_akg('content',$item,null); 
		if($content ==''){
			continue;
		}

	?>
    <div class="thz-slick-slide">
      <div class="thz-slick-slide-in">
        <div class="thz-simple-slider-slide">
        	<?php echo thz_html_trans(esc_textarea(do_shortcode( $content ))) ; ?>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>