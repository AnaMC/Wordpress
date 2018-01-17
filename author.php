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
            
        <img alt="Imagen por defecto del autor " src="<?php echo get_template_directory_uri();?>/img/makeup-default.png"> <!--Comprobar si el autor tiene foto, si no, poner por defect-->
        
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



