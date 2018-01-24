 <?php
 
 /*Visualiza un extracto del post normal en index.php*/

 //codigo del LOOP Para resto de post excepto el destacado, nos lo hemos traido de index.php
 
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