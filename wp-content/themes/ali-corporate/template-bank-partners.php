<?php
/* Template Name: Bank Partners */
get_header();
while(have_posts()): the_post();

include_once('function-pagination.php');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

?>

<section class="projects">
  <article class="properties">
    <div>
      <ul>

        <?php
        $args = array('post_type' => 'bank', 'posts_per_page' => 12, 'paged' => $paged, 'orderby' => 'title', 'order' => 'ASC');
        $the_query = new WP_Query($args);
        if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post(); ?>

          <li>
            <figure>
              <img src="<?php echo get_the_post_thumbnail_url(); ?>">
            </figure>
            <figcaption>
            </figcaption>
          </li>
        <?php endwhile; wp_reset_postdata(); } else { ?>

          <li>
            <div style="height:400px; width: 300px; color:#000;">
              No active banks at this time.
            </div>
          </li>

        <?php } ?>
      </ul>
    </div>
    <section>
      <ul>
        <?php
        if (function_exists(custom_pagination)) {
          custom_pagination($the_query->max_num_pages,"",$paged, get_permalink());
        }
        ?>
      </ul>
    </section>
  </article>

  <div class="other-links">
    <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
  </div>
</section>

<?php
endwhile;
get_footer();
