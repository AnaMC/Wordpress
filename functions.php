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