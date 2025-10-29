<?php
defined( 'ABSPATH' ) || exit;
global $product;
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="product-gallery">
      <?php
        woocommerce_show_product_images();
      ?>
    </div>

    <div class="product-summary">
      <?php
        do_action( 'woocommerce_single_product_summary' );
      ?>

      <?php
        if ( function_exists( 'get_field' ) ) {
            $material = get_field( 'product_material', get_the_ID() );
            $shipping_note = get_field( 'product_shipping_note', get_the_ID() );
            if ( $material ) {
                echo '<div class="mt-4"><strong>Material:</strong> ' . esc_html( $material ) . '</div>';
            }
            if ( $shipping_note ) {
                echo '<div class="mt-2 text-sm text-gray-600"><strong>Shipping Note:</strong> ' . esc_html( $shipping_note ) . '</div>';
            }
        } else {
            $mat = get_post_meta(get_the_ID(),'product_material',true);
            $ship = get_post_meta(get_the_ID(),'product_shipping_note',true);
            if ($mat) echo '<div class="mt-4"><strong>Material:</strong> ' . esc_html( $mat ) . '</div>';
            if ($ship) echo '<div class="mt-2 text-sm text-gray-600"><strong>Shipping Note:</strong> ' . esc_html( $ship ) . '</div>';
        }
      ?>

      <!-- Add to cart printed via hooks -->
    </div>
  </div>

  <div class="product-tabs mt-8">
    <?php woocommerce_output_product_data_tabs(); ?>
  </div>
</div>
