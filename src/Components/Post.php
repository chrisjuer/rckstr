<?php
/**
 * Created by Hindsight Design
 * Website: http://hindsight.com.au
 * Developer: Christoph Jürgens
 */

namespace RCKSTR\Components;


class Post {
	/**
	 * Parameters for query to retrieve featured products
	 *
	 * @var array
	 */
	private $args = [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => - 1

	];


	/**
	 * Retrive array of post objects
	 *
	 * @access public
	 * @return array
	 */
	public function retrive() {
		return get_posts( $this->args );
	}


	/**
	 * Configure the post type for query
	 *
	 * @access public
	 *
	 * @param $post_type string
	 */
	public function setPostType( $post_type ) {

		$this->args['post_type'] = $post_type;
	}


	/**
	 *Configure the order for query
	 *
	 * @access public
	 *
	 * @param $order string
	 */
	public function setOrder( $order ) {

		$this->args['order'] = $order;
	}


	/**
	 * Configure orderby for query
	 *
	 * @access public
	 *
	 * @param $order_by string
	 */
	public function setOrderBy( $order_by ) {

		$this->args['orderby'] = $order_by;
	}


	/**
	 * Exclude post IDs from query
	 *
	 * @access public
	 *
	 * @param $exclude array
	 */
	public function setExclude( $exclude ) {

		$this->args['exclude'] = $exclude;
	}


	/**
	 * @access public
	 *
	 * @param $post_status string
	 */
	public function setPostStatus( $post_status ) {

		$this->args['post_status'] = $post_status;
	}


	/**
	 * Preconfigured static methods
	 */

	/**
	 * Retrive featured products from WooCommerce
	 *
	 * @var     array Array of product objects
	 * @return  array
	 * @access  public
	 */
	public static function getFeaturedProducts() {
		$args = [
			'post_type' => 'product',
			'tax_query' => [
				[
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
					'operator' => 'IN'
				],
			],

		];

		return get_posts( $args );
	}
}