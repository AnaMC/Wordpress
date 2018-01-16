<div class="container">
    <div class="bg-faded col-md-12">
        <section>
            <div class="sidebarsection">
                <h1>Sidebar</h1>
                <div class="search">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>
        
        <section>
            <div class="sidebarsection">
                <h1>Sidebar</h1>
                <div class="widgets">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widget')) : ?>
                        <div class="warning">No widgets installed for this theme</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
        <section>
            <div class="sidebarsection">
                <h1>Sidebar</h1>
                <div class="lastentries">
                    <?php 
                    $args = array (
                        'type' => 'postbypost', //hay otro argumento que es 'alpha' que saca ordenado alfabeticamente por el titulo
                        'limit' => 5
                    );
                    wp_get_archives($args); 
                    ?>
                </div>
            </div>
        </section>
        
        <section>
            <div class="sidebarsection">
                <h1>Sidebar</h1>
                <div class="archives">
                    <?php wp_get_archives() ?>
                </div>
            </div>
        </section>
        
        <section>
            <div class="sidebarsection">
                <h1>Sidebar</h1>
                <div class="categories">
                    <?php 
                    $args = array(
                        'title_li' => '',
                        'show_count' => true,
                        'echo' => false
                    );
                    $cats = wp_list_categories($args);
                    $categories = preg_replace('/<\/a> \(([0-9]+)\)/', '<span class="catnum">\\1</span></a>', $cats);
                    echo $categories;
                    ?>
                </div>
            </div>
        </section>
        
        <section>
            <div class="sidebarsection">
                <h1>Authors</h1>
                <div class="authors">
                    <?php 
                    $args = array(
                        'optioncount' => true,
                        'orderby' => 'postcount',
                        'order' => 'ASC',
                        'hide_empty' => false,
                        'echo' => false
                    );
                    //mirar pk no funciona, puede que haya que añadir mas autores
                    $autores = wp_list_authors($args);
                    $authors = preg_replace('/<\/a> \(([0-9]+)\)/', '<span class="catnum">\\1</span></a>', $autores);
                    echo $authors;
                    ?>
                </div>
            </div>
        </section>
        
        <section>
            <div class="sidebarsection">
                <h1>Sidebar</h1>
                <div class="pages">
                    <?php 
                    $args = array(
                        'title_li' => ''
                    );
                    wp_list_pages($args);
                    ?>
                </div>
            </div>
        </section>
    </div>
    
</div>