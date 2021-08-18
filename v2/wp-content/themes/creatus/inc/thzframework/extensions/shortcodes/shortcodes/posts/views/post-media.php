<?php
/**
 * @package      Thz Framework
 * @author       Themezly
 * @websites     http://www.themezly.com | http://www.youjoomla.com | http://www.yjsimplegrid.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

$mfp_slider			= ' '.thz_get_theme_option('lightbox_slider','thz-mfp-show-slider');
$use_poster			= thz_akg('use_poster',$atts,'active'); 
$post_media 		= thz_get_post_media();
$post_media 		= $use_poster == 'active' ? thz_magnific_media( $post_media ) : $post_media ;
$showall 	 	 	= thz_akg('post_slider/showall',$atts,'all');
if('first' == $showall && !empty($post_media) ){
	$post_media 		= array(0 => $post_media[0]);
}
$item_link 			= get_permalink();
$display_mode		= thz_akg('display_mode/picked',$atts);
$image_size 		= thz_akg('image_size',$atts);
$media_height		= thz_akg('media_height/picked',$atts,'thz-ratio-16-9');
$show_icons			= thz_akg('show_icons/picked',$atts); 
$grayscale			= thz_akg('grayscale',$atts,'none');
$mediacount 		= count($post_media);
$grayscale			= $grayscale !='none' ? ' '.$grayscale :'';
$add_to_cart		= '';
$wc_adding 			= '';
$slick_in_class 	= $mediacount > 1 ? 'thz-slick-slide-in ' :'';


if($media_height == 'custom' || $media_height == 'metro'){
	
	$ratio_class 	= $slick_in_class.'thz-media-custom-size';
	$img_ratio		= $slick_in_class.'thz-media-custom-size';
	$img_mask		= $slick_in_class.'thz-hover-img-mask ';
	
	
}else if($media_height == 'auto'){
	
	$ratio_class 	= $slick_in_class.'thz-aspect thz-ratio-16-9';	
	$img_ratio		= $slick_in_class.'thz-media-height-auto';
	$img_mask		= '';
	
}else{
	
	$ratio_class 	= $slick_in_class.'thz-aspect '.$media_height;
	$img_ratio		= $slick_in_class.'thz-aspect '.$media_height;
	$img_mask		= 'thz-hover-img-mask ';
}

$custom_data		= thz_custom_post_data(get_the_ID(), thz_akg('ci',$atts,array()) );
if( $custom_data ){
	$post_media	= !empty($custom_data['media']) ? $custom_data['media'] : $post_media;
	$item_link	= !empty($custom_data['link']['url']) ? $custom_data['link']['url'] : $item_link;
	$image_size	= isset($custom_data['ms']) ? $custom_data['ms'] : $image_size;
}

if('product' ==  get_post_type() ){ 
	
	$wc_product 	= wc_get_product( get_the_ID() );
	$add_to_cart 	= _thz_woo_buttons($wc_product,$atts);
	
	if($add_to_cart !=''){
		$link 		  	= apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( thz_woo_get_id( $wc_product ) ) );
		
		$wc_adding ='<div class="thz-item-adding-icon">';
		$wc_adding .='<span class="thzicon thzicon-spinner9 thz-spin"></span>';
		$wc_adding .='</div>';
		$wc_adding .='<div class="thz-item-in-cart-icon">';
		$wc_adding .='<span class="thzicon thzicon-checkmark"></span>';
		$wc_adding .='</div>';
	}
	
}
$hover_bgtype		 = thz_akg('med_over/background/type',$atts,'solid');
$hover_ef 			 = thz_akg('med_over/oeffect',$atts,'thz-hover-fadein');
$hover_tr 			 = thz_akg('med_over/oduration',$atts,'thz-transease-04');
$img_ef				 = thz_akg('med_over/ieffect',$atts,'thz-img-zoomin');
$img_tr 			 = thz_akg('med_over/iduration',$atts,'thz-transease-04');
$icons_ef 			 = thz_akg('med_over/iceffect',$atts,'thz-comein-bottom');
$icons_tr 			 = thz_akg('med_over/icduration',$atts,'thz-transease-05');
$hover_classes 		 = $img_mask.'thz-hover-bg-'.$hover_bgtype.' '.$hover_ef.' '.$img_ef.' '.$img_tr;
$img_classes		 = $img_tr.$grayscale;
$mask_classes		 = $img_tr.' '.$img_mask;
if($media_height != 'auto'){
	$hover_classes  .= $grayscale;
	$mask_classes   .= $grayscale;
}
$icons_classes 		 = ' '.$icons_ef.' '.$icons_tr;
$multiple			 = '';
$slick_data 		 = '';
$start_slick_wrap	 = '';
$end_slick_wrap	 	 = '';
$start_slick_item	 = '';
$end_slick_item	 	 = '';
$media_class		 = 'thz-media';

if( $mediacount > 1 ){
	
	$slider_layout 	 	 = thz_akg('post_slider',$atts,null);
	$slidesToShow		 = thz_akg('show',$slider_layout,1);	
	$slider_animation 	 = thz_akg('posts_slider_an',$atts,null);
	$slick_data 		 = thz_slick_data($slider_layout,$slider_animation);
	$multiple		 	 = $slidesToShow > 1 ? ' thz-slick-show-multiple' :'';
	
	$start_slick_wrap	 = '<div class="thz-slick-holder'.$mfp_slider.$multiple.'">';
	$start_slick_wrap	 .= '<div class="thz-slick-slider thz-slick-active thz-slick-initiating"'.$slick_data.'>';
	$end_slick_wrap	 	 = '</div></div>';
	$media_class		 = 'thz-slick-media';
}



?>
<?php if ( !empty($post_media) ){ 
	echo $start_slick_wrap; ?>
	<?php foreach($post_media as $key => $media ) :
        $type 		= thz_akg('type',$media);
        $source 	= thz_akg('media',$media);
        $mediaid 	= thz_akg('mediaid',$media); 
        $qtitle 	= thz_akg('qtitle',$media,null);
        
		
		if($mediacount > 1){
			$start_slick_item	 = '<div class="thz-slick-slide" data-type="'.$type.'">';
			$end_slick_item	 	 = '</div>';
		}
		
        if($type ==='image') {
            
            $img_meta 		= wp_prepare_attachment_for_js($source['attachment_id']); 
            $img_title 		= $qtitle ? $qtitle : $img_meta['title'];
			$img_alt 		= $img_meta['alt'] == '' ? $img_title : esc_attr( $img_meta['alt']);
			$style 			= $media_height == 'auto' ? '' : thz_print_img_style( $source, $image_size );
			$magnific_link 	= isset($source['magnific_link']) ? $source['magnific_link'] : null;

        }
    ?>
    <?php if($type ==='image') { echo $start_slick_item; ?>
        <div class="<?php echo thz_sanitize_class( $img_ratio ) ?>">
            <div class="thz-ratio-in">
                <?php if($key == 0 ) { ?>
                <div class="thz-hover <?php echo thz_sanitize_class ( $hover_classes ) ?> thz-items-grid-image"<?php echo $style ?>>
                    <?php if ($media_height == 'auto' ) { ?>
                    <?php echo thz_print_img_html($source, $image_size, array('class' => $img_tr , 'alt' => $img_alt)) ?>
                    <?php } ?>
                    <?php if ( $display_mode != 'directional' && $display_mode != 'thzhover') { ?> 
                    <div class="thz-hover-mask <?php echo thz_sanitize_class ( $hover_tr ) ?>"><?php echo $wc_adding ?>
                        <div class="thz-hover-mask-table">
                            <a class="thz-hover-link" href="<?php echo esc_url( $item_link  ) ?>"></a>
                            <?php if($show_icons =='show' || $add_to_cart !='') { ?>
                            <div class="thz-hover-icons<?php echo thz_sanitize_class( $icons_classes ) ?>">
                                <?php 
                                    if($add_to_cart !='' ){
                                        
                                        echo $add_to_cart;
                                        
                                    }else{
                                        
                                        echo thz_print_post_media_icons($atts,$item_link,$media);
                                    }
                                ?>
                            </div><?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php }else { ?>
                <div class="thz-hover <?php echo thz_sanitize_class ( $mask_classes ) ?> thz-items-grid-image"<?php echo $style ?>>
                    <?php if ( $media_height == 'auto' ) { ?>
                    <?php echo thz_print_img_html($source, $image_size, array( 'alt' => $img_alt ) ) ?>
                    <?php } ?>
                    <a class="thz-hover-link" href="<?php echo esc_url( $item_link  ) ?>"></a>
                    <?php if( $magnific_link ) { ?> 
                        <div class="mfp-hide"><?php echo $magnific_link ?></div>
                    <?php }else{ ?>
                    <a class="thz-lightbox mfp-hide" href="#" data-mfp-src="<?php echo esc_url ($source['url'] )?>" data-mfp-title="<?php echo esc_attr ( $img_title )?>"></a><?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    <?php echo $end_slick_item; } ?>
    <?php if($type ==='vimeo') { echo $start_slick_item; ?>
        <div class="<?php echo thz_sanitize_class ( $ratio_class ) ?>">
            <div class="thz-ratio-in">
                <video id="thz_media<?php echo esc_attr ( $mediaid ) ?>" class="<?php echo $media_class ?> thz-video-vimeo thz-media-respond">
                    <source src="<?php echo esc_url ( $source ) ?>" type="video/vimeo">
                </video>
            </div>
        </div><?php echo $end_slick_item; } ?>
    <?php if($type ==='youtube') { echo $start_slick_item; ?>
        <div class="<?php echo thz_sanitize_class ( $ratio_class ) ?>">
            <div class="thz-ratio-in">
                <video id="thz_media<?php echo esc_attr ( $mediaid )?>" class="<?php echo $media_class ?> thz-video-youtube thz-media-respond">
                    <source src="<?php echo esc_url ( $source ) ?>" type="video/youtube">
                </video>
            </div>
        </div><?php echo $end_slick_item; } ?>
    <?php if($type ==='html5video') { echo $start_slick_item; ?>
        <div class="<?php echo thz_sanitize_class ( $ratio_class ) ?>">
            <div class="thz-ratio-in">
                <video id="thz_media<?php echo esc_attr ( $mediaid ) ?>" class="<?php echo $media_class ?> thz-video-html5 thz-media-respond">
                    <source src="<?php echo esc_url ( $source ) ?>" />
                </video>
            </div>
        </div><?php echo $end_slick_item; } ?>
    <?php if($type ==='html5audio') { echo $start_slick_item; ?>
        <div class="<?php echo thz_sanitize_class ( $ratio_class ) ?> thz-slick-audio">
            <div class="thz-ratio-in">
                <div class="thz-media-audio-holder">
                    <audio id="thz_media<?php echo esc_attr ( $mediaid ) ?>" class="<?php echo $media_class ?> thz-audio thz-media-respond">
                        <source src="<?php echo esc_url ( trim($source) ) ?>" type="audio/mp3">
                    </audio>
                </div>
            </div>
        </div><?php echo $end_slick_item; } ?>
    <?php if($type ==='iframe') { echo $start_slick_item; ?>
        <div class="<?php echo thz_sanitize_class ( $ratio_class ) ?> thz-slick-iframe">
            <div class="thz-ratio-in">
                <?php thz_media_iframe_helper($source); ?>
            </div>
        </div>
    </div>
    <?php }?>
    <?php if($type ==='oembed') { echo $start_slick_item; ?>
        <div class="<?php echo thz_sanitize_class ( $ratio_class ) ?> thz-slick-oembed">
            <div class="thz-ratio-in">
                <?php echo wp_oembed_get( esc_url ( trim($source) ) , array('width'  => 640,'height' => 360) );?>
            </div>
        </div><?php echo $end_slick_item; } ?>
    <?php if($type ==='selfvideo') { echo $start_slick_item; ?>
        <div class="<?php thz_sanitize_class ( $ratio_class ) ?>">
            <div class="thz-ratio-in">
                <video id="thz_media<?php echo esc_attr ( $mediaid ) ?>" class="<?php echo $media_class ?> thz-video-html5 thz-media-respond">
                    <?php foreach($source as $video_ext){ $type = wp_check_filetype( $video_ext['url']); ?>
                        <source src="<?php echo esc_url ( $video_ext['url'] ) ?>" type="<?php echo $type['type']  ?>" />
                    <?php } unset($video_ext);?>
                </video>
            </div>
        </div><?php echo $end_slick_item; } ?>
    <?php if($type ==='selfaudio') { echo $start_slick_item; ?>
        <div class="<?php echo thz_sanitize_class ( $ratio_class ) ?> thz-slick-audio">
            <div class="thz-ratio-in">
                <div class="thz-media-audio-holder">
                    <audio id="thz_media<?php echo esc_attr ( $mediaid ) ?>" class="<?php echo $media_class ?> thz-audio thz-media-respond">
                        <?php foreach($source as $audio_ext){ $type = wp_check_filetype( $audio_ext['url']); ?>
                            <source src="<?php echo esc_url ( $audio_ext['url'] ) ?>" type="<?php echo $type['type']  ?>" />
                        <?php } unset($audio_ext);?>
                    </audio>
                </div>
            </div>
        </div><?php echo $end_slick_item; } ?>
    <?php endforeach; echo $end_slick_wrap; ?>
<?php }?>