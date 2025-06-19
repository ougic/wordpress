<?php
/**
 * Title: Layout 006
 * Slug: ruby-ecommerce/layout-006
 * Categories: layouts
 */

// Get the path to the JSON file using WordPress's get_template_directory()
$json_path = get_template_directory() . '/assets/juskys_menu_nested.json';

// Read and decode the JSON file
if (file_exists($json_path)) {
    $json_data = file_get_contents($json_path);
    $menu_data = json_decode($json_data, true); // true for associative array

    // Example: Output the menu data for debugging
    // echo '<pre>' . print_r($menu_data, true) . '</pre>';
} else {
    $menu_data = null;
    // echo 'Menu JSON file not found.';
}
?>

<!-- wp:group {"align":"full","className":"superbthemes-navigation-004","style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"var:preset|spacing|superbspacing-small","right":"var:preset|spacing|superbspacing-small"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group alignfull superbthemes-navigation-004" style="border-style:none;border-width:0px;padding-top:20px;padding-right:var(--wp--preset--spacing--superbspacing-small);padding-bottom:20px;padding-left:var(--wp--preset--spacing--superbspacing-small)"><!-- wp:columns {"isStackedOnMobile":false,"align":"wide","className":"superbthemes-navigation-004-columns-wrapper","style":{"border":{"bottom":{"width":"0px","style":"none"}},"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns alignwide is-not-stacked-on-mobile superbthemes-navigation-004-columns-wrapper" style="border-bottom-style:none;border-bottom-width:0px;padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"25%","className":"superbthemes-navigation-004-columns-logo"} -->
<div class="wp-block-column is-vertically-aligned-center superbthemes-navigation-004-columns-logo" style="flex-basis:25%"><!-- wp:site-title {"level":6,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"24px"}},"fontFamily":"fontsecondary"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"superbthemes-navigation-004-columns-nav"} -->
<div class="wp-block-column is-vertically-aligned-center superbthemes-navigation-004-columns-nav" style="flex-basis:50%"><!-- wp:navigation {"textColor":"mono-2","icon":"menu","style":{"spacing":{"blockGap":"var:preset|spacing|superbspacing-small"}},"fontSize":"superbfont-xsmall","layout":{"type":"flex","justifyContent":"center"}} -->

<?php
if ($menu_data) {
    foreach ($menu_data as $category => $subcategories) {
        // Top-level navigation link (category)
        echo '<!-- wp:navigation-link {"label":"' . esc_js($category) . '","url":"#","kind":"custom","isTopLevelLink":true} -->' . "\n";
        if (!empty($subcategories)) {
            echo '<ul class="wp-block-navigation__submenu-container">' . "\n";
            foreach ($subcategories as $subcategory) {
                echo '<!-- wp:navigation-link {"label":"' . esc_js($subcategory['label']) . '","url":"*","kind":"custom"} /-->' . "\n";
            }
            echo "</ul>\n";
        }
        echo '<!-- /wp:navigation-link -->' . "\n";
    }
}
?>


<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"25%","className":"superbthemes-navigation-004-columns-button"} -->
<div class="wp-block-column is-vertically-aligned-center superbthemes-navigation-004-columns-button" style="flex-basis:25%"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/mini-cart {"miniCartIcon":"bag-alt","style":{"typography":{"fontSize":"18px"}}} /-->

<!-- wp:image {"lightbox":{"enabled":false},"id":2251,"width":"28px","height":"28px","scale":"cover","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . "/assets/images/navigation/icon-phone.png");?>" alt="" class="wp-image-2251" style="object-fit:cover;width:28px;height:28px"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->