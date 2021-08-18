<?php
/**
 * @package      Thz Framework
 * @author       Themezly
 * @websites     http://www.themezly.com | http://www.youjoomla.com | http://www.yjsimplegrid.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

$galleries		= get_post_galleries( get_the_ID(), false );
$media_height	= thz_akg('media_height/picked',$atts,'thz-ratio-16-9');
$mfp_slider		= ' '.thz_get_theme_option('lightbox_slider','thz-mfp-show-slider');
$item_link 		= get_permalink();
$image_size 	= thz_akg('image_size',$atts);


if($media_height == 'custom' || $media_height == 'metro'){
	
	$ratio_class 	= ' thz-media-custom-size';
	$img_ratio		= ' thz-media-custom-size';
	$img_mask		= 'thz-hover-img-mask ';
	
	
}else if($media_height == 'auto'){
	
	$ratio_class 	= ' thz-aspect thz-ratio-16-9';	
	$img_ratio		= ' thz-media-height-auto';
	$img_mask		= '';
	
}else{
	
	$ratio_class 	= ' thz-aspect '.$media_height;
	$img_ratio		= ' thz-aspect '.$media_height;
	$img_mask		= 'thz-hover-img-mask ';
}

?>
<?php foreach ($galleries as $key => $gallery) { if ($key > 0 ){ continue; }?>
<div class="thz-post-format-gallery">
	<?php if($gallery){ 
		$slider_layout 	 	 = thz_akg('post_slider',$atts,null);
		$slidesToShow		 = thz_akg('show',$slider_layout,1);	
		$slider_animation 	 = thz_akg('posts_slider_an',$atts,null);
		$slick_data 		 = thz_slick_data($slider_layout,$slider_animation);
		$multiple			= '';
		$images				= explode(',',$gallery['ids']);
		$mediacount			= count($gallery);
		
		$activate_slider 	= ' thz-slick-inactive';
		if($gallery > 1){
			$activate_slider = ' thz-slick-active thz-slick-initiating';
			$multiple	= $slidesToShow > 1 ? ' thz-slick-show-multiple' :'';	
		}
		
		$hover_bgtype		= thz_akg('med_over/background/type',$atts,'solid');
		$hover_ef 			= thz_akg('med_over/oeffect',$atts,'thz-hover-fadein');
		$hover_tr 			= thz_akg('med_over/oduration',$atts,'thz-transease-04');
		$img_ef				= thz_akg('med_over/ieffect',$atts,'thz-img-zoomin');
		$img_tr 			= thz_akg('med_over/iduration',$atts,'thz-transease-04');
		$icons_ef 			= thz_akg('med_over/iceffect',$atts,'thz-comein-bottom');
		$icons_tr 			= thz_akg('med_over/icduration',$atts,'thz-transease-05');
		$hover_classes 		= $img_mask.'thz-hover-bg-'.$hover_bgtype.' '.$hover_ef.' '.$img_ef.' '.$img_tr;
		$icons_classes 		= ' '.$icons_ef.' '.$icons_tr;	
		
	?>
	<div class="thz-post-format-gallery-in">
		<div class="thz-slick-holder thz-lightbox-gallery-simple<?php echo thz_sanitize_class($mfp_slider.$multiple)?>">
			<div class="thz-slick-slider <?php echo esc_attr( $activate_slider ) ?>"<?php echo thz_sanitize_data($slick_data) ?>>
				<?php foreach($images as $imgskey => $image_id ) { 
					
					$img_meta 	= wp_prepare_attachment_for_js($image_id); 
					$img_title	= $img_meta['caption'] != '' ? $img_meta['caption'] : $img_meta['title'];
                	$img_alt 	= $img_meta['alt'] == '' ? $img_title : esc_attr( $img_meta['alt']);
                	$style 		= $media_height == 'auto' ? '' : thz_print_img_style( $image_id, $image_size );
					
					?>
                    <div class="thz-slick-slide" data-type="image">
                        <div class="thz-slick-slide-in<?php echo $img_ratio ?>">
                            <div class="thz-ratio-in">
                                <div class="thz-hover <?php echo esc_attr ( $hover_classes ) ?> thz-items-grid-image"<?php echo $style ?>>
                                    <?php if ($media_height == 'auto') { ?>
									<?php echo thz_print_img_html($image_id, $image_size, array('class' => $img_tr , 'alt' => $img_alt)) ?>
                                    <?php } ?>
                                    <div class="thz-hover-mask <?php echo esc_attr ( $hover_tr ) ?>">
                                        <div class="thz-hover-mask-table">
                                            <a class="thz-hover-link" href="<?php echo esc_url( $item_link  ) ?>"></a>
                                            <div class="thz-hover-icons<?php echo esc_attr( $icons_classes ) ?>">
                                            <?php echo thz_print_post_media_icons($atts,$item_link,$image_id); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } // end images foreach?>
			</div>
		</div>
	</div>
	<?php }else{ 
	
			$n_title 	= esc_html__('Gallery images missing','creatus');
			$n_msg 		= esc_html__('Please check gallery post format settings and create your post gallery via "Add media" button in post edit screen.','creatus');
			thz_notify('yellow',$n_title,$n_msg);
		} 
	?>
</div>
<?php } ?>