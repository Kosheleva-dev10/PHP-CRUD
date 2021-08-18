<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
$popups				= thz_akg('popups',$atts);

if(!empty($popups)){

	$id 				= thz_akg('id',$atts);
	$css_id 			= thz_akg('cmx/i',$atts);
	$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-magnific-popup-'.$id;
	$css_class 			= thz_akg('cmx/c',$atts);
	$instyle			= thz_akg('instyle',$atts);
	$instyle			= $instyle !='' ? 'thz-mfp-'.$instyle.' ':'';
	$css_class			= $css_class !='' ? $css_class.' ':'';
	$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
	$classes			= $instyle.$css_class.'thz-shc thz-mfp-'.$id_out.' thz-magnific-container'.$res_class;
	$gallery			= thz_akg('gm/active',$atts);
	$gallery_trigger	= thz_akg('gm/trigger',$atts);
	$gallery_id_op		= thz_akg('gm/id',$atts);
	$gallery_class		= $gallery_trigger == 'button' ? ' mfp-hide' :'';
	$gid_sub			= empty($gallery_id_op ) && !empty($popups) ? $popups[0]['id'] : '';
	$gallery_id_out		= !(empty($gallery_id_op )) ? str_replace(' ','',$gallery_id_op) : 'thz-media-gallery-'.$gallery_id_op.$gid_sub;
	$gallery_align		= ' thz-lg-align-'.thz_akg('gm/align',$atts);
	$gallery_start		= '';
	$gallery_end		= '';
	$html				= '';
	$mfp_slider			= thz_akg('gm/slider',$atts,'show') == 'show' ? ' thz-mfp-show-slider' : '';
	$hide_container		= $gallery =='yes' && $gallery_trigger == 'button' ? true : false;
	
	if($gallery == 'yes'){
		$gallery_clases = 'thz-lightbox-gallery'.$gallery_class.$gallery_align.$mfp_slider;
		$gallery_start .='<div id="'.esc_attr($gallery_id_out).'" class="'.thz_sanitize_class($gallery_clases).'">';
		$gallery_end .='</div>';	
	}
	
	foreach ($popups as $key => $popup) {
		
		$id 				= thz_akg('id',$popup);
		$style				= thz_akg('bd/s',$popup);
		$opacity			= thz_akg('bd/o',$popup); 
		$type 				= thz_akg('type/picked',$popup);
		$popup_id			= !(empty(thz_akg('popupid',$popup) )) ? str_replace(' ','',thz_akg('popupid',$popup)) : 'thz-popupid-'.$id;
		$popup_trigger_op	= thz_akg('popup_trigger/picked',$popup);
		$popup_trigger		= thz_akg('popup_trigger/'.$popup_trigger_op.'/trigger',$popup);
		$popup_trigger_print = '';
		$effect				= thz_akg('effect',$popup);
		$alt 				= thz_akg('popup_trigger/image/mx/a',$popup);
		$hide_link			= '';
		$popupdata			= '';
		if($popup_trigger_op == 'link'){
			
			$popup_trigger_print = esc_attr($popup_trigger);
			
		}elseif($popup_trigger_op == 'image'){
			
			$wo 	= thz_akg('popup_trigger/image/mx/w',$popup);
			$ho 	= thz_akg('popup_trigger/image/mx/h',$popup);
			$width  = ( is_numeric( $wo ) && ( $wo > 0 ) ) ? $wo : '';
			$height = ( is_numeric( $ho ) && ( $ho > 0 ) ) ? $ho : '';
			if ( ! empty( $wo ) && ! empty( $ho ) ) {
				
				$trigger_image = fw_resize( $popup_trigger['attachment_id'], $width, $height, true );
				$popup_trigger_print = '<img src="'.esc_url($trigger_image).'" alt="'.esc_attr($alt).'" />';
				
				if($gallery == 'yes'){
					$popupdata .= 'data-mfp-poster="'.esc_url($trigger_image).'" ';
				}
				
			} 
		}
		
		$popupdata .= 'data-effect="'.$effect.'" data-bg="'.$style.'" data-opacity="'.$opacity.'"';
		
		
		if($popup_trigger_op =='none') {
			
			$hide_link = ' mfp-hide';
			$hide_container = true;
		}
		// inline
		if($type =='mfp-inline'){
	
			$modal_size  		= thz_akg('type/mfp-inline/modal_size',$popup);
			$modal_heading 		= thz_akg('type/mfp-inline/modal_heading',$popup);
			$modal_content  	= thz_akg('type/mfp-inline/modal_content',$popup); 
			$popupdata			= $popupdata.' data-modal-size="'.$modal_size.'"';
	
			$html .='<a class="thz-lightbox thz-mfp-shortcode '.thz_sanitize_class($type.$hide_link).'" href="#'.esc_attr($popup_id).'" '.thz_sanitize_data($popupdata).'>';
			$html .= $popup_trigger_print;
			$html .='</a>';
			$html .='<div id="'.esc_attr($popup_id).'" class="thz-popup-box mfp-hide">';
			if (!empty ($modal_heading)) {
				$html .='<h3 class="thz-popup-heading">'.esc_attr($modal_heading).'</h3>';
			}
			$html .= thz_html_trans(esc_textarea(do_shortcode( $modal_content )));
			$html .='</div>';
			
		}
		
		// image 
		if($type =='mfp-image'){
			
			
			$image = thz_akg('type/mfp-image/image',$popup);
			if(isset($image['url'])){
				$short_description = thz_akg('type/mfp-image/short_description',$popup);
				$popupdata .=' data-mfp-src="'.esc_url( $image['url'] ).'"';
				$title  = $short_description !='' ? ' data-mfp-title="'.esc_attr($short_description).'"' : '';
				$html .='<a id="'.esc_attr($popup_id).'" class="thz-lightbox thz-mfp-shortcode '.thz_sanitize_class($type.$hide_link).'"';
				$html .=' href="'.esc_url( $image['url'] ).'" '.thz_sanitize_data($popupdata).$title.'>';	
				$html .= $popup_trigger_print;
				$html .='</a>';	
				
			}else{
				
				$html .= esc_html('You added a popup but popup image is missing');	
			}
						
		}
		
		// ajax
		if($type =='mfp-ajax'){
			
			$ajax_link = thz_akg('type/mfp-ajax/ajax_link',$popup);
			$html .='<a id="'.esc_attr($popup_id).'" class="thz-lightbox-ajax thz-mfp-shortcode '.thz_sanitize_class($type.$hide_link).'"';
			$html .= ' href="'.esc_url($ajax_link).'" '.thz_sanitize_data($popupdata).'>';
			$html .= $popup_trigger_print;
			$html .='</a>';			
						
		}
		
		// iframe
		if($type =='mfp-iframe'){
			
			$ajax_link = thz_akg('type/mfp-iframe/iframe_link',$popup);
			$short_description = thz_akg('type/mfp-iframe/short_description',$popup);
			$title  = $short_description !='' ? ' data-mfp-title="'.$short_description.'"' : '';
			$html .='<a id="'.esc_attr($popup_id).'" class="thz-lightbox-iframe thz-mfp-shortcode '.thz_sanitize_class($type.$hide_link).'"';
			$html .= ' href="'.esc_url($ajax_link).'" '.thz_sanitize_data($popupdata).$title.'>';
			$html .= $popup_trigger_print;
			$html .='</a>';			
						
		}
		
		
		// video
		if($type =='mfp-video'){
	
			$poster	= thz_akg('type/mfp-video/poster',$popup);
			$source	= thz_akg('type/mfp-video/video',$popup);
			$short_description = thz_akg('type/mfp-video/short_description',$popup);
			$popupdata	= $popupdata.' data-modal-size="xlarge"';
			$popupdata .= $short_description !='' ? ' data-mfp-title="'.esc_attr($short_description).'"' : $popupdata;
			
			
			$html ='<a class="thz-lightbox thz-mfp-shortcode mfp-inline'.$hide_link.'" href="#'.esc_attr($popup_id).'" '.thz_sanitize_data($popupdata).'>';
			$html .= $popup_trigger_print;
			$html .='</a>';			
			
			$html .='<div id="'.esc_attr($popup_id).'" class="thz-selfmedia-popup thz-modal-box mfp-hide">';
			$html .='<div class="thz-aspect thz-ratio-16-9">';
			$html .='<div class="thz-ratio-in">';	
			
			$video_poster = !empty($poster) ? $poster['url'] : null;
			$has_poster = $video_poster ? ' thz-media-has-poster':'';
			
			$html .='<video id="thz_media_video-'.esc_attr($popup_id).'" class="thz-media-mfp thz-video-html5 thz-media-respond'.$has_poster.'"';
			if($video_poster){
				$html .=' poster="'.esc_url($video_poster).'"';
			}
			$html .='>';
			
			foreach($source as $source_ext){ 
				$ext_type = wp_check_filetype( $source_ext['url']);
				$html .='<source src="'.esc_url ( trim($source_ext['url'])).'" type="'.$ext_type['type'].'" />';
			}
			$html .='</video>';	
			
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';		
		}
		
		// audio
		if($type =='mfp-audio'){
	
			$source	= thz_akg('type/mfp-audio/audio',$popup);
			$short_description = thz_akg('type/mfp-audio/short_description',$popup);
			$popupdata	= $popupdata.' data-modal-size="large"';
			$popupdata .= $short_description !='' ? ' data-mfp-title="'.esc_attr($short_description).'"' : $popupdata;
	
			
			$html ='<a class="thz-lightbox thz-mfp-shortcode mfp-inline'.$hide_link.'" href="#'.esc_attr($popup_id).'" '.thz_sanitize_data($popupdata).'>';
			$html .= $popup_trigger_print;
			$html .='</a>';			
			
			$html .='<div id="'.esc_attr($popup_id).'" class="thz-selfmedia-popup thz-modal-box mfp-hide">';
			$html .='<div class="thz-aspect thz-ratio-16-9">';
			$html .='<div class="thz-ratio-in">';	
			$html .='<div class="thz-media-audio-holder">';
			
			$html .='<audio id="thz_media_audio-'.esc_attr($popup_id).'" class="thz-media-mfp thz-audio thz-media-respond">';
			
			foreach($source as $source_ext){ 
				$ext_type = wp_check_filetype( $source_ext['url']);
				$html .='<source src="'.esc_url ( trim($source_ext['url'])).'" type="'.$ext_type['type'].'" />';
			}
			$html .='</audio>';	
			
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';	
			$html .='</div>';	
		}		
		
		
	
	}// end foreach
	
	if($hide_container){
		$classes .= ' mfp-hide';
	}
	
	$output = '<div id="'.esc_attr( $id_out ).'" class="'.thz_sanitize_class($classes).'">';
	$output .= $gallery_start;
	$output .= $html;
	$output .= $gallery_end;
	$output .= '</div>';
	
	echo $output;
}