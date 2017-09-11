<?php
/* Template Name: Search results */
get_header();
while(have_posts()): the_post();

include_once('function-pagination.php');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>

<section class="projects">

  <article class="forms">
    <?php if(get_field('image_banner') != ''): ?>
      <section class="banner">
        <img src="<?php the_field('image_banner') ?>" alt="">
      </section>
    <?php endif; ?>

    <div class="page-content">
      <?php
      $args = array('post_type' => array('project', 'estate', 'location'),
      'posts_per_page' => 15, 'paged' => $paged,
      's' => @$_GET['q'], 'orderby' => 'post_title', 'order' => 'ASC' );

      $the_query = new WP_Query($args); ?>
      <h3>Search Results <?php echo $the_query->found_posts; ?> Results found</h3>
      <ul>
        <?php if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post(); ?>


          <?php if(get_post_type( get_the_ID()) == 'location'): ?>
            <li><a href="<?php echo get_permalink(47) . "?property_type=&price_range=&property_location=" . get_the_title()  ?>"> <?php the_title() ?></a></li>
          <?php else:?>
            <li><a href="<?php echo get_permalink() ?>"> <?php the_title() ?></a></li>
          <?php endif; ?>

        <?php endwhile; wp_reset_postdata(); } else {
          ?>
          <li>No results found</li>
          <?php
        } ?>
      </ul>
      <div class="projects">
        <div class="properties">

          <section>
            <ul>
              <?php
              if (function_exists(custom_pagination)) {
                custom_pagination($the_query->max_num_pages,"",$paged, get_permalink(1154));
              }
              ?>
            </ul>
          </section>
        </div>
      </div>
    </article>
    <div class="other-links">
      <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
    </div>
  </section>

  <?php
endwhile;
get_footer();
