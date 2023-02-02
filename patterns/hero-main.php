<?php
/**
 * Hero Main Section
 * 
 * slug: hero-main
 * title: Hero main Section
 * categories: blur
 */
$strings = array(
    'title'    => __( 'blur Theme', 'blur' ),
    'subtitle'    => __( 'OPPURTUNITIES ARE WAITING FOR YOU', 'blur' ),
    'description' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua.', 'blur' ),
    'button'   => __( 'Learn More', 'blur' ),
);

return array(
    'title'      =>__( 'Hero Main Section', 'blur' ),
    'categories' => array( 'blur' ),
    'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"width":"0px","style":"none"}}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-accent-background-color has-background" style="border-bottom-style:none;border-bottom-width:0px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center" style="padding-top:2rem;padding-bottom:2rem"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":102,"height":436,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"0px"}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border"><img src="' . esc_url( BLUR_URL . 'assets/images/').'hero-center.png" alt="blur" class="wp-image-102" style="border-radius:0px" height="436"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"right","style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"62px"},"elements":{"link":{"color":{"text":"accent"}}}},"textColor":"background"} -->
<h2 class="has-text-align-right has-background-color has-text-color has-link-color" style="font-size:62px;font-style:normal;font-weight:600">MENS COLLECTION</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"right","style":{"typography":{"fontSize":"22px"}},"textColor":"background"} -->
<p class="has-text-align-right has-background-color has-text-color" style="font-size:22px">Winter is coming, so take a look.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right","orientation":"horizontal"},"style":{"spacing":{"blockGap":"0","margin":{"top":"35px"}}}} -->
<div class="wp-block-buttons" style="margin-top:35px"><!-- wp:button {"backgroundColor":"background","textColor":"foreground","style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background wp-element-button" style="border-radius:0px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">SHOP NOW</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
);
