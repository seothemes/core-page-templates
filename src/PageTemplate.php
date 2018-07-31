<?php
/**
 * Unregister page templates through configuration.
 *
 * @package   D2\Core
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright 2018, Craig Simpson
 * @license   MIT
 */

namespace D2\Core;

/**
 * Unregister page templates through configuration.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use D2\Core\PageTemplate;
 *
 * $d2_page_templates = [
 *     PageTemplate::UNREGISTER => [
 *         PageTemplate::ARCHIVE,
 *         PageTemplate::BLOG,
 *     ],
 * ];
 *
 * return [
 *     PageTemplate::class => $d2_page_templates,
 * ];
 * ```
 *
 * @package D2\Core
 */
class PageTemplate extends Core {

	const UNREGISTER = 'unregister';
	const ARCHIVE    = 'page_archive.php';
	const BLOG       = 'page_blog.php';

	/**
	 * Add filter to unregister page templates.
	 *
	 * @return void
	 */
	public function init() {
		if ( array_key_exists( self::UNREGISTER, $this->config ) ) {
			add_filter( 'theme_page_templates', [ $this, 'remove_templates' ] );
		}
	}

	/**
	 * Unregister page templates through configuration.
	 *
	 * @param array $templates Registered page templates.
	 *
	 * @return array
	 */
	public function remove_templates( $templates ) {
		return array_diff_key( $templates, array_flip( $this->config[ self::UNREGISTER ] ) );
	}
}
