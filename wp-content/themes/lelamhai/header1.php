<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900">
<link rel="stylesheet" href="<?php echo get_bloginfo("template_directory"); ?>/css/style.css">
<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/project.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo("template_directory"); ?>/js/global.js"></script>
<?php wp_head(); ?>
</head>
<body>
<div class="top-header">
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
    <div class="header header-site">