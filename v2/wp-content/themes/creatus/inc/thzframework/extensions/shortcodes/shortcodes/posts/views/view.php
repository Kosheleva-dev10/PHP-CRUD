<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if(is_admin()){
	return;
}
/**
 * @var array $atts
 */

$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-posts-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$thz_posts_id		= $id;
$thz_object_id		= get_queried_object_id();
$paged 				= thz_paged();
$posts_per_page		= thz_akg('posts_mx/items',$atts,9);
$pagination			= thz_akg('pagination/picked',$atts);
$items_load			= thz_akg('pagination/'.$pagination.'/items_load',$atts);
$more_button		= thz_akg('pagination/click/more_button/button/html',$atts);
$media_height		= thz_akg('media_height/picked',$atts,'thz-ratio-16-9');
$data_layout		= $media_height == 'auto' ? 'masonry' : $media_height;
$gutter				= thz_akg('pgrid/gutter',$atts);
$display_mode		= thz_akg('display_mode/picked',$atts);
$gutter_class		= $gutter == 0 ? ' thz-items-grid-nogutter' : '';
$order				= thz_akg('posts_mx/order',$atts);
$orderby			= thz_akg('posts_mx/orderby',$atts);
$sql_days			= thz_akg('posts_mx/days',$atts);
$mfp_slider			= ' '.thz_get_theme_option('lightbox_slider',$atts ,'thz-mfp-show-slider');
$sql_types			= thz_akg('types',$atts,array()); 
$sql_types			= empty($sql_types) ? array('post') : array_keys($sql_types);
$sql_specific		= thz_akg('specific',$atts,array()); 
$sql_categories		= thz_akg('categories',$atts,array()); 
$sql_tags			= thz_akg('tags',$atts,array()); 
$sql_author			= thz_akg('author',$atts,array());
$sql_exclude		= thz_akg('exclude',$atts,array());
$show_filter 		= thz_akg('filter/picked',$atts);
$pagination_c		= false;
$layout_mode		= thz_akg('mode',$atts,'grid');
$formats	 		= thz_akg('pf',$atts,array());
$exclude_formats	= empty($formats) ? true : false;
$pa 				= is_preview() ?  ' '.fw_attr_to_html(array('data-atts' => json_encode($atts) )) :'';
$sql_ci				= thz_akg('ci',$atts,array());	
$sql_ciq			= thz_akg('ciq',$atts,'donotlimit');
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);	

if( !empty( $sql_ci ) && 'limit' == $sql_ciq){
	
	$exclude_formats = false;
	
	foreach($sql_ci as $custom_item){
		
		if(!isset($custom_item['p'][0]) || get_the_ID() === (int)$custom_item['p'][0] ){
			continue;
		}
		
		$sql_specific[] = $custom_item['p'][0];
		
		unset($custom_item);
	}
	
	unset($sql_ci);
}

if(!empty($sql_specific)){
	$sql_types = thz_list_post_types(false,array('forum','topic','reply' ));
}

if($pagination	== 'pagination'){
	
	$pagination_options = thz_akg('pagination/pagination/p/0',$atts,array());
	
	if(!empty( $pagination_options )){
		
		$pagination_c	= $pagination_options;
	}
}

$sql_not_in = array( get_the_ID() );

if(!empty($sql_exclude)){
	
	$sql_not_in =  array_merge($sql_not_in,$sql_exclude);
}

$args = array(
  'posts_per_page'  => $posts_per_page,
  'post__in'		=> $sql_specific,
  'post__not_in'	=> $sql_not_in,
  'author__in' 		=> $sql_author,
  'post_type'  		=> $sql_types,
  'paged'			=> $paged,
  'tax_query'  		=> thz_post_tax_query( $sql_categories,$sql_tags,$sql_types,$exclude_formats ),
  'order'			=> $order,
  'orderby'			=> $orderby,
  'ignore_sticky_posts' => true,
  'date_query'		=> thz_date_query_helper( $sql_days )
);

if('meta_value' == $orderby){
	
	$args['meta_key'] = 'thz_post_views';
}

$query 				= new WP_Query( $args );

if('slider' == $layout_mode){
	
	$slider_layout 	 	 		= thz_akg('slider',$atts,null);
	$slider_animation 	 		= thz_akg('san',$atts,null);
	$slider_layout['dots'] 		= thz_akg('nav/show',$atts,'outside');
	$slider_layout['arrows'] 	= thz_akg('arr/show',$atts,'hide');
	$slider_breakpoints			= thz_akg('slbp',$atts,false);
	$slick_data 		 		= thz_slick_data($slider_layout,$slider_animation,$slider_breakpoints);
	$slidesToShow		 		= thz_akg('show',$slider_layout,1);
	$dstyle						= thz_akg('nav/style',$atts,'rings');
	$dshadows					= thz_akg('nav/shadows',$atts,'active');
	$dopacities					= thz_akg('nav/opacities',$atts,'active');
	$dstyle						= $dstyle.' dsh-'.$dshadows.' dop-'.$dopacities.' ';
	$dpoz						= thz_akg('nav/p',$atts,'bc');	
	$dots_p						= $dpoz == 'c' ? ' dots-'.thz_akg('nav/o',$atts,'h') : ' dots-'.$dpoz;
	$grid_data 			 		= $slick_data;
	$multiple					= $slidesToShow > 1 ? ' thz-slick-show-multiple' :'';
	$grid_holder_classes 		= $css_class.'thz-shc thz-slick-holder thz-lightbox-gallery-simple thz-posts-holder'.$multiple.$mfp_slider.$cpx_class.$res_class;
	$grid_classes				= 'thz-slick-slider thz-slick-active thz-slick-initiating thz-items-display-'.$display_mode.' thz-slick-'.$dstyle.$dots_p;
	
}else{

	$grid_data  = ' data-maxpages="'.$query->max_num_pages.'" data-pagination="'.esc_attr( $pagination ).'"';
	$grid_data .= ' data-itemsload="'.esc_attr( $items_load ).'" data-layout-type="'.esc_attr( $data_layout ).'" data-display-mode="'.esc_attr( $display_mode ).'"';
	$grid_data .= ' data-shortcodeid="'.esc_attr($thz_posts_id).'" data-objectid="'.esc_attr($thz_object_id).'"';
	$gridtype	  = 'thz-is-isotope';
	$is_timeline  = '';
	$columns	  = thz_akg('pgrid/columns',$atts,3);
	
	if('timeline' == $layout_mode){
		
		$columns 		= thz_akg('tml_mx/c',$atts,2);
		$tml_bw 		= thz_akg('tml_mx/w',$atts,1);
		$timeline_class = $columns == 1 ? 'single': 'double';
		$is_timeline 	= ' thz-timeline-'.$timeline_class.' thz-grid-timeline thz-timeline-bw-'.$tml_bw;
		$gridtype	  	= 'thz-is-timeline';
	
	}else{
		
		$isotope		= thz_akg('pgrid/isotope',$atts,'packery');
		$isotope		= $columns == 1 ? 'vertical' : $isotope;
		$grid_data 		.= ' data-isotope-mode="'.esc_attr($isotope).'"';
		
		if($media_height !='metro'){
			$minwidth		= thz_akg('pgrid/minwidth',$atts,200);
			$grid_data 		.= ' data-minwidth="'.esc_attr($minwidth + $gutter ).'"';
		}
	}
	
	$no_response 			= $columns < 3 ? ' thz-grid-noresponse' :'';
	$grid_holder_classes 	= $css_class.'thz-shc thz-items-grid-holder '.$gridtype.' thz-lightbox-gallery-simple thz-posts-holder thz-items-grid-'.$data_layout;		
	$grid_holder_classes 	.= ' thz-grid-has-col-'.$columns.$gutter_class.$mfp_slider.$cpx_class.$res_class;
	$grid_classes			= 'thz-items-grid thz-items-display-'.$display_mode.$no_response.$is_timeline;
	
}


// filter
if ('slider' != $layout_mode && 'show' == $show_filter ) {
	$categories	= thz_query_taxonomies($sql_categories,$query);
}
?>
<?php if ( $query->have_posts() ) : ?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class ( $grid_holder_classes ) ?>"<?php echo thz_sanitize_data($cpx_data)?>>
         <?php if ('grid' == $layout_mode && 'show' == $show_filter && !is_admin()) {?>
            <ul id="thz-posts-filter-<?php echo esc_attr( $id ) ?>" class="thz-items-grid-categories thz-posts-filter">
                <li class="thz-items-categories-item">
                    <a class="active thz-posts-filter-link" href='#' data-filter-value=".category_all">
                        <?php _e( 'All', 'creatus' ); ?>
                    </a>
                </li>
                <?php foreach ( $categories as $category ) : ?>
                <li class="thz-items-categories-item">
                    <a class="thz-posts-filter-link" href='#' data-filter-value=".category_<?php echo $category->term_id ?>">
                        <?php echo $category->name; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
         <?php } ?>
		<div id="<?php echo esc_attr($id_out) ?>-inner" class="<?php echo thz_sanitize_class( $grid_classes ) ?>"<?php echo thz_sanitize_data($grid_data).$pa?>>
			<?php if('grid' == $layout_mode) {?>
            <div class="thz-items-sizer"></div>
            <?php } ?>       
            <?php if('timeline' == $layout_mode && $columns == 2){ ?>
                <div class="thz-timeline-left">	
                    <?php 
                    $thz_rowstarthook = 0;
                    while ($query->have_posts()):$thz_rowstarthook++;
                        if (($thz_rowstarthook % 2) == 0){ // skip 'even' posts
                            $query->next_post();
                        }else{
                            $query->the_post();
							thz_render_view(thz_theme_file_path ( '/inc/thzframework/extensions/shortcodes/shortcodes/posts/views/post-item.php' ), array(
								'atts' => $atts,
								'thz_rowstarthook' => $thz_rowstarthook,
							),false);
                        }
                    endwhile;				
                    ?>
                </div>
                <div class="thz-timeline-right">
                    <?php 
						$thz_rowstarthook = 0;
						$query->rewind_posts();
						while ($query->have_posts()): $thz_rowstarthook++;
							if (($thz_rowstarthook % 2) != 0){ // skip 'odd' posts
								$query->next_post();
							}else{
								$query->the_post();
								thz_render_view(thz_theme_file_path ( '/inc/thzframework/extensions/shortcodes/shortcodes/posts/views/post-item.php' ), array(
									'atts' => $atts,
									'thz_rowstarthook' => $thz_rowstarthook,
								),false);
							}
						endwhile;				
                    ?>
                </div>
            <?php }else{ ?>     
			<?php
				$thz_rowstarthook = 0;
				while ( $query->have_posts() ) : $query->the_post();
					thz_render_view(thz_theme_file_path ( '/inc/thzframework/extensions/shortcodes/shortcodes/posts/views/post-item.php' ), array(
						'atts' => $atts,
						'thz_rowstarthook' => $thz_rowstarthook,
					),false);				
				++$thz_rowstarthook;
				endwhile;
			?>
            <?php } ?>     
		</div>
        <?php if('slider' != $layout_mode) {?>
		<?php if('grid' == $layout_mode) {?>
        <div class="thz-items-gutter-adjust"></div>
        <?php } ?>         
		<?php if($pagination =='pagination') {?>
			<div class="thz-clear"></div>
			<?php thz_pagination($query->max_num_pages,$paged ,true, $pagination_c); ?>
			<?php } ?>
			<div class="thz-items-loading"></div>
			<?php if($pagination =='click' && $query->max_num_pages > 1) {?>
			<div id="thz-items-more-<?php echo esc_attr($id) ?>" class="thz-items-more">
				<?php echo thz_btn_print ( $more_button ) ?>
			</div>
		<?php } ?>
		<div id="thz-portfolio-scrollto-<?php echo esc_attr($id) ?>" class="thz-items-scrollto"></div>
        <?php } ?>
</div>
<?php wp_reset_postdata(); else : ?>
	<p class="thz-align-center">
		<?php echo esc_html( 'No posts to show. Check posts query.', 'creatus' ); ?>
    </p>
<?php endif; ?>