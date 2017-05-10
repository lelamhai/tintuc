</div>
  
   <div class="footer-site">
    <div class="container-fluid">

       <div class="col-md-4 text-center col-md-offset-1 logo-footer">
            <a href="/"><img style="display:inline-block;" src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/jinn-logo-footer.png" class="jinn-logo-footer"></a>
        </div>

         <div class="col-md-5 contact-footer">
           <div class="col-md-12">
                     <div class="row">
                        <div class="col-xs-5 col-sm-2  col-md-3  col-sm-offset-2 col-md-offset-1 text-right">
                            <strong> Địa chỉ:  </strong>
                        </div>
                        <div class="col-xs-7 col-sm-6 col-md-5 address-text">
                            <span>  135/1/58 Nguyễn Hữu Cảnh, phường 22, quận Bình Thạnh, thành phố Hồ Chí Minh. </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-xs-5 col-sm-2 col-md-3 col-sm-offset-2 col-md-offset-1 text-right">
                            <strong>Điện thoại:</strong>
                        </div>
                        <div class="col-xs-7 col-sm-6 col-md-5 phone-text">
                            <span style="white-space: nowrap;">(08) 71 060 789</span>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-2 footer-bottom social-footer">
            <div class="text-center">
                <div class="title-fu">folow us</div>
                <div class="social">
                    <a href="" class="facebook"><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/ic-facebook.png?v=0.8.1" align="footer info icon"></a>
                    <a href="" class="google"><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/ic-google.png?v=0.8.1" align="footer info icon"></a>
                    <a href="" class="twiter"><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/ic-twiter.png?v=0.8.1" align="footer info icon"></a>
                </div>
                <div class="footer-product-of">
                    <img style="display:inline-block;" src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/jinn-text-footer.png?v=0.8.1" class="jinn-text-logo">
                    <span>, một sản phẩm của Jinn Tech</span>
                </div>
                <hr class="footer-seperator">
                <div class="copyright">Copyright JINN 2015 All Rights Reserved  </div>
            </div>
        </div>
    </div>
    <div class="tricky-border-1 visible-md visible-lg">

    </div>
    <div class="tricky-border-2 visible-md visible-lg">
    </div>
</div> 
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/vendor/bootstrap.min.js"></script>
  <!-- <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/main.js"></script> -->
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/slider/slick.js"></script> 
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/slider/slider-footer.js"></script>
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/slider_top.js"></script>
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/main.js"></script>
  <script src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/news.js"></script>
  <script type="text/javascript">

  var page = 4;
  jQuery(function($) {
    $('body').on('click', '.see-more', function() {
      var category = document.getElementById('category').innerHTML;
      var data = {
        'action': 'load_posts_by_ajax',
        'page': page,
        'category' : category,
        'security': '<?php echo wp_create_nonce("load_more_posts_policy"); ?>'
      };
      
      $.post("<?php echo admin_url( 'admin-ajax.php' ); ?>", data, function(response) {
        $('.wrap-item').append(response);
        page++;
      });
    });
  });
</script>
</body>
</html>