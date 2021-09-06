<?php
/**
 * @package snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

use Framework\Helper;
use Inc2734\WP_Customizer_Framework\Style;

if ( ! Helper::is_ie() ) {
	return;
}

$accent_color = get_theme_mod( 'accent-color' );
if ( $accent_color ) {
	$styles[] = [
		'selectors'  => [ '.smb-tabs.is-style-line > .smb-tabs__tabs .smb-tabs__tab::after' ],
		'properties' => [ 'color: ' . $accent_color ],
	];

	Style::attach(
		Helper::get_main_style_handle() . '-snow-monkey-blocks',
		$styles
	);
}

Style::extend( 'entry-content', [ '.smb-tab-panel__summary' ] );
