<?php
/**
 * Class to add a very simple customizer control for outputting an html string.
 *
 * @package   PattonWebz Customizer Controls
 * @version   0.1.0
 * @since     0.1.0
 * @author    William Patton <will@pattonwebz.com>
 * @copyright Copyright (c) 2018-2019, William Patton
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace PattonWebz\Customizer\Control;

/**
 * A class used to output a simple HTML block that can be used to provide
 * additonal information or context to something in the customizer.
 */
class InfoControl extends \WP_Customize_Control {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  WP 3.4.0
	 * @since  0.1.0
	 * @var    string
	 */
	public $type = 'info_display';

	/**
	 * A string of html that we want rendered.
	 *
	 * @since  0.1.0
	 * @var    string
	 */
	public $html = '';

	/**
	 * A string to use as the title.
	 *
	 * @var string
	 */
	public $title = '';

	/**
	 * Flag to determine if we output wrapper markup or not.
	 *
	 * @since 0.1.0
	 * @var bool
	 */
	public $override_wrapper = false;

	/**
	 * Renders a basic info panel, optionally with some wrappers.
	 *
	 * @since  0.1.0
	 * @access public
	 * @return void
	 */
	protected function render_content() {
		if ( $this->override_wrapper ) {
			$html = $this->html;
		} else {
			ob_start();
			?>
			<div class="custom-info-control">
				<?php
				if ( $this->title ) {
					?>
					<h1><?php echo $this->title; // WPCS: XSS ok. ?></h1>
					<?php
				}
				?>
				<p><?php echo $this->html; // WPCS: XSS ok. ?></p>
			</div>
			<?php
			$html = ob_get_clean();
		}
		echo wp_kses_post( $html );
	}
}
