</main>
<footer class="bg-gray-900 text-white mt-10">
    <div class="container mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-6">

        <div>
            <h3 class="font-bold mb-3"><?php bloginfo('name'); ?></h3>
            <p class="text-sm">Your trusted source for premium products.</p>
        </div>

        <div>
            <h3 class="font-bold mb-3">Quick Links</h3>
            <ul class="text-sm space-y-2">
                <li><a href="<?php echo home_url(); ?>" class="hover:underline">Home</a></li>
                <li><a href="<?php echo home_url('/shop'); ?>" class="hover:underline">Shop</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>" class="hover:underline">Contact</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-bold mb-3">Newsletter</h3>
            <form id="mini-newsletter-form" class="flex gap-2 newsletter-wrap">
                <input type="email" name="email" placeholder="Email Address" class="flex-1 px-3 py-2 rounded text-black" required>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">
                    Join
                </button>
            </form>
            <div class="mini-newsletter-message mt-2"></div>
        </div>
    </div>
    <div class="text-center py-4 text-sm bg-gray-800">
        © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
    </div>
</footer>

<script>
(function($){
  $(document).ready(function(){
    $('#mini-newsletter-form').on('submit', function(e){
      e.preventDefault();
      const $form = $(this);
      const email = $form.find('input[name="email"]').val();
      const nonce = mscData.nonce;

      $form.find('button[type="submit"]').prop('disabled', true).text('Sending...');

      $.ajax({
        url: mscData.ajax_url,
        method: 'POST',
        data: {
          action: 'msc_mailchimp_signup',
          email: email,
          nonce: nonce
        },
        success: function(resp){
          if (resp.success) {
            $form.closest('.newsletter-wrap').find('.mini-newsletter-message').html('<div class="p-3 bg-green-100 text-green-800 rounded">' + resp.data.message + '</div>');
            $form[0].reset();
          } else {
            $form.closest('.newsletter-wrap').find('.mini-newsletter-message').html('<div class="p-3 bg-red-100 text-red-800 rounded">Error: ' + (resp.data && resp.data.message ? resp.data.message : 'Unknown') + '</div>');
          }
        },
        error: function(xhr){
          let msg = 'An error occurred.';
          if (xhr.responseJSON && xhr.responseJSON.data && xhr.responseJSON.data.message) msg = xhr.responseJSON.data.message;
          $form.closest('.newsletter-wrap').find('.mini-newsletter-message').html('<div class="p-3 bg-red-100 text-red-800 rounded">Error: ' + msg + '</div>');
        },
        complete: function(){
          $form.find('button[type="submit"]').prop('disabled', false).text('Join');
        }
      });
    });
  });
})(jQuery);
</script>

<?php wp_footer(); ?>
</body>
</html>
