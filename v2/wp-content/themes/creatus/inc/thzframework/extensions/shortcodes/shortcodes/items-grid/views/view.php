<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
if(count($atts['items']) < 1){
	
	$n_title 	= esc_html__('Grid items missing','creatus');
	$n_msg 		= esc_html__('Please go in items grid settings and add minimum one item','creatus');
	thz_notify('yellow thz-shc',$n_title,$n_msg);
	return;
}

$id					= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-items-grid-'.$id; 
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));		
$columns			= thz_akg('grid/columns',$atts);
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$classes			= $css_class.'thz-shc thz-items-grid-holder'.$cpx_class.$res_class;
$html				= '';
$item_html			= '';
$gridRows 			= array_chunk($atts['items'], $columns , true);

foreach ($gridRows as $items) {
	
	$item_html .= '<div class="thz-items-grid-row">';
	
	foreach ($items as $item ){
		
		$item_id	= thz_akg('id',$item);
		$el_content = thz_akg('ec',$item);	
		$above		= '';
		$inside		= '';
		$under		= '';
		
		if(!empty($el_content)){
			foreach ( $el_content as $content ){
				
				$p 	= thz_akg('p',$content);	
				$c	= thz_akg('c',$content);	
				
				if('above' == $p){
					$above .= thz_html_trans(esc_textarea(do_shortcode( $c )));
				}
				if('inside' == $p){
					$inside .= thz_html_trans(esc_textarea(do_shortcode( $c )));
				}
				if('under' == $p){
					$under .= thz_html_trans(esc_textarea(do_shortcode( $c )));
				}
			}
		}
		
		$item_html .= '<div class="thz-grid-item thz-animate-parent '.thz_col_width( $columns ,3).'">';
		$item_html .= '<div id="thz-grid-item-in-'.esc_attr($item_id).'" class="thz-grid-item-in'.$animation_class.'"'.$animation_data.'>';
		$item_html .= $above;
		$item_html .= '<div class="thz-grid-item-element">';
		$item_html .= $inside;
		$item_html .= '</div>';
		$item_html .= $under;	
		$item_html .= '</div>';
		$item_html .= '</div>';
		
		
	}
	$item_html .= '</div>';
}


$html = '<div id="'.esc_attr($id_out).'" class="'.thz_sanitize_class($classes).'"'.$cpx_data.'>';
$html .= '<div class="thz-items-grid has-rows">';
$html .= $item_html;
$html .= '</div>';
$html .= '<div class="thz-items-gutter-adjust"></div>';
$html .= '</div>';

echo $html;

?>
