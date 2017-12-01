 <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="<?php echo get_option('HOME'); ?>">HOME</a></li>
          <li><a href="<?php echo get_page_link(get_page_by_title('BLOG')->ID); ?>">BLOG</a></li>
          <li><a href="<?php echo get_page_link(get_page_by_title('PRODUCTS')->ID); ?>">PRODUCTS</a></li>
          <li><a href="<?php echo get_page_link(get_page_by_title('LOOKS')->ID); ?>">LOOKS</a></li>
          
          <!--Comentado porque de momento no voy a utilizarlo-->
          
          <!--<li class="menu-has-children"><a href="">Drop Down</a>--> 
          <!--  <ul>-->
          <!--    <li><a href="#">Drop Down 1</a></li>-->
          <!--    <li class="menu-has-children"><a href="#">Drop Down 2</a>-->
          <!--      <ul>-->
          <!--        <li><a href="#">Deep Drop Down 1</a></li>-->
          <!--        <li><a href="#">Deep Drop Down 2</a></li>-->
          <!--        <li><a href="#">Deep Drop Down 3</a></li>-->
          <!--        <li><a href="#">Deep Drop Down 4</a></li>-->
          <!--        <li><a href="#">Deep Drop Down 5</a></li>-->
          <!--      </ul>-->
          <!--    </li>-->
          <!--    <li><a href="#">Drop Down 3</a></li>-->
          <!--    <li><a href="#">Drop Down 4</a></li>-->
          <!--    <li><a href="#">Drop Down 5</a></li>-->
          <!--  </ul>-->
          <!--</li>-->
          <li><a href="<?php echo get_page_link(get_page_by_title('ARCHIVES')->ID); ?>">ARCHIVES</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>