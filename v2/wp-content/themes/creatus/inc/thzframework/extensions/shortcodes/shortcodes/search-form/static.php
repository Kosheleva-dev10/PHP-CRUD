<?php if (!defined('FW')) die('Forbidden');




if(!function_exists('_thz_search_form_css')){
	
	function _thz_search_form_css ($data) {
	
		$atts 			= _thz_shortcode_options($data,'search_form');
		$id 			= thz_akg('id',$atts);
		$css_id 		= thz_akg('cmx/i',$atts);
		$id_out			= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-search-shortcode-'.$id;
		$bs				= thz_print_box_css(thz_akg('bs',$atts));
		$input_style 	= thz_akg('i',$atts,null);
		$add_css 	= '';
		
		
		if($bs !=''){
			$add_css .= '#'.$id_out.'.thz-search-shortcode.thz-shc{';
			$add_css .= $bs;
			$add_css .='}';
		}
			
		if(!empty($input_style)){
				
			$normal_classes = '#'.$id_out.' .text-input';
			$hover_classes  = '#'.$id_out.' .text-input:hover';
			$focus_classes  = '#'.$id_out.' .text-input:focus';

			$metrics 		= thz_akg('i/0/bs',$atts,array());
			
			$bgh 			= thz_akg('i/0/thzelch/bg',$atts,null);
			$coh 			= thz_akg('i/0/thzelch/color',$atts,null);
			$bch 			= thz_akg('i/0/thzelch/bcolor',$atts,null);
			
			$bgf 			= thz_akg('i/0/thzelcf/bg',$atts,null);
			$cof 			= thz_akg('i/0/thzelcf/color',$atts,null);
			$bcf 			= thz_akg('i/0/thzelcf/bcolor',$atts,null);	
			
			$if	 			= thz_typo_css(thz_akg('i/0/if',$atts,null));	
				
			$elmetrics 		= thz_print_box_css($metrics);	
			
			// normal	
			if($elmetrics !='' || $if !=''){
				
				
				$add_css .= $normal_classes.'{';
				
				if($elmetrics !=''){
					$add_css .= $elmetrics;
				}
				
				if($if !=''){
					
					$add_css .= $if;
					
				}

				$add_css .= '}';
				
				
				// normal icon

				$fs				= 	thz_akg('i/0/if/size',$atts,null);
				$nc				= 	thz_akg('i/0/if/color',$atts,null);
				$right			= 	thz_akg('i/0/bs/padding/right',$atts,null);
				
				$add_css .= '#'.$id_out.' .thz-search-form:before{';
				if($fs !=''){
					$add_css .= 'font-size:'.thz_property_unit($fs,'px').';';
					$add_css .= 'height:'.thz_property_unit($fs,'px').';';
					$add_css .= 'line-height:'.thz_property_unit($fs,'px').';';
				}
				if($nc !=''){
					$add_css .= 'color:'.$nc.';';
				}
				$add_css .= 'right:'.thz_property_unit($right,'px').';';
				$add_css .= 'width:auto;';
				$add_css .= '}';
			}
			
			
			
			
			
			// hover
			if($bgh !='' || $coh !='' || $bch !=''){
				$add_css .= $hover_classes.'{';
				if($bgh !=''){
					$add_css .= 'background:'.$bgh.';';
				}
				if($coh !=''){
					$add_css .= 'color:'.$coh.';';
				}
				if($bch !=''){
					$add_css .= 'border-color:'.$bch.';';
				}
				$add_css .= '}';
				
				if($coh !=''){
					$add_css .= '#'.$id_out.' .thz-search-form:before{';
					$add_css .= 'color:'.$coh.';';
					$add_css .= '}';
				}
				
			}
			
			// focus
			if($bgf !='' || $cof !='' || $bcf !=''){
				$add_css .= $focus_classes.'{';
				if($bgf !=''){
					$add_css .= 'background:'.$bgf.';';
				}
				if($cof !=''){
					$add_css .= 'color:'.$cof.';';
				}
				if($bcf !=''){
					$add_css .= 'border-color:'.$bcf.';';
				}
				$add_css .= '}';
				
				if($cof !=''){
					$add_css .= '#'.$id_out.' .thz-search-form:before{';
					$add_css .= 'color:'.$cof.';';
					$add_css .= '}';
				}
			}
			
			
			// results
			$r_bg			= 	thz_akg('i/0/lsmx/bg',$atts,null);
			$r_bcolor		= 	thz_akg('i/0/lsmx/bcolor',$atts,null);
			$r_title		= 	thz_akg('i/0/lsmx/title',$atts,null);
			$r_color		= 	thz_akg('i/0/lsmx/color',$atts,null);
			
			if($r_bg !='' || $r_bcolor !=''){
				$add_css .= '#'.$id_out.'-input-results .thz-live-search-results,';
				$add_css .= '#'.$id_out.'-input-results .thz-live-search-item{';
				
				if($r_bg !=''){
					$add_css .= 'background:'.$r_bg.';';
				}
				if($r_bcolor !=''){
					$add_css .= 'border-color:'.$r_bcolor.';';
				}
				$add_css .= '}';
			}
			
			if($r_title !=''){
				$add_css .= '#'.$id_out.'-input-results .thz-live-search-item-name{';
				$add_css .= 'color:'.$r_title.';';
				$add_css .= '}';
			}
			
			if($r_color !=''){
				$add_css .= '#'.$id_out.'-input-results .thz-live-search-item-intro{';
				$add_css .= 'color:'.$r_color.';';
				$add_css .= '}';
			}
			
		}
				
		if(!empty($add_css)){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:search_form','_thz_search_form_css');
}