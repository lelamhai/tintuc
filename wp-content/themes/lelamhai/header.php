<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="<?php echo get_bloginfo("template_directory"); ?>/asset/css/custome.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900">
  <link rel="stylesheet" href="<?php echo get_bloginfo("template_directory"); ?>/asset/css/style.css">
  <link rel="stylesheet" href="<?php echo get_bloginfo("template_directory"); ?>/asset/css/reponsive.css">
  <!-- add css, js -->
  <link rel="stylesheet" href="<?php echo get_bloginfo("template_directory"); ?>/asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_bloginfo("template_directory"); ?>/asset/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo("template_directory"); ?>/asset/css/slider/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo("template_directory"); ?>/asset/css/slider/slick-theme.css">
  <!-- end -->
  <script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/bootstrap.js"></script>  
  <script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/news.js"></script>
  <script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/asset/js/global.js"></script>
<?php wp_head(); ?>
</head>
<body>
<!-- <div class="top-header">
      <div class="container">
        <div class="pull-left item-dropdown">
          <div class="dropdown custom-select menu">
            <input type="hidden" name="en"/>
            <button type="button" id="en" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">ENG</span><span class="arrow"></span></button>
            <ul aria-labelledby="type-project" class="dropdown-menu">
              <li><a href="" data-value="en">ENG</a></li>
              <li><a href="" data-value="vi">VI</a></li>
            </ul>
          </div>
        </div>
        <div class="pull-left item-dropdown">
          <div class="dropdown custom-select menu">
            <input type="hidden" name="vnd"/>
            <button type="button" id="vnd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">VND</span><span class="arrow"></span></button>
            <ul aria-labelledby="type-project" class="dropdown-menu">
              <li><a href="" data-value="usd">USD</a></li>
              <li><a href="" data-value="vnd">VND</a></li>
            </ul>
          </div>
        </div>
        <div class="pull-right item-dropdown login"><a href="" data-toggle="modal" data-target="#login">Sign In</a></div>
        <div class="pull-right item-dropdown user">
          <div class="dropdown custom-select menu">
            <input type="hidden" name="name"/>
            <button type="button" id="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">DAT</span><span class="arrow"></span></button>
            <ul aria-labelledby="type-project" class="dropdown-menu">
              <li><a href="" data-value="1">Basic Info</a></li>
              <li><a href="" data-value="2">Purchased Properties</a></li>
              <li><a href="" data-value="3">Notifications</a></li>
              <li><a href="" data-value="4">Save homes</a></li>
              <li><a href="" data-value="6">Settings</a></li>
              <li><a href="" data-value="7">Sign Out</a></li>
            </ul>
          </div>
        </div>
        <div class="pull-right item-dropdown"><a class="notify"><span class="icon-notify icon"></span><span class="count">3</span></a></div>
        <div class="pull-right item-dropdown"><a class="notify"><span class="icon-home icon"></span><span class="count">3</span></a></div>
      </div>
    </div>
    <div class="header header-site"> -->
    <header>
    <!-- <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
              <ul class="wrap-top-left">
                <li>
                  <select>
                    <option>
                      ENG
                    </option>
                    <option>
                      VI
                    </option>
                  </select>
                </li>
                <li>
                  <select>
                    <option>
                      USD
                    </option>
                    <option>
                      VND
                    </option>
                  </select>
                </li>
              </ul>
          </div>
          <div class="col-md-6">9</div>
          <div class="col-md-4">
            
          </div>
        </div>
      </div>  
    </div> -->
    <div class="header cus-header header-site ">
      <nav class="navbar cus-navbar navbar-default cus-navbar-default">
        <div class="container">
          <div class="navbar-header no-margin-left cus-no-margin-left no-margin-right cus-no-margin-right">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle avigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img class="img-responsive" src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/logo.png" alt="Jinn logo" /></a>
          </div>
          <div id="navbar" class="main-menu navbar-collapse collapse no-margin-left no-margin-right">
            <ul class="nav navbar-nav navbar-right top-menu cus-top-menu no-margin-right no-margin-left">
              <li><a href="/projects" class=""> Dự án</a></li>

              <li><a href="/houses/for-sale" class=""> Cần Bán</a></li>

              <li><a href="/houses/for-rent" class=""> Cho thuê</a></li>

              <li><a href="/contact" class=""> Liên hệ</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="clear"></div>
    </div>
  </header>
  <div id="main">