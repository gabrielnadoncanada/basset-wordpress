<?php
$author_data = get_the_author_meta('description', get_query_var('author'));
$facebook_url = get_the_author_meta('lexend_facebook');
$twitter_url = get_the_author_meta('lexend_twitter');
$linkedin_url = get_the_author_meta('lexend_linkedin');
$author_bio_avatar_size = 250;
if ($author_data != '') :
?>

    <div class="post-author panel py-4 px-3 sm:p-3 xl:p-4 bg-secondary dark:bg-gray-800 rounded lg:rounded-2 mb-6 xl:mb-8">
        <div class="row g-4 items-center">
            <div class="col-12 sm:col-5 xl:col-3">
                <div class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                    <?php print get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size, '', '', ['class' => '']); ?>
                </div>
            </div>
            <div class="col">
                <div class="panel vstack items-start gap-2 md:gap-3">
                    <h4 class="h5 m-0"><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php print get_the_author(); ?></a></h4>
                    <p class="fs-6"><?php the_author_meta('description'); ?></p>
                    <ul class="nav-x gap-1 text-gray-400 dark:text-white">
                        <li>
                            <a href="<?php echo esc_url($facebook_url); ?>"><i class="icon-2 unicon-logo-facebook"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url($twitter_url); ?>"><i class="icon-2 unicon-logo-x-filled"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url($linkedin_url); ?>"><i class="icon-2 unicon-logo-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>