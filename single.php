<?php
    get_header();
    get_template_part('nav');
    the_post();
?>
<div class="row">
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <?php 
                the_content(); 
                the_tags();
            ?>
        <?php
          echo '<br>';
          /*Avatar del autor del Post*/
          echo get_avatar(get_the_author_meta('ID'), 32, get_template_directory_uri() . "/img/avatarDefault.jpg", 'Avatar');
          echo ' ';
          the_author(); /*Muestra el nombre del autor*/
          echo ' ';
          the_time(); /*Fecha*/
        ?>
        </div>
        
        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php 
            echo 'Sobre el autor: ';
            echo get_the_author_meta('description'); // Muestra la Bio del autor
            echo '<br>';
        ?>
    </div> 
    
</div>  
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <?php 
            get_sidebar();
        ?>
    </div>
</div>
    
</div>

<?php
    get_footer(); 
?>
