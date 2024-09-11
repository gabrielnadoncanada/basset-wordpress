<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lexend
 */

if ( !is_active_sidebar( 'blog__sidebar' ) ) {
    return;
}
?>

<?php dynamic_sidebar( 'blog__sidebar' );?>
