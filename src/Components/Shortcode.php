<?php
/**
 * Created by Hindsight Design
 * Website: http://hindsight.com.au
 * Developer: Christoph Jürgens
 */

namespace RCKSTR\Components;

class Shortcode
{
	/**
	 * Name of Shortcode
	 *
	 * Shortcode tag to include in WordPress content
	 * [] need to be added, like for example [rckstr]
	 *
	 * @access private
	 * @var string $tag Name of shortcode
	 */
	private $tag = 'rckstr';


	/**
	 * Shortcode constructor
	 *
	 * Activates action hooks as soon as the class is initialized
	 */
	public function __construct()
	{
		add_action( 'init', [ $this, 'register' ] );
	}


	/**
	 * Register Shortcode
	 *
	 * Adds shortcode
	 */
	public function register()
	{
		add_shortcode( $this->tag, [ $this, 'displayShortcode' ] );
	}


	/**
	 * Display Shortcode
	 *
	 * Code which gets fired when shortcode gets called
	 *
	 * @param        $params
	 * @param string $content
	 *
	 * @return string
	 */
	public function displayShortcode( $params, $content = '' )
	{
		$output = '';


		return $output;
	}
}