<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for dot navigation

*/
if(!function_exists('_thz_dot_navigation_css')){
	
	function _thz_dot_navigation_css ($data) {
	
		$atts 		= _thz_shortcode_options($data,'dot_navigation');
		$id			= thz_akg('id',$atts);
		$tip_bg		= thz_akg('tip/bg',$atts,'#ffffff');
		$tip_t		= thz_akg('tip/t',$atts,'#121212');
		$type		= thz_akg('type',$atts,'indicator');
		
		$add_css	='';
		$bs 	   		= thz_akg('bs',$atts,null);
		$left			= thz_akg('dotn/left',$atts,'auto');
		$right			= thz_akg('dotn/right',$atts,10);
		$bs_print		= thz_print_box_css(thz_akg('bs',$atts));
		
		$add_css .= '.thz-dot-nav-'.$id.'.fixed {';
		if(!empty($bs_print)){
			$add_css .= $bs_print;
		}
		$add_css .='left:'.thz_property_unit($left,'px',true).';';
		$add_css .='right:'.thz_property_unit($right,'px',true).';';
		$add_css .='}';		
		
		if($tip_bg !='' || $tip_t !=''){
			
			$add_css .='.thz-dot-nav-'.$id.' .thz-dot-nav-tip{';
			if($tip_bg !=''){
				$add_css .='background:'.$tip_bg.';';
			}
			if($tip_t !=''){
				$add_css .='color:'.$tip_t.';';
			}
			$add_css .='}';
		}
		
		if($tip_bg !=''){
			$tip_poz  = thz_akg('tip/p',$atts,'left'); 
			$add_css .='.thz-dot-nav-'.$id.'.tip-'.$tip_poz.' .thz-dot-nav-tip:after{';
			$add_css .='border-'.$tip_poz.'-color:'.$tip_bg.';';
			$add_css .='}';
		}	
		
		if( $type == 'indicator' ){
			
			$ind_a		= thz_akg('im/a',$atts,'#a7a7a7');
			$ind_i		= thz_akg('im/i',$atts,'#c5c5c5');
			$ind_w		= thz_akg('im/w',$atts,8);
			$ind_h		= thz_akg('im/h',$atts,8);
			$ind_r		= thz_akg('im/r',$atts,8);
			$ind_sh		= thz_akg('im/sh',$atts,'active');
			$ind_op		= thz_akg('im/op',$atts,'active');
			$ind_bw		= thz_akg('im/bw',$atts,'');
			$ind_bs		= thz_akg('im/bs',$atts,'solid');
			$ind_ab		= thz_akg('im/ab',$atts,'');
			$ind_ib		= thz_akg('im/ib',$atts,'');
			
			
			$add_css .= '.thz-dot-nav-'.$id.'.fixed .thz-dot-nav li a .indicator{';
			$add_css .='background:'.$ind_i.';';
			$add_css .='width:'.thz_property_unit($ind_w,'px').';';
			$add_css .='height:'.thz_property_unit($ind_h,'px').';';
			$add_css .='border-radius:'.thz_property_unit($ind_r,'px').';';
			
			if($ind_bw !='' && $ind_ib !=''){
				
				$add_css .='border:'.thz_property_unit($ind_bw,'px').' '.$ind_bs.' '.$ind_ib.';';
			}
			if($ind_sh =='inactive'){
				$add_css .='box-shadow:none;';
			}
			if($ind_op =='inactive'){
				$add_css .='opacity:1;';
			}		
			$add_css .='}';	
			
			$add_css .= '.thz-dot-nav-'.$id.'.fixed .thz-dot-nav li a:hover .indicator,';
			$add_css .= '.thz-dot-nav-'.$id.'.fixed .thz-dot-nav li a.active-scroll .indicator{';
			$add_css .='background:'.$ind_a.';';
			if($ind_bw !='' && $ind_ab !=''){
				
				$add_css .='border-color:'.$ind_ab.';';
			}
			$add_css .='}';		
			
				
		}else{
			
			$icon_size	= thz_akg('im/f',$atts,14);
			$icon_a		= thz_akg('im/a',$atts,'#a7a7a7');
			$icon_i		= thz_akg('im/i',$atts,'#c5c5c5');	
					
			$add_css .= '.thz-dot-nav-'.$id.'.fixed .thz-dot-nav li a{';
			$add_css .='font-size:'.thz_property_unit($icon_size,'px').';';
			if($icon_i !=''){
				$add_css .='color:'.$icon_i.';';
			}
			$add_css .='}';
			
			if($icon_a !=''){
				$add_css .= '.thz-dot-nav-'.$id.'.fixed .thz-dot-nav li a:hover,';
				$add_css .= '.thz-dot-nav-'.$id.'.fixed .thz-dot-nav li a.active-scroll{';
				$add_css .='color:'.$icon_a.';';
				$add_css .='}';
			}			
			
			
		}
		
		if($add_css !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:dot_navigation','_thz_dot_navigation_css');
}