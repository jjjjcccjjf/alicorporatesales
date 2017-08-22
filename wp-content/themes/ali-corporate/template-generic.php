<?php
/* Template Name: Generic Template */
get_header();
while(have_posts()): the_post();
?>

<section class="projects">

  <article class="forms">
    <?php if(get_field('image_banner') != ''): ?>
      <section class="banner">
        <img src="<?php the_field('image_banner') ?>" alt="">
      </section>
    <?php endif; ?>

    <div class="forms-main">
      <h3><?php the_title(); ?></h3>
      <?php the_content(); ?>
    </article>

    <div class="other-links">
      <?php displaySideNav('generic'); # Find this in header.php ?>
    </div>
  </section>

<?php
endwhile;
get_footer();
