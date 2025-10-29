<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

<section class="bg-gray-100 px-6 py-20 text-center">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">
            Quality Products for Your Everyday Life
        </h1>
        <p class="text-lg text-gray-600 mb-6">
            Discover premium accessories, lifestyle essentials, and tech you can trust.
        </p>
        <a href="<?php echo wc_get_page_permalink('shop'); ?>"
           class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg text-lg hover:bg-blue-700 transition">
            Shop Now
        </a>
    </div>
</section>

<section class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">Featured Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <?php
            $featured_products = new WP_Query([
                'post_type'      => 'product',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC'
            ]);

            if ($featured_products->have_posts()):
                while ($featured_products->have_posts()): $featured_products->the_post();
                    $product = wc_get_product(get_the_ID());
            ?>

            <div class="border p-4 rounded-lg shadow-sm hover:shadow-lg transition">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded']); ?>
                    <?php endif; ?>
                </a>

                <h3 class="text-xl font-semibold mt-4 text-gray-900"><?php the_title(); ?></h3>

                <p class="text-blue-600 font-bold mt-2">
                    <?php echo $product->get_price_html(); ?>
                </p>

                <a href="<?php the_permalink(); ?>"
                   class="mt-4 block text-center bg-gray-900 text-white py-2 rounded hover:bg-gray-700 transition">
                    View Product
                </a>
            </div>

            <?php endwhile;
                wp_reset_postdata();
            else: ?>

            <p class="text-center text-gray-500">No products found.</p>

            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
