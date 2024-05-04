
<?php
/*
Plugin Name: Proxidize Product Sync
Description: Fetches products from a remote API and stores them in WooCommerce.
Version: 3.0
Author: hamza aboras
*/


function searchFormShortcode($atts) {
    ob_start(); 
    ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" style = "text-align: -webkit-center;">
        <input type="hidden" name="action" value="proxidize_search_products">
        <input type="text" name="proxidize_keyword" placeholder="Search products..." required>
        <button type="submit" style = "margin-top: 10px;">Search</button>
    </form>
    <?php
    if (!empty($_GET['proxidize_search'])) {
        $keyword = sanitize_text_field($_GET['proxidize_search']);
        echo displayProducts($keyword);
    }

    return ob_get_clean();
}

add_shortcode('proxidize_search', 'searchFormShortcode');

function proxidize_handle_search_redirect() {
    if (!empty($_POST['proxidize_keyword'])) {
        $keyword = sanitize_text_field($_POST['proxidize_keyword']);
        $redirect_url = add_query_arg([
            's' => $keyword,
            'post_type'=>'product'
        ], home_url());

        savePorductsToWoo($keyword);
        wp_redirect($redirect_url);
        exit;
    }
}

add_action('admin_post_proxidize_search_products', 'proxidize_handle_search_redirect');
add_action('admin_post_nopriv_proxidize_search_products', 'proxidize_handle_search_redirect'); 

function savePorductsToWoo($keyword) {
    $data = fetchProducts($keyword);
    if (!empty($data['products'])) {
        foreach ($data['products'] as $product) {
            insertProduct($product);
        }
    }
}

function fetchProducts($keyword) {
    $response = wp_remote_get("http://e1.proxidize.com:5500/search?query={$keyword}");
    if (is_wp_error($response)) {
        return;
    }
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    return $data;
}

function insertProduct($product) {
    $productID = wc_get_product_id_by_sku($product['name']);
    if (!$productID) {
        $newProduct = new WC_Product_Simple();
        $newProduct->set_name($product['name']);
        $newProduct->set_regular_price($product['price']);
        $newProduct->set_stock_status($product['in_stock'] ? 'instock' : 'outofstock');
        $newProduct->set_sku($product['name']);
        $productID = $newProduct->save();
        $productSlugs = createWoocommerceProductCategories($product['category']);
        wp_set_object_terms($productID, $productSlugs, 'product_cat', false);
    }
}

function createWoocommerceProductCategories($categories) {

    $categoriesList = explode(';;',$categories);
    $categoriesToAdd = array();
    $slugs = array();
    foreach($categoriesList as $category){
        $categoriesToAdd[$category] = str_replace(' ','-',$category);
        $slugs[] = $categoriesToAdd[$category];
    }
    foreach ($categoriesToAdd as $name => $slug) {
        if (!term_exists($slug, 'product_cat')) {
            wp_insert_term($name,'product_cat',array('description'=> '','slug' => $slug));
        }
    }
    return $slugs;
}