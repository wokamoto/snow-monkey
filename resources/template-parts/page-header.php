<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

use Snow_Monkey\app\Helper;

$header_image = Helper::get_page_header_image_url();

if ( empty( $header_image ) && ! Helper::is_output_page_header_title() ) {
	return;
}
?>

<div
	class="c-page-header js-bg-parallax"
	data-has-content="<?php echo esc_attr( Helper::is_output_page_header_title() ? 'true' : 'false' ); ?>"
	data-has-image="<?php echo esc_attr( empty( $header_image ) ? 'false' : 'true' ); ?>"
	>

	<?php if ( $header_image ) : ?>
		<div class="c-page-header__bgimage js-bg-parallax__bgimage">
			<img src="<?php echo esc_url( $header_image ); ?>" alt="">
		</div>
	<?php endif; ?>

	<?php if ( Helper::is_output_page_header_title() ) : ?>
		<div class="c-container js-bg-parallax__content">
			<div class="c-page-header__content">
				<h1 class="c-page-header__title">
					<?php
					echo wp_kses_post(
						apply_filters(
							'snow_monkey_page_header_title',
							Helper::get_page_title_from_breadcrumbs()
						)
					);
					?>
				</h1>

				<?php if ( is_singular( 'post' ) ) : ?>
					<div class="c-page-header__meta">
						<?php Helper::get_template_part( 'template-parts/content/entry-meta' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
