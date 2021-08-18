<?php
/**
 * @var string $the_content
 */

$fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];

$thumbnails = fw_ext_portfolio_get_gallery_images();

$captions = array();
if ( ! empty( $thumbnails ) ) :
	?>
	<section class="wrap-nivoslider theme-default">
		<div id="slider" class="nivoslider">
			<?php foreach ( $thumbnails as $thumbnail ) :
				$attachment = get_post( $thumbnail['attachment_id'] );

				$captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;

				$image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
				?>
				<img src="<?php echo esc_attr($image) ?>"
				     class="nivoslider-image"
				     alt="<?php echo esc_attr($attachment->post_title) ?>"
				     title="#nivoslider-caption-<?php echo esc_attr($attachment->ID) ?>"
				     width="<?php echo esc_attr($fw_ext_projects_gallery_image['width']) ?>"
					/>
			<?php endforeach ?>
		</div>
		<div class="nivo-html-caption">
			<?php foreach ( $captions as $attachment_id => $post_title ) : ?>
				<div
					id="nivoslider-caption-<?php echo esc_attr($attachment_id) ?>"><?php echo $post_title ?></div>
			<?php endforeach ?>
		</div>
	</section>
<?php endif ?>
<?php
echo $the_content;
?>