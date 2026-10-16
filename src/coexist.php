<?php
/**
 * Keeps PMPro Cron Management from loading alongside WP Crontrol, which declares the same namespace and functions.
 */

namespace Crontrol;

const WP_CRONTROL_PLUGIN = 'wp-crontrol/wp-crontrol.php';

/**
 * Whether the upstream WP Crontrol plugin is active on this site or network.
 */
function wp_crontrol_is_active(): bool {
	if ( in_array( WP_CRONTROL_PLUGIN, (array) get_option( 'active_plugins', array() ), true ) ) {
		return true;
	}

	if ( is_multisite() ) {
		$network = (array) get_site_option( 'active_sitewide_plugins', array() );

		if ( isset( $network[ WP_CRONTROL_PLUGIN ] ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Shows an admin notice explaining why PMPro Cron Management is not running.
 */
function show_wp_crontrol_active_notice(): void {
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	printf(
		'<div class="notice notice-warning"><p>%s</p></div>',
		esc_html__( 'PMPro Cron Management is not running because WP Crontrol is active. Deactivate one of the two plugins; they cannot run together.', 'pmpro-cron-management' )
	);
}
