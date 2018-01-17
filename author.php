<div class="row">
    <div class="col-lg-12 col-sm-12 text-lg-left text-center">
        <?php
            get_header(); /*Invocamos a header*/
        ?>
    </div>
</div>
<!--Foto del usuario-->
<div class="row">
    
        <div class="col-lg-8 col-sm-8 col-xs-12 text-lg-left text-center">
        
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

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> <!--col-lg-4 (Las que faltan del div superior)-->
         <?php
            get_sidebar();  /*Invocamos al sidebar*/
         ?>
        </div>
</div>
  
<?php
    get_footer(); /*Invocamos a footer*/
?> 



