<?php
/**
 * @package      Thz Framework
 * @author       Themezly
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 * @websites     http://www.themezly.com | http://www.youjoomla.com | http://www.yjsimplegrid.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

/**
 * Protect email
*/

if ( ! function_exists( 'thz_core_protect_email' ) ) {
	
	function thz_core_protect_email ( $email,$mailto = false ){
		 
		 $mailto = $mailto ? 'mailto:' :'';
		 $link = $mailto.$email;
		 $html = "";
		 for ($i=0; $i<strlen($link); $i++){
			 $html .= "&#" . ord($link[$i]) . ";";
		 }
		 if($html !=''){
			return $html;
		 }	 
	}

}



/**
 * Post social share links
 */
if ( ! function_exists( 'thz_core_post_shares' ) ) {

	function thz_core_post_shares( $echo = true, $sharing_links = false, $sharing_tooltip = false, $sharing_icons = false  ) {

		$t    = the_title_attribute( 'echo=0' );
		$l    = get_the_permalink();
		$purl = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

		$default   = array(
			'facebook',
			'twitter',
			'googleplus',
			'pinterest',
			'linkedin',
			'reddit',
			'email'
		);
		
		$default_icons = array(
			'f' => 'thzicon thzicon-facebook-social',
			't' => 'thzicon thzicon-twitter-social',
			'g' => 'thzicon thzicon-google-plus-social',
			'p' => 'thzicon thzicon-pinterest-social',
			'l' => 'thzicon thzicon-linkedin-social',
			'r' => 'thzicon thzicon-reddit-social',
			'e' => 'thzicon thzicon-email-social'
		);
		
		$links     = $sharing_links ? $sharing_links : thz_get_theme_option( 'sharing_links', $default );
		$icons	   = $sharing_icons ? $sharing_icons : thz_get_theme_option( 'sharing_icons', $default_icons ); 
		$placement = $sharing_tooltip ? $sharing_tooltip : thz_get_theme_option( 'sharing_tooltip', 'hide' );
		$placement = $placement == 'hide' ? '' : '  data-placement="' . $placement . '"';
		$tipsc     = $placement == '' ? '' : 'thz-tips ';

		$links_out   = array();
		$links_print = array();

		if ( in_array( 'facebook', $links ) ) {

			$facebook              = '<a class="' . $tipsc . 'thz-social-share" href="#"  data-link="http://www.facebook.com/sharer.php?u=' . $l . '&amp;t=' . $t . '" data-original-title="Facebook"' . $placement . '>';
			$facebook              .= '<span class="'.$icons['f'].'"></span>';
			$facebook              .= '</a>';
			$links_out['facebook'] = $facebook;
		}

		if ( in_array( 'twitter', $links ) ) {
			$twitter              = '<a class="' . $tipsc . 'thz-social-share" href="#" data-link="http://twitter.com/home/?status=' . $t . ' - ' . $l . '" data-original-title="Twitter"' . $placement . '>';
			$twitter              .= '<span class="'.$icons['t'].'"></span>';
			$twitter              .= '</a>';
			$links_out['twitter'] = $twitter;
		}
		if ( in_array( 'googleplus', $links ) ) {
			$googleplus              = '<a class="' . $tipsc . 'thz-social-share" href="#" data-link="https://plus.google.com/share?url=' . $l . '" data-original-title="Google Plus"' . $placement . '>';
			$googleplus              .= '<span class="'.$icons['g'].'"></span>';
			$googleplus              .= '</a>';
			$links_out['googleplus'] = $googleplus;
		}
		if ( in_array( 'pinterest', $links ) ) {
			$pinterest              = '<a class="' . $tipsc . 'thz-social-share" href="#" data-link="http://pinterest.com/pin/create/button/?url=' . $l . '&media=' . $purl . '" data-original-title="Pinterest"' . $placement . '>';
			$pinterest              .= '<span class="'.$icons['p'].'"></span>';
			$pinterest              .= '</a>';
			$links_out['pinterest'] = $pinterest;
		}

		if ( in_array( 'linkedin', $links ) ) {
			$linkedin = '<a class="' . $tipsc . 'thz-social-share" href="#" data-link="http://www.linkedin.com/shareArticle?mini=true&amp;title=' . $t . '&amp;url=' . $l . '" data-original-title="Linkedin"' . $placement . '>';
			$linkedin .= '<span class="'.$icons['l'].'"></span>';
			$linkedin .= '</a>';

			$links_out['linkedin'] = $linkedin;

		}

		if ( in_array( 'reddit', $links ) ) {

			$reddit              = '<a class="' . $tipsc . 'thz-social-share" href="#" data-link="http://www.reddit.com/submit?url=' . $l . '&amp;title=' . $t . ' "data-original-title="Reddit"' . $placement . '>';
			$reddit              .= '<span class="'.$icons['r'].'"></span>';
			$reddit              .= '</a>';
			$links_out['reddit'] = $reddit;

		}

		if ( in_array( 'email', $links ) ) {
			$email              = '<a class="' . $tipsc . 'thz-social-share" href="#" data-link="mailto:?subject=' . $t . '&body=' . $l . '" data-original-title="Mail"' . $placement . '>';
			$email              .= '<span class="'.$icons['e'].'"></span>';
			$email              .= '</a>';
			$links_out['email'] = $email;
		}

		foreach ( $links as $key ) {

			if ( ! isset( $links_out[ $key ] ) ) {
				continue;
			}

			$links_print[ $key ] = $links_out[ $key ];
		}


		if ( ! empty( $links_print ) ) {


			if ( $echo ) {

				echo implode( '<span class="thz-sharing-sep"></span>', $links_print );

			} else {

				return implode( '<span class="thz-sharing-sep"></span>', $links_print );

			}

		}
	}

}

function thz_core_activation_url(){
	return apply_filters( 'thz_core_activation_url', 'https://members.themezly.com/' );
}

function thz_core_theme_update_url(){
	return apply_filters( 'thz_core_theme_update_url', 'https://updates.themezly.io/themes/creatus/' );
}

function thz_core_plugin_update_url( $params = array() ){
	$url = apply_filters( 'thz_core_plugin_update_url', 'https://updates.themezly.io/plugins/thz_core/' );

	return add_query_arg( $params, $url );
}