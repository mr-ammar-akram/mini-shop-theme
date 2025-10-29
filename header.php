<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-gray-900 text-white">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" class="text-2xl font-bold">
            <?php bloginfo('name'); ?>
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="md:hidden text-2xl focus:outline-none">
            ☰
        </button>

        <!-- Navigation Menu -->
        <nav id="main-menu" class="hidden md:flex gap-8 text-sm font-medium">

            <?php if (has_nav_menu('primary-menu')) : ?>
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false
                ]);
                ?>
            <?php else : ?>
                <a href="<?php echo home_url(); ?>" class="hover:text-gray-300 transition">Home</a>
                <a href="<?php echo home_url('/shop'); ?>" class="hover:text-gray-300 transition">Shop</a>
                <a href="<?php echo home_url('/contact'); ?>" class="hover:text-gray-300 transition">Contact</a>
            <?php endif; ?>

        </nav>
    </div>

    <!-- Mobile Dropdown Menu -->
    <nav id="mobile-nav" class="hidden flex-col gap-4 bg-gray-800 text-center px-6 py-4 md:hidden text-sm font-medium">

        <?php if (has_nav_menu('primary-menu')) : ?>
            <?php
            wp_nav_menu([
                'theme_location' => 'primary-menu',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'fallback_cb'    => false
            ]);
            ?>
        <?php else : ?>
            <a href="<?php echo home_url(); ?>" class="hover:text-gray-300 transition block">Home</a>
            <a href="<?php echo home_url('/shop'); ?>" class="hover:text-gray-300 transition block">Shop</a>
            <a href="<?php echo home_url('/contact'); ?>" class="hover:text-gray-300 transition block">Contact</a>
        <?php endif; ?>

    </nav>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
            extend: {
                colors: {
                primary: '#2563eb',
                secondary: '#1e293b'
                }
            }
            }
        }
    </script>


    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const mobileNav = document.getElementById('mobile-nav');

        btn.addEventListener('click', () => {
            mobileNav.classList.toggle('hidden');
        });
    </script>
</header>

<main id="site-content" class="container mx-auto px-4 py-8">
