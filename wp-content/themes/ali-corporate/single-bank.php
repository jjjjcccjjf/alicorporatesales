<?php
get_header();
while(have_posts()): the_post();
?>

<section class="projects">

  <article class="forms">
    <?php if(has_post_thumbnail()): ?>
      <section class="banner">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
      </section>
    <?php endif; ?>

    <div class="forms-main">
      <h3><?php the_title(); ?></h3>
      <?php the_content(); ?>
    </article>

    <div class="other-links">
      <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
    </div>
  </section>

<?php
endwhile;
get_footer();
