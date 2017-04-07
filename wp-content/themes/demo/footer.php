</div>
  <footer>
      <div class="wrap-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="text-center">
              <strong> Địa chỉ: </strong>
              <b><span>  135/1/58 Nguyễn Hữu Cảnh, phường 22, quận Bình Thạnh, thành phố Hồ Chí Minh. </span> </b>
            </div>
            <div class="text-center footer-phone">
              <strong>Số điện thoại:</strong>&nbsp;
              <b><span> (08) 7160 0789</span> </b>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="wrap-follow">
              <div class="text-center footer-wrap-follow-text">
                FOLLOW US
              </div>
              <div class="text-center footer-wrap-icon">
                <img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/ic-facebook.png">
                <img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/ic-google.png">
                <img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/ic-twiter.png">
              </div>
              <div class="text-center footer-wrap-text">
                <b> Copyright JINN 2015 All Rights Reserved </b>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/vendor/bootstrap.min.js"></script>
  <!-- <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/main.js"></script> -->
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/slider/slick.js"></script> 
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/slider/slider-footer.js"></script>
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/main.js"></script>
  <script type="text/javascript">
  var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
  var page = 2;
  jQuery(function($) {
    $('body').on('click', '.see-more', function() {
      var category = document.getElementById('category').innerHTML;
      var data = {
        'action': 'load_posts_by_ajax',
        'page': page,
        'category' : category,
        'security': '<?php echo wp_create_nonce("load_more_posts_policy"); ?>'
      };

      $.post(ajaxurl, data, function(response) {
        $('.wrap-item').append(response);
        page++;
      });
    });
  });
</script>
</body>
</html>