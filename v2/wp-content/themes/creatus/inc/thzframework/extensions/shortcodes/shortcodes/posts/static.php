<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if(!function_exists('_thz_posts_shortcode_css')){
	
	function _thz_posts_shortcode_css ($data) {
	
		$atts 					= _thz_shortcode_options($data,'posts');
		$id 					= thz_akg('id',$atts);
		$css_id 				= thz_akg('cmx/i',$atts);
		$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-posts-'.$id;
		$add_css				= '';
		$columns				= thz_akg('pgrid/columns',$atts,null);
		$gutter					= esc_attr( thz_akg('pgrid/gutter',$atts,null) );
		$contained				= thz_akg('portfolio_contained/picked',null);
		$display_mode			= thz_akg('display_mode/picked',$atts,null);
		$media_height_picked	= thz_akg('media_height/picked',$atts,null);
		$layout_mode			= thz_akg('mode',$atts,'grid');
		$cbs					= thz_print_box_css(thz_akg('cbs',$atts,null));
		$sql_ci					= thz_akg('ci',$atts,array());
		$add_css				= '';
		$columns_width 			= 33.33;
		$show_media				= 'show';
		
		
		if($cbs !=''){
			
			$add_css .='#'.$id_out.'.thz-posts-holder.thz-shc{';
			$add_css .= $cbs;
			$add_css .='}';			
		}
		
		
		if($display_mode == 'introunder'){
			
			$show_media			= thz_akg('display_mode/introunder/mbmx/show',$atts,'show');

		}
		
		if($columns){
			$columns_width 	= $columns == 0 ? 100 : (100) / $columns;
		}
		
		
		if($layout_mode == 'slider'){
			
			$columns = 1;
			$columns_width 	= 100;
			$gutter 	= 0;
			
			/* multiple slides preload calc */
			$slider_show   		= thz_akg('slider/show',$atts,null);
			$slider_space  		= thz_akg('slider/space',$atts,null);
			$slider_vertical  	= thz_akg('san/vertical',$atts,null);
			
			if($slider_show > 1){
				
				$add_css .= thz_slick_multiple_css('#'.$id_out, $slider_show, $slider_space, $slider_vertical,'.thz-slide-post-item');
	
			}
			
			// navigations
			$nav_ar	  = thz_akg('nav',$atts,null);
			$arr_ar	  = thz_akg('arr',$atts,null);
			$add_css .= _thz_slider_navigations_css($nav_ar,$arr_ar,'#'.$id_out.' > .thz-slick-slider');
			
		}
		
		if($layout_mode == 'timeline'){
			$columns = 1;
			$columns_width 	= 100;			
		}
		
		if($layout_mode != 'timeline'){
		
			$add_css .='#'.$id_out.' .thz-items-grid{';
			$add_css .='margin-left:-'.($columns > 1 ? $gutter : 0).'px;';
			$add_css .='}';
		
			$add_css .='#'.$id_out.' .thz-grid-item{';
			$add_css .='padding-left:'.($columns > 1 ? $gutter : 0).'px;';
			$add_css .='}';	
		
			$add_css .='#'.$id_out.' .thz-grid-item-in{';
			$add_css .='margin-bottom:'.$gutter.'px;';
			$add_css .='}';
			$add_css .='#'.$id_out.' .thz-items-gutter-adjust{';
			$add_css .='margin-bottom:-'.$gutter.'px;';
			$add_css .='}';		
		
		}

		if($media_height_picked =='custom' && $show_media == 'show'){
			$media_height = thz_akg('media_height/custom/height',$atts,350);
			$add_css .='#'.$id_out.' .thz-grid-item-media,';
			$add_css .='#'.$id_out.' .thz-media-custom-size';
			$add_css .='{height:'.thz_property_unit ($media_height,'px').';}';
		}

		if($display_mode == 'reveal' || $display_mode == 'directional' || $display_mode == 'thzhover'){
			
			$distance	= thz_akg('display_mode/'.$display_mode.'/distance',$atts,0);
			
			if($distance > 0 && $display_mode == 'reveal'){
				$add_css .='#'.$id_out.' .thz-grid-item-intro-holder{';
				$add_css .='top:'.esc_attr($distance).'px;';
				$add_css .='right:'.esc_attr($distance).'px;';
				$add_css .='bottom:'.esc_attr($distance).'px;';
				$add_css .='left:'.esc_attr($distance).'px;';
				$add_css .='}';				
			}
			
			if($distance > 0 && ( $display_mode == 'directional' || $display_mode == 'thzhover')){
				$add_css .='#'.$id_out.' .thz-grid-item-poz{';
				$add_css .='padding:'.esc_attr($distance).'px;';
				$add_css .='}';				
			}
		}
		
		$add_css .='#'.$id_out.' .thz-grid-item,#'.$id_out.' .thz-items-sizer {width:'.$columns_width.'%;}';


		$more_btn_data = thz_akg('pagination/click/more_button/button',$atts,array());
		$add_css .= thz_print_button_css($more_btn_data,'#thz-items-more-'.$id);

		// item more button css
		$show_button		= thz_akg('show_button/picked',$atts);
		if('show' == $show_button){
			$button_cbs			= thz_print_box_css( thz_akg('show_button/show/cbs',$atts));
			$item_more_btn_data	= thz_akg('show_button/show/button',$atts,array());
			$add_css .= thz_print_button_css($item_more_btn_data,'#'.$id_out);
			if(!empty($button_cbs)){
				$add_css .= '#'.$id_out.' .thz-grid-item-button{'.$button_cbs.'}';
			}
		}

		// holder
		$holder_box_style 		= thz_akg('holder_box_style',$atts,null);
		$holder_boxstyle_print	= thz_print_box_css($holder_box_style);
		if(!empty($holder_boxstyle_print)){
			$add_css .= '#'.$id_out.' .thz-grid-item .thz-grid-item-in{'.$holder_boxstyle_print.'}';
		}		

		if($show_media == 'show'){
			// media
			$media_box_style 		= thz_akg('media_bs',$atts,null);
			$media_box_style_print	= thz_print_box_css($media_box_style);
			if(!empty($media_box_style_print)){
				
				$add_css .= '#'.$id_out.' .thz-grid-item .thz-grid-item-media{'.$media_box_style_print.'}';
				
			}
			
			
			if($display_mode == 'introunder'){


				// media holder
				$mediah_box_style 		= thz_akg('mediah_bs',$atts,null);
				$mediah_box_style_print	= thz_print_box_css($mediah_box_style);
				
	
				if(!empty($mediah_box_style_print)){
					$add_css .= '#'.$id_out.' .thz-grid-item .thz-grid-item-media-holder{'.$mediah_box_style_print.'}';
				}
							
				$sm_poz		= thz_akg('display_mode/introunder/mbmx/poz',$atts,'above');
				
				if( $sm_poz	 =='left' || $sm_poz =='right'){
				
					$sm_mw		= thz_akg('display_mode/introunder/mbmx/mw',$atts,40); 
					$sm_alt		= thz_akg('display_mode/introunder/mbmx/alt',$atts,'inactive'); 
					
					$add_css .='#'.$id_out.' .thz-grid-item-media-holder{';
					$add_css .='float:'.$sm_poz.';';
					$add_css .='width:'.thz_property_unit($sm_mw,'%').';';
					$add_css .='}';
					
					$add_css .='#'.$id_out.' .thz-grid-item-intro-holder{';
					$add_css .='float:'.($sm_poz == 'left' ? 'right' : 'left').';';
					$add_css .='width:'.thz_property_unit((100 - $sm_mw),'%').';';
					$add_css .='}';		
					
					if( $sm_alt	 == 'active'){
						
						$media_radius	= thz_akg('media_bs/borderradius',$atts,null);
						
						$add_css .='#'.$id_out.' .thz-grid-item.thz-grid-item-even .thz-grid-item-media-holder{';
						$add_css .='float:'.($sm_poz == 'left' ? 'right' : 'left').';';
						$add_css .='}';
						
						if(!empty($media_radius)){
							$add_css .='#'.$id_out.' .thz-grid-item.thz-grid-item-even .thz-grid-item-media{';
							$add_css .= thz_alt_radius( $media_radius ,($sm_poz == 'left' ? 'right' : 'left'));
							$add_css .='}';
							
							$add_css .='@media screen and (max-width: 979px) {';
							$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-media{';
							$add_css .= thz_alt_radius( $media_radius ,($sm_poz == 'left' ? 'right' : 'left'),true);
							$add_css .='}';							
							$add_css .='}';
						}
						
						$add_css .='#'.$id_out.' .thz-grid-item.thz-grid-item-even .thz-grid-item-intro-holder{';
						$add_css .='float:'.($sm_poz == 'right' ? 'left' : 'right').';';
						$add_css .='}';	
						
						if(!empty($mediah_box_style_print)){
							
							$alt_ml = thz_akg('mediah_bs/margin/right',$atts,null);
							$alt_mr = thz_akg('mediah_bs/margin/left',$atts,null);
							
							if($alt_ml !='' || $alt_mr !=''){
								$add_css .= '#'.$id_out.' .thz-grid-item.thz-grid-item-even .thz-grid-item-media-holder{';
								if($alt_ml !=''){
									$add_css .='margin-left:'.thz_property_unit($alt_ml,'px').';';	
								}
								if($alt_mr !=''){
									$add_css .='margin-right:'.thz_property_unit($alt_mr,'px').';';	
								}
								$add_css .='}';	
							}
							
						}
											
					}
				}
				
			}
			
		}

		// intro box
		$introbox_bs		= thz_akg('intro_bs',$atts,null);
		$introbox_bs_print	= thz_print_box_css($introbox_bs);
		if(!empty($introbox_bs_print)){
			$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-intro{';
			$add_css .= $introbox_bs_print;
			$add_css .='}';	
		}
		
		
		// title
		$show_title 			= thz_akg('show_title/picked',$atts,null);
		
		if($show_title =='show'){
			
			$title_bs		= thz_akg('show_title/show/title_bs',$atts,null); 
			$title_bs_print	= thz_print_box_css($title_bs);
			$title_font		= thz_akg('show_title/show/title_font',$atts,null);
			$title_font		= thz_typo_css($title_font);
			$title_co		= thz_akg('show_title/show/title_font/color',$atts,null);
			$title_hc		= thz_akg('show_title/show/title_font/hovered',$atts,null);
			
			if(!empty($title_bs_print) || !empty($title_font)){
				$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-title{';
				if(!empty($title_bs_print)){
					$add_css .= $title_bs_print;
				}
				if(!empty($title_font)){
					$add_css .= $title_font;
				}
				$add_css .='}';	
			}
			if($title_co !='' || $title_hc !=''){
				
				if( $title_co !=''){
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-title a{';
					$add_css .='color:'.esc_attr($title_co).';';
					$add_css .='}';	
				}
				
				if( $title_hc !=''){
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-title a:hover{';
					$add_css .='color:'.esc_attr($title_hc).';';
					$add_css .='}';
				}
			}			


		}
		
		// meta
		$meta_elements		= thz_akg('meta_elements',$atts,array()); 
		if(!empty($meta_elements)){
		
			$meta_font		= thz_akg('meta_font',$atts,null); 
			$meta_bs		= thz_akg('meta_bs',$atts,null); 
			$meta_bs_print	= thz_print_box_css($meta_bs);
			
			$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-meta{';
			if(!empty($meta_bs_print)){
				$add_css .= $meta_bs_print;
			}
			$add_css .= thz_typo_css($meta_font);
			$add_css .='}';	
			
			
			$meta_tc			= thz_akg('meta_colors/tc',$atts,null);
			$meta_lc			= thz_akg('meta_colors/lc',$atts,null);
			$meta_hlc			= thz_akg('meta_colors/hlc',$atts,null);
			$meta_sep			= thz_akg('meta_colors/sep',$atts,null);
							
			if($meta_tc !='' || $meta_lc !='' || $meta_hlc !='' || $meta_sep !=''){
				
				if( $meta_tc !=''){
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-meta{';
					$add_css .='color:'.esc_attr($meta_tc).';';
					$add_css .='}';	
				}
				
				
				if( $meta_lc !=''){
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-meta a{';
					$add_css .='color:'.esc_attr($meta_lc).';';
					$add_css .='}';	
				}
				
				if( $meta_hlc !=''){
					
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-meta a:hover{';
					$add_css .='color:'.esc_attr($meta_hlc).';';
					$add_css .='}';	
					
				}
			
				if( $meta_sep !=''){
					
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-meta .thz-meta-separator{';
					$add_css .='color:'.esc_attr($meta_sep).';';
					$add_css .='}';	
					
				}

			
		   }

		}	
		
		
		// footer
		$footer_elements		= thz_akg('footer_elements',$atts,array()); 
		if(!empty($footer_elements)){
		
			$footer_font	= thz_akg('footer_font',$atts,null); 
			$footer_bs		= thz_akg('footer_bs',$atts,null); 
			$footer_bs_print	= thz_print_box_css($footer_bs);
			
			$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-footer{';
			if(!empty($footer_bs_print)){
				$add_css .= $footer_bs_print;
			}
			$add_css .= thz_typo_css($footer_font);
			$add_css .='}';	
			
			
			$footer_tc			= thz_akg('footer_colors/tc',$atts,null);
			$footer_lc			= thz_akg('footer_colors/lc',$atts,null);
			$footer_hlc			= thz_akg('footer_colors/hlc',$atts,null);
			$footer_sep			= thz_akg('footer_colors/sep',$atts,null);
							
			if($footer_tc !='' || $footer_lc !='' || $footer_hlc !='' || $footer_sep !=''){
				
				if( $footer_tc !=''){
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-footer{';
					$add_css .='color:'.esc_attr($footer_tc).';';
					$add_css .='}';	
				}
				
				
				if( $footer_lc !=''){
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-footer a{';
					$add_css .='color:'.esc_attr($footer_lc).';';
					$add_css .='}';	
				}
				
				if( $footer_hlc !=''){
					
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-footer a:hover{';
					$add_css .='color:'.esc_attr($footer_hlc).';';
					$add_css .='}';	
					
				}
				
				if( $footer_sep !=''){
					
					$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-footer .thz-meta-separator{';
					$add_css .='color:'.esc_attr($footer_sep).';';
					$add_css .='}';	
					
				}

			
		   }

		}
		
		
		// intro text
		$show_introtext			= thz_akg('show_introtext/picked',$atts,null); 
		$limit_by				= thz_akg('show_introtext/show/intro_length/picked',$atts);
		
		if($show_introtext =='show'){
			
			
			$introtext_font		= thz_akg('show_introtext/show/introtext_font',$atts,null); 
			$introtext_bs		= thz_akg('show_introtext/show/introtext_bs',$atts,null); 
			$introtext_bs_print	= thz_print_box_css($introtext_bs);
			
			
			$add_css .='#'.$id_out.' .thz-grid-item-intro-text{';
			if(!empty($introtext_bs_print)){
				$add_css .= $introtext_bs_print;
			}
			$add_css .= thz_typo_css($introtext_font);
			$add_css .='}';	
		
		}
		
		
		// filter
		$show_filter 			= thz_akg('filter/picked',$atts,null);
		if($show_filter == 'show'){
			$filter_atts = thz_akg('filter/show',$atts,null);	
			$add_css .= _thz_posts_filter_css_print($filter_atts,'#thz-posts-filter-'.$id);
		}
		
		// icons
		$show_icons		= thz_akg('show_icons/picked',$atts,null); 
		if($show_icons =='show' && $show_media	== 'show'){
			
			$icons_co = thz_akg('show_icons/show/icons_metrics/co',$atts,null);
			$icons_bg = thz_akg('show_icons/show/iconsbg_metrics/bg',$atts,null);
			$icons_bgh = thz_akg('show_icons/show/iconsbg_metrics/bgh',$atts,null);
			$icons_bs = thz_akg('show_icons/show/iconsbg_metrics/bs',$atts,null);
			$icons_bsi = thz_akg('show_icons/show/iconsbg_metrics/bsi',$atts,null);
			$icons_bc = thz_akg('show_icons/show/iconsbg_metrics/bc',$atts,null);
			$icons_fs = thz_akg('show_icons/show/icons_metrics/fs',$atts,16);
			
			if($icons_co !='' || $icons_bg !='' || ($icons_bsi > 0 && $icons_bc !='')){
				
				$add_css .='#'.$id_out.' .thz-grid-item-in .thz-hover-icon,';
				$add_css .='#'.$id_out.' .thz-grid-item-in .thz-hover-icon:focus{';
				if($icons_co !=''){
					$add_css .='color:'.esc_attr($icons_co).';';
				}
				if($icons_bg !=''){
					$add_css .='background:'.esc_attr($icons_bg).';';
				}
				if($icons_bsi > 0 && $icons_bc !=''){
					$add_css .='border:'.esc_attr($icons_bsi).'px '.esc_attr($icons_bs).' '.esc_attr($icons_bc).';';
				}
				$add_css .='}';	
								
				$add_css .='#'.$id_out.' .thz-grid-item-in .thz-hover-icon span{';
				$add_css .='width:'.thz_property_unit($icons_fs,'px').';';
				$add_css .='height:'.thz_property_unit($icons_fs,'px').';';	
				$add_css .='}';					
			}
			
			if( $icons_bgh !=''){
				$add_css .='#'.$id_out.' .thz-grid-item-in .thz-hover-icon:hover{';
				$add_css .='background:'.esc_attr($icons_bgh).';';
				$add_css .='}';					
			}
			
		}
		
		
		if( $show_media	== 'show' ){
			// overlay background
			$ov_type 		= thz_akg('med_over/background/type',$atts,'color');
			
			if($display_mode =='directional' || $ov_type =='none'){
	
				$add_css .='#'.$id_out.' .thz-hover-mask{';
				$add_css .='background:transparent;';
				$add_css .='}';					
			
			}else{
				
				$med_over_bg	= thz_akg('med_over/background',$atts,array());
				$add_css .='#'.$id_out.' .thz-hover-mask{';
				$add_css .= _thz_media_overlay_background_css_print($med_over_bg).';';
				$add_css .='}';					
							
			}
		}
		
		// custom pagination 
		$pagination_c	= false;
		$pagination		= thz_akg('pagination/picked',$atts);
		
		if($pagination	== 'pagination'){
			
			$pagination_options = thz_akg('pagination/pagination/p/0',$atts,array());
			
			if(!empty( $pagination_options )){
				
				$pagination_c	= $pagination_options;
				$add_css 		.= _thz_pagination_css('#'.$id_out.' ',$pagination_c);

			}
		}
		
		if ( class_exists( 'WooCommerce' ) && thz_has_woo_shortcode() ) {
			
			// woo buttons	
			$cart_btn	= thz_akg('cart_btn',$atts,'both');
			
			if($cart_btn !='hide' && $show_media == 'show'){
				
				$woopbcbs		= thz_print_box_css(thz_akg('woopbcbs',$atts,null));
				$woopbbs		= thz_print_box_css(thz_akg('woopbbs',$atts,null));
				$woopbf  		= thz_akg('woopbf',$atts,null);
				
				if(!empty($woopbcbs)){
					$add_css .= '#'.$id_out.' .thz-posts-woo-buttons{';
					$add_css .= $woopbcbs;
					$add_css .= '}';					
					
				}
				
				$add_css .= '#'.$id_out.' .thz-woo-item-cart-buttons,';
				$add_css .= '#'.$id_out.' .thz-woo-item-cart-buttons:hover{';
				$add_css .= $woopbbs;
				$add_css .= thz_typo_css($woopbf);	
				$add_css .= '}';
	
				$spinn_c = thz_akg('woopaco/spin',$atts,'#ffffff'); 
				$check_c = thz_akg('woopaco/check',$atts,'#ffffff'); 			
				
				
				if($spinn_c !=''){
					$add_css .='#'.$id_out.' .thz-item-adding-icon{';
					$add_css .= 'color:'.$spinn_c.';';	
					$add_css .='}';	
				}
				if($check_c !=''){
					$add_css .='#'.$id_out.' .thz-item-in-cart-icon{';
					$add_css .= 'color:'.$check_c.';';	
					$add_css .='}';	
				}
			
			}
				
			// price 
			$show_price		= thz_akg('show_price/picked',$atts,'show');
			if($show_price =='show'){
				
				$wooppbs		= thz_akg('show_price/show/wooppbs',$atts,null);
				$wooppbs_print	= thz_print_box_css($wooppbs);
				$woopptf  		= thz_akg('show_price/show/woopptf',$atts,null);
				$wooppoc  		= thz_akg('show_price/show/wooppoc/old',$atts,null);
				
				$add_css .= '#'.$id_out.' .thz-woo-item-price{';
				$add_css .= $wooppbs_print;
				$add_css .= thz_typo_css($woopptf);	
				$add_css .= '}';
				
				if($wooppoc !=''){
					$add_css .='#'.$id_out.' .thz-woo-item-price del{';
					$add_css .= 'color:'.$wooppoc.';';	
					$add_css .='}';					
				}
			}
			
			// rating
			$show_rating		= thz_akg('show_rating/picked',$atts,'show');
			if($show_rating =='show'){
				
				$wooprbs		= thz_akg('show_rating/show/wooprbs',$atts,null);
				$wooprbs_print	= thz_print_box_css($wooprbs);
				$star_size  	= thz_akg('show_rating/show/wooprsm/s',$atts,null);
				$star_full  	= thz_akg('show_rating/show/wooprsm/f',$atts,null);
				$star_empty  	= thz_akg('show_rating/show/wooprsm/e',$atts,null);
				
				$add_css .= '#'.$id_out.' .thz-woo-item-rating{';
				$add_css .= $wooprbs_print;
				$add_css .= '}';
				
				$add_css .='#'.$id_out.' .thz-woo-item-rating .star-rating{';
				$add_css .= 'font-size:'.thz_property_unit($star_size,'px').';';	
				$add_css .='}';	
				
	
				$add_css .='#'.$id_out.' .thz-woo-item-rating .star-rating span:before{';
				$add_css .= 'color:'.$star_full.';';	
				$add_css .='}';
							
				$add_css .='#'.$id_out.' .thz-woo-item-rating .star-rating:before{';
				$add_css .= 'color:'.$star_empty.';';	
				$add_css .='}';					
			}
			
			
			// badges
			$show_badges		= thz_akg('show_badges/picked',$atts,'hide');
			
			if($show_badges =='show'){
				
				$woob_vp = thz_akg('show_badges/show/woopbagbs/vp',$atts,8); 
				$woob_hp = thz_akg('show_badges/show/woopbagbs/hp',$atts,15); 
				$woob_mt = thz_akg('show_badges/show/woopbagbs/mt',$atts,15); 
				$woob_ml = thz_akg('show_badges/show/woopbagbs/ml',$atts,15); 
				$woob_br = thz_akg('show_badges/show/woopbagbs/br',$atts,4);
				$woob_f  = thz_akg('show_badges/show/woopbf',$atts,null); 
				
				$add_css .='#'.$id_out.' .thz-woo-item-badge{';
				$add_css .='padding:'.thz_property_unit($woob_vp,'px').' '.thz_property_unit($woob_hp,'px').';';
				$add_css .='margin:'.thz_property_unit($woob_mt,'px').' 0 0 '.thz_property_unit($woob_ml,'px').';';
				$add_css .='border-radius:'.thz_property_unit($woob_br,'px').';';
				$add_css .= thz_typo_css($woob_f);
				$add_css .='}';
				
				$sales_bg = thz_akg('show_badges/show/woopbagc/sbg',$atts,'#1ecb67'); 
				$sales_co = thz_akg('show_badges/show/woopbagc/sco',$atts,'#ffffff'); 
				
				$outofs_bg = thz_akg('show_badges/show/woopbagc/obg',$atts,'#ff4542'); 
				$outofs_co = thz_akg('show_badges/show/woopbagc/oco',$atts,'#ffffff'); 
				
				
				if($sales_bg !='' || $sales_co !=''){
					$add_css .='#'.$id_out.' .thz-woo-item-on-sale{';
					if($sales_bg !=''){
						$add_css .= 'background:'.$sales_bg.';';
					}
					if($sales_co !=''){
						$add_css .= 'color:'.$sales_co.';';	
					}
					$add_css .='}';	
				}
							
				if($outofs_bg !='' || $outofs_co !=''){			
					$add_css .='#'.$id_out.' .thz-woo-item-out-of-stock{';
					if($outofs_bg !=''){	
						$add_css .= 'background:'.$outofs_bg.';';
					}
					if($outofs_co !=''){	
						$add_css .= 'color:'.$outofs_co.';';	
					}
					$add_css .='}';
				}
			}
			
		}
		
		// timeline colors
		if($layout_mode == 'timeline'){
			
			$tl_border	= thz_akg('tml_mx/b',$atts,'');
			$tl_bgs		= thz_akg('tml_mx/bg',$atts,'');
			$tl_day		= thz_akg('tml_mx/d',$atts,'');
			$tl_my		= thz_akg('tml_mx/my',$atts,'');
			
			if($tl_border !=''){
				$add_css .='#'.$id_out.' .thz-grid-timeline:before,';
				$add_css .='#'.$id_out.' .thz-timeline-line';
				$add_css .='{background:'.$tl_border.';}';	
				
				$add_css .='#'.$id_out.' .thz-timeline-line:before,';
				$add_css .='#'.$id_out.' .thz-timeline-date';
				$add_css .='{border-color:'.$tl_border.';}';			
			}
			
			
			if($tl_bgs !=''){
				$add_css .='#'.$id_out.' .thz-timeline-line:before,';
				$add_css .='#'.$id_out.' .thz-timeline-date';
				$add_css .='{background:'.$tl_bgs.';}';			
			}

			if($tl_day !=''){
				$add_css .='#'.$id_out.' .thz-timeline-day';
				$add_css .='{color:'.$tl_day.';}';			
			}
			
			if($tl_my !=''){
				$add_css .='#'.$id_out.' .thz-timeline-monthyear';
				$add_css .='{color:'.$tl_my.';}';			
			}			
		}
		

		// formats 
		$formats	 = thz_akg('pf',$atts,array());
		
		if(!empty($formats) && $show_media == 'show'){
			
			$formats_style	 = thz_akg('pf/0/s/0',$atts,array());

			if(!empty($formats_style)){
				
				$add_css .= _thz_posts_formats_static($formats_style,'#'.$id_out);
				
			}else{
				
				
				$add_css .= _thz_posts_formats_static();
			
			}
		}
		
		
		// custom 
		
		if( !empty( $sql_ci )){
			
			foreach($sql_ci as $custom_item){
				
				if( !isset($custom_item['p'][0]) || get_the_ID() === (int)$custom_item['p'][0] ){
					continue;
				}
				
				// item has no limit length so render possible shortcode CSS
				if( $show_introtext == 'show' && $limit_by == 'none' ){
					$pb_content = fw_ext_page_builder_get_post_content( (int)$custom_item['p'][0] );
					if( $pb_content ){
						fw_ext_shortcodes_enqueue_shortcodes_static( $pb_content );	
					}
				}
				
				if(!isset($custom_item['cis'][0])){
					continue;
				}
				
				$item_cis 	= $custom_item['cis'][0];
				$item_id 	= $custom_item['p'][0];
				$class 		='#'.$id_out.' .thz-posts-item-'.$item_id;
				
				// title
				if($show_title =='show'){
					
					$ci_title_font		= thz_akg('tf',$item_cis,null);
					$ci_title_font		= thz_typo_css($ci_title_font);
					$ci_title_co		= thz_akg('tf/color',$item_cis,null);
					$ci_title_hc		= thz_akg('tf/hovered',$item_cis,null);
					
					if(!empty($ci_title_font)){
						$add_css .= $class.' .thz-grid-item-title{';
						$add_css .= $ci_title_font;
						$add_css .='}';	
					}
					if($ci_title_co !='' || $ci_title_hc !=''){
						
						if( $ci_title_co !=''){
							$add_css .= $class.' .thz-grid-item-title a{';
							$add_css .='color:'.esc_attr($ci_title_co).';';
							$add_css .='}';	
						}
						
						if( $ci_title_hc !=''){
							$add_css .=$class.' .thz-grid-item-title a:hover{';
							$add_css .='color:'.esc_attr($ci_title_hc).';';
							$add_css .='}';
						}
					}			
		
		
				}
				
				// intro text
				if($show_introtext =='show'){
					
					$ci_introtext_font		= thz_akg('if',$item_cis,null); 
					$ci_introtext_font		= thz_typo_css($ci_introtext_font);

					if(!empty($ci_introtext_font)){
						$add_css .= $class.' .thz-grid-item-intro-text{';
						$add_css .= $ci_introtext_font;
						$add_css .='}';	
					}	
				
				}				
				
				// meta
				if(!empty($meta_elements)){
	
					$ci_meta_f			= thz_akg('mx/f',$item_cis,null);
					$ci_meta_tc			= thz_akg('mx/tc',$item_cis,null);
					$ci_meta_lc			= thz_akg('mx/lc',$item_cis,null);
					$ci_meta_hlc		= thz_akg('mx/hlc',$item_cis,null);	
					$ci_meta_sep		= thz_akg('mx/sep',$item_cis,null);	
								
					if($ci_meta_f !='' || $ci_meta_tc !='' || $ci_meta_lc !='' || $ci_meta_hlc !='' || $ci_meta_sep !=''){
						
						if( $ci_meta_f !='' || $ci_meta_tc !=''){
							$add_css .= $class.' .thz-grid-item-meta{';
							if( $ci_meta_lc !=''){
								$add_css .='font-size:'.thz_property_unit($ci_meta_f,'px').';';
							}
							if( $ci_meta_lc !=''){
								$add_css .='color:'.esc_attr($ci_meta_tc).';';
							}
							$add_css .='}';	
						}
						
						
						if( $ci_meta_lc !=''){
							$add_css .= $class.' .thz-grid-item-meta a{';
							$add_css .='color:'.esc_attr($ci_meta_lc).';';
							$add_css .='}';	
						}
						
						if( $ci_meta_hlc !=''){
							
							$add_css .= $class.' .thz-grid-item-meta a:hover{';
							$add_css .='color:'.esc_attr($ci_meta_hlc).';';
							$add_css .='}';	
							
						}
						
						if( $ci_meta_sep !=''){
							
							$add_css .= $class.' .thz-grid-item-meta .thz-meta-separator{';
							$add_css .='color:'.esc_attr($ci_meta_sep).';';
							$add_css .='}';	
							
						}
				   }
		
				}				
				
				// footer
				if(!empty($footer_elements)){
	
					$ci_footer_f			= thz_akg('fx/f',$item_cis,null);
					$ci_footer_tc			= thz_akg('fx/tc',$item_cis,null);
					$ci_footer_lc			= thz_akg('fx/lc',$item_cis,null);
					$ci_footer_hlc			= thz_akg('fx/hlc',$item_cis,null);	
					$ci_footer_sep			= thz_akg('fx/sep',$item_cis,null);
								
					if($ci_footer_f !='' || $ci_footer_tc !='' || $ci_footer_lc !='' || $ci_footer_hlc !='' || $ci_footer_sep !=''){
						
						if( $ci_footer_f !='' || $ci_footer_tc !=''){
							$add_css .= $class.' .thz-grid-item-footer{';
							if( $ci_footer_lc !=''){
								$add_css .='font-size:'.thz_property_unit($ci_footer_f,'px').';';
							}
							if( $ci_footer_lc !=''){
								$add_css .='color:'.esc_attr($ci_footer_tc).';';
							}
							$add_css .='}';	
						}
						
						
						if( $ci_footer_lc !=''){
							$add_css .= $class.' .thz-grid-item-footer a{';
							$add_css .='color:'.esc_attr($ci_footer_lc).';';
							$add_css .='}';	
						}
						
						if( $ci_footer_hlc !=''){
							
							$add_css .= $class.' .thz-grid-item-footer a:hover{';
							$add_css .='color:'.esc_attr($ci_footer_hlc).';';
							$add_css .='}';	
							
						}
						
						if( $ci_footer_sep !=''){
							
							$add_css .= $class.' .thz-grid-item-footer .thz-meta-separator{';
							$add_css .='color:'.esc_attr($ci_footer_sep).';';
							$add_css .='}';	
							
						}
				   }
		
				}
				
				// intro custom bg
				$ci_introtext_bg		= thz_akg('ov/i',$item_cis,null);
				if(!empty($ci_introtext_bg)){
					$add_css .= $class.' .thz-grid-item-intro{';
					$add_css .= 'background-color:'.$ci_introtext_bg.';';
					$add_css .='}';	
				}	
				
				// custom overlay background
				if($ov_type != 'none' && $display_mode !='directional'){
					
					$cc1 	= thz_akg('ov/color1',$item_cis,null);
					$cc2 	= thz_akg('ov/color2',$item_cis,null);
					
					if(!empty($cc1) || !empty($cc2)){
						$med_over_mx	= array(
							'type' => $ov_type,
							'color1' => $cc1,
							'color2' => $cc2
						
						);
						
						$add_css .= $class. ' .thz-hover-mask{';
						$add_css .= _thz_media_overlay_background_css_print($med_over_mx).';';
						$add_css .='}';	
					}
				}
				
				
		
				unset($custom_item);
			}
			
			unset($sql_ci);
		}
	
		if($add_css  !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}		

	}
	
	add_action('fw_ext_shortcodes_enqueue_static:posts','_thz_posts_shortcode_css');

}