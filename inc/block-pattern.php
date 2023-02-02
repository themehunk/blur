<?php
/**
 * blur: Block Patterns
 *
 * @since blur 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since blur 1.0
 *
 * @return void
 */
  function blur_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'blur' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'blur' ) ),
		'header'   => array( 'label' => __( 'Headers', 'blur' ) ),
		'query'    => array( 'label' => __( 'Query', 'blur' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'blur' ) ),
		'blur'    => array( 'label' => __( 'blur', 'blur' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since blur 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'blur_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'hero-main',
		'three-col-banner',
		'recent-product',
		'banner',
		'top-rated',
		'aboutus',
		'hero',
		'hero-1',
		'service',
		'ribbon',
		'team',
		'testimonial',
		'pricing',
		'primary-sidebar',
		'sidebar-products',
		'footer-default'
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since blur 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'blur_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'blur/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'blur_register_block_patterns', 9 );