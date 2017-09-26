<?php
/* Template Name: Hello */
get_header();
while(have_posts()): the_post();
?>

<?php
endwhile;
get_footer();
