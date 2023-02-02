<?php
/**
 * Sidebar Products
 * 
 * slug: sidebar-products
 * title: Sidebar Products
 * categories: blur
 */

return array(
    'title'      =>__( 'Sidebar Products', 'blur' ),
    'categories' => array( 'blur' ),
    'content'    => '<!-- wp:group {"className":"wp-block-widget-area wp-block-sidebar"} -->
<div class="wp-block-group wp-block-widget-area wp-block-sidebar"><!-- wp:group {"className":"wp-block-widget"} -->
<div class="wp-block-group wp-block-widget"><!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"20px","left":"0px"}}}} -->
<h2 id="search-products" style="margin-top:0px;margin-right:0px;margin-bottom:20px;margin-left:0px">Search Products</h2>
<!-- /wp:heading -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search products…","buttonText":"Search","buttonUseIcon":true,"query":{"post_type":"product"},"backgroundColor":"accent"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"wp-block-widget"} -->
<div class="wp-block-group wp-block-widget"><!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"20px","left":"0px"}}}} -->
<h2 id="categories" style="margin-top:0px;margin-right:0px;margin-bottom:20px;margin-left:0px">Categories</h2>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-categories {"isHierarchical":false} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"wp-block-widget"} -->
<div class="wp-block-group wp-block-widget"><!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"Filter by price"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading -->
<h2>Filter by price</h2>
<!-- /wp:heading -->

<!-- wp:woocommerce/price-filter {"heading":""} -->
<div class="wp-block-woocommerce-price-filter is-loading" data-showinputfields="true" data-showfilterbutton="false" data-heading="" data-heading-level="3"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
<!-- /wp:woocommerce/price-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"wp-block-widget  wp-filter-by-size"} -->
<div class="wp-block-group wp-block-widget wp-filter-by-size"><!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"Filter by size"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading -->
<h2>Filter by size</h2>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":2,"heading":""} -->
<div class="wp-block-woocommerce-attribute-filter is-loading" data-attribute-id="2" data-show-counts="true" data-query-type="or" data-heading="" data-heading-level="3"><span aria-hidden="true" class="wc-block-product-attribute-filter__placeholder"></span></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"wp-block-widget wp-filter-by-color"} -->
<div class="wp-block-group wp-block-widget wp-filter-by-color"><!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"Filter by Color"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading -->
<h2>Filter by Color</h2>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":1,"showCounts":false,"selectType":"single","heading":""} -->
<div class="wp-block-woocommerce-attribute-filter is-loading" data-attribute-id="1" data-show-counts="false" data-query-type="or" data-heading="" data-heading-level="3" data-select-type="single"><span aria-hidden="true" class="wc-block-product-attribute-filter__placeholder"></span></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
',
);