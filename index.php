<?php
    get_header(); /*Invocamos a header*/
?>
  <!-- Page Content
    ================================================== -->
  <!-- Hero -->

  <section class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <a class="hero-brand" href="index.html" title="Home"><img alt="Bell Logo" src="<?php echo get_template_directory_uri();?>/img/logo.png"></a>
        </div>
      </div>

      <div class="col-md-12">
        <h1>
            A theme with personality
          </h1>

        <p class="tagline">
          This is a powerful theme with some great features that you can use in your future projects.
        </p>
        <a class="btn btn-full" href="#about">Get Started Now</a>
      </div>
    </div>

  </section>
  <!-- /Hero -->

  <!-- Header -->
  <header id="header">
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
  </header>
  <!-- #header -->

  <!-- About -->

  <section class="about" id="about">
   <!--Borrado-->
   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   
   <?php                      //POST DESTACADO
      $args = array(
          'posts_per_page' => 1,
          
          /*Excluímos los post que no sean de tipo estandar*/
          
          tax_query=>array( /*Con tax query excluímos determinadas taxonomías de la consulta*/
              array(
                'taxonomy'=>'post_format',  /*Lo que se va a buscar*/
                'field'=> 'slug',           /*Que va a hacer con.... 'slug'->titulos(todos) de wp*/
                'terms'=>array(             /*Que va a buscar*/
                    'post_format_link',
                    'post_format-quote',    /*Formatos que queremos excluir, podemos ponerlos todos o solo los que tengamos habilitados en funtions.php -> (add_theme_support('post-formats')...*/
                    'post_format_video',
                    'post_format_audio',
                    'post_format_image',
                    'post_format_gallery'
                  ),
                  'operator'=>'NOT IN'      /*¿Que vamos a hacer con los formatos? EXCLUIRLOS, exxclusion en consulta SQL*/
                )
            )
        );
        
        
        // Copiar a libreta
        
        $query = new WP_Query($args); //LOOP Para Post destacado
        
        if($query->have_posts()):while($query->have_posts()):$query->the_post();
        $dest_id = $post ->ID;
        
        the_title();
        echo '<br>';
        /*Avatar del autor del Post*/
        echo get_avatar(get_the_author_meta('ID'), 32, get_template_directory_uri() . "/img/avatarDefault.jpg", 'Avatar');
        the_author(); /*Muestra el nombre del autor*/
        the_time(); /*Fecha*/
        echo '<br>';
        the_excerpt(); /*Longitud del extracto del post, se puede modificar con un filter hook*/
        echo '<br>';
        
   ?>
   <?php
      endwhile;endif;
      wp_reset_query();
   ?>
   </div>
   </div>
  </section>

  <!--MODIFI-->
  
  <!--SEGUNDO LOOP-->
  
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

      <?php
        $args = array(
        'posts_per_page' => 10,
        'posst__not__in' => array($dest_id),
        'post_type' => array('post','makeup_shop'));// Incluimos custom post type en la consulta general de wordpres
        
      $custom_query = new WP_Query($args); //LOOP Para resto de post excepto el destacado
      if($custom_query->have_posts()):while($custom_query->have_posts()):$custom_query->the_post();
      
          get_template_part('content', get_post_format()); /*nos llevamos el codigo a content.php*/
        
       ?> 
       
      <?php
        endwhile;endif;
        wp_reset_query();
       ?>
       
      
    </div>
     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> <!--col-lg-4 (Las que faltan del div superior)-->
         <?php
            get_sidebar();  /*Invocamos al sidebar*/
         ?>
    </div>
  </div>

<?php
    get_footer(); /*Invocamos a footer*/
?> 