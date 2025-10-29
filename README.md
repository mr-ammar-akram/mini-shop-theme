# Mini Shop Complete — Theme

This theme is a lightweight custom WooCommerce-ready WordPress theme prepared for a technical assessment.

## What's included
- Custom theme files (header, footer, front page)
- WooCommerce single product override
- Programmatically created ACF field group (if ACF active)
- Auto-creation of pages and 3 demo products on theme activation
- Mailchimp server-side integration (API key & List ID in Customizer)
- Tailwind CSS production build setup (npm scripts)

## How to use
1. Copy the `mini-shop-complete` folder into `wp-content/themes/`.
2. Run `npm install` in the theme folder and then `npm run build` to generate `assets/css/main.css`.
3. Activate the theme. Pages and demo products will be created on activation.
4. Go to Appearance → Customize → Mailchimp Settings and add your Mailchimp API key and List ID.
5. Test the newsletter signup in the footer.

## Notes
- Mailchimp requires a valid API key (format: key-dc, e.g. xxxxx-us5) and a list/audience ID.
- ACF fields are registered programmatically only if ACF is active.


## Updates
- Added Settings -> MiniShop Options to store Mailchimp API key and List ID.
- Auto-created 'Primary Menu' and assigned default pages.
- Added placeholder images and automatically assigned them as featured images to demo products.
- Included a compiled `assets/css/main.css` so you don't need to run npm to test the theme.