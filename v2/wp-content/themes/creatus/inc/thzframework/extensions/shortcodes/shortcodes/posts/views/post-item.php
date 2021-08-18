<?php
/**
 * @package      Thz Framework
 * @author       Themezly
 * @websites     http://www.themezly.com | http://www.youjoomla.com | http://www.yjsimplegrid.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

global $thz_post_in_loop;

$thz_post_in_loop	= true;
$layout_mode		= thz_akg('mode',$atts,'grid');
$thumbnail_id 		= get_post_thumbnail_id();
$media_height		= thz_akg('media_height/picked',$atts,'thz-ratio-16-9');
$show_icons			= thz_akg('show_icons/picked',$atts);
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true,'thz-isotope-animate');
$animate_parent		= $animation_class != '' ? ' thz-animate-parent ' :'';
if($layout_mode == 'slider'){
	$animate ='inactive';
	$animation_data ='';
	$animation_class ='';
	$animate_parent ='';
}
$display_mode		= thz_akg('display_mode/picked',$atts);
$show_button		= thz_akg('show_button/picked',$atts);
$use_poster			= thz_get_post_option('use_poster','active'); 
$post_media 		= thz_get_post_media();
$post_media 		= $use_poster == 'active' ? thz_magnific_media( $post_media ) : $post_media ;
$showall 	 	 	= thz_akg('post_slider/showall',$atts,'all');
if('first' == $showall && !empty($post_media) ){
	$post_media 		= array(0 => $post_media[0]);
}
$media_data 		= !empty($post_media) ? $post_media[0] : array();
$show_title 		= thz_akg('show_title/picked',$atts);
$show_introtext		= thz_akg('show_introtext/picked',$atts); 
$meta_elements		= thz_akg('meta_elements',$atts,array()); 
$meta_loc			= thz_akg('meta_loc',$atts,'under');
$footer_elements	= thz_akg('footer_elements',$atts,array());

$separator			= thz_akg('pmx',$atts,null);
$separator			= thz_get_separator ($separator,'thz-meta-separator');
$structured_data	= thz_akg('pmx/sd',$atts,'active');

$meta_elements['separator'] 	= $separator;
$footer_elements['separator'] 	= $separator;
$meta_elements['pref'] 			= thz_akg('meta_pref',$atts,null);
$footer_elements['pref'] 		= thz_akg('footer_pref',$atts,null);
 
$item_cats_names	= thz_post_tax_links('names',' ');
$item_link 			= get_permalink();
$item_title			= get_the_title();
$cats_array			= array();
$cats_names			= array();
$price				= '';
$rating				= '';
$woo_item			= '';
$add_to_cart 		= '';
$wc_adding 			= '';
$metroitem			= '';
$reveal_classes		= '';
$hovermask 			= '';
$show_media			= 'show';
$media_poz			= '';
$show_badges		= 'hide';
if($display_mode == 'introunder'){
	$show_media			= thz_akg('display_mode/introunder/mbmx/show',$atts,'show');
	$media_poz			= thz_akg('display_mode/introunder/mbmx/poz',$atts,'above');
}

if(!thz_post_has_media( true ) && !get_post_format()){
	$show_media = false;
}

if('product' ==  get_post_type() ){ 
	
	$wc_product  = wc_get_product( get_the_ID() );
	$woo_item	= ' thz-woo-item';
	$woo_item	.= thz_woo_in_cart( thz_woo_get_id( $wc_product ) ) ? ' thz-woo-item-in-cart':'';
	$show_price	 = thz_akg('show_price/picked',$atts,'show');
	$show_rating = thz_akg('show_rating/picked',$atts,'show');
	$show_badges = thz_akg('show_badges/picked',$atts,'hide');
	$add_to_cart = _thz_woo_buttons($wc_product,$atts);

	if($show_price =='show'){
		$price		 = '<div class="thz-woo-item-price">';
		$price 		.= $wc_product->get_price_html();
		$price		.= '</div>';
	}
	
	if($show_rating =='show'){
		$get_rating = thz_woo_product_rating($wc_product);
		$rating ='<div class="thz-woo-item-rating">';
		$rating .= !empty($get_rating) ? $get_rating : '<div class="star-rating"><span style="width: 0%;"></span></div>';
		$rating .='</div>';
	}
			
	if($add_to_cart !=''){
		
		$wc_adding ='<div class="thz-item-adding-icon">';
		$wc_adding .='<span class="thzicon thzicon-spinner9 thz-spin"></span>';
		$wc_adding .='</div>';
		$wc_adding .='<div class="thz-item-in-cart-icon">';
		$wc_adding .='<span class="thzicon thzicon-checkmark"></span>';
		$wc_adding .='</div>';
	}
	
}	


// metro
if( $media_height == 'metro' && 'timeline' != $layout_mode){
	
	$sequence_type = thz_akg('media_height/metro/sequence',$atts,1);
	
	$sequence = thz_metro_sequence_maker($sequence_type);
	
	foreach ($sequence['items'] as $key => $size){
		
		if($thz_rowstarthook % $sequence['count'] == $key){
			
			$metroitem = ' thz-item-metro-'. $size ;
		}
		
		unset($key,$size);
	}
	unset($sequence);

}

// intro box
$introbox_ta			= thz_akg('pmx/align',$atts);
$introbox_classes		= $introbox_ta;

// intro text
if($show_introtext =='show'){
	$limit_by				= thz_akg('show_introtext/show/intro_length/picked',$atts);
	$limit_lenght			= thz_akg('show_introtext/show/intro_length/'.$limit_by.'/limit',$atts);
	$introtext				= thz_intro_text($limit_by,$limit_lenght);
}


// outs
$item_data 			= 'data-itemid="'.get_the_ID().'" data-mode="'.esc_attr ( $display_mode ).'" data-cats="'.thz_post_tax_links('data').'"';
$item_classes 		= $item_cats_names.$metroitem.' thz-posts-item-'.get_the_ID().$animate_parent;
$item_in_classes 	= $animation_class.$woo_item;


if($display_mode == 'reveal'){
	$reveal_ef			= thz_akg('display_mode/reveal/reveal_effect/effect',$atts);
	$reveal_tr			= str_replace('.','',thz_akg('display_mode/reveal/reveal_effect/transition',$atts));
	$intro_height		= thz_akg('display_mode/reveal/intro_height/picked',$atts); 
	$valign				= $intro_height == 'full' ? ' '.thz_akg('display_mode/reveal/intro_height/full/valign',$atts,'thz-va-middle') : '';
	$intro_poz			= $intro_height == 'auto' ? ' thz-grid-item-ip-'.thz_akg('display_mode/reveal/intro_height/auto/position',$atts) : ''; 
	$introbox_classes	= $introbox_classes.$valign.$intro_poz;
	
	$reveal_classes		= ' '.$reveal_ef.' '.$reveal_tr.' thz-grid-item-ih-'.$intro_height;
}

if($display_mode == 'directional' || $display_mode == 'thzhover'){
	$valign				= thz_akg('display_mode/'.$display_mode.'/valign',$atts,'thz-va-middle');
	$introbox_classes	= $introbox_classes.' '.$valign;

}

if($display_mode == 'thzhover'){
	
	$hover_bgtype		= thz_akg('med_over/background/type',$atts,'solid');
	$hover_ef 			= thz_akg('med_over/oeffect',$atts,'thz-hover-fadein');
	$hover_tr 			= thz_akg('med_over/oduration',$atts,'thz-transease-04');
	$hover_classes 		= 'thz-hover-bg-'.$hover_bgtype.' '.$hover_ef.' '.$hover_tr;
	$reveal_classes 	= ' thz-hover '.$hover_classes;
	$hovermask			= ' thz-hover-mask '.$hover_tr;	
	
}

$timeline_html ='';
if('timeline' == $layout_mode){
	
	$columns 		= thz_akg('tml_mx/c',$atts,2);
	$column_side 	= '';
	
	if($columns == 2){
		
		if( $thz_rowstarthook % 2 == 0) {
			$column_side = 'thz-timeline-item-left';
		} else {
			$column_side = 'thz-timeline-item-right';
		}
	}	

	$item_classes .=' thz-grid-item-timeline '.$column_side;
	$date_radius = thz_akg('tml_mx/r',$atts,4);
	$timeline_html	.= '<div class="thz-timeline-date thz-radius-'. esc_attr( $date_radius ) .'">';
		$timeline_html	.= '<span class="thz-timeline-day">';
		$timeline_html	.= get_the_date('d');
		$timeline_html	.= '<span class="thz-timeline-monthyear">';
		$timeline_html	.= get_the_date('M Y');
		$timeline_html	.= '</span>';
		$timeline_html	.= '</span>';
	$timeline_html	.= '</div>';
	$timeline_html	.= '<span class="thz-timeline-line"></span>';
}

//if($layout_mode == 'grid'){
	// class per row
	
	$gcols			= thz_akg('pgrid/columns',$atts);
	$row 			= $thz_rowstarthook / $gcols ;
	$item_classes .= $row & 1 ? ' thz-grid-item-even' : ' thz-grid-item-odd';
//}

if($media_poz == 'left' || $media_poz == 'right'){
	$sm_alt				= thz_akg('display_mode/introunder/mbmx/alt',$atts,'inactive'); 
	$altc 				= $sm_alt == 'active' ? ' thz-palt-'.$media_poz :' thz-grid-item-media-align-'.$media_poz;
	$classic_va			= thz_akg('display_mode/introunder/mbmx/va',$atts,'middle');
	$item_in_classes .= ' thz-item-aligned'.' thz-pva-'.$classic_va.$altc;
}

// formats
$formats	 	= thz_akg('pf',$atts,array());
$format_name 	= '';
$format_intro 	= true;
if(!empty($formats)){
	$post_format 		= get_post_format();
	if($post_format){
		$item_in_classes 	.=' thz-post-format-item thz-pf-'.$post_format;
	}
	$allow_formats		= array('quote','link','audio','video','gallery');
	$format_name 		= in_array($post_format,$allow_formats) ? '-'.$post_format : '';
	
	if('quote' == $post_format || 'link' == $post_format){
		
		$format_display =  thz_akg('pf/0/'.$post_format.'_display',$atts,'detailed');
		
		if('only' == $format_display){
			$format_intro = false;
		}
	}
}


// intro switch
$post_intro 	= $format_intro && ( $show_title == 'show' || !empty($meta_elements) || !empty($footer_elements) || $show_introtext == 'show' || $show_button == 'show' );

// custom item data
$custom_data	= thz_custom_post_data(get_the_ID(), thz_akg('ci',$atts,array()) );
if( $custom_data ){
	
	$item_title  = !empty($custom_data['title']) ? $custom_data['title'] : $item_title;
	$item_link   = !empty($custom_data['link']['url']) ? $custom_data['link']['url'] : $item_link;
	$link_target = !empty($custom_data['link']['url']) ? $custom_data['link']['target'] : false;
	$item_price  = !empty($custom_data['price']['p']) ? $custom_data['price']['p'] : '';
	$item_intro  = !empty($custom_data['intro']) ? $custom_data['intro'] : '';
	$show_media  = !empty($custom_data['media']) ? 'show' : $show_media;
	
	if($item_price !=''){
		$price = thz_custom_post_price($custom_data['price']);
	}
	
	if($item_intro !=''){
		$introtext 		= $item_intro;
		$show_introtext = 'show';
	}
	
	if($link_target && $link_target =='_blank'){
		
		$item_classes .=' thz-new-window';
	}
}

// more button
$item_more_button	= $show_button =='show' ? str_replace('href="#"','href="'.$item_link.'"',thz_akg('show_button/show/button/html',$atts)):'';	

// final classes
$item_classes 		= !$show_media ? $item_classes.' thz-no-media' : $item_classes;
$item_classes 		= !$post_intro ? $item_classes.' thz-no-intro' : $item_classes;
?>
<?php if($layout_mode =='slider') {?><div class="thz-slick-slide thz-slide-post-item"><?php } ?>
<div class="thz-grid-item category_all <?php echo thz_sanitize_class( $item_classes ) ?>" <?php echo thz_sanitize_data($item_data) ?>><?php echo $timeline_html ?>
	<div class="thz-grid-item-in<?php echo thz_sanitize_class( $item_in_classes )?>"<?php echo thz_sanitize_data($animation_data) ?>>
    	<?php if($show_media =='show') {?>
		<div class="thz-grid-item-media-holder">
			<div class="thz-grid-item-media">
				<?php 
				if($show_badges =='show') {
					wc_get_template_part( 'single-product/sale', 'flash' ); 
				}
				?>
				<?php  
					thz_render_view(thz_theme_file_path ( '/inc/thzframework/extensions/shortcodes/shortcodes/posts/views/post-media'.$format_name.'.php' ), array(
						'atts' => $atts,
					),false);				
				?>
			</div>
		</div>
        <?php } ?>
        <?php if( $post_intro ) { ?>
		<div class="thz-grid-item-intro-holder<?php echo thz_sanitize_class ( $reveal_classes ) ?>">
        	<?php if($display_mode == 'thzhover') { ?>
            <div class="<?php echo thz_sanitize_class( $hovermask ) ?>">
			<?php } ?>
			<div class="thz-grid-item-poz">
				<div class="thz-grid-item-intro <?php echo thz_sanitize_class( $introbox_classes )?>">
					<?php if($show_icons =='show' && ( $display_mode == 'directional' || $display_mode == 'thzhover') && $add_to_cart == '') { ?>
					<?php echo thz_print_post_media_icons($atts,$item_link,$media_data); ?>
					<?php }?>
					<?php if($rating != '') { ?>
                        <?php echo $rating; ?>
                    <?php } ?>
                    <?php 
						if($meta_loc =='above'){
							thz_theme_post_meta('meta','above',$meta_loc,'<div class="thz-grid-item-meta">','</div>',$meta_elements);
						}
					?>
					<?php if($show_title == 'show') { ?>
					<h3 class="thz-grid-item-title">
						<a href="<?php echo esc_url ( $item_link )?>">
							<?php echo esc_attr ( $item_title ); ?>
						</a>
					</h3>
					<?php } ?>
                    <?php 
						if($meta_loc =='under'){
							thz_theme_post_meta('meta','under',$meta_loc,'<div class="thz-grid-item-meta">','</div>',$meta_elements);
						}
					?>
					<?php if($price != '') { ?>
                        <?php echo $price; ?>
                    <?php } ?>
					<?php if($add_to_cart != '' && ( $display_mode == 'directional' || $display_mode == 'thzhover') ) { ?>
                        <?php echo $add_to_cart.$wc_adding; ?>
                    <?php } ?>
					<?php if($show_introtext == 'show'): if($introtext !=''){?>
					<div class="thz-grid-item-intro-text">
						<?php echo $introtext; ?>
					</div>
					<?php }endif; ?>
					<?php if($show_button == 'show' ): ?>
					<div class="thz-grid-item-button">
						<?php echo thz_btn_print ( $item_more_button );	?>
					</div>
					<?php endif; ?>
                    <?php thz_theme_post_footer('footer','under','under','<div class="thz-grid-item-footer">','</div>',$footer_elements); ?>
					<?php if($display_mode == 'reveal') { ?>
                    <a href="<?php echo esc_url ( $item_link )?>" class="thz-reveal-link"></a>
                    <?php } ?>                    
				</div>
			</div>
			<?php if($display_mode == 'thzhover') { ?>
            <a href="<?php echo esc_url ( $item_link )?>" class="thz-hover-link"></a>
            </div>
            <?php } ?>
		</div>
        <?php } ?>
	</div><?php if($structured_data =='active'){ thz_sdata(get_post_type(),true,true); }; ?>
</div><?php if($layout_mode =='slider') {?></div><?php } ?>