<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id 			= thz_akg('id',$atts);
$css_id 		= thz_akg('cmx/i',$atts);
$id_out			= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-sticky-'.$id;
$css_class 		= thz_akg('cmx/c',$atts);
$css_class		= $css_class !='' ? $css_class.' ':'';
$res_class		= _thz_responsive_classes(thz_akg('cmx',$atts));
$tip_poz		= thz_akg('tip/p',$atts,'left'); 
$type			= thz_akg('type',$atts,'indicator');
$items			= thz_akg('items',$atts,null);
$class			= $css_class.'thz-shc thz-dot-nav thz-dot-navigation thz-dot-nav-block thz-dot-nav-'.$id.' tip-'.$tip_poz.$res_class;
$position		= thz_akg('dotn/p',$atts,'centered');
$pxp			= thz_akg('dotn/pxp',$atts,'centered');  
$position		= $position == 'custom' ? $pxp : 'centered';
$effect			= thz_akg('dotn/e',$atts,'slide');
$appear			= thz_akg('dotn/s',$atts,150);
$type_class 	= $type =='indicator' ? ' type-indicator' :' type-icons';

if(!empty($items)):
?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class($class); ?>" data-hide="yes" data-position="<?php echo esc_attr($position) ?>" data-appear="<?php echo esc_attr($appear)?>" data-effect="<?php echo esc_attr($effect) ?>">
    <ul class="thz-dot-nav<?php echo thz_sanitize_class($type_class) ?>">
    	<?php foreach ($items as $item){ 
		
				$title		= thz_akg('title',$item);
				$item_icon 	= thz_akg('icon',$item);
				$item_icon	= $item_icon =='' ? 'fa fa-question' : $item_icon;
				$link 		= thz_akg('link',$item);
				
				if($link['url'] !=''){
					$link_out ='<li>';
					
					$span_class = $type =='indicator' ? 'indicator' : $item_icon;
					$data = '';
						
					$link_class  = 'thz-dot-nav-item';
					
					if (strpos($link['url'], '#') !== false) {
						$link_class .= ' thz-scroll';
						$stop 		= thz_akg('sm/s',$item,'before');
						$distance 	= thz_akg('sm/d',$item,50);
						$duration 	= thz_akg('sm/ed',$item,800);
						$data .=' data-'.esc_attr($stop).'="'.esc_attr($distance).'"  data-duration="'.esc_attr($duration).'"';
					}
					
					$link_out .='<a class="'.thz_sanitize_class($link_class).'" href="'.esc_url( $link['url']).'"';
					$link_out .= ' target="'.esc_attr( $link['target'] ).'" '.$data.'>';
					$link_out .= '<span class="'.thz_sanitize_class($span_class).'"></span>';
					$link_out .= '<span class="thz-dot-nav-tip">'.esc_attr($title).'</span>';
					$link_out .='</a>';
						
					$link_out .='</li>';
					
					echo $link_out;
					
				}		
			} 
		?>
    </ul>
</div><?php endif; ?>