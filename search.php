<?
    /*
        Template Name: Search
    */

?>
<?php
    if (have_posts()) {
        $total = $wp_the_query->post_count; /*wp_the_query -> Objeto global que contiene siempre la consulta de WP activa, 
                                            este objeto tiene una propiedad que devuelve el numero de tuplas de la consulta: post_count*/
        if( total === 1){
            $result = $total . ' post encontrados';
        }else{
            $result = $total . 'posts encontrados';
        }
        
    }else{
        $result='No hay post';
    }
?>

<?php
    get_header(); /*Invocamos a header*/
?>

        <div class="stats-col text-center col-md-3 col-sm-6">
             <?php
             while (have_posts() ) : the_post();
                    get_template_part('content','list');
             endwhile;
    
            echo '<tbody></table>';
    
            the_post_pagination(array(
                'prev_text' => 'previous page',
                'next_text' => 'next page',
                'before_page_number' => '<span class => "num_page"></span>'
            ));
            ?>
        </div>

<?php
    get_footer(); 
?>

