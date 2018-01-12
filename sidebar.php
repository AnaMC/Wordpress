<section class="sidebar">
    <div class="sidebarsection">
        <h3 class="sectiontitle">Search:</h3>
        <?php get_search_form(); ?>
    </div>
    <div class="sidebarsection">
        <h3 class="sectiontitle">Tag Cloud:</h3>
        <?php
        //comprueba si hay plugins instalados y si no hay te saca este mensaje
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widget')): ?>
        <div class="warning">
            No tienes widgets disponibles para este tema.
        </div>
        <?php endif; ?>   
    </div>
    <div class="sidebarsection">
        <h3 class="sectiontitle">Last Entries:</h3>
        <?php
            $args = array(
                'type'  => 'postbypost',
                'limit' => 5
            );
            wp_get_archives($args); 
        ?>
    </div>
    <div class="sidebarsection">
        <h3 class="sectiontitle">Archives:</h3>
        <?php
            wp_get_archives(); 
        ?>
    </div>
    <div class="sidebarsection">
        <h3 class="sectiontitle">Categories:</h3>
        <?php
            $args = array(
                'title_li' => '',
                'show_count' => true,
                'echo' => false
            );
            $cats = wp_list_categories($args);
            $cats = preg_replace('/<\/a> \(([0-9]+)\)/' , '<span class="numCats">\\1</span></a>' , $cats);
            echo $cats;
        ?>
    </div>
    <div class="sidebarsection">
        <h3 class="sectiontitle">Authors:</h3>
        <?php
            $args = array(
                'optioncount' => true,
                'orderby' => 'post_count',
                'order' => 'DESC',
                'hide_empty' => false,
                'echo' => false
            );
            $auth = wp_list_authors($args);
            $auth = preg_replace('/<\/a> \(([0-9]+)\)/' , '<span class="numCats">\\1</span></a>' , $auth);
            echo $auth;
        ?>
    </div>
    <div class="sidebarsection">
        <h3 class="sectiontitle">Pages:</h3>
        <?php
            $args = array(
                'title_li' => '',
            );
            wp_list_pages($args);
        ?>
    </div>
</section>