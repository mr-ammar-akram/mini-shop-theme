// assets/js/main.js
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
