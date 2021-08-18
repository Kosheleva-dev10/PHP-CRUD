<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id 					= thz_akg('id',$atts);
$css_id 				= thz_akg('cmx/i',$atts);
$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-sections-slider-'.$id;
$css_class 				= thz_akg('cmx/c',$atts);
$css_class				= $css_class !='' ? $css_class.' ':'';
$res_class				= _thz_responsive_classes(thz_akg('cmx',$atts));
$section_video			= thz_akg('bs/background',$atts);
$animate				= thz_akg('an',$atts);
$animation_data			= thz_print_animation($animate);
$animation_class		= thz_print_animation($animate,true);
$cpx					= thz_akg('cpx',$atts);
$cpx_data				= thz_print_cpx($cpx);
$cpx_class				= thz_print_cpx($cpx,true);
$cp_o					= thz_akg('cp',$atts);
$cp_speed				= (int) esc_attr( thz_akg('cp/0/s',$atts));
$cp_data				= !empty($cp_o) ? ' data-parallaxspeed="'.$cp_speed.'"' : '';
$op_classes				= !empty($cp_o) ?' thz-parallax-over':'';
$scrollfade_o			= thz_akg('sf',$atts);
$scrollfade_at			= (int) esc_attr( thz_akg('sf/0/fadeat',$atts));
$scrollfade_class		= !empty($scrollfade_o) ? ' thz-scroll-fade' : '';
$whattofade_o			= thz_akg('sf/0/whattofade',$atts); 
$whattofade				= $whattofade_o == 'content' ? ' data-whattofade=".thz-sections-slider-in"' : '';
$scrollfade_data		= !empty($scrollfade_o) ? ' data-fadestart="'.$scrollfade_at.'"'.$whattofade.'' : '';
$background_layers		= thz_akg('bl',$atts); 

$dstyle					= thz_akg('nav/style',$atts,'rings');
$dshadows				= thz_akg('nav/shadows',$atts,'active');
$dopacities				= thz_akg('nav/opacities',$atts,'active');
$dstyle					= $dstyle.' dsh-'.$dshadows.' dop-'.$dopacities.' ';
$dpoz					= thz_akg('nav/p',$atts,'bc');

$sl_layout				= array();
$sl_layout['show'] 		= 1;
$sl_layout['scroll'] 	= 1;
$sl_layout['space'] 	= 0;
$sl_layout['dots'] 		= thz_akg('nav/show',$atts,'inside');
$sl_layout['arrows'] 	= thz_akg('arr/show',$atts,'show');
$sl_animation			= thz_akg('sa',$atts,null);
$sld					= thz_slick_data($sl_layout, $sl_animation);

$n_rel_to				= $sl_layout['dots'] =='inside' ? ' navs-rel-'.thz_akg('nav/rel',$atts,'w') : '';
$a_rel_to				= $sl_layout['arrows'] =='show' ? ' arr-rel-'.thz_akg('arr/rel',$atts,'w') : '';

$dots_p					= $dpoz == 'c' ? ' dots-'.thz_akg('nav/o',$atts,'h') : ' dots-'.$dpoz;
$slc 					= 'thz-slick-slider thz-slick-active thz-slick-initiating thz-slick-sections thz-slick-'.$dstyle.$dots_p;
$datas					= $animation_data.$scrollfade_data.$cp_data.$cpx_data;
$classes				= $css_class.'thz-sections-slider'.$animation_class.$scrollfade_class.$op_classes.$cpx_class.$res_class; 
?>
<div id="<?php echo esc_attr( $id_out ) ?>" class="<?php echo thz_sanitize_class( $classes ) ?>"<?php echo thz_sanitize_data($datas); ?>>
	<div class="thz-sections-slider-holder<?php echo thz_sanitize_class( $n_rel_to.$a_rel_to ) ?>">
		<div class="thz-sections-slider-in">
        	<div class="thz-slick-holder">
            	<div id="thz-ses-<?php echo esc_attr( $id ); ?>" class="<?php echo thz_sanitize_class($slc) ?>"<?php echo thz_sanitize_data($sld) ?>>
					<?php echo do_shortcode( $content ); ?>
                </div>
            </div>
		</div>
		<?php echo thz_background_layers_print($background_layers); ?>
		<?php echo thz_video_bg($section_video,false) ?>
	</div>
</div>