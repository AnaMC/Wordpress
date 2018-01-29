    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.html"><img src="<?php echo get_template_directory_uri();?>/img/logo-nav.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
        
      </div>
 <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="<?php echo get_option('HOME'); ?>">HOME</a></li>
          <li><a href="<?php echo get_page_link(get_page_by_title('BLOG')->ID); ?>">BLOG</a></li>
          <li><a href="<?php echo get_page_link(get_page_by_title('PRODUCTS')->ID); ?>">PRODUCTS</a></li>
          <li><a href="<?php echo get_page_link(get_page_by_title('LOOKS')->ID); ?>">LOOKS</a></li>
          <li><a href="<?php echo get_page_link(get_page_by_title('ARCHIVES')->ID); ?>">ARCHIVES</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>
    </div>