<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id 					= thz_akg('id',$atts);
$css_id 				= thz_akg('cmx/i',$atts);
$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-twitter-feed-'.$id;
$css_class 				= thz_akg('cmx/c',$atts);
$css_class				= $css_class !='' ? $css_class.' ':'';
$res_class				= _thz_responsive_classes(thz_akg('cmx',$atts));
$twitter_id				= thz_akg('tw_mx/u',$atts);
$tw_count				= thz_akg('tw_mx/t',$atts);
$consumer_key 			= empty(thz_akg('consumer_key',$atts)) ? thz_get_theme_option('twck'): thz_akg('consumer_key',$atts);
$consumer_secret 		= empty(thz_akg('consumer_secret',$atts)) ? thz_get_theme_option('twcs'): thz_akg('consumer_secret',$atts);
$access_token 			= empty(thz_akg('access_token',$atts)) ? thz_get_theme_option('twat'): thz_akg('access_token',$atts);
$access_token_secret 	= empty(thz_akg('access_token_secret',$atts)) ? thz_get_theme_option('twts'): thz_akg('access_token_secret',$atts);
$transient 				= 'thz-tw-feed-'.get_post_modified_time().$id.$tw_count.thz_akg('tw_mx/u',$atts);

$tw_api	= array(

	'transient' => $transient,
	'apikeys' => false,
	'consumer_key' => $consumer_key,
	'consumer_secret' => $consumer_secret ,
	'access_token' => $access_token ,
	'access_token_secret' => $access_token_secret,
	'twitter_id' => $twitter_id,
	'count' => thz_akg('tw_mx/t',$atts),

);

$tweets 	= thz_twitter_feed($tw_api);

if(empty($tweets)){
	$html = '<div id="'.esc_attr($id_out).'" class="thz-tw-tweet center">';
	$html .= '<div class="thz-tw-tweet-info">';
	$html .= '<div class="thz-tw-tweet-avatar-holder circle av-icon"><i class="fa fa-twitter"></i></div>';
	$html .= '<div class="thz-tw-tweet-author">';
	$html .= esc_html__( 'Connection error. Twitter is currently down or API settings are incorrect. Please go in shortcode settings API tab and verify the Twitter API keys.', 'creatus' );
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';
	echo $html;
	return;
}

$tweet_limit		= thz_akg('tw_mx/c',$atts);
$avatar_type		= thz_akg('tm/av',$atts);
$avatar_html		= false;
$info_side	  		= thz_akg('tm/info_side',$atts,'center');
$image_shape  		= thz_akg('tm/ash',$atts,'circle');
$arrow_show  		= thz_akg('tm/ar',$atts,'show-arrow');
$layout_mode  		= thz_akg('layout_mode',$atts,'slider');
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$multiple			= '';
$tweetscount		= count($tweets);
$activate_slider	= ' thz-slick-inactive';
$avatar_class		= '';

if($tweetscount > 0){
	
	if($avatar_type =='i'){
		
		$avatar_html 	= '<i class="fa fa-twitter"></i>';
		$avatar_class	= ' av-icon';
		
	}else if($avatar_type =='u'){
		
		$avatar 		= str_replace('_normal','_bigger',$tweets[0]->user->profile_image_url_https);
		$avatar_html 	= '<img src="'. esc_url($avatar).'" alt="'.esc_attr($twitter_id).'" />';
		$avatar_class	= ' av-image';
	}
		
}

if('slider' == $layout_mode){

	$slider_layout 	 	 		= thz_akg('slider',$atts,null);
	$slider_animation 	 		= thz_akg('san',$atts,null);
	$slider_layout['dots'] 		= thz_akg('nav/show',$atts,'outside');
	$slider_layout['arrows'] 	= thz_akg('arr/show',$atts,'hide');
	$slider_breakpoints			= thz_akg('slbp',$atts,false);
	$holder_in_data 		 	= thz_slick_data($slider_layout,$slider_animation,$slider_breakpoints);
	$slidesToShow		 		= thz_akg('show',$slider_layout,1);
	$dstyle						= thz_akg('nav/style',$atts,'rings');
	$dshadows					= thz_akg('nav/shadows',$atts,'active');
	$dopacities					= thz_akg('nav/opacities',$atts,'active');
	$dstyle						= $dstyle.' dsh-'.$dshadows.' dop-'.$dopacities.' ';
	$dpoz						= thz_akg('nav/p',$atts,'bc');	
	$dots_p						= $dpoz == 'c' ? ' dots-'.thz_akg('nav/o',$atts,'h') : ' dots-'.$dpoz;

	if( $tweetscount > 1 ){
		
		$activate_slider = ' thz-slick-active thz-slick-initiating thz-slick-'.$dstyle.$dots_p;
		$multiple	= $slidesToShow > 1 ? ' thz-slick-show-multiple' :'';	
		$holder_classes = $css_class.'thz-shc thz-twitter-feed-holder thz-slick-holder'.$multiple.' '.$arrow_show;
		$holder_in_classes = 'thz-slick-slider'.$activate_slider;
	
	}else{
		
		$holder_in_data ='';
		$holder_classes = $css_class.'thz-shc thz-twitter-feed-holder '.$arrow_show.$cpx_class.$res_class;
		$holder_in_classes = 'thz-twitter-feed-container';	
	}

	$column_classes 		= 'thz-slick-slide';
	$column_in_classes 		= 'thz-slick-slide-in';
	$animate_data			= '';
			
}else{
	
	$columns 				= thz_akg('grid/columns',$atts,3);
	$gutter					= thz_akg('grid/gutter',$atts,null);
	$animate				= thz_akg('animate',$atts);
	$animate_data			= thz_print_animation($animate);
	$animation_class		= thz_print_animation($animate,true,'thz-isotope-animate');
	$animate_parent			= $animation_class != '' ? ' thz-animate-parent' :'';	

	
	$no_response 			= $columns < 3 ? ' thz-grid-noresponse' :'';
	$gutter_class			= $gutter == 0 ? ' thz-items-grid-nogutter' : '';
	$holder_classes 		= $css_class.'thz-shc thz-twitter-feed-holder thz-items-grid-holder thz-grid-has-col-'.$columns.' '.$arrow_show;
	$holder_classes 		.= ' thz-media-grid-isotope thz-is-isotope '.$gutter_class.$cpx_class.$res_class;
	$holder_in_classes 		= 'thz-items-grid thz-media-gallery-grid thz-lightbox-gallery-simple'.$no_response;
	$column_classes 		= 'thz-grid-item'.$animate_parent;
	$column_in_classes 		= 'thz-grid-item-in '.$animation_class;
	$holder_in_data 		= '';
	
	$isotope		= thz_akg('grid/isotope',$atts,'packery');
	$isotope		= $columns == 1 ? 'vertical' : $isotope;
	$holder_in_data .= ' data-isotope-mode="'.esc_attr($isotope).'"';
}

?>
<div id="<?php echo esc_attr($id_out)?>" class="<?php echo thz_sanitize_class($holder_classes) ?>">
  <div class="<?php echo thz_sanitize_class($holder_in_classes) ?>"<?php echo thz_sanitize_data($holder_in_data)?>>
	<?php if('grid' == $layout_mode) {?>
    <div class="thz-items-sizer"></div>
    <?php } ?>
    <?php foreach ($tweets as $item) { 

		$author_quote	= $tweet_limit > 0 ? substr($item->text,0,$tweet_limit)."..." : $item->text_parsed; 
		$tweet_user		= esc_attr($item->user->name).' (@'.esc_attr($item->user->screen_name).')'; 
		$tweet_url		= 'http://twitter.com/'.esc_attr($item->user->screen_name).'/statuses/'.esc_attr($item->id_str); 
		$avatar 		= str_replace('_normal','_bigger',$item->user->profile_image_url_https); 

		$tweet_link ='<a href="'.esc_url($tweet_url).'" target="_blank">';
		$tweet_link .= thz_twitter_ago( $item->created_at );
		$tweet_link .='</a>';

	?>
    <?php if( $tweetscount > 1 ){?>
    <div class="<?php echo thz_sanitize_class($column_classes) ?>"<?php echo thz_sanitize_data($cpx_data) ?>>
      <div class="<?php echo thz_sanitize_class($column_in_classes) ?>"<?php echo thz_sanitize_data($animate_data) ?>>
        <?php } ?>
        <div class="thz-tw-tweet <?php echo thz_sanitize_class($info_side); ?>">
          <div class="thz-tw-tweet-quote">
            <div class="quote">
              <?php echo $author_quote; ?>
            </div>
          </div>
          <div class="thz-tw-tweet-info">
            <?php if(($info_side =='left' || $info_side =='center' ) && $avatar_html) {?>
            <div class="thz-tw-tweet-avatar">
              <div class="thz-tw-tweet-avatar-holder <?php echo thz_sanitize_class($image_shape.$avatar_class); ?>">
              	<a href="<?php echo esc_url($tweet_url) ?>" target="_blank">
                	<?php echo $avatar_html; ?>
                </a>
              </div>
            </div>
            <?php } ?>
            <div class="thz-tw-tweet-author">
              <span class="thz-tw-tweet-user"><?php echo $tweet_user; ?></span><span class="thz-tw-tweet-link">&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $tweet_link; ?></span>
            </div>
            <?php if($info_side =='right' && $avatar_html) {?>
            <div class="thz-tw-tweet-avatar">
              <div class="thz-tw-tweet-avatar-holder <?php echo thz_sanitize_class($image_shape.$avatar_class); ?>">
              	<a href="<?php echo esc_url($tweet_url) ?>" target="_blank">
                	<?php echo $avatar_html; ?>
                </a>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <?php if( $tweetscount > 1 ){?>
      </div>
    </div>
    <?php } ?>
    <?php } ?>
  </div>
<?php if('grid' == $layout_mode) {?>
<div class="thz-items-gutter-adjust"></div>
<?php }?>
</div>