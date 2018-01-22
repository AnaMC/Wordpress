<?php
    get_header(); /*Invocamos*/
?> 
<section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-sm-12 text-lg-left text-center">
          <h5>
                <?php
                  echo 'Autor: ' . the_author();
                ?>
            </h5>
          <p style="font-size:1em;">
            <?php 
                //curauth-> Es como el codex llama al al objeto del autor actual
                $curauth = (get_query_var('author_name'))?get_user_by('slug',get_query_var('author_name')):get_user_data(get_query_var('author'));
                echo $curauth->ID; /*En lugar de mostrar el ID debe mostrar el nombre del rol*/
            ?>
          </p>
        </div>
      </div>
    </div>
  </section>
  
<!--Foto del usuario-->
<div class="row">
    <!--Imagen del autor-->
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-lg-left text-center">
        
        <!--Comprobar si el autor tiene foto, si no, poner por defect-->
        <img alt="Imagen por defecto del autor " src="<?php if(file_exists( get_template_directory_uri().'/img/'.get_the_author_meta('nickname'))){
                    echo get_template_directory_uri().'/img/'.get_the_author_meta('nickname');
                    }else{echo get_template_directory_uri().'/img/makeup-default.png';} ?>"> 
         <?php 
          if(has_post_thumbnail() ) {
            $postImg = get_the_post_thumbnail_url();
          } else{
            $postImg = get_template_directory_uri()."/img/image-defecto.jpg";
          }
        ?>
    </div>
    <!--Sidebar-->
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
         <?php
            get_sidebar();  /*Invocamos al sidebar*/
         ?>
    </div>
    
</div>
   
   <!--ULTIMOS POSTS DEL USUARIO-->
   
<?php
    get_footer(); /*Invocamos a footer*/
?> 



