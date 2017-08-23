<?php
/* Template Name: Search results */

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
      <h3>Search Results</h3>
      <ul>
        <?php
        $args = array('post_type' => array('page', 'project', 'location', 'bank'),
         'posts_per_page' => -1, 's' => @$_GET['q']);
        $the_query = new WP_Query($args);
        if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
          <li><a href="<?php echo get_permalink() ?>"> <?php the_title() ?></a></li>
        <?php endwhile; wp_reset_postdata(); } else {
          ?>
          <li>No results found</li>
          <?php
         } ?>
      </ul>
    </article>

    <div class="other-links">
      <?php displaySideNav('generic'); # Find this in header.php ?>
    </div>
  </section>

  <?php
endwhile;
get_footer();
