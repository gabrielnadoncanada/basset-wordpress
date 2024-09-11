<?php

/**
 * Template Name: Page Sidebar
 * @package lexend
 */

get_header();

$blog_column = is_active_sidebar('blog__sidebar') ? 8 : 12;

?>

<div class="page-area space">
    <div class="container max-w-xl">
        <div class="row">
            <div class="lg:col-<?php print esc_attr($blog_column); ?>">
                <div class="lexend-page-content">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', 'page');
                        endwhile;
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
                </div>
            </div>
            <?php if (is_active_sidebar('blog__sidebar')) : ?>
                <div class="lg:col-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
