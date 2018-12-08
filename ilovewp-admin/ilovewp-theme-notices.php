<?php
/**
 * --------------------------------------------
 * Enqueue scripts and styles for the backend.
 *
 * @since Podcast 1.0.2
 * --------------------------------------------
 */

if ( ! function_exists( 'podcast_scripts_admin' ) ) {
	/**
	 * Enqueue admin styles and scripts
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function podcast_scripts_admin( $hook ) {

		// Styles
		wp_enqueue_style(
			'podcast-style-admin',
			get_template_directory_uri() . '/ilovewp-admin/css/ilovewp_theme_settings.css',
			'', ILOVEWP_VERSION, 'all'
		);
	}
}
add_action( 'admin_enqueue_scripts', 'podcast_scripts_admin' );

/*
** Notice after Theme Activation and Update.
*/
function podcast_activation_notice() {

	$screen = get_current_screen();

	if ( $screen->id == 'appearance_page_podcast-doc' ) {
		return;
	}

	$theme_data	 = wp_get_theme();

	echo '<div class="notice notice-success podcast-activation-notice">';
	
		echo '<h1>';
			/* translators: %s theme name */
			printf( esc_html__( 'Welcome to %s', 'podcast' ), esc_html( $theme_data->Name ) );
		echo '</h1>';

		echo '<p>';
			/* translators: %1$s: theme name, %2$s link */
			printf( __( 'Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our <a href="%2$s">Welcome page</a>', 'podcast' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=podcast-doc' ) ) );
		echo '</p>';

		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=podcast-doc' ) ) .'" class="button button-primary button-hero">';
			/* translators: %s theme name */
			printf( esc_html__( 'Get started with %s', 'podcast' ), esc_html( $theme_data->Name ) );
		echo '</a></p>';

	echo '</div>';
}