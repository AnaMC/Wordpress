<?php
/*Registro de TODOS los js que tenemos y los ponemos "en cola" */

    function theme_scripts(){
        /*contactform*/
        wp_register_script('contactform.js',get_template_directory_uri() . '/contactform/contactform.js',array('jquery'),false,false);
        wp_enqueue_script('contactform.js');
        /*custom*/
        wp_register_script('custom.js',get_template_directory_uri() . '/js/custom.js',array('jquery'),false,false);
        wp_enqueue_script('custom.js');
        /*bootstrap*/
        wp_register_script('bootstrap.bundle.min.js',get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.bundle.min.js',array('jquery'),false,false);
        wp_enqueue_script('bootstrap.bundle.min.js');
        
        // wp_register_script('bootstrap.bootstrap.min.js',get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js',array('jquery'),false,false);
        // wp_enqueue_script('bootstrap.min.js'); /*El de arriba in...*/
        /*counterup*/
        wp_register_script('counterup.min.js',get_template_directory_uri() . '/lib/counterup/counterup.min.js',array('jquery'),false,false);
        wp_enqueue_script('counterup.min.js');
        /*easing*/
        // wp_register_script('easing.js',get_template_directory_uri() . '/lib/easing/easing.js',array('jquery'),false,false);
        // wp_enqueue_script('easing.js');
        
        wp_register_script('easing.min.js',get_template_directory_uri() . '/lib/easing/easing.min.js',array('jquery'),false,false);
        wp_enqueue_script('easing.min.js');
        /*jquery*/
        wp_register_script('jquery-migrate.min.js',get_template_directory_uri() . '/lib/jquery/jquery-migrate.min.js',array('jquery'),false,false);
        wp_enqueue_script('jquery-migrate.min.js');
        
        // wp_register_script('jquery.min.js',get_template_directory_uri() . '/lib/jquery/jquery.min.js',array('jquery'),false,false);
        // wp_enqueue_script('jquery.min.js'); /*jq del tema*/
        /*lockfixed*/
        wp_register_script('lockfixed.min.js',get_template_directory_uri() . '/lib/lockfixed/lockfixed.min.js',array('jquery'),false,false);
        wp_enqueue_script('lockfixed.min.js');
        /*parallax*/
        wp_register_script('parallax.js',get_template_directory_uri() . '/lib/parallax/parallax.js',array('jquery'),false,false);
        wp_enqueue_script('parallax.js');
        /*stellar*/
        wp_register_script('stellar.min.js',get_template_directory_uri() . '/lib/stellar/stellar.min.js',array('jquery'),false,false);
        wp_enqueue_script('stellar.min.js');
        /*stickyjs*/
        wp_register_script('sticky.js',get_template_directory_uri() . '/lib/sticky/sticky.js',array('jquery'),false,false);
        wp_enqueue_script('sticky.js');
        /*superfish*/
        wp_register_script('hoverIntent.js',get_template_directory_uri() . '/lib/superfish/hoverIntent.js',array('jquery'),false,false);
        wp_enqueue_script('hoverIntent.js');
        
        // wp_register_script('superfish.js',get_template_directory_uri() . '/lib/superfish/superfish.js',array('jquery'),false,false);
        // wp_enqueue_script('superfish.js');
        
        wp_register_script('superfish.min.js',get_template_directory_uri() . '/lib/superfish/superfish.min.js',array('jquery'),false,false);
        wp_enqueue_script('superfish.min.js');
        /*tether*/
        // wp_register_script('tether.js',get_template_directory_uri() . '/lib/tether/js/tether.js',array('jquery'),false,false);
        // wp_enqueue_script('tether.js');
        
        wp_register_script('tether.min.js',get_template_directory_uri() . '/lib/tether/js/tether.min.js',array('jquery'),false,false);
        wp_enqueue_script('tether.min.js');
        /*waypoints*/
        wp_register_script('waypoints.min.js',get_template_directory_uri() . '/lib/tether/tether/waypoints.min.js',array('jquery'),false,false);
        wp_enqueue_script('waypoints.min.js');
    }

add_action('wp_enqueue_script','theme_scripts'); /*Añadimos la función al hook, sin esto no dçfunciona nada */

/* 
* Añadir script al tema
*/

add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('quote','link','gallery','list','audio', 'video')); /*Activa todos los tipos de formato de un post*/ /*COMPLETAR*/

/*Hacer las imagenes responsive*/

function insert_img_responsive($content){
    
        //Convertimos el contenido a una codificacion UTF-8
        $conten= mb_convert_encoding($document, 'HTML-ENTITIES', "UTF-8");
        //Para poder acceder a los nodos del DOM necesitamos el documento HTML, por lo que crearemos uno con el contenido del Post.
        $document = new DOMDocument();  
        //Anulamos la deteccion de errores por parte de PHP para que no "reviente" Si no lo ponemos a true vemos los errores por pantalla.
        libxml_use_internal_errors(true); 
        //Con el metodo load cargamos content en el DOM
        $document->loadHTML(utf8_decode($content)); 
        // Accedemos a las etiquetas img, esto devuelve un array de img
        $imgs = $document->getElementsByTagName('img'); 
        //Recorremos el array, sustituimos las clases por las nuevas img-responsive
        foreach($imgs as $img){ 
            $img->setAttribute('class', 'img-responsive');
            $img->setAttribute('width', '100%');
            $img->setAttribute('height', '100%');
        }
        //Guardamos los calculos, lo guardamos como $html para poder diferenciarlos bien
        $html=$document->saveHTML();
        return $html;
}

add_filter ('the_content', insert_img_responsive);

/*hook para coments*/

function my_comments_form ($fiellds){
    //Información necesaria
    $user = wp_get_current_user(); //Quien ha escrito el post
    $commenter = wp_get_current_commenter(); //Datos del usuario que va a dejar el comentario (Nomre, email y url)
    $nick = $user->exist()?$user -> display_name:''; //Si existe un usuario queremos el nombre
    $req = get_option('require_name_email');   //Saber si el email del usuario es un campo obligatorio
    //El objeto fields contiene los campos del formulario, le asignamos las nuevas html
    $fields['author']='<input type="text" class="comment-form-author" id="author" placeholder="name" name="author" value=""'.esc_attr($commenter['coment_author']).' size="20" required>';
    $fields['email']='<input type="email" class="comment-form-email" id="email" placeholder="name" name="email" value=""'.esc_attr($commenter['coment_author_email']).' size="20" required>';
    $fields['ur']='<input type="text" class="comment-form-url" id="url" placeholder="name" name="url" value=""'.esc_attr($commenter['coment_author_url']).' size="20" required>';
    $fields['comment_field']='<textarea class="comment-form-comment" id="comment" name="comment" value="" cols=" rows="" required></textarea>';
    
    return fields;
}

add_filter('comments_form_defaults_fields','my_comments_form');

/*Eliminar una de las dos text areas que aparecen*/

function my_formm_defaults($defaults){
    //Necesitamos saber si un susario está logueado o no, con la funcion is_usser_logged_in(true o falase), pero esta función no funcionará si hemos usado query post
    if (!is_user_logged_in()){
        if(isset ($defaults['comment_field'])){
            $defaults['comment_field']="";
    }
    else{
         $defaults['comment_field']='<textarea id="comment" name="comment" value="" cols=" rows=""></textarea>';
    }
    }
    return $defaults;
}

/*Crear widgets en el sidebar*/

function crea_area_widgets() {
    $sidebarArgs = array(
        'name' => 'Sidebar Widget',
        'id' => 'sidebar',
        'description' => 'Sidebar Widgets Area',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>'
    );
    register_sidebar($sidebarArgs);
    
    $footerArgs = array(
        'name' => 'Footer Widget',
        'id' => 'footer',
        'description' => 'Footer Widgets Area',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>'
    );
    register_sidebar($footerArgs);
}
add_action('widgets_init', 'crea_area_widgets');


function add_social_media($user_methods) {
    $user_methods['facebook'] = 'Facebook account';
    $user_methods['twitter'] = 'Twitter account';
    //unset($user_contact['field']); /*Para eliminar campos*/
    return $user_methods;
}
add_filter('user_contactmethods', 'add_social_media');



add_filter('comments_form_defaults','my_form_defaults');
