<article class="border rounded-lg shadow-sm p-4 hover:shadow-lg transition">
    <a href="<?php the_permalink(); ?>">
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded']); ?>
        <?php endif; ?>
    </a>

    <h2 class="text-lg font-semibold mt-4">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>

    <p class="text-blue-600 font-bold mb-3"><?php echo wc_price( wc_get_price_to_display( wc_get_product() ) ); ?></p>

    <a href="<?php the_permalink(); ?>" 
       class="block text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
        View Product
    </a>
</article>
