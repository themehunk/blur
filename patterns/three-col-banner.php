<?php
/**
 * Three Col Banner Section
 * 
 * slug: three-col-banner
 * title: Three Col Banner
 * categories: blur
 */

return array(
    'title'      =>__( 'Hero Section', 'blur' ),
    'categories' => array( 'blur' ),
    'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"bottom":{"width":"0px","style":"none"}}},"backgroundColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background-background-color has-background" style="border-bottom-style:none;border-bottom-width:0px;margin-top:0;margin-bottom:0;padding-top:2.5rem;padding-bottom:2.5rem"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":61,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="' . esc_url( BLUR_URL . 'assets/images/').'ab.jpg" alt="" class="wp-image-61"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":62,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="' . esc_url( BLUR_URL . 'assets/images/').'ab.jpg" alt="" class="wp-image-62"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":63,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'. esc_url( BLUR_URL . 'assets/images/').'ab.jpg" alt="" class="wp-image-63"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
);



