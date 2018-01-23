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
add_filter('comments_form_defaults','my_form_defaults');

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

//Método 2 SKILLS

function skills_fields($user){ ?>
    <!--Etiqueta del panel para los nuevos campos-->
    <h3><?php _e("User skills information","blank");?></h3>
    <table class="form-table">
        
        <tr>
            <th><label for="skill1"><?php _e("Skill 1");?></label></th>
            <td>
                <input type="text" name="skill1" id="skill1" value="<?php echo esc_attr(get_the_author_meta('skill1', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-1 description.");?></span>
            </td>
            <th><label for="skill1v"><?php _e("Skill 1 Value");?></label></th>
            <td>
                <input type="text" name="skill1v" id="skill1v" value="<?php echo esc_attr(get_the_author_meta('skill1v', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-1 value.");?></span>
            </td>
        </tr>
            
        <tr>
            <th><label for="skill2"><?php _e("Skill 2");?></label></th>
            <td>
                <input type="text" name="skill2" id="skill2" value="<?php echo esc_attr(get_the_author_meta('skill2', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-2 description.");?></span>
            </td>
            <th><label for="skill2v"><?php _e("Skill 2 Value");?></label></th>
            <td>
                <input type="text" name="skill2v" id="skill2v" value="<?php echo esc_attr(get_the_author_meta('skill2v', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-2 value.");?></span>
            </td>
        </tr>
        
        <tr>
            <th><label for="skill3"><?php _e("Skill 3");?></label></th>
            <td>
                <input type="text" name="skill3" id="skill3" value="<?php echo esc_attr(get_the_author_meta('skill3', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-3 description.");?></span>
            </td>
            <th><label for="skill3v"><?php _e("Skill 3 Value");?></label></th>
            <td>
                <input type="text" name="skill3v" id="skill3v" value="<?php echo esc_attr(get_the_author_meta('skill3v', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-3 value.");?></span>
            </td>
        </tr>
        
        <tr>
            <th><label for="skill4"><?php _e("Skill 4");?></label></th>
            <td>
                <input type="text" name="skill4" id="skill4" value="<?php echo esc_attr(get_the_author_meta('skill4', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-4 description.");?></span>
            </td>
            <th><label for="skill4v"><?php _e("Skill 4 Value");?></label></th>
            <td>
                <input type="text" name="skill4v" id="skill4v" value="<?php echo esc_attr(get_the_author_meta('skill4v', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-4 value.");?></span>
            </td>
        </tr>
    </table>
    <?php
}
add_action('edit_user_profile','skills_fields');
add_action('show_user_profile','skills_fields');

function save_skills_fields($user_id){
    //Nos aseguramos de que el usuario puede editar
    if(!current_user_can('edit_user',user_id)){ /*Utilizamos current  para preguntar si un usuario concreto puede realizar una acción concreta*/
        return;
    } //Llegado a este punto es que el usuario puede editar sus datos
    
    update_user_meta($user_id, 'skill1',$_POST['skill1']);
    update_user_meta($user_id, 'skill1v',$_POST['skill1v']);
    
    update_user_meta($user_id, 'skill2',$_POST['skill2']);
    update_user_meta($user_id, 'skill2v',$_POST['skill2v']);
    
    update_user_meta($user_id, 'skill3',$_POST['skill3']);
    update_user_meta($user_id, 'skill3v',$_POST['skill3v']);
    
    update_user_meta($user_id, 'skill4',$_POST['skill4']);
    update_user_meta($user_id, 'skill4v',$_POST['skill4v']);
}
add_action('personal_options_update','save_skills_fields');
add_action('edit_user_profile_update', 'save_skills_fields');

/*
*Función que devuelve el rol de un autor
*@param int autor ID
*
*/

function get_author_rol ($user_id){
    /*Extraemos toda la info del autor*/
    $user_info=get_userdata($user_id);
    return implode (',', $user_info->roles);
}

//CUSTOM POST TYPE

function makeup_shop(){
    $support = array(           //Array de soporte
        'title',
        'editor',
        'author',
        'thumbnail',
        //'custom-fields',
        'comments',
        'revisions',
    );
    
    $labels = array(            //Array de labels
        'name'=> _x('Maquillaje','plural'),
        'singular_name'=> _x('Maquillaje','singular'),
        'menu_name'=> _x('Maquillaje','admin menu'),
        'name_admin_bar'=> _x('Maquillaje','admin bar'),
        'add_new'=> _x('Añadir nuevo','agregar nuevo'),
        //
        'add_new_item'=> __('Añadir Maquillaje nuevo'),
        'new_item'=> __('Maquillaje nuevo'),
        'edit_item'=> __('Editar Maquillaje'),
        'view_item'=> __('ver Maquillaje'),
        'all_items'=> __('Todo el Maquillaje'),
        'search_items'=> __('Buscar Maquillaje'),
        'not_found'=> __('Maquillaje no encontrado. '),
    );
    
    $args = array(              //Array de argumentos
        'supports' => $support,                         //Array de paneles soportados en el admin area
        'labels' => $labels,                            //Traducción  para los labels en el admina area
        'public' => true,                               //Ambito del post public
        'query_var' => true,                            //La query var soportara los post personalizados 
        'rewrite' => array ('slug' => 'application'),   //Slug para el post
        'has_archive' => true,                          //permitimos los archivos adjuntos
        'hiperarchical' => false,                       //no va a tener posts hijos (no hay jerarquia)
        'menu_position' => 5,                           //posuicion de la opción de menu en el admin area
    );
    
    register_post_type('makeup_shop', $args);    
}
add_action('init','makeup_shop');

//Habilitar categorías y tags en los custom post type.

function add_cattags_to_custom_post_type(){
    //Necesitamos registrar su taxonomía
    register_taxonomy_for_object_type('category','makeup_shop');
    register_taxonomy_for_object_type('post_tag','makeup_shop');
}

add_action('init','add_cattags_to_custom_post_type');

/* 1ºPaso -> Creación del metabox */

function add_makeup_shop_metabox(){
    $screens = array ('makeup_shop');
    foreach($screens as $screen){       //Para cada pantalla de edición de makeup_shop
        add_meta_box(
            'makeup_shop_metabox',
            __('makeup shop Details','mine'),
            'add_fields_to_metabox',
            $screen,
            'normal',
            'default'
            );
    }
}
add_action('add_meta_boxes', 'add_makeup_shop_metabox');

/* 2ºPaso -> Creación de la función callback */

function add_fields_to_metabox($post){  //Le pasamos $post para poder acceder al id

    wp_nonce_field(basename(__FILE__),'makeup_shop_metabox_nonce');
    
    $nombre=get_post_meta($post->ID,'nombre');
    ?>
    <label for="nombre"> Nombre: </label>
    <input type="text" id="nombre" name="nombre" size="5" value="<?php echo $nombre;?>">
    
    <?php
       $precio=get_post_meta($post->ID,'precio');
    ?>
    <label for="precio"> Precio: </label>
    <input type="text" id="precio" name="precio" size="5" value="<?php echo $precio;?>">
    <?php
    
    $descripcion=get_post_meta($post->ID,'descripcion');
    ?>
    <label for="descripcion"> Descripción: </label>
    <input type="text" id="descripcion" name="descripcion" size="5" value="<?php echo $descripcion;?>">
    <?php
    
    $beneficios=get_post_meta($post->ID,'beneficios');
    ?>
    <label for="beneficios"> Beneficios: </label>
    <input type="text" id="beneficios" name="beneficios" size="5" value="<?php echo $beneficios;?>">
    <?php
    
    $modoUso=get_post_meta($post->ID,'modoUso');
    ?>
    <label for="modoUso"> Modo de empleo: </label>
    <input type="text" id="modoUso" name="modoUso" size="5" value="<?php echo $modoUso;?>">
    <?php
    
    $composicion=get_post_meta($post->ID,'composicion');
    ?>
    <label for="composicion"> Composición: </label>
    <input type="text" id="composicion" name="composicion" size="5" value="<?php echo $composicion;?>">
    <?php
    
    $valoracion=get_post_meta($post->ID,'valoracion');
    ?>
    <label for="valoracion"> Valoración: </label>
    <input type="text" id="valoracion" name="valoracion" size="5" value="<?php echo $valoracion;?>">
    <?php

    $cantidad=get_post_meta($post->ID,'cantidad');
    ?>
    <label for="cantidad"> Cantidad: </label>
    <input type="text" id="cantidad" name="cantidad" size="5" value="<?php echo $cantidad;?>">
    <?php

    $tester=get_post_meta($post->ID,'tester');
    ?>
    <label for="tester"> Tester: </label>
    <input type="text" id="tester" name="tester" size="5" value="<?php echo $tester;?>">
    <?php
    
    $relacionados=get_post_meta($post->ID,'relacionados');
    ?>
    <label for="relacionados"> Productos relacionados: </label>
    <input type="text" id="relacionados" name="relacionados" size="5" value="<?php echo $relacionados;?>">
    <?php
    
    $hechoEn=get_post_meta($post->ID,'hechoEn');
    ?>
    <label for="hechoEn"> Fabricado en: </label>
    <input type="text" id="hechoEn" name="hechoEn" size="5" value="<?php echo $hechoEn;?>">
    <?php
    
    $coleccion=get_post_meta($post->ID,'coleccion');
    ?>
    <label for="coleccion"> Colección: </label>
    <input type="text" id="coleccion" name="coleccion" size="5" value="<?php echo $coleccion;?>">
    <?php
    
    $fabricante=get_post_meta($post->ID,'fabricante');
    ?>
    <label for="fabricante"> Fabricante: </label>
    <input type="text" id="fabricante" name="fabricante" size="5" value="<?php echo $fabricante;?>">
    <?php
    
}


