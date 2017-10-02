<?php
/**
 * Created by Hindsight Design
 * Website: http://hindsight.com.au
 * Developer: Christoph Jürgens
 */

namespace RCKSTR\Components;


class CustomPostType {

	private $args;

	private $post_type;

	public function __construct($singular, $plural) {

		$this->post_type = $singular;

		$plural   = ucfirst( $plural );
		$singular = ucfirst( $singular );

		$labels = [
			'name'               => _x( $plural, 'post type general name' ),
			'singular_name'      => _x( $singular, 'post type singular name' ),
			'menu_name'          => _x( $plural, 'admin menu' ),
			'name_admin_bar'     => _x( $singular, 'add new on admin bar' ),
			'add_new'            => _x( 'Add New', $singular ),
			'add_new_item'       => __( 'Add New ' . $singular ),
			'new_item'           => __( 'New ' . $singular ),
			'edit_item'          => __( 'Edit ' . $singular ),
			'view_item'          => __( 'View ' . $singular ),
			'view_items'         => __( 'View ' . $plural ),
			'all_items'          => __( 'All ' . $plural ),
			'search_items'       => __( 'Search ' . $plural ),
			'parent_item_colon'  => __( 'Parent ' . $plural . ':' ),
			'not_found'          => __( 'No ' . $plural . ' found.' ),
			'not_found_in_trash' => __( 'No ' . $plural . ' found in Trash.' )
		];

		$this->args = [
			'label'              => __( $plural, '' ),
			'labels'             => $labels,
			'description'        => __( 'Description.' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-admin-post',
			'query_var'          => true,
			'rewrite'            => [ 'slug' => $singular ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5, // below post
			'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ]
		];

		add_action( 'init', [ $this, 'create' ] );
	}


	public function create() {

		register_post_type( $this->post_type, $this->args );
	}


	public function setDescription( $value ) {

		$this->args['description'] = (string) $value;
	}


	public function isPublic( $value ) {

		$this->args['public'] = (boolean) $value;
	}


	public function isPubliclyQuerable( $value ) {

		$this->args['publicly_queryable'] = (boolean) $value;
	}


	public function showUi( $value ) {

		$this->args['show_ui'] = (boolean) $value;
	}


	public function showInMenu( $value ) {

		$this->args['show_in_menu'] = (boolean) $value;
	}


	public function setMenuIcon( $value ) {

		$this->args['menu_icon'] = (string) $value;
	}


	public function setQueryVar( $value ) {

		$this->args['query_var'] = (boolean) $value;
	}


	public function setCapabilityType( $value ) {

		$this->args['capability_type'] = (string) $value;
	}

	public function hasArchive( $value ) {

		$this->args['has_archive'] = (boolean) $value;
	}


	public function isHierachical( $value ) {

		$this->args['hierarchical'] = (boolean) $value;
	}


	public function setMenuPosition( $value ) {

		$this->args['menu_position'] = (int) $value;
	}


	public function supports( $value ) {

		$this->args['supports'] = (array) $value;
	}

	public function debug(){

		return $this->args;
	}


}