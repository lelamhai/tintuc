<?php
 /*
  Template Name: news-detail
 */
?>
<?php get_header(); ?>
      <?php setPostViews(get_the_ID()); 
      wpb_set_post_views(get_the_ID());

      ?>
      <?php 
        $categories = get_the_category();
        wp_list_pluck( $categories, 'name' );
      ?>
      <div class="container">
        <div class="logo pull-left"><a><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/logo.png" alt=""></a></div>
        <div class="main-menu pull-right">
          <div class="wrap-menu">
            <ul class="menu">
              <li><a href="" class="active">Project</a></li>
              <li><a href="">Buy</a></li>
              <li><a href="">Rent</a></li>
              <li><a href="">EXTRA SERVICE</a></li>
              <li><a href="">FIND AGENT</a></li>
              <li><a href="">NEWS</a></li>
              <li><a href="">MORE</a>
                <ul class="sub-menu">
                  <li><a href="">Project</a></li>
                  <li><a href="">Buy</a></li>
                  <li><a href="">Rent</a></li>
                  <li><a href="">Extra Service</a></li>
                  <li><a href="">Find Agent</a></li>
                  <li><a href="">News</a></li>
                  <li><a href="">More</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="block-search search-home">
      <div class="container">
        <form>
          <div class="title-search">Tìm kiếm căn hộ</div>
          <div class="item buy-select menu-left">
                  <div class="dropdown custom-select">
                    <input type="hidden" id="undefined" name="type-project">
                    <button type="button" id="type-project" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Buy</span><span class="arrow"></span></button>
                    <ul aria-labelledby="type-project" class="dropdown-menu">
                      <li><a href="" data-value="1">Buy</a></li>
                      <li><a href="" data-value="2">Any</a></li>
                      <li><a href="" data-value="3">Buy for Living</a></li>
                      <li><a href="" data-value="4">Buy for Investment</a></li>
                      <li><a href="" data-value="5">Rent</a></li>
                    </ul>
                  </div>
          </div>
          <div class="input-key-search">
            <input type="text" placeholder="Tìm theo tên dự án, block, căn hộ">
          </div>
          <div class="item">
                  <div class="dropdown custom-select">
                    <input type="hidden" id="undefined" name="location">
                    <button type="button" id="location" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Location</span><span class="arrow"></span></button>
                    <ul aria-labelledby="type-project" class="dropdown-menu">
                      <li><a href="" data-value="1">Any</a></li>
                      <li class="has-sub"><a href="" data-value="2">HOCHIMINH CITY</a>
                        <ul class="sub-select">
                          <li><a href="" data-value="HCMC - Vihomes Central Park">HCMC - Vihomes Central Park</a></li>
                          <li><a href="" data-value="HCMC - Vinhomes Dong Khoi">HCMC - Vinhomes Dong Khoi</a></li>
                          <li><a href="" data-value="HCMC - Vinhomes Royal City">HCMC - Vinhomes Royal City</a></li>
                          <li><a href="" data-value="HCMC - Vihomes Ba Son">HCMC - Vihomes Ba Son</a></li>
                          <li><a href="" data-value="HCMC - Vinhomes Khanh Hoi">HCMC - Vinhomes Khanh Hoi</a></li>
                          <li><a href="" data-value="HCMC - Vinhomes Can Gio">HCMC - Vinhomes Can Gio</a></li>
                          <li><a href="" data-value="HCMC - Vinhomes District 9">HCMC - Vinhomes District 9</a></li>
                        </ul>
                      </li>
                      <li class="has-sub"><a href="" data-value="3">HANOI</a>
                        <ul class="sub-select">
                          <li><a href="" data-value="HANOI - Vinhomes Time City Park Hill">HANOI - Vinhomes Time City Park Hill</a></li>
                          <li><a href="" data-value="HANOI - Vinhomes Nguyen Chi Thanh">HANOI - Vinhomes Nguyen Chi Thanh</a></li>
                          <li><a href="" data-value="HANOI - Vinhomes Riverside">HANOI - Vinhomes Riverside</a></li>
                          <li><a href="" data-value="HANOI - Vinhomes Tran Duy Hung">HANOI - Vinhomes Tran Duy Hung</a></li>
                          <li><a href="" data-value="HANOI - Vinhomes Cao Xa La">HANOI - Vinhomes Cao Xa La</a></li>
                          <li><a href="" data-value="HANOI - Vinhomes Green City">HANOI - Vinhomes Green City</a></li>
                          <li><a href="" data-value="HANOI - Vinhomes Lieu Giai">HANOI - Vinhomes Lieu Giai</a></li>
                        </ul>
                      </li>
                      <li class="has-sub"><a href="" data-value="4">HAI PHONG</a>
                        <ul class="sub-select">
                          <li><a href="" data-value="HAI PHONG - Vincom Hai Phong">HAI PHONG - Vincom Hai Phong</a></li>
                          <li><a href="" data-value="HAI PHONG - Vinhomes Riverside">HAI PHONG - Vinhomes Riverside</a></li>
                        </ul>
                      </li>
                      <li><a href="" data-value="5">HA TINH - Vinhomes Ha Tinh</a></li>
                      <li><a href="" data-value="6">BAC NINH - Vinhome Bac Ninh</a></li>
                      <li><a href="" data-value="7">HA NAM - Vincom Ha Nam</a></li>
                      <li><a href="" data-value="8">NAM DINH - Vincom Nam Dinh</a></li>
                      <li><a href="" data-value="9">THAI BINH - Vincom Thai Binh</a></li>
                      <li><a href="" data-value="10">LAO CAI - Vincom Lao Cai</a></li>
                      <li><a href="" data-value="11">YEN BAI - Vincom Yen Bai</a></li>
                      <li><a href="" data-value="12">HAI DUONG - Vincom Hai Duong</a></li>
                      <li><a href="" data-value="13">QUANG NINH - Eco Villas Quang Ninh</a></li>
                      <li class="has-sub"><a href="" data-value="14">DANANG</a>
                        <ul class="sub-select">
                          <li><a href="" data-value="DANANG - Vinpearl Danang">DANANG - Vinpearl Danang</a></li>
                          <li><a href="" data-value="DANANG - Vinpearl Danang">DANANG - Vinpearl Danang</a></li>
                        </ul>
                      </li>
                      <li><a href="" data-value="15">KHANH HOA</a></li>
                      <li><a href="" data-value="16">KIEN GIANG - Vinpearl Phu Quoc</a></li>
                    </ul>
                  </div>
          </div>
          <div class="clearfix"></div>
          <div class="row2">
            <div class="item menu-left">
                    <div class="dropdown custom-select">
                      <input type="hidden" id="undefined" name="filter-type">
                      <button type="button" id="filter-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Loại căn hộ</span><span class="arrow"></span></button>
                      <ul aria-labelledby="type-project" class="dropdown-menu">
                        <li><a href="" data-value="1">Căn hộ</a></li>
                        <li><a href="" data-value="2">Biệt thự</a></li>
                        <li><a href="" data-value="3">Thông tầng</a></li>
                      </ul>
                    </div>
            </div>
            <div class="item">
                    <div class="dropdown custom-select">
                      <input type="hidden" id="undefined" name="adults">
                      <button type="button" id="adults" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Adults</span><span class="arrow"></span></button>
                      <ul aria-labelledby="type-project" class="dropdown-menu">
                        <li><a href="" data-value="0">Any</a></li>
                        <li><a href="" data-value="1">1 adults</a></li>
                        <li><a href="" data-value="3">3 adults</a></li>
                        <li><a href="" data-value="5">5 adults</a></li>
                      </ul>
                    </div>
            </div>
            <div class="item">
                    <div class="dropdown custom-select">
                      <input type="hidden" id="undefined" name="children">
                      <button type="button" id="children" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Children</span><span class="arrow"></span></button>
                      <ul aria-labelledby="type-project" class="dropdown-menu">
                        <li><a href="" data-value="0">Any</a></li>
                        <li><a href="" data-value="1">1 children</a></li>
                        <li><a href="" data-value="3">3 children</a></li>
                        <li><a href="" data-value="5">5 children</a></li>
                      </ul>
                    </div>
            </div>
            <div class="item">
                    <div class="dropdown custom-select">
                      <input type="hidden" id="undefined" name="min-beds">
                      <button type="button" id="min-beds" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Min Beds</span><span class="arrow"></span></button>
                      <ul aria-labelledby="type-project" class="dropdown-menu">
                        <li><a href="" data-value="0">Tất cả</a></li>
                        <li><a href="" data-value="1">1</a></li>
                        <li><a href="" data-value="3">3</a></li>
                        <li><a href="" data-value="5">5</a></li>
                      </ul>
                    </div>
            </div>
            <div class="item">
                    <div class="dropdown custom-select">
                      <input type="hidden" id="undefined" name="max-beds">
                      <button type="button" id="max-beds" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Max Beds</span><span class="arrow"></span></button>
                      <ul aria-labelledby="type-project" class="dropdown-menu">
                        <li><a href="" data-value="0">Tất cả</a></li>
                        <li><a href="" data-value="1">1</a></li>
                        <li><a href="" data-value="3">3</a></li>
                        <li><a href="" data-value="5">5</a></li>
                      </ul>
                    </div>
            </div>
            <div class="item">
                    <div class="dropdown custom-select">
                      <input type="hidden" id="undefined" name="min-beds">
                      <button type="button" id="min-beds" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Min Price</span><span class="arrow"></span></button>
                      <ul aria-labelledby="type-project" class="dropdown-menu">
                        <li><a href="" data-value="0">Any</a></li>
                        <li><a href="" data-value="1">1 tỷ</a></li>
                        <li><a href="" data-value="3">3 tỷ</a></li>
                        <li><a href="" data-value="5">5 tỷ</a></li>
                      </ul>
                    </div>
            </div>
            <div class="item">
                    <div class="dropdown custom-select">
                      <input type="hidden" id="undefined" name="max-beds">
                      <button type="button" id="max-beds" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-block dropdown-toggle"><span class="text">Max Price</span><span class="arrow"></span></button>
                      <ul aria-labelledby="type-project" class="dropdown-menu">
                        <li><a href="" data-value="0">Any</a></li>
                        <li><a href="" data-value="1">2 tỷ</a></li>
                        <li><a href="" data-value="3">4 tỷ</a></li>
                        <li><a href="" data-value="5">6 tỷ</a></li>
                      </ul>
                    </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="item action-submit">
            <button type="submit" class="esta-button">Search</button>
          </div>
        </form>
      </div>
    </div>
          <div class="breadcrumbs">
            <div class="container">
            <?php 
            foreach (wp_list_pluck( $categories, 'name' ) as $key => $value) {
              if(strcmp("news",wp_list_pluck( $categories, 'name' )[0]) == 0)
              { ?>
              <a href="http://tintuc.local/news/">
                <?php 
                  echo wp_list_pluck( $categories, 'name' )[0];
                ?>
              </a>
              <?php
              } else {
                ?>
                <a href="">News</a>
                <span class="symbol">></span>
                <a href="">
                  <?php 
                    echo wp_list_pluck( $categories, 'name' )[0];
                  ?>
                </a>
                <?php
              }
            }
            ?>
            <span class="symbol">></span><a href="" class="current"><?php the_title();?></a>
            </div>
          </div>
    <div class="container">
      <div class="row m-b-30">
        <div class="col-xs-8">
          <div class="news-detail">
            <h1 class="title"><?php the_title();?></h1>
            <!-- <div class="author">Author: <b>Pham Phuong Thao</b></div> -->
            <div class="date"><i><?php echo get_the_date('d-m-Y'); ?></i></div>
            <div class="wysiwyg">
              <?php the_content();?>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="entry sidebar-news-detail">
            <h2 class="title-block title-page">POPULAR NEWS</h2>
            <div class="list-news">
              <ul class="list-unstyled">

                <?php
                $posts_per_page = 3;
                $args = array(
                  'category_name' => 'news',                                         
                  'posts_per_page' => $posts_per_page,
                  'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                  );
                query_posts($args);

                if(have_posts()) : 
                  while (have_posts()) :
                    the_post();
                  ?>
                  <li class="item">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail( 'full' ); ?>
                    <h3 class="title"><?php the_title();?></h3>
                    </a>
                  </li>
                  <?php 
                  endwhile; endif;
                  ?>

                  <?php
                  wp_reset_query();
                  ?>
              </ul>
              <div class="bottom text-center"><a href="http://tintuc.local/news-list/" class="btn esta-button">Xem thêm</a></div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    
<?php get_footer(); ?>