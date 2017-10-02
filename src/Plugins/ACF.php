<?php
/**
 * Created by Hindsight Design
 * Website: http://hindsight.com.au
 * Developer: Christoph Jürgens
 */

namespace RCKSTR\Plugins;


class ACF {

	public function __construct() {

		add_filter('acf/settings/path', [$this, 'setPath']);
		add_filter('acf/settings/dir', [$this, 'setDir']);

		$this->includeACF();
		$this->includeFields();
	}


	private function setPath( $path ) {

		$path = PLUGIN_PATH . '/vendors/acf/';

		return $path;
	}


	private function setDir( $dir ) {

		$dir = PLUGIN_DIR . '/vendors/acf/';

		return $dir;
	}


	private function includeACF() {

		include_once VENDORS_DIR . '/advanced-custom-fields/acf.php';
	}


	private function includeFields() {

		include_once PLUGIN_DIR . '/src/Plugins/acf_fields.php';
	}


	public function hide() {

		define( 'ACF_LITE', true );
	}

}