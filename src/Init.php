<?php
/**
 * The core plugin class.
 *
 * This is used to define all necessary plugin components
 *
 * @since      1.0.0
 * @package    Rockstar
 * @author     Christoph Jürgens
 */

namespace RCKSTR;

use RCKSTR\Core\Activator;
use RCKSTR\Core\Deactivator;

use RCKSTR\Components\CustomPostType;

class Init
{
	/**
	 * Construct class to activate actions and hooks as soon as the class is initialized
	 * Call method to initialise necessary classes
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function __construct()
	{
		$this->loadComponents();
	}


	/**
	 * Gets fired during plugin activation.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function activate()
	{
		Activator::activate();
	}


	/**
	 * Gets fired during plugin deactivation.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function deactivate()
	{
		Deactivator::deactivate();
	}

	/**
	 * Initialises necessary components
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function loadComponents()
	{
		$test = new CustomPostType('test', 'tests');
		//$test->setMenuIcon('dashicons-editor-ol');
	}
}

